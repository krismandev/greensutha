<?php

namespace App\Http\Controllers;
use App\Banner;
use Str;
use App\VideoBanner;
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


  public function getVideoBanner()
    {
      $video_banner = VideoBanner::first();
      return view('admin.getVideoBanner',compact(['video_banner']));
    }

    public function storeVideoBanner(Request $request)
    {
      $video_banner = VideoBanner::first();
      $request->validate([
        'link_video' => 'required'
      ]);

      $link_awal = $request->link_video;
      $sebelum = 'watch?v=';
      $sesudah = ['embed/'];
      $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

      if ($video_banner == null) {


        $link_video = VideoBanner::insertGetId([
          'link_video' => $link_youtube
        ]);
        return redirect()->back()->with('success','Data  berhasil diupdate');
      }else {
        $link_video = [
          'link_video' => $link_youtube
        ];
        $video_banner->update($link_video);
      }
      return redirect()->back()->with('success','Data  berhasil disimpan');
    }

    public function getMaknaLogoUser()
    {
    	$video_banner = MaknaLogo::first();
    	return view('guest.tentang.maknalogo',compact('video_banner'));
    }
}
