<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
  protected $table = 'kategori';
  protected $guarded = [];

  public function post()
  {
    return $this->hasMany(Post::class);
  }

  public function sum_post()
  {
    $id = $this->id;
    $sum_post = Post::where('kategori_id',$id)->count();
    return $sum_post;
  }
}
