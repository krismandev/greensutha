<?php

namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function getEvent(){
      $events = Event::all();
      return view('admin.getEvent',compact(['events']));
    }

    public function storeEvent(Request $request){
      $request->validate([
        'nama_event' => 'required',
        'gambar' => 'required'
      ]);

      $file_gambar = $request->file('gambar');
      $nama_file = time()."_".$file_gambar->getClientOriginalName();
      $tujuan_upload = 'events';
      $file_gambar->move($tujuan_upload,$nama_file);

      $event = Event::create([
        'nama_event' => $request->nama_event,
        'gambar' => $nama_file
      ]);

      return redirect()->back()->with('success','Berhasil membuat event');
    }

    public function deleteEvent($id)
    {
      $event = Event::find($id);
      $event->delete();
      return redirect()->back()->with('success', 'Berhasil menghapus event');
    }

    public function getEventUser()
    {
      $events = Event::all();
      return view('guest.event',compact(['events']));
    }
}
