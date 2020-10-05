<?php

namespace App\Http\Controllers;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
  public function getKategori()
  {
    $kategoris = Kategori::all();
    return view('admin.getKategori',compact(['kategoris']));
  }

  public function storeKategori(Request $request)
  {
    $request->validate([
      'nama_kategori'=>'required',
    ]);

    Kategori::create([
      'nama_kategori' => $request->nama_kategori
    ]);

    return redirect()->back()->with('success','Berhasil menambahkan kategori baru');
  }
}
