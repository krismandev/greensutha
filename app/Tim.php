<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
  protected $table = 'tim';
  protected $guarded = [];
  protected $dates = ['deleted_at'];

  public function user(){
  	return $this->belongsTo(User::class);
  }

  public function getAvatar(){
    if (!$this->foto) {
      return asset('tentang/tim/default.png');
    }
    return url('tentang/tim/'.$this->foto);
  }

}
