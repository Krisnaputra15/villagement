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
        $forumTerbaru = Forum::where('replied_to', null)->orderBy('created_at', 'desc')->get();
        if (Auth::user()->level == 2) {
            $forumTrending = Forum::where('replied_to', null)->whereRaw('created_at between ? and ?', [$date->format('Y-m-d H:i:s'), $date->add(new DateInterval('P30D'))->format('Y-m-d H:i:s')])
                ->orderBy('upvote_count', 'desc')->orderBy('view_count', 'desc')
                ->get();
            return view('forum.index', ['forumTerbaru' => $forumTerbaru, 'forumTrending' => $forumTrending, 'page' => 'forum']);
        }
        return view('admin.forum.index', ['forumTerbaru' => $forumTerbaru, 'page' => 'forum']);
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
            'deskripsi' => 'required|string',
            'gambar.*' => 'nullable|file|mimes:jpg,png,gif,jpeg|max:1500'
        ]);
        if ($validator->fails()) {
            return redirect('forum/' . ($id == null ? '' : $id))->with('error', $validator->errors()->first());
        }

        $create = Forum::create([
            'creator_id' => Auth::user()->id,
            'judul' => strlen($request->judul) == 0 ? "" : $request->judul,
            'content' => $request->deskripsi,
            'replied_to' => $id == null ? '' : $id,
        ]);
        $storeImage = $this->uploadFile($request->gambar, $create);
        if (!$storeImage) {
            $deleteImage = $this->deleteFile($id);
            return redirect('forum')->with('error', 'Gagal menghapus forum');
        }
        return redirect('forum')->with('success', 'Berhasil membuat forum, silakan tunggu respon dari pihak desa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $forum = Forum::find($id);
        if(Auth::user()->id != $forum->user->id){
            $update = $forum->update([
                'view_count' => $forum->view_count + 1
            ]);
        }
        return view('forum.show', ['data' => Forum::find($id), 'replies' => Forum::where('replied_to', $id)->get(), 'page' => 'forum']);
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
            $deleteForum = Forum::where('id')->delete();
            return redirect('forum')->with('success', 'Forum berhasil dihapus');
        }
        return redirect('forum')->with('error', 'Forum gagal dihapus');
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
        return redirect('forum/' . $id);
    }

    public function uploadFile($items, Forum $forum)
    {
        $i = 1;
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
        foreach ($filesPermohonan as $file) {
            $delete = Storage::disk('public')->delete('forum/' . $file->nama_file);
            if (!$delete) {
                return false;
            }
        }
        return true;
    }
}
