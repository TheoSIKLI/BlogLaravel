<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PicturesController extends Controller
{
    public function index(Request $request,$city)
    {
        $pictures = DB::
        table('cities')
            ->from('posts')
            ->where('cities.name','=',$city)
            ->leftJoin('cities','cities.id','=','posts.id_city')
            ->get();
        return view('pictures.index',['pictures'=>$pictures]);
    }
}
