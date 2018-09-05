<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $photos = Post::getCityAndPost();
        $cities = City::all();
        if($request->user()){
            return view('dashboard.home',compact('cities','photos'));
        } else {
            session()->flash('message','Post');
            return \redirect()->route('index');
        }
    }

    public function getFormPost()
    {
        $cities = DB::table('cities')->get();
        return view('post/post_form',['cities'=>$cities]);
    }

    public function createPost(Request $request)
    {


        $imageName = time(). '.' .
            $request->file('photo')->getClientOriginalExtension();


        $query = DB::table('cities')->where('id','=',$request->input('city'))->get()->toArray();


        $request->file('photo')->move(
            base_path() . '/public/images/'.$query[0]->name, $imageName
        );

        $folder = City::all()->where('id','=',Input::get('city'))->first();


        $post = Post::create(array(
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'author' => Auth::user()->id,
            'id_city' => Input::get('city'),
            'url_image' => '/images/'.$folder->name.'/'.$imageName
        ));

        return redirect()->route('home')->with('success','L\'article a bien été cré');
    }
}
