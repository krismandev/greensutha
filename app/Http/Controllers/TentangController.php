<?php

namespace App\Http\Controllers;
use App\SelayangPandang;
use App\Mitra;
use Illuminate\Http\Request;

class TentangController extends Controller
{
  public function getSelayangPandang()
  {
    $selayang_pandang = SelayangPandang::first();
    return view('admin.tentang.getSelayangPandang',compact(['selayang_pandang']));
  }

  public function storeSelayangPandang(Request $request){
    $selayang_pandang_lama = SelayangPandang::first();
    $request->validate([
      'selayang_pandang' => 'required'
    ]);
    if ($selayang_pandang_lama == null) {
      $selayang_pandang = SelayangPandang::insertGetId([
        'selayang_pandang' => $request->selayang_pandang,
      ]);
      return redirect()->back()->with('success','Data berhasil disimpan');
    }else {
      $selayang_pandang = [
        'selayang_pandang' => $request->selayang_pandang
      ];
      $selayang_pandang_lama->update($selayang_pandang);
    }

    return redirect()->back()->with('success','Data berhasil diupdate');
  }

  public function getMitra()
  {
    $mitras = Mitra::all();
    return view('admin.tentang.getMitra',compact(['mitras']));
  }

  public function storeMitra(Request $request){

    $this->validate($request,[
      'nama_mitra' => 'required',
      'gambar' => 'required|file|image|mimes:png,jpg,jpeg,gif',
    ]);

    $file = $request->file('gambar');
    $nama_file = time()."_".$file->getClientOriginalName();
    $tujuan_upload = 'tentang/mitra';
    $file->move($tujuan_upload,$nama_file);



    $buku = Mitra::create([
      'nama_mitra'=>$request->nama_mitra,
      'gambar' => $nama_file,
    ]);

    return redirect()->back()->with('success','Berhasil menambah foto');

  }

  //USER ------------------------------------------------------------------
  public function getSelayangPandangUser()
  {
    $selayang_pandang = SelayangPandang::first();
    return view('guest.tentang.selayangpandang',compact(['selayang_pandang']));
  }

  public function getMitraUser()
  {
    $mitras = Mitra::all();
    return view('guest.tentang.mitra',compact(['mitras']));
  }

  public function deleteMitra($id)
  {
    $mitra = Mitra::find($id);
    $mitra->delete();
    return redirect()->back()->with('success','Berhasil menghapus mitra');
  }
}
