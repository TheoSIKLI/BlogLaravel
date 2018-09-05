<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = ['title','description','author','url_image','id_city'];

    protected $table = 'posts';

    public static function getCityAndPost()
    {
        return DB::table('posts')
            ->join('cities','posts.id_city','=','cities.id')
            ->get();
    }

    public static function countPicturesByCity()
    {
        $query = Post::
    }

}
