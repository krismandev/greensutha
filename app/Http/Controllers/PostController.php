<?php

namespace App\Http\Controllers;
use Str;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function getPosts(){
    $posts = Post::orderBy('created_at','desc')->get();
    return view('admin.posts.getPosts',compact(['posts']));
  }

  public function createPost(){
    return view('admin.posts.createPost');
  }

  public function storePost(Request $request){
    $request->validate([
      'judul' => 'required',
      'gambar' =>'file|image|mimes:png,jpg,jpeg,gif|max:10000',
      'konten' => 'required',
    ]);

    if ($request->hasFile('gambar')) {
      $gambar_post = $request->file('gambar');
      $nama_gambar_post = time()."_".$gambar_post->getClientOriginalName();
      $tujuan_upload = 'posts';
      $gambar_post->move($tujuan_upload,$nama_gambar_post);

      $post = Post::create([
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul),
        'user_id' => auth()->user()->id,
        'konten' => $request->konten,
        'gambar' => $nama_gambar_post,
        'link' => $request->link
      ]);

    }else {

      $post = Post::create([
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul),
        'user_id' => auth()->user()->id,
        'konten' => $request->konten,
        'link' => $request->link,
      ]);
    }


    return redirect()->route('getPosts')->with('success','Berhasil membuat berita baru');
  }
}
