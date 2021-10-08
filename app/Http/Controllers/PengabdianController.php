<?php

namespace App\Http\Controllers;

use App\Pengabdian;
use Illuminate\Http\Request;

class PengabdianController extends Controller
{
    public function getPengabdian()
    {
        $pengabdians = Pengabdian::orderBy('created_at','desc')->get();
        return view('admin.penelitian_pengabdian.pengabdian',compact(['pengabdians']));
    }

    public function postPengabdian(Request $request)
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

        $pengabdian = Pengabdian::create([
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_gambar
        ]);
        return back()->with('success','Berhasil menambah data');
    }

    public function deletePengabdian($id)
    {
        $pengabdian = Pengabdian::find($id);
        $pengabdian->delete();
        return back();
    }

    public function getPengabdianUser()
    {
        $pengabdians = Pengabdian::orderBy('created_at','desc')->paginate(15);
        return view('guest2.penelitian_pengabdian.pengabdian',compact(['pengabdians']));
    }

}
