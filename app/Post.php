<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function kategori()
    {
      return $this->belongsTo(Kategori::class);
    }
}
