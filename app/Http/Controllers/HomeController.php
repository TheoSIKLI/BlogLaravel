<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cities = DB::table('cities')->get();
        $nbPicturesForEachCity = Post::countPicturesByCity();
        foreach ($Cities as $key=>$city):
            var_dump($city->id);
        endforeach;
        die();
        return view('index.index',compact('Cities'));
    }
}
