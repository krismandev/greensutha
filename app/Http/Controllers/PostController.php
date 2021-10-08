<?php

namespace App\Http\Controllers;
use Str;
use App\Kategori;
use App\Post;
use App\Banner;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function getPosts(){
    $posts = Post::orderBy('created_at','desc')->orderBy('created_at','desc')->get();
    return view('admin.posts.getPosts',compact(['posts']));
  }

  public function createPost(){
    $kategoris = Kategori::all();
    return view('admin.posts.createPost',compact(['kategoris']));
  }

  public function storePost(Request $request){
    $request->validate([
      'judul' => 'required',
      'gambar' =>'file|image|mimes:png,jpg,jpeg,gif|max:10000',
      'kategori_id'=>'required',
      'konten' => 'required',
    ]);
    if ($request->link != null) {
      $link_awal = $request->link;
      $sebelum = 'watch?v=';
      $sesudah = ['embed/'];
      $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);
    }else {
      $link_youtube = null;
    }


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
        'kategori_id'=>$request->kategori_id,
        'gambar' => $nama_gambar_post,
        'link' => $link_youtube
      ]);

    }else {

      $post = Post::create([
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul),
        'user_id' => auth()->user()->id,
        'konten' => $request->konten,
        'kategori_id'=>$request->kategori_id,
        'link' => $link_youtube,
      ]);
    }


    return redirect()->route('getPosts')->with('success','Berhasil membuat berita baru');
  }

  public function deletePost($id)
  {
    $post = Post::find($id);
    $post->delete();
    return  redirect()->back()->with('success','Berhasil menghapus berita');
  }

  public function editPost($id)
  {
    $post = Post::find($id);
    $kategoris = Kategori::all();
    //dd($post->kategori);
    return view('admin.posts.editPost',compact(['post','kategoris']));
  }

  public function updatePost(Request $request)
  {
    $post_lama = Post::find($request->id);
    $request->validate([
      'gambar' => 'file|image|mimes:png,jpg,jpeg,gif|max:10000',
      'judul' => 'required',
      'konten' => 'required',
      'kategori_id' => 'required'
    ]);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        $tujuan_upload = 'posts';
        $gambar->move($tujuan_upload,$nama_gambar);


        $post_lama->update([
          'judul' => $request->judul,
          'slug' => Str::slug($request->judul),
          'konten' => $request->konten,
          'gambar' => $nama_gambar,
          'kategori_id' => $request->kategori_id,
          'link' => $request->link,
        ]);
      }else {
        // $link_lama = $request->link;
        // if ($link_lama != null) {
        //   //$request->link->replace('width="560"','width="100%"');
        //   $link_lama = Str::of('width="560"')->replace('560', '100%');
        // }
        // dd($link_lama);
        // //dd($request->link);
        $post_lama->update([
          'judul' => $request->judul,
          'slug' => Str::slug($request->judul),
          'konten' => $request->konten,
          'kategori_id' => $request->kategori_id,
          'link' => $request->link,
        ]);
      }
      return redirect()->back()->with('success','Berhasil Mengupdate berita');
  }
  //USER--------------------------------------------------------------------------

  public function showPostUser($slug){

    $banners = Banner::all();
    $kategoris = Kategori::all();
    $post = Post::where('slug',$slug)->first();
    $other_posts = Post::inRandomOrder()->paginate(4);
    return view('guest2.posts.singlepost',compact(['post','banners','kategoris','other_posts']));
  }

  public function searchPostsUser(Request $request)
  {
      $kategoris = Kategori::all();
      if ($request->has('search')) {
            $posts = Post::where('judul','LIKE','%'.$request->search.'%')->paginate(12);
            $ktg = null;
            $keyword = $request->search;
      }
      $other_posts = Post::inRandomOrder()->paginate(4);
      return view('guest2.posts.posts',compact(['posts','kategoris','other_posts','ktg','keyword']));
  }

  public function getPostsUser()
  {
    $kategoris = Kategori::all();
    $posts = Post::orderBy('created_at','desc')->paginate(10);
    return view('guest.posts.berita',compact(['posts','kategoris']));
  }

  public function getPostsByCategory($kategori = null){
    $kategoris = Kategori::all();
    if($kategori != null){
      $ktg = Kategori::where('nama_kategori',$kategori)->first();
    //   dd($ktg);
      $posts = Post::where('kategori_id',$ktg->id)->orderBy('created_at','desc')->paginate(8);
    }else{
      $posts = Post::orderBy('created_at','desc')->paginate(8);
      $ktg = null;
    }

    $other_posts = Post::inRandomOrder()->paginate(4);

    return view('guest2.posts.posts',compact(['posts','kategoris','other_posts','ktg']));

  }

  public function getPostsKategori($kategori)
  {
     //dd("ok");
    $kategoris = Kategori::all();
    $ktg = Kategori::where('nama_kategori',$kategori)->first();
    $posts = Post::where('kategori_id',$ktg->id)->orderBy('created_at','desc')->paginate(6);
    return view('guest.posts.postPerKategori',compact(['posts','kategoris','ktg']));
  }

  public function getBeritaLingkungan()
  {
    $kategori = Kategori::where('nama_kategori','Lingkungan')->first();
    $posts = Post::where('kategori_id',$kategori->id)->paginate(6);
    $ktg = Kategori::where('nama_kategori','Lingkungan')->first();
    return view('guest.posts.getBeritaLingkungan',compact(['posts','ktg']));
  }

  public function getBeritaIslam()
  {
    $kategori = Kategori::where('nama_kategori','Islam')->first();
    $posts = Post::where('kategori_id',$kategori->id)->paginate(6);
    $ktg = Kategori::where('nama_kategori','Islam')->first();
    return view('guest.posts.getBeritaIslam',compact(['posts','ktg']));
  }


  public function getBeritaSosial()
  {
    $kategori = Kategori::where('nama_kategori','Sosial')->first();
    $posts = Post::where('kategori_id',$kategori->id)->paginate(6);
    $ktg = Kategori::where('nama_kategori','Sosial')->first();

    return view('guest.posts.getBeritaSosial',compact(['posts','ktg']));
  }

  public function getBeritaPendidikan()
  {
    $kategori = Kategori::where('nama_kategori','Pendidikan')->first();
    $posts = Post::where('kategori_id',$kategori->id)->paginate(6);
    $ktg = Kategori::where('nama_kategori','Pendidikan')->first();
    return view('guest.posts.getBeritaPendidikan',compact(['posts','ktg']));
  }

  public function getBeritaBudaya()
  {
    $kategori = Kategori::where('nama_kategori','Budaya')->first();
    $posts = Post::where('kategori_id',$kategori->id)->paginate(6);
    $ktg = Kategori::where('nama_kategori','Budaya')->first();
    return view('guest.posts.getBeritaBudaya',compact(['posts','ktg']));
  }

  public function getBeritaEkonomi()
  {
    $kategori = Kategori::where('nama_kategori','Ekonomi')->first();
    $posts = Post::where('kategori_id',$kategori->id)->paginate(6);
    $ktg = Kategori::where('nama_kategori','Ekonomi')->first();
    return view('guest.posts.getBeritaEkonomi',compact(['posts','ktg']));
  }

  public function getBeritaSains()
  {
    $kategori = Kategori::where('nama_kategori','Sains')->first();
    $posts = Post::where('kategori_id',$kategori->id)->paginate(6);
    $ktg = Kategori::where('nama_kategori','Sains')->first();
    return view('guest.posts.getBeritaSains',compact(['posts','ktg']));
  }
}
