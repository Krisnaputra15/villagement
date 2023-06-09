<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Permohonan;
use App\Models\KelengkapanPermohonan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PermohonanController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = null;
        if (Auth::user()->level == 1) {
            $dataProcessed = Permohonan::where('status', 'proses')->orderBy('created_at', 'asc')->get();
            $dataAccepted = Permohonan::where('status', 'diterima')->orderBy('created_at', 'asc')->get();
            $dataDeclined = Permohonan::where('status', 'ditolak')->orderBy('created_at', 'asc')->get();
            return view('admin.permohonan.index', ['process' => $dataProcessed, 'accepted' => $dataAccepted, 'declined' => $dataDeclined]);
        } else {
            $data = Permohonan::where('user_id', Auth::user()->id)->get();
            return view('permohonan.index', ['data' => $data]);
        }
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
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'syarat.*' => 'required|file|mimes:jpg,png,pdf',
        ]);
        if ($validator->fails()) {
            return redirect('layanan/' . $id)->with('error', $validator->errors());
        }
        $createPermohonan = Permohonan::create([
            'layanan_id' => $id,
            'user_id' => Auth::user()->id,
            'status' => 1
        ]);
        $i = 1;
        $storeKelengkapanPermohonan = $this->uploadFile($request->file('syarat'), $createPermohonan);
        if ($storeKelengkapanPermohonan) {
            return redirect('layanan/' . $id)->with('success', 'Berhasil mengajukan permohonan surat');
        }
        Permohonan::where('id', $createPermohonan->id)->delete();
        return redirect('layanan/' . $id)->with('error', 'Gagal mengajukan permohonan surat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Permohonan::find($id);
        if(Auth::user()->level == 1){
            return view('admin.layanan.permohonanDetail', ['data' => $data, 'page' => 'layanan']);
        }
        return view('permohonan.show', ['data' => $data]);
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
    public function update(Request $request, string $id)
    {
        $permohonan = Permohonan::find($id);
        $deleteFile = $this->deleteFile($id);
        if ($deleteFile) {
            $storeKelengkapanPermohonan = $this->uploadFile($request->syarat, $permohonan);
            if ($storeKelengkapanPermohonan) {
                return redirect()->back()->with('success', 'Berhasil memperbarui permohonan surat');
            }
        }
        return redirect()->back()->with('error', 'Gagal memperbarui permohonan surat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteFile = $this->deleteFile($id);
        if ($deleteFile) {
            $deletePermohonan = Permohonan::where('id', $id)->delete();
            if ($deletePermohonan) {
                return redirect()->back()->with('success', 'Berhasil menghapus permohonan surat');
            }
        }
        return redirect()->back()->with('error', 'Gagal menghapus permohonan surat');
    }

    public function changePengajuanStatus(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'alasan' => 'nullable|string',
            'alasan_kustom' => 'nullable|string'
        ]);
        if($validator->fails()){
            return redirect('admin/permohonan/'.$id)->with('error', $validator->errors()->first());
        }

        $update = Permohonan::where('id', $id)->update([
            'status' => strlen($request->alasan) == 0 ? 'diterima' : 'ditolak',
            'declined_reason' => strlen($request->alasan) == 0 ? null : ($request->alasan == 'kustom' ? $request->alasan_kustom : $request->alasan),
        ]);

        if($update){
            return redirect('admin/permohonan/'.$id)->with('success', 'Berhasil mengubah status penerimaan pengajuan surat');
        }
        return redirect('admin/permohonan/' . $id)->with('error', 'Gagal mengubah status penerimaan pengajuan surat');
    }

    public function openSurat($id){
        $data = Permohonan::where('id', $id)->first();
        $data_desa = DB::table('data_desa')->first();
        return view('user.pdf', ['user' => $data, 'data_desa' => $data_desa]);
    }
    public function generatePDF($id){
        $data = Permohonan::where('id', $id)->first();
        $data_desa = DB::table('data_desa')->first();
        $pdf = PDF::loadView('user.pdf', ['user' => $data, 'data_desa' => $data_desa]);
        return $pdf->stream();
    }

    public function uploadFile($items, Permohonan $permohonan)
    {
        $i = 1;
        foreach ($items as $item) {
            $extension = $item->getClientOriginalExtension();
            $replacedTimestamps = str_replace(':', '-', $permohonan->created_at);
            $newFileName = str_replace(" ", "", Auth::user()->nama . '_' . $permohonan->layanan->nama_layanan . '_' . $i . '_' . $replacedTimestamps . '.' . $extension);
            $store = $item->storeAs('permohonan', $newFileName, 'public');
            if (!$store) {
                $delete = Storage::disk('public')->delete('permohonan/' . $newFileName);
                return false;
            }
            $createMedia = KelengkapanPermohonan::create([
                'permohonan_id' => $permohonan->id,
                'nama_file' => $newFileName,
            ]);
            ++$i;
        }
        return true;
    }

    public function deleteFile($id)
    {
        $filesPermohonan = KelengkapanPermohonan::where('permohonan_id', $id)->get();
        foreach ($filesPermohonan as $file) {
            $delete = Storage::disk('public')->delete('permohonan/' . $file->nama_file);
            if (!$delete) {
                return false;
            }
        }
        return true;
    }
}
