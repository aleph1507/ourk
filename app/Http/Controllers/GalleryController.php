<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galleryimage;
use Image;
use Session;

class GalleryController extends Controller
{
    public function index(){
    	$gis = Galleryimage::all();
    	return view('gallery.index')->withGis($gis);
    }

    public function store(Request $request){
    	$this->validate($request, [
    			'slika' => 'required|image'
    		]);

    	$gi = new Galleryimage();
    	$slikaG = $request->file('slika');
    	$fnameG = time() . '.' . $slikaG->getClientOriginalExtension();
    	$fpathG = public_path() . '/img/gallery/' . $fnameG;
    	Image::make($slikaG)->save($fpathG);
    	$gi->image = $fnameG;

    	$gi->save();

    	Session::flash('success', 'Сликата е додадена');

    	return redirect()->route('gallery.index');
    }

    public function delete($id){
    	$gi = Galleryimage::find($id);
    	$gi->delete();
    	Session::flash('success', 'Сликата е избришана.');
    	return redirect()->route('gallery.index');
    }
}
