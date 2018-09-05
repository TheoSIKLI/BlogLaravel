<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'url_photo'];
    protected $table = 'cities';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
