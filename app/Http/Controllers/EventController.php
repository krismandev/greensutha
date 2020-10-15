<?php

namespace App\Http\Controllers;
use App\Event;
use Str;
use Illuminate\Http\Request;

class EventController extends Controller
{
  // public function getEvent(){
  //     $events = Event::all();
  //     return view('admin.getEvent',compact(['events']));
  //   }
  //
    // public function storeEvent(Request $request){
    //   $request->validate([
    //     'nama_event' => 'required',
    //     'gambar' => 'required'
    //   ]);
    //
    //   $file_gambar = $request->file('gambar');
    //   $nama_file = time()."_".$file_gambar->getClientOriginalName();
    //   $tujuan_upload = 'events';
    //   $file_gambar->move($tujuan_upload,$nama_file);
    //
    //   $event = Event::create([
    //     'nama_event' => $request->nama_event,
    //     'gambar' => $nama_file
    //   ]);
    //
    //   return redirect()->back()->with('success','Berhasil membuat event');
    // }
    //
    // public function deleteEvent($id)
    // {
    //   $event = Event::find($id);
    //   $event->delete();
    //   return redirect()->back()->with('success', 'Berhasil menghapus event');
    // }

    public function getEnvironment()
    {
      $environments = Event::where('jenis','environment')->get();
      return view('admin.event.getEnvironment',compact(['environments']));
    }

    public function storeEnvironment(Request $request){
      $request->validate([
        'nama_event' => 'required',
        'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
      ]);

      if ($request->hasFile('gambar')) {
        $file_gambar = $request->file('gambar');
        $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
        $tujuan_upload = 'events';
        $file_gambar->move($tujuan_upload,$nama_file_gambar);

        $link_youtube = null;
      }else {
        $nama_file_gambar = null;



        $link_awal = $request->link;
        $sebelum = 'watch?v=';
        $sesudah = ['embed/'];
        $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

      }

      $environment = Event::create([
        'nama_event' => $request->nama_event,
        'gambar' => $nama_file_gambar,
        'link'=> $link_youtube,
        'jenis' => 'environment'
      ]);

      return redirect()->back()->with('success','Berhasil membuat event');
    }

    public function deleteEnvironment($id)
    {
      $environment = Event::find($id);
      $environment->delete();
      return redirect()->back()->with('success', 'Berhasil menghapus event');
    }

    public function getStudent()
    {
      $students = Event::where('jenis','student')->get();
      return view('admin.event.getStudent',compact(['students']));
    }

    public function storeStudent(Request $request){
      $request->validate([
        'nama_event' => 'required',
        'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
      ]);

      if ($request->hasFile('gambar')) {
        $file_gambar = $request->file('gambar');
        $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
        $tujuan_upload = 'events';
        $file_gambar->move($tujuan_upload,$nama_file_gambar);

        $link_youtube = null;
      }else {
        $nama_file_gambar = null;

        $link_awal = $request->link;
        $sebelum = 'watch?v=';
        $sesudah = ['embed/'];
        $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

      }

      $student = Event::create([
        'nama_event' => $request->nama_event,
        'gambar' => $nama_file_gambar,
        'link' => $link_youtube,
        'jenis' => 'student'
      ]);

      return redirect()->back()->with('success','Berhasil membuat event');
    }

    public function deleteStudent($id)
    {
      $student = Event::find($id);
      $student->delete();
      return redirect()->back()->with('success', 'Berhasil menghapus event');
    }


    public function getEnvironmentUser()
    {
      $environments = Event::where('jenis','environment')->paginate(9);
      return view('guest.event.environment',compact(['environments']));
    }


    public function getStudentUser()
    {
      $students = Event::where('jenis','student')->paginate(9);
      return view('guest.event.student',compact(['students']));
    }

    // public function getEventUser()
    // {
    //   $events = Event::all();
    //   return view('guest.event',compact(['events']));
    // }
}
