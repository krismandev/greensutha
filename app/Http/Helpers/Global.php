<?php
use App\Post;
// use App\Literatur;
use App\Event;
use App\Foto;
use App\Poster;
use App\Tim;
// use App\Pesan;
use App\Kategori;
function total_post()
{
  return Post::count();
}

// function total_buku()
// {
//   return Literatur::where('jenis','b')->count();
// }
//
// function total_jurnal()
// {
//   return Literatur::where('jenis','j')->count();
// }
//
function total_event()
{
  return Event::count();
}

function total_foto()
{
  return Foto::count();
}

function total_poster()
{
  return Poster::count();
}

function total_tim()
{
  return Tim::count();
}
//
// function total_pesan()
// {
//   return Pesan::count();
// }


function total_berita_saya()
{
  $user_id = auth()->user()->id;
  $postingan = Post::where('user_id',$user_id)->count();
  return $postingan;

}

// function total_pendidikan()
// {
// 	$post = Post::where('Kategori_id',1)->count();
// 	return $post;
// }
//
// function total_penelitian()
// {
// 	$post = Post::where('Kategori_id',2)->count();
// 	return $post;
// }
//
// function total_pengabdian()
// {
// 	$post = Post::where('Kategori_id',3)->count();
// 	return $post;
// }
 ?>
