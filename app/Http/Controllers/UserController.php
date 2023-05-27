<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::orderBy('level', 'asc')->get();
        return view('admin.user.index', ['page' => 'users', 'user' => $user]);
    }

    public function show($id = null){
        $user = User::where('id', $id)->first();
        $redirect = $id != null ? 'admin.user.detail' : (Auth::user()->level == 1 ? 'admin.profile' : 'user.profile');
        $page = $id != null ? 'users' : 'profile';
        return view($redirect, ['user' => $user, 'page' => $page]);
    }

    public function store(Request $request){
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'size' => 'Kolom :attribute harus berjumlah :size digit',
            'nik.unique' => 'NIK sudah terdaftar di sistem',
            'email.unique' => 'Email sudah terdaftar di sistem',
        ];
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|size:16|unique:users',
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'dusun' => 'required|string',
            'rt' => 'required',
            'rw' => 'required',
        ], $messages);
        if($validator->fails()){
            return redirect('/admin/users')->with('error', $validator->messages()->first());
        }
        $create = User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->nama),
            'dusun' => $request->dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'level' => $request->level
        ]);
        return redirect('/admin/users')->with('success', 'Berhasil membuat data user');
    }

    public function update(Request $request, $id){
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'size' => 'Kolom :attribute harus berjumlah :size digit',
            'nik.unique' => 'NIK sudah terdaftar di sistem',
            'email.unique' => 'Email sudah terdaftar di sistem',
        ];
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|size:16',
            'nama' => 'required|string',
            'email' => 'required|email',
            'dusun' => 'required|string',
            'rt' => 'required',
            'rw' => 'required',
        ], $messages);
        if($validator->fails()){
            return redirect('/admin/users/'.$id)->with('error', $validator->messages()->first());
        }
        $create = User::where('id', $id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->nama),
            'dusun' => $request->dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'level' => $request->level
        ]);
        return redirect('/admin/users/'.$id)->with('success', 'Berhasil memperbarui data user');
    }

    public function delete($id){
        $delete = User::where('id', $id)->delete();
        if($delete){
            return redirect('/admin/users')->with('success', 'Berhasil menghapus data user');
        } else {
            return redirect('/admin/users')->with('success', 'Gagal menghapus data user');
        }
    }

    public function changeActivationStatus($id){
        $user = User::where('id', $id)->first();
        $update = User::where('id', $id)->update([
            'is_active' => $user->is_active == 0 ? 1  : 0
        ]);
        $message = $user->is_active == 0 ? "Berhasil mengaktifkan akun" : "Berhasil menonaktifkan akun";
        if($update){
            return redirect('admin/users')->with('success', $message);
        }
        return redirect('admin/users')->with('error', 'Gagal mengubah status aktivasi akun');
    }
}
