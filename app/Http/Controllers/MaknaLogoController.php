<?php

namespace App\Http\Controllers;
use App\MaknaLogo;
use Illuminate\Http\Request;

class MaknaLogoController extends Controller
{
	public function getMaknaLogo()
    {
      $makna_logo = MaknaLogo::first();
      return view('admin.getMaknaLogo',compact(['makna_logo']));
    }

    public function storeMaknaLogo(Request $request)
    {
      $makna_logo = MaknaLogo::first();
      $request->validate([
        'gambar_makna' => 'file|image|mimes:png,jpg,jpeg,gif|max:10000',
        'deskripsi' => 'required'
      ]);
			if ($request->hasFile('gambar_makna')) {
				$file = $request->file('gambar_makna');
	      $nama_file = time()."_".$file->getClientOriginalName();
	      $tujuan_upload = 'gambar';
	      $file->move($tujuan_upload,$nama_file);
			}else {
				$nama_file = $makna_logo->gambar_makna;
			}


      if ($makna_logo == null) {
        $makna_baru = MaknaLogo::insertGetId([
          'gambar_makna' => $nama_file,
          'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->back()->with('success','Data  berhasil diupdate');
      }else {
        $makna_baru = [
          'gambar_makna' => $nama_file,
          'deskripsi' => $request->deskripsi
        ];
        $makna_logo->update($makna_baru);
      }
      return redirect()->back()->with('success','Data  berhasil disimpan');
    }

    public function getMaknaLogoUser()
    {
    	$makna_logo = MaknaLogo::first();
    	return view('guest.tentang.maknalogo',compact('makna_logo'));
    }
}
