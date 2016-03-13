<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garbagebox extends Model
{

  protected $table = 'garbageboxes';

  protected $fillable = ['area','road','note','lon','lat'];
}
