<?php

namespace App\Http\Controllers;
use App\Event;
use Str;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function getEnvironment()
    {
      $environments = Event::where('jenis','environment')->paginate(8);
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

    public function updateEnvironment(Request $request)
    {
      // dd($request->environment_id);
      $request->validate([
        'nama_event' => 'required',
        'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
      ]);
      $environment = Event::find($request->environment_id);
      // dd($environment);
      if ($request->hasFile('gambar')) {
        $file_gambar = $request->file('gambar');
        $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
        $tujuan_upload = 'events';
        $file_gambar->move($tujuan_upload,$nama_file_gambar);

        $link_youtube = null;
      }else {
        $nama_file_gambar = $environment->gambar;



        $link_awal = $request->link;
        $sebelum = 'watch?v=';
        $sesudah = ['embed/'];
        $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

      }

      Event::where('id',$request->environment_id)->update([
        'nama_event' => $request->nama_event,
        'gambar' => $nama_file_gambar,
        'link'=> $link_youtube,
      ]);

      return redirect()->back()->with('success','Berhasil mengedit event');
    }

    public function getStudent()
    {
      $students = Event::where('jenis','student')->paginate(8);
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

    public function updateStudent(Request $request)
    {
      // dd($request->environment_id);
      $request->validate([
        'nama_event' => 'required',
        'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
      ]);
      $student = Event::find($request->student_id);
      // dd($student);
      if ($request->hasFile('gambar')) {
        $file_gambar = $request->file('gambar');
        $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
        $tujuan_upload = 'events';
        $file_gambar->move($tujuan_upload,$nama_file_gambar);

        $link_youtube = null;
      }else {
        $nama_file_gambar = $student->gambar;



        $link_awal = $request->link;
        $sebelum = 'watch?v=';
        $sesudah = ['embed/'];
        $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

      }

      Event::where('id',$request->student_id)->update([
        'nama_event' => $request->nama_event,
        'gambar' => $nama_file_gambar,
        'link'=> $link_youtube,
      ]);

      return redirect()->back()->with('success','Berhasil mengedit event');
    }

    public function deleteStudent($id)
    {
      $student = Event::find($id);
      $student->delete();
      return redirect()->back()->with('success', 'Berhasil menghapus event');
    }

    public function getWebinar()
    {
        $webinars = Event::where('jenis','webinar')->paginate(8);
        return view('admin.event.getWebinar',compact(['webinars']));
    }

    public function storeWebinar(Request $request){
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

        $webinar = Event::create([
          'nama_event' => $request->nama_event,
          'gambar' => $nama_file_gambar,
          'link' => $link_youtube,
          'jenis' => 'webinar'
        ]);

        return redirect()->back()->with('success','Berhasil menambahkan event');
      }

      public function updateWebinar(Request $request)
      {
        // dd($request->environment_id);
        $request->validate([
          'nama_event' => 'required',
          'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
        ]);
        $webinar = Event::find($request->webinar_id);
        // dd($webinar);
        if ($request->hasFile('gambar')) {
          $file_gambar = $request->file('gambar');
          $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
          $tujuan_upload = 'events';
          $file_gambar->move($tujuan_upload,$nama_file_gambar);

          $link_youtube = null;
        }else {
          $nama_file_gambar = $webinar->gambar;



          $link_awal = $request->link;
          $sebelum = 'watch?v=';
          $sesudah = ['embed/'];
          $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

        }

        Event::where('id',$request->webinar_id)->update([
          'nama_event' => $request->nama_event,
          'gambar' => $nama_file_gambar,
          'link'=> $link_youtube,
        ]);

        return redirect()->back()->with('success','Berhasil mengedit event');
      }

      public function deleteWebinar($id)
      {
        $webinar = Event::find($id);
        $webinar->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus event');
      }

    public function getSurvey()
    {
        $surveys = Event::where('jenis','survey')->paginate(8);
        return view('admin.event.getSurvey',compact(['surveys']));
    }

    public function storeSurvey(Request $request){
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

        $survey = Event::create([
          'nama_event' => $request->nama_event,
          'gambar' => $nama_file_gambar,
          'link' => $link_youtube,
          'jenis' => 'survey'
        ]);

        return redirect()->back()->with('success','Berhasil menambahkan event');
      }

      public function updateSurvey(Request $request)
      {
        // dd($request->environment_id);
        $request->validate([
          'nama_event' => 'required',
          'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
        ]);
        $survey = Event::find($request->survey_id);
        // dd($survey);
        if ($request->hasFile('gambar')) {
          $file_gambar = $request->file('gambar');
          $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
          $tujuan_upload = 'events';
          $file_gambar->move($tujuan_upload,$nama_file_gambar);

          $link_youtube = null;
        }else {
          $nama_file_gambar = $survey->gambar;



          $link_awal = $request->link;
          $sebelum = 'watch?v=';
          $sesudah = ['embed/'];
          $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

        }

        Event::where('id',$request->survey_id)->update([
          'nama_event' => $request->nama_event,
          'gambar' => $nama_file_gambar,
          'link'=> $link_youtube,
        ]);

        return redirect()->back()->with('success','Berhasil mengedit event');
      }

      public function deleteSurvey($id)
      {
        $survey = Event::find($id);
        $survey->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus event');
      }

      public function getLokakarya()
      {
          $lokakaryas = Event::where('jenis','lokakarya')->paginate(8);
          return view('admin.event.getLokakarya',compact(['lokakaryas']));
      }

      public function storeLokakarya(Request $request){
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

          $lokakarya = Event::create([
            'nama_event' => $request->nama_event,
            'gambar' => $nama_file_gambar,
            'link' => $link_youtube,
            'jenis' => 'lokakarya'
          ]);

          return redirect()->back()->with('success','Berhasil menambahkan event');
        }

        public function updateLokakarya(Request $request)
        {
          // dd($request->environment_id);
          $request->validate([
            'nama_event' => 'required',
            'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
          ]);
          $lokakarya = Event::find($request->lokakarya_id);
          // dd($lokakarya);
          if ($request->hasFile('gambar')) {
            $file_gambar = $request->file('gambar');
            $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
            $tujuan_upload = 'events';
            $file_gambar->move($tujuan_upload,$nama_file_gambar);

            $link_youtube = null;
          }else {
            $nama_file_gambar = $lokakarya->gambar;



            $link_awal = $request->link;
            $sebelum = 'watch?v=';
            $sesudah = ['embed/'];
            $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

          }

          Event::where('id',$request->lokakarya_id)->update([
            'nama_event' => $request->nama_event,
            'gambar' => $nama_file_gambar,
            'link'=> $link_youtube,
          ]);

          return redirect()->back()->with('success','Berhasil mengedit event');
        }

        public function deleteLokakarya($id)
        {
          $lokakarya = Event::find($id);
          $lokakarya->delete();
          return redirect()->back()->with('success', 'Berhasil menghapus event');
        }


    public function getSemcon()
    {
        $semcons = Event::where('jenis','semcon')->paginate(8);
        return view('admin.event.getSemcon',compact(['semcons']));
    }

      public function storeSemcon(Request $request){
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

          $semcon = Event::create([
            'nama_event' => $request->nama_event,
            'gambar' => $nama_file_gambar,
            'link' => $link_youtube,
            'jenis' => 'semcon'
          ]);

          return redirect()->back()->with('success','Berhasil menambahkan event');
        }

        public function updateSemcon(Request $request)
        {
          // dd($request->environment_id);
          $request->validate([
            'nama_event' => 'required',
            'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
          ]);
          $semcon = Event::find($request->semcon_id);
          // dd($semcon);
          if ($request->hasFile('gambar')) {
            $file_gambar = $request->file('gambar');
            $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
            $tujuan_upload = 'events';
            $file_gambar->move($tujuan_upload,$nama_file_gambar);

            $link_youtube = null;
          }else {
            $nama_file_gambar = $semcon->gambar;



            $link_awal = $request->link;
            $sebelum = 'watch?v=';
            $sesudah = ['embed/'];
            $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

          }

          Event::where('id',$request->semcon_id)->update([
            'nama_event' => $request->nama_event,
            'gambar' => $nama_file_gambar,
            'link'=> $link_youtube,
          ]);

          return redirect()->back()->with('success','Berhasil mengedit event');
        }

        public function deleteSemcon($id)
        {
          $semcon = Event::find($id);
          $semcon->delete();
          return redirect()->back()->with('success', 'Berhasil menghapus event');
        }

        public function getaward()
    {
        $awards = Event::where('jenis','award')->paginate(8);
        return view('admin.event.getAward',compact(['awards']));
    }

      public function storeAward(Request $request){
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

          $award = Event::create([
            'nama_event' => $request->nama_event,
            'gambar' => $nama_file_gambar,
            'link' => $link_youtube,
            'jenis' => 'award'
          ]);

          return redirect()->back()->with('success','Berhasil menambahkan event');
        }

        public function updateAward(Request $request)
        {
          // dd($request->environment_id);
          $request->validate([
            'nama_event' => 'required',
            'gambar' => 'file|image|mimes:png,jpg,jpeg,gif'
          ]);
          $award = Event::find($request->award_id);
          // dd($award);
          if ($request->hasFile('gambar')) {
            $file_gambar = $request->file('gambar');
            $nama_file_gambar = time()."_".$file_gambar->getClientOriginalName();
            $tujuan_upload = 'events';
            $file_gambar->move($tujuan_upload,$nama_file_gambar);

            $link_youtube = null;
          }else {
            $nama_file_gambar = $award->gambar;



            $link_awal = $request->link;
            $sebelum = 'watch?v=';
            $sesudah = ['embed/'];
            $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);

          }

          Event::where('id',$request->award_id)->update([
            'nama_event' => $request->nama_event,
            'gambar' => $nama_file_gambar,
            'link'=> $link_youtube,
          ]);

          return redirect()->back()->with('success','Berhasil mengedit event');
        }

        public function deleteAward($id)
        {
          $award = Event::find($id);
          $award->delete();
          return redirect()->back()->with('success', 'Berhasil menghapus event');
        }



    /////////////////////////////////////////////////////////////////////

    public function getEnvironmentUser()
    {
      $environments = Event::where('jenis','environment')->paginate(9);
      return view('guest2.event.environment',compact(['environments']));
    }


    public function getStudentUser()
    {
      $students = Event::where('jenis','student')->paginate(9);
      return view('guest2.event.student',compact(['students']));
    }

    public function getWebinarUser()
    {
      $webinars = Event::where('jenis','webinar')->paginate(9);
      return view('guest2.event.webinar',compact(['webinars']));
    }

    public function getSemConUser()
    {
      $semcons = Event::where('jenis','semcon')->paginate(9);
      return view('guest2.event.semcon',compact(['semcons']));
    }

    public function getSurveyUser()
    {
      $surveys = Event::where('jenis','survey')->paginate(9);
      return view('guest2.event.survey',compact(['surveys']));
    }

    public function getLokakaryaUser()
    {
      $lokakaryas = Event::where('jenis','lokakarya')->paginate(9);
      return view('guest2.event.lokakarya',compact(['lokakaryas']));
    }

    public function getAwardUser()
    {
      $awards = Event::where('jenis','award')->paginate(9);
      return view('guest2.event.award',compact(['awards']));
    }


    // public function getEventUser()
    // {
    //   $events = Event::all();
    //   return view('guest.event',compact(['events']));
    // }
}
