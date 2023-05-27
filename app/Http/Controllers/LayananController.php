<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Layanan;
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
        $data = Layanan::all();
        return view('layanan.index', ['data' => $data]);
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
        $syaratRaw = $this->buildRawSyarat($request->syarat);
        
        $create = Layanan::create([
            'nama_layanan' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'syarat' => $syaratRaw
        ]);
        dd($create);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Layanan::find($id);
        $syaratArray = explode(";", $data->syaratArray);
        return view('layanan.show', ['data' => $data, 'syarat' => $syaratArray]);
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
        $syaratRaw = $this->buildRawSyarat($request->syarat);
        
        $create = Layanan::where('id', $id)->update([
            'nama_layanan' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'syarat' => $syaratRaw
        ]);
        dd($create);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Layanan::where('id', $id)->delete();
        if($delete){
            return redirect('/admin/layanan')->with('success'. 'berhasil memnghapus layanan');
        }
        return redirect('/admin/layanan')->with('error'. 'gagal menghapus layanan');
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
}
