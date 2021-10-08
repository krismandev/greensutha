<?php

namespace App\Http\Controllers;
use App\Foto;
use App\Poster;
use App\Kategori;
use App\Banner;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
  public function getFoto()
  {
    $fotos = Foto::all();
    return view('admin.galeri.getFoto',compact(['fotos']));
  }

  public function storeFoto(Request $request){

    $this->validate($request,[
      'gambar' => 'required|file|image|mimes:png,jpg,jpeg,gif',
    ]);

    $file = $request->file('gambar');
    $nama_file = time()."_".$file->getClientOriginalName();
    $tujuan_upload = 'galeri/foto';
    $file->move($tujuan_upload,$nama_file);



    $buku = Foto::create([
      'gambar' => $nama_file,
    ]);

    return redirect()->back()->with('success','Berhasil menambah foto');
    //dd("oke");

  }

  public function deleteFoto($id)
  {
    $foto = Foto::find($id);
    $foto->delete();
    return redirect()->back()->with('success','Berhasil menghapus foto');
  }

  public function getPoster()
  {
    $posters = Poster::all();
    return view('admin.galeri.getPoster',compact(['posters']));
  }

  public function storePoster(Request $request){

    $this->validate($request,[
      'gambar' => 'required|file|image|mimes:png,jpg,jpeg,gif',
    ]);

    $file = $request->file('gambar');
    $nama_file = time()."_".$file->getClientOriginalName();
    $tujuan_upload = 'galeri/poster';
    $file->move($tujuan_upload,$nama_file);



    $buku = Poster::create([
      'gambar' => $nama_file,
    ]);

    return redirect()->back()->with('success','Berhasil menambah foto');
    //dd("oke");

  }

  public function deletePoster($id)
  {
    $poster = Poster::find($id);
    $poster->delete();
    return redirect()->back()->with('success','Berhasil menghapus poster');
  }


  //USER---------------------
  public function getFotoUser()
  {
    $fotos = Foto::paginate(30);
    return view('guest2.galeri.foto',compact(['fotos']));
  }

  public function getPosterUser()
  {
    $posters = Poster::paginate(30);
    return view('guest2.galeri.poster',compact(['posters']));
  }
}
