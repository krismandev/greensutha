<?php

namespace App\Http\Controllers;
use Str;
use App\Foto;
use App\Post;
use App\Banner;
use App\SelayangPandang;
use App\Poster;
use App\Event;
use App\Tim;
use App\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $fotos = Foto::all();
      $posters = Poster::all();
      $selayang_pandang = SelayangPandang::first();
      $banners = Banner::all();
      $events = Event::all();
      $kategoris = Kategori::all();
      $posts = Post::orderBy('created_at','desc')->paginate(3);
      $tims = Tim::all();
      return view('guest.index',compact(['posts','banners','fotos','kategoris','posters','selayang_pandang','events','tims']));
    }
}
