<?php

namespace App\Http\Controllers;
use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
  public function getBanner()
  {
    $banners = Banner::all();
    return view('admin.getBanner',compact(['banners']));
  }

  public function storeBanner(Request $request){

    $this->validate($request,[
      'gambar' => 'required|file|image|mimes:png,jpg,jpeg,gif',
    ]);

    $file = $request->file('gambar');
    $nama_file = time()."_".$file->getClientOriginalName();
    $tujuan_upload = 'banner';
    $file->move($tujuan_upload,$nama_file);



    $banner = Banner::create([
      'gambar' => $nama_file,
    ]);

    return redirect()->back()->with('success','Berhasil menambah banner');
    //dd("oke");

  }

  public function deleteBanner($id)
  {
    $banner = Banner::find($id);
    $banner->delete();
    return redirect()->back()->with('success','Berhasil menghapus banner');
  }
}
