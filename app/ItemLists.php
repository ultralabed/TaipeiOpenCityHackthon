<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemLists extends Model
{
  protected $table = 'itemlists';

  protected $fillable = ['user_id', 'title', 'descrp', 'lat', 'lon', 'image', 'video', 'type', 'process'];
}
