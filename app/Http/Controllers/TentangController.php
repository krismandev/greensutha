<?php

namespace App\Http\Controllers;

use App\MaknaLogo;
use App\SelayangPandang;
use App\Mitra;
use App\ProfilKampus;
use App\TentangAdmisiPromosi;
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

  public function getProfilKampus()
  {
      $profil = ProfilKampus::first();
      return view('admin.tentang.getProfilKampus',compact(['profil']));
  }

  public function storeProfilKampus(Request $request)
  {
      $request->validate([
          'konten'=> 'required'
      ]);

      $old_profil = ProfilKampus::first();
        if ($old_profil == null) {
          $profil = ProfilKampus::create([
            'konten' => $request->konten,
          ]);
          return redirect()->back()->with('success','Data berhasil disimpan');
        }else {
          $profil = [
            'konten' => $request->konten
          ];
          $old_profil->update($profil);
        }

        return redirect()->back()->with('success','Data berhasil diupdate');
  }

  public function getAdmisiPromosi()
  {
      $admisipromosi = TentangAdmisiPromosi::first();
      return view('admin.tentang.getAdmisiPromosi',compact(['admisipromosi']));
  }

  public function storeAdmisiPromosi(Request $request)
    {
      $admisi_promosi = TentangAdmisiPromosi::first();
      $request->validate([
        'gambar' => 'file|image|mimes:png,jpg,jpeg,gif|max:10000',
        'deskripsi' => 'required'
      ]);
			if ($request->hasFile('gambar')) {
				$file = $request->file('gambar');
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'gambar';
                $file->move($tujuan_upload,$nama_file);
			}else {
				$nama_file = $admisi_promosi->gambar;
			}


      if ($admisi_promosi == null) {
        $data_baru = TentangAdmisiPromosi::insertGetId([
          'gambar' => $nama_file,
          'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->back()->with('success','Data  berhasil diupdate');
      }else {
        $data_baru = [
          'gambar' => $nama_file,
          'deskripsi' => $request->deskripsi
        ];
        $admisi_promosi->update($data_baru);
      }
      return redirect()->back()->with('success','Data  berhasil disimpan');
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

  public function getProfilKampusUser()
  {
      $profil = ProfilKampus::first();
      return view('guest2.tentang.profilkampus',compact(['profil']));
  }

  public function getTentangGreensuthaUser()
  {
      $selayang_pandang = SelayangPandang::first();
      $makna_logo = MaknaLogo::first();
      return view('guest2.tentang.greensutha',compact(['selayang_pandang','makna_logo']));
  }

  public function getAdmisiPromosiUser()
  {
      $admisipromosi = TentangAdmisiPromosi::first();
      return view('guest2.tentang.admisipromosi',compact(['admisipromosi']));
  }


}
