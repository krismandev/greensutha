<?php

namespace App\Http\Controllers;
use Str;
use App\GreenCampus;
use Illuminate\Http\Request;

class GreenCampusController extends Controller
{
  public function getPenataan()
  {
    $penataans = GreenCampus::where('jenis','penataan')->get();
    return view('admin.green_campus.getPenataan',compact(['penataans']));
  }

  public function storePenataan(Request $request){

    $this->validate($request,[
      'deskripsi' => 'required',
      'gambar' => 'file|image|mimes:png,jpg,jpeg,gif',
      'file' => 'required|file|mimes:docs,pdf,docx,xls,txt',
    ]);

    if ($request->hasFile('gambar')) {
      $file_gambar = $request->file('gambar');
      $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
      $tujuan_upload = 'green_campus/penataan';
      $file_gambar->move($tujuan_upload,$nama_file_gambar);

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/penataan';
      $file->move($tujuan_upload,$nama_file);


      $link_youtube = null;
    }else {
      $nama_file_gambar = null;

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/penataan';
      $file->move($tujuan_upload,$nama_file);

      $link_awal = $request->link;
      $sebelum = 'watch?v=';
      $sesudah = ['embed/'];
      $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

    }

    $penataan = GreenCampus::create([
      'deskripsi' => $request->deskripsi,
      'file' => $nama_file,
      'link'=> $link_youtube,
      'jenis' => 'penataan',
      'gambar' => $nama_file_gambar,
    ]);

    return redirect()->back()->with('success','Berhasil menambah data');
    //dd("oke");

  }

  public function deletePenataan($id)
  {
    $penataan = GreenCampus::find($id);
    $penataan->delete();
    return redirect()->back()->with('success','Berhasil menghapus data');
  }

  public function getEnergi()
  {
    $energis = GreenCampus::where('jenis','energi')->get();
    return view('admin.green_campus.getEnergi',compact(['energis']));
  }

  public function storeEnergi(Request $request){

    $this->validate($request,[
      'deskripsi' => 'required',
      'gambar' => 'file|image|mimes:png,jpg,jpeg,gif',
      'file' => 'required|file|mimes:docs,pdf,docx,xls',
    ]);

    if ($request->hasFile('gambar')) {
      $file_gambar = $request->file('gambar');
      $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
      $tujuan_upload = 'green_campus/energi';
      $file_gambar->move($tujuan_upload,$nama_file_gambar);

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/energi';
      $file->move($tujuan_upload,$nama_file);


      $link_youtube = null;
    }else {
      $nama_file_gambar = null;

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/energi';
      $file->move($tujuan_upload,$nama_file);

      $link_awal = $request->link;
      $sebelum = 'watch?v=';
      $sesudah = ['embed/'];
      $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

    }

    $energi = GreenCampus::create([
      'deskripsi' => $request->deskripsi,
      'file' => $nama_file,
      'link'=> $link_youtube,
      'jenis' => 'energi',
      'gambar' => $nama_file_gambar,
    ]);

    return redirect()->back()->with('success','Berhasil menambah data');
    //dd("oke");

  }

  public function deleteEnergi($id)
  {
    $energi = GreenCampus::find($id);
    $energi->delete();
    return redirect()->back()->with('success','Berhasil menghapus data');
  }

  public function getLimbah()
  {
    $limbahs = GreenCampus::where('jenis','limbah')->get();
    return view('admin.green_campus.getLimbah',compact(['limbahs']));
  }

  public function storeLimbah(Request $request){

    $this->validate($request,[
      'deskripsi' => 'required',
      'gambar' => 'file|image|mimes:png,jpg,jpeg,gif',
      'file' => 'required|file|mimes:docs,pdf,docx,xls',
    ]);

    if ($request->hasFile('gambar')) {
      $file_gambar = $request->file('gambar');
      $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
      $tujuan_upload = 'green_campus/limbah';
      $file_gambar->move($tujuan_upload,$nama_file_gambar);

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/limbah';
      $file->move($tujuan_upload,$nama_file);


      $link_youtube = null;
    }else {
      $nama_file_gambar = null;

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/limbah';
      $file->move($tujuan_upload,$nama_file);

      $link_awal = $request->link;
      $sebelum = 'watch?v=';
      $sesudah = ['embed/'];
      $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

    }

    $limbah = GreenCampus::create([
      'deskripsi' => $request->deskripsi,
      'file' => $nama_file,
      'link'=> $link_youtube,
      'jenis' => 'limbah',
      'gambar' => $nama_file_gambar,
    ]);

    return redirect()->back()->with('success','Berhasil menambah data');
    //dd("oke");

  }

  public function deleteLimbah($id)
  {
    $limbah = GreenCampus::find($id);
    $limbah->delete();
    return redirect()->back()->with('success','Berhasil menghapus data');
  }

  public function getAir()
  {
    $airs = GreenCampus::where('jenis','air')->get();
    return view('admin.green_campus.getAir',compact(['airs']));
  }

