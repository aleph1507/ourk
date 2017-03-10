<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vraboten;
use App\Galleryimage;
use Image;
use Session;
use App\Misc;
use App\User;
use Mail;


class PagesController extends Controller
{
	function getHome(){
        $gis = Galleryimage::all();
		return view('pocetna')->withGis($gis);
	}

    function getAbout(){
        $vraboteni = Vraboten::all();
        $zanas = Misc::where('key', 'zanas')->first();
        if($zanas == null){
            $zanas = new Misc();
            $zanas->key = 'zanas';
        }
    	return view('zanas')->withZanas($zanas)->withVraboteni($vraboteni);
    }
    function getContact(){
    	return view('contact');
    }

    function misc(){
        // $zanas_tekst
        $zanas = Misc::where('key', 'zanas')->first();
        if($zanas == null){
            $zanas = new Misc();
            $zanas->key = 'zanas';
        }
        return view('misc.index')->withZanas($zanas);
    }

    function store_zanas_tekst(Request $request){
        $misc = Misc::where('key', 'zanas')->first();
        if($misc == null){
            $misc = new Misc();
            $misc->key = 'zanas';
        }

        $this->validate($request, [
                'textvalue' => 'required|min:5'
            ]);

        $misc->textvalue = $request->textvalue;

        $misc->save();

        Session::flash('success', 'Текстот За нас е успешно сменет.');

        return redirect('/zanas');
    }

    function store_zanas_slika(Request $request){
        $misc = Misc::where('key', 'zanas')->first();
        if($misc == null){
            $misc = new Misc();
            $misc->key='zanas';
        }

        // dd($request->stringvalue);

        $this->validate($request, [
                'stringvalue' => 'image|required'
            ]);

        $slikaZN = $request->file('stringvalue');
        $fnameZN = time() . '.' . $slikaZN->getClientOriginalExtension();
        $fpathZN = public_path() . '/img/misc/' . $fnameZN;
        Image::make($slikaZN)->save($fpathZN);

        $misc->stringvalue = $fnameZN;

        $misc->save();

        Session::flash('success', 'Сликата е успешно сменета.');

        return redirect('/zanas');
    }

    function send_contact_mail(Request $request){
        $this->validate($request, [
                'ime' => 'required|min:2',
                'email' => 'required|email',
                'tel' => 'required',
                'poraka' => 'required|min:5'
         ]);

        $data = array(
                'name' => $request->ime,
                'email' => $request->email,
                'subject' => 'Емаил од контакт системот',
                'bodyMessage' => $request->poraka
            );

        Mail::send('email.contact-mail', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('ristokrle_ou@yahoo.com');
            $message->replyTo($data['email'], $data['name']);
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Пораката е успешно пратена');

        return redirect('/');

    }

    function get_raspored(){
        $raspored_field = null;
        $raspored_field = Misc::where('key', 'raspored')->first();
        $raspored_name = null;
        if($raspored_field != null)
            $raspored_name = $raspored_field->stringvalue;
        $raspored = null;
        if($raspored_name != null)
            $raspored = '/raspored_files/' . $raspored_name;
        return view('raspored')->withRaspored($raspored);
    }

    function set_raspored(Request $request){
        $this->validate($request, [
                'raspored' => 'required|file'
            ]);

        $misc = Misc::where('key', 'raspored')->first();
        if($misc == null){
            $misc = new Misc();
            $misc->key = 'raspored';
        }

        $raspored = $request->file('raspored');
        $rname = time() . '.' . $raspored->getClientOriginalExtension();
        $rpath = public_path() . '/raspored_files/';
        $raspored->move($rpath, $rname);
        $misc->stringvalue = $rname;
        $misc->save();
        Session::flash('success', 'Распоредот е успешно поставен.');

        return redirect('/raspored');

    }

    // function admin_users(){
    //     $users = User::all();
    //     return view('users.admin')->withUsers($users);
    // }
    // function getNovosti(){
    // 	return view('novosti');
    // }
}
