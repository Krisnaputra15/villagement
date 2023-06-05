<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Faq::all();
        if(Auth::check()){
            if (Auth::user()->level == 1) {
                return view('admin.faq.index', ['data' => $faq, 'page' => 'faq']);
            }
        }
        return view('faq.index', ['data' => $faq, 'page' => 'faq']);
    }

    public function show($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.detail', ['data' => $faq, 'page' => 'faq']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect('admin/faqs')->with('error', $validator->errors()->messages());
        }

        $create = Faq::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban
        ]);

        return redirect('admin/faqs')->with('success', 'Berhasil menambahkan faq');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect('admin/faqs/' . $id)->with('error', $validator->errors()->messages());
        }

        $update = Faq::where('id', $id)->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban
        ]);

        if ($update) {
            return redirect('admin/faqs/' . $id)->with('success', 'Berhasil mengupdate faq');
        }
        return redirect('admin/faqs/' . $id)->with('error', 'Gagal mengupdate faq');
    }

    public function destroy($id)
    {
        $destroy = Faq::where('id', $id)->delete();
        if ($destroy) {
            return redirect('admin/faqs')->with('success', 'Berhasil menghapus faq');
        }
        return redirect('admin/faqs')->with('error', 'Gagal menghapus faq');
    }

    public function changeActivationStatus($id)
    {
        $faq = Faq::find($id);
        $update = Faq::where('id', $id)->update([
            'is_active' => !$faq->is_active
        ]);
        $message = $faq->is_active == 0 ? 'mengaktifkan pertanyaan' : 'menonaktifkan pertanyaan';
        if($faq){
            return redirect('admin/faqs')->with('success', 'Berhasil '.$message);
        }
        return redirect('admin/faqs')->with('error', 'Gagal '.$message);
    }
}