  public function storeAir(Request $request){

    $this->validate($request,[
      'deskripsi' => 'required',
      'gambar' => 'file|image|mimes:png,jpg,jpeg,gif',
      'file' => 'required|file|mimes:docs,pdf,docx,xls',
    ]);

    if ($request->hasFile('gambar')) {
      $file_gambar = $request->file('gambar');
      $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
      $tujuan_upload = 'green_campus/air';
      $file_gambar->move($tujuan_upload,$nama_file_gambar);

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/air';
      $file->move($tujuan_upload,$nama_file);


      $link_youtube = null;
    }else {
      $nama_file_gambar = null;

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/air';
      $file->move($tujuan_upload,$nama_file);

      $link_awal = $request->link;
      $sebelum = 'watch?v=';
      $sesudah = ['embed/'];
      $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

    }

    $air = GreenCampus::create([
      'deskripsi' => $request->deskripsi,
      'file' => $nama_file,
      'link'=> $link_youtube,
      'jenis' => 'air',
      'gambar' => $nama_file_gambar,
    ]);

    return redirect()->back()->with('success','Berhasil menambah data');
    //dd("oke");

  }

  public function deleteAir($id)
  {
    $air = GreenCampus::find($id);
    $air->delete();
    return redirect()->back()->with('success','Berhasil menghapus data');
  }

  public function getTransportasi()
  {
    $transportasis = GreenCampus::where('jenis','transportasi')->get();
    return view('admin.green_campus.getTransportasi',compact(['transportasis']));
  }

  public function storeTransportasi(Request $request){

    $this->validate($request,[
      'deskripsi' => 'required',
      'gambar' => 'file|image|mimes:png,jpg,jpeg,gif',
      'file' => 'required|file|mimes:docs,pdf,docx,xls',
    ]);

    if ($request->hasFile('gambar')) {
      $file_gambar = $request->file('gambar');
      $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
      $tujuan_upload = 'green_campus/transportasi';
      $file_gambar->move($tujuan_upload,$nama_file_gambar);

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/transportasi';
      $file->move($tujuan_upload,$nama_file);


      $link_youtube = null;
    }else {
      $nama_file_gambar = null;

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/transportasi';
      $file->move($tujuan_upload,$nama_file);

      $link_awal = $request->link;
      $sebelum = 'watch?v=';
      $sesudah = ['embed/'];
      $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

    }

    $transportasi = GreenCampus::create([
      'deskripsi' => $request->deskripsi,
      'file' => $nama_file,
      'link'=> $link_youtube,
      'jenis' => 'transportasi',
      'gambar' => $nama_file_gambar,
    ]);

    return redirect()->back()->with('success','Berhasil menambah data');
    //dd("oke");

  }

  public function deleteTransportasi($id)
  {
    $transportasi = GreenCampus::find($id);
    $transportasi->delete();
    return redirect()->back()->with('success','Berhasil menghapus data');
  }

  public function getPendidikan()
  {
    $pendidikans = GreenCampus::where('jenis','pendidikan')->get();
    return view('admin.green_campus.getPendidikan',compact(['pendidikans']));
  }

  public function storePendidikan(Request $request){

    $this->validate($request,[
      'deskripsi' => 'required',
      'gambar' => 'file|image|mimes:png,jpg,jpeg,gif',
      'file' => 'required|file|mimes:docs,pdf,docx,xls',
    ]);

    if ($request->hasFile('gambar')) {
      $file_gambar = $request->file('gambar');
      $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
      $tujuan_upload = 'green_campus/pendidikan';
      $file_gambar->move($tujuan_upload,$nama_file_gambar);

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/pendidikan';
      $file->move($tujuan_upload,$nama_file);


      $link_youtube = null;
    }else {
      $nama_file_gambar = null;

      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'green_campus/pendidikan';
      $file->move($tujuan_upload,$nama_file);

      $link_awal = $request->link;
      $sebelum = 'watch?v=';
      $sesudah = ['embed/'];
      $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

    }

    $pendidikan = GreenCampus::create([
      'deskripsi' => $request->deskripsi,
      'file' => $nama_file,
      'link'=> $link_youtube,
      'jenis' => 'pendidikan',
      'gambar' => $nama_file_gambar,
    ]);

    return redirect()->back()->with('success','Berhasil menambah data');
    //dd("oke");

  }

  public function deletePendidikan($id)
  {
    $pendidikan = GreenCampus::find($id);
    $pendidikan->delete();
    return redirect()->back()->with('success','Berhasil menghapus data');
  }


  //USER-----------------------------------------------------------------------
  public function getPenataanUser()
  {
    $penataans = GreenCampus::where('jenis','penataan')->get();
    return view('guest.green_campus.penataan',compact(['penataans']));
  }

  public function getEnergiUser()
  {
    $energis = GreenCampus::where('jenis','energi')->get();
    return view('guest.green_campus.energi',compact(['energis']));
  }

  public function getLimbahUser()
  {
    $limbahs = GreenCampus::where('jenis','limbah')->get();
    return view('guest.green_campus.limbah',compact(['limbahs']));
  }

  public function getAirUser()
  {
    $airs = GreenCampus::where('jenis','air')->get();
    return view('guest.green_campus.air',compact(['airs']));
  }

  public function getTransportasiUser()
  {
    $transportasis = GreenCampus::where('jenis','transportasi')->get();
    $judul = 'Hallo';
    return view('guest.green_campus.transportasi',compact(['transportasis','judul']));
  }

  public function getPendidikanUser()
  {
    $pendidikans = GreenCampus::where('jenis','pendidikan')->get();
    return view('guest.green_campus.pendidikan',compact(['pendidikans']));
  }

}
