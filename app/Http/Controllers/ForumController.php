<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use DateTime;
use DateInterval;
use App\Models\Forum;
use App\Models\ForumVote;
use App\Models\ForumMedia;
use App\Models\ForumView;
use Illuminate\Support\Facades\DB;

class ForumController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentDate = date('Y-m-d H:i:s', strtotime(date('Y-m-1')));
        $date = new DateTime($currentDate);
        if (Auth::user()->level == 2) {
            $forumTerbaru = Forum::where('replied_to', null)->orderBy('created_at', 'desc')->get();
            $forumTrending = Forum::where('replied_to', null)->whereRaw('created_at between ? and ?', [$date->format('Y-m-d H:i:s'), $date->add(new DateInterval('P30D'))->format('Y-m-d H:i:s')])
                ->orderBy('upvote_count', 'desc')->orderBy('view_count', 'desc')
                ->get();
            return view('forum.index', ['forumTerbaru' => $forumTerbaru, 'forumTrending' => $forumTrending, 'page' => 'forum']);
        }
        $forumDone = Forum::where('status', 'selesai')->where('replied_to', null)->get();
        $forumProcessed = Forum::where('status', 'proses')->where('replied_to', null)->get();
        $forumUnprocessed = Forum::where('status', 'menunggu')->where('replied_to', null)->get();
        return view('admin.forum.index', ['forumDone' => $forumDone, 'forumUnprocessed' => $forumUnprocessed, 'forumProcessed' => $forumUnprocessed, 'page' => 'forum']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'judul' => $id == null ? 'required|string' : 'nullable|string',
            'deskripsi' => Auth::user()->level == 1 ? 'nullable|string' : 'required|string',
            'gambar.*' => 'nullable|file|mimes:jpg,png,gif,jpeg|max:1500'
        ]);
        if ($validator->fails()) {
            return redirect('forum/' . ($id == null ? '' : $id))->with('error', $validator->errors()->first());
        }

        $balasanTemplate = "keluh kesah anda telah kami baca dan akan kami tindak lanjuti, terimakasih banyak!";

        $create = Forum::create([
            'creator_id' => Auth::user()->id,
            'judul' => strlen($request->judul) == 0 ? "" : $request->judul,
            'content' => strlen($request->deskripsi) != 0 ? $request->deskripsi : $balasanTemplate,
            'replied_to' => $id == null ? null : $id,
        ]);
        $storeImage = $this->uploadFile($request->gambar, $create);
        if (!$storeImage) {
            $deleteImage = $this->deleteFile($id);
            return redirect('forum')->with('error', 'Gagal menghapus forum');
        }
        if (Auth::user()->level == 1) {
            Forum::where('id', $id)->update([
                'status' => 'proses'
            ]);
            return redirect('admin/forums/' . $id)->with('success', 'Berhasil membalas forum');
        }
        return redirect($id == null ? 'forum' : 'forum/' . $id)->with('success', 'Berhasil membuat forum, silakan tunggu respon dari pihak desa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $forum = Forum::find($id);
        $check = ForumView::where('forum_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($check == null) {
            $create = ForumView::create([
                'forum_id' => $id,
                'user_id' => Auth::user()->id,
            ]);
            $update = $forum->update([
                'view_count' => $forum->view_count + 1
            ]);
        }
        if (Auth::user()->level == 1) {
            return view('admin.forum.detail', ['data' => $forum, 'page' => 'forum']);
        }
        $replies = Forum::join('users', 'users.id', '=', 'forum.creator_id')->where('replied_to', $id)->orderBy('users.level', 'asc')->get();
        return view('forum.show', ['data' => Forum::find($id), 'replies' => $replies, 'page' => 'forum']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'judul' => 'required|string',
    //         'deskripsi' => 'required|string',
    //         'gambar.*' => 'nullable|mimes:jpg,png,gif,jpeg|max:1500'
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect('forum/' . ($id == null ? '' : "$id"))->with('error', $validator->errors()->first());
    //     }

    //     $update = Forum::where('id', $id)->update([
    //         'judul' => $request->judul,
    //         'content' => $request->content, 
    //     ]);
    //     if($update){
    //         $deleteImage = $this->deleteFile($id);
    //         $storeImage = $this->uploadFile($request->gambar, Forum::find(($id)))
    //         if($deleteImage && $storeImage){
    //             return 
    //         }
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteImage = $this->deleteFile($id);
        if ($deleteImage) {
            $deleteForum = Forum::destroy($id);
            return redirect()->back()->with('success', 'Forum berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Forum gagal dihapus');
    }

    public function changeStatus(Request $request, $id)
    {
        $update = Forum::where('id', $id)->update([
            'is_ditutup' => 1,
            'status' => $request->status
        ]);
        if ($update) {
            return redirect('admin/forums/' . $id)->with('success', 'Berhasil mengubah status forum');
        }
        return redirect('admin/forums/' . $id)->with('error', 'gagal mengubah status forum');
    }

    public function changeForumOpen($id)
    {
        $find = Forum::find($id);
        $message = '';
        if ($find->is_ditutup == 0) {
            $find->update([
                'is_ditutup' => 1
            ]);

            $message = 'Forum berhasil ditutup';
        } else {
            $find->update([
                'is_ditutup' => 0
            ]);

            $message = 'Forum berhasil dibuka';
        }
        return redirect('admin/forums/' . $id)->with('success', $message);
    }

    public function upvote($id)
    {
        $findForum = Forum::find($id);
        $findUpvote = ForumVote::where('user_id', Auth::user()->id)->where('forum_id', $id)->first();
        if ($findUpvote) {
            $deleteUpvote = ForumVote::where('user_id', Auth::user()->id)->where('forum_id', $id)->delete();
            $findForum->update([
                'upvote_count' => $findForum->upvote_count - 1,
            ]);
        } else {
            $createUpvote = ForumVote::create([
                'user_id' => Auth::user()->id,
                'forum_id' => $id
            ]);
            $findForum->update([
                'upvote_count' => $findForum->upvote_count + 1,
            ]);
        }
        return redirect()->back();
    }

    public function uploadFile($items, Forum $forum)
    {
        $i = 1;
        if ($items == null) {
            return true;
        }
        foreach ($items as $item) {
            $extension = $item->getClientOriginalExtension();
            $replacedTimestamps = str_replace(':', '-', $forum->created_at);
            $newFileName = str_replace(" ", "", Auth::user()->nama . '_' . $forum->id . '_' . $i . '_' . $replacedTimestamps . '.' . $extension);
            $store = $item->storeAs('forum', $newFileName, 'public');
            if (!$store) {
                $delete = Storage::disk('public')->delete('forum/' . $newFileName);
                return false;
            }
            $createMedia = ForumMedia::create([
                'forum_id' => $forum->id,
                'nama_file' => $newFileName,
            ]);
            ++$i;
        }
        return true;
    }

    public function deleteFile($id)
    {
        $filesPermohonan = ForumMedia::where('forum_id', $id)->get();
        if (sizeof($filesPermohonan) == 0) {
            return true;
        }
        foreach ($filesPermohonan as $file) {
            $delete = Storage::disk('public')->delete('forum/' . $file->nama_file);
            if (!$delete) {
                return false;
            }
        }
        return true;
    }
}
