<?php

namespace App\Http\Controllers;
use App\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
  public function getKontak(){
      $kontak = Kontak::first();
      return view('admin.kontak.getKontak',compact(['kontak']));
    }

    public function storeKontak(Request $request)
    {
      $request->validate([
        'alamat' => 'required',
        'hp' => 'required',
        'email' => 'required',
        'nama' => 'required'
      ]);

      if (Kontak::first() == null) {
        Kontak::create([
          'hp' => $request->hp,
          'alamat' => $request->alamat,
          'email' => $request->email,
          'nama' => $request->nama

        ]);

        return redirect()->back()->with('success','Berhasil membuat kontak');
      }else {
        $kontak_lama = Kontak::first();
        $kontak_lama->update([
          'hp' => $request->hp,
          'alamat' => $request->alamat,
          'email' => $request->email,
          'nama' => $request->nama
        ]);

        return redirect()->back()->with('success','Berhasil mengupdate kontak');

      }
    }
    //USER--------------------

    public function kontakUser(){
      $kontak = Kontak::first();
      return view('guest2.kontak',compact(['kontak']));
    }
}
