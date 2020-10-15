<?php

namespace App\Http\Controllers;
use App\Tim;
use Str;
use App\User;
use Illuminate\Http\Request;

class TimController extends Controller
{
  public function getTim()
  {
  	$tims = Tim::all();
  	return view('admin.tentang.getTim',compact(['tims']));
  }

  public function storeTim(Request $request)
  {
  	$request->validate([
  		'name' => 'required',
  		'email' => 'required',
  		'posisi' => 'required',

  	]);

  	$user = new User;
  	$user->name = $request->name;
  	$user->email = $request->email;
  	$user->role = 'admin';
  	$user->password = bcrypt('rahasiagreensutha');
  	$user->save();

  	$tim = Tim::create([
  		'user_id' => $user->id,
  		'posisi' => $request->posisi,
  	]);

  	return redirect()->back()->with('success','Berhasil menambah tim baru. beritahu anggota baru untuk mengganti passwordnya');

  }

  public function updateTim(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required',
      'posisi' => 'required'
    ]);

    $tim = Tim::where('id',$request->tim_id)->first();
    User::where('id',$tim->user->id)->update([
      'name' => $request->name,
      'email' => $request->email
    ]);
    Tim::where('id',$tim->id)->update([
      'posisi'=>$request->posisi
    ]);
    return redirect()->back()->with('success','Berhasil mengupdate data tim');
  }

  public function deleteTim($id)
  {
    $tim = Tim::find($id);
    $user = User::where('id',$tim->user_id)->update([
      'isdelete'=>true,
      'email'=> Str::random(5).'@deletedemail.com'
    ]);
    $tim->delete();
    dd("ok");
    return redirect()->back()->with('success','Berhasil menghapus data tim');
  }

  public function profile(){
      $user = User::find(auth()->user()->id);
      $tim = Tim::where('user_id',auth()->user()->id)->first();
      return view('admin.profile',compact(['user','tim']));
    }

    public function updateProfil(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'posisi' => 'required'
        //'foto' => 'required|file|image|mimes:png,jpg,jpeg,gif|max:2048',
      ]);

      if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        //dd($nama_foto);
        $tujuan_upload = 'tentang/tim';
        $foto->move($tujuan_upload,$nama_foto);

        User::whereId(auth()->user()->id)->update([
          'name' => $request->name,
          'email' => $request->email
        ]);
        Tim::where('user_id',auth()->user()->id)->update([
          'posisi' => $request->posisi,
          'deskripsi' => $request->deskripsi,
          'yt' => $request->yt,
          'fb' => $request->fb,
          'twitter' => $request->twitter,
          'ig'=>$request->ig,
          'li'=>$request->li,
          'foto' => $nama_foto,
        ]);
      }else {
        User::whereId(auth()->user()->id)->update([
          'name' => $request->name,
          'email' => $request->email
        ]);
        Tim::where('user_id',auth()->user()->id)->update([
          'posisi' => $request->posisi,
          'deskripsi' => $request->deskripsi,
          'yt' => $request->yt,
          'fb' => $request->fb,
          'twitter'=>$request->twitter,
          'ig'=>$request->ig,
          'li'=>$request->li,
        ]);
      }
      return redirect()->back()->with('success','Data berhasil diupdate');
    }

    public function ubahPassword(Request $request)
    {
      $user = User::find(auth()->user()->id);
      $user->update([
        'password' => bcrypt($request->password)
      ]);

      return redirect()->back()->with('success', 'Berhasil mengubah password');
    }

    public function getTimUser()
    {
      $tims = Tim::all();
      return view('guest.tentang.tim',compact(['tims']));
    }

}
