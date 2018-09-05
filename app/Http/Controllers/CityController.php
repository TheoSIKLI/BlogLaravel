<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;

class CityController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFormCity()
    {
        return view('city/city_form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createCity(Request $request)
    {
        $folderCreate = 'images/'.ucfirst($request->input('title'));
        $folderForPicture = 'images';

        if(!is_dir($folderCreate)){
            File::makeDirectory($folderCreate, 0777, true, true);
        }

        $imageName = time(). '.' .
            $request->file('photo')->getClientOriginalExtension();

        $request->file('photo')->move(
            $folderForPicture, $imageName
        );


        City::create(array(
            'name' => Input::get('title'),
            'url_photo' => 'images/'.$imageName
        ));

        return redirect()->route('home')->with('success','La ville a bien été ajouter');
        
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $city = City::where('id',$id)->first();
        return view('city.edit',compact('city','id'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('post')) {
            if($request->hasFile('photo')){
                $folderForPicture = 'images';

                $imageName = time(). '.' .
                    $request->file('photo')->getClientOriginalExtension();

                $request->file('photo')->move(
                    $folderForPicture, $imageName
                );


                City::where('id',$id)->update(['name' => $request->get('name')]);

                City::where('id',$id)->update(['url_photo' => 'images/'.$imageName]);
            } else {
                City::where('id', $id)
                    ->update(['name' => $request->get('name')])
                ;
            }
            return redirect()->route('home')->with('success','La ville a bien été modifié');
        } else {
            return redirect()->route('home')->with('danger','Erreur !!');
        }
    }

    public function delete(Request $request,$id)
    {
        if($request->isMethod('delete')) {
            $City = City::where('id',$id)->delete();
            return redirect()->route('home')->with('success','La ville a bien été supprimé');

        }
        return back();
    }
}
