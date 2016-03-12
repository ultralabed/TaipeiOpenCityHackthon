<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    protected $table = 'lists';

    protected $fillable = ['user_id', 'title', 'descrp', 'lat', 'lon', 'image', 'video', 'type', 'process'];
}
