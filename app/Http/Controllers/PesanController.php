<?php

namespace App\Http\Controllers;
use App\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
  public function getPesan()
    {
      $pesans = Pesan::orderBy('created_at','desc')->get();
      return view('admin.pesan.getPesan',compact(['pesans']));
    }

    //untuk USER
    public function storePesan(Request $request){
      $request->validate([
        'hp' => 'required',
        'nama' => 'required',
        'email' => 'required',
        'pesan'=> 'required'
      ]);

      Pesan::create([
        'hp' => $request->hp,
        'nama' => $request->nama,
        'email' => $request->email,
        'pesan' => $request->pesan,
      ]);

      return redirect()->back()->with('success','Berhasil mengirim pesan');

    }

    public function showPesan($id){
      $pesan = Pesan::find($id);
      return view('admin.pesan.showPesan',compact(['pesan']));
    }

    public function deletePesan($id)
    {
      $pesan = Pesan::find($id);
      $pesan->delete();
      return redirect()->route('getPesan')->with('success','Berhasil menghapus pesan');
    }
}
