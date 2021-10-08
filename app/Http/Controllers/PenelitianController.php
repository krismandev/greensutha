<?php

namespace App\Http\Controllers;

use App\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function getPenelitian()
    {
        $penelitians = Penelitian::orderBy('created_at','desc')->get();
        return view('admin.penelitian_pengabdian.penelitian',compact(['penelitians']));
    }

    public function postPenelitian(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->has('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'gambar';
            $gambar->move($tujuan_upload,$nama_gambar);
        }

        $penelitian = Penelitian::create([
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_gambar
        ]);
        return back()->with('success','Berhasil menambah data');
    }

    public function deletePenelitian($id)
    {
        $penelitian = Penelitian::find($id);
        $penelitian->delete();
        return back();
    }

    public function getPenelitianUser()
    {
        $penelitians = Penelitian::orderBy('created_at','desc')->paginate(15);
        return view('guest2.penelitian_pengabdian.penelitian',compact(['penelitians']));
    }
}
