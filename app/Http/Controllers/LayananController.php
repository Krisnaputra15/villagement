<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Layanan;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Layanan::orderBy('is_active', 'desc')->orderBy('nama_layanan', 'asc')->get();
        if(Auth::user()->level == 1){
            return view('admin.layanan.index', ['data' => $data, 'page' => 'layanan']);
        }
        return view('layanan.index', ['layanan' => $data, 'page' => 'layanan']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'syarat' => 'required'
        ]);
        if($validator->fails()){
            return redirect('/admin/layanan')->with('error', $validator->messages()->first());
        }
        $syaratRaw = $this->buildRawSyarat($request->syarat);
        
        $create = Layanan::create([
            'nama_layanan' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'syarat' => $syaratRaw
        ]);
        return redirect('admin/layanan')->with('success', 'Berhasil menambahkan data layanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Layanan::find($id);
        $syaratArray = explode(";", $data->syarat);
        if(Auth::user()->level == 1){
            $permohonan = Permohonan::where('layanan_id', $id)->orderBy('status', 'asc')->orderBy('created_at', 'asc')->get();
            return view('admin.layanan.detail', ['layanan' => $data, 'syarat' => $syaratArray, 'permohonan' => $permohonan, 'page' => 'layanan']);
        }
        return view('layanan.show', ['layanan' => $data, 'syarat' => $syaratArray, 'page' => 'layanan']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Layanan::find($id);
        return view('admin.layanan.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'syarat' => 'required',
            'status' => 'required|numeric'
        ]);
        if($validator->fails()){
            return redirect('/admin/layanan/'.$id)->with('error', $validator->messages()->first());
        }
        $syaratRaw = $this->buildRawSyarat($request->syarat);
        
        $update = Layanan::where('id', $id)->update([
            'nama_layanan' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->status,
            'syarat' => $syaratRaw
        ]);
        return redirect('admin/layanan/'.$id)->with('success', 'Berhasil memperbarui data layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Layanan::where('id', $id)->delete();
        if($delete){
            return redirect('/admin/layanan')->with('success', 'Berhasil memnghapus layanan');
        }
        return redirect('/admin/layanan/'.$id)->with('error', 'Gagal menghapus layanan');
    }

    public function buildRawSyarat($array){
        $syaratRaw = '';
        for($i = 0; $i < sizeof($array); $i++){
            $syaratRaw.=$array[$i];
            if($i < (sizeof($array)-1)){
                $syaratRaw.=';';
            }
        }
        return $syaratRaw;
    }

    public function changeActivationStatus($id){
        $layanan = Layanan::where('id', $id)->first();
        $update = Layanan::where('id', $id)->update([
            'is_active' => $layanan->is_active == 0 ? 1  : 0
        ]);
        $message = $layanan->is_active == 0 ? "Berhasil mengaktifkan layanan" : "Berhasil menonaktifkan layanan";
        if($update){
            return redirect('admin/layanan')->with('success', $message);
        }
        return redirect('admin/layanan')->with('error', 'Gagal mengubah status aktivasi akun');
    }
}
