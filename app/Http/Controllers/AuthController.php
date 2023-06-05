<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function indexAdmin()
    {
        return view('admin.login');
    }

    public function adminAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'nama' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/login')->with('error', $validator->errors());
        }
        $create = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'level' => 1,
        ]);
        return redirect('/admin/login');
    }

    public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $validated = $validator->validate();
        if ($validator->fails()) {
            return redirect('/admin/login')->with('error', $validator->errors());
        }
        if (Auth::attempt($validated)) {
            $user = User::where('email', $validated['email'])->first();
            Auth::login($user);
            return redirect('/admin/home');
        } else {
            return redirect('/admin/login')->with('error', 'Email atau password salah');
        }
    }

    public function afterRegister()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $user = User::where('id', Auth::user()->id)->first();
        return view('afterRegister', ['data' => $user, 'page' => 'home']);
    }

    public function updateUserInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'dusun' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);
        $fixId = strlen($request->id) != 0 ? $request->id : Auth::user()->id;
        $update = User::where('id', $fixId)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'dusun' => $request->dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'agama' => $request->agama,
            'status_kawin' => $request->status_kawin,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan' => $request->pekerjaan,
        ]);
        $url = Auth::user()->level == 1 ? 'admin/home' : '/';
        if ($update) {
            return redirect($url)->with('success', 'sukses memperbarui data diri');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
