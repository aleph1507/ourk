<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novost;
use Session;
use Image;
use Carbon\Carbon;

class NovostiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novosti = Novost::orderBy('id', 'desc')->paginate(3);
        // Carbon::setLocale('mk');
        return view('novosti.novosti')->withNovosti($novosti);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novosti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function get_spath($slika){
        return $fpath;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'tekst' => 'required|min:10',
                'slika1' => 'sometimes|image',
                'slika2' => 'sometimes|image'
            ]);

        $novo = new Novost();
        if($request->slika1){
            $slika1 = $request->file('slika1');
            $fname = time() . '.' . $slika1->getClientOriginalExtension();
            $fpath = public_path() . '/img/novosti/' . $fname;
            Image::make($slika1)->fit(600,200)->save($fpath);
            $novo->slika1 = $fname;
        }
        
        if($request->slika2){
            $slika2 = $request->file('slika2');
            $fname2 = time() . '.' . $slika2->getClientOriginalExtension();
            $fpath2 = public_path()  . '/img/novosti/' . $fname2;
            Image::make($slika2)->fit(600,200)->save($fpath2);
            $novo->slika2 = $fname2;
        }

        if($request->title)
            $novo->title = $request->title;
        if($request->author)
            $novo->author = $request->author;

        $novo->tekst = $request->tekst;
        $novo->save();

        Session::flash('success', 'Новоста е додадена');

        return redirect('novosti');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $n = Novost::find($id);
        return view('novosti.show')->withNovost($n);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novost = Novost::find($id);
        return view('novosti.edit')->withNovost($novost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'tekst' => 'required|min:10',
                'slika1' => 'sometimes|image',
                'slika2' => 'sometimes|image'
            ]);

        $novo = Novost::find($id);
        if($request->slika1){
            $slika1 = $request->file('slika1');
            $fname = time() . '.' . $slika1->getClientOriginalExtension();
            $fpath = public_path() . '/img/novosti/' . $fname;
            Image::make($slika1)->fit(600,200)->save($fpath);
            $novo->slika1 = $fname;
        }
        if($request->slika2){
            $slika2 = $request->file('slika2');
            $fname2 = time() . '.' . $slika2->getClientOriginalExtension();
            $fpath2 = public_path()  . '/img/novosti/' . $fname2;
            Image::make($slika2)->fit(600,200)->save($fpath2);
            $novo->slika2 = $fname2;
        }

        if($request->title)
            $novo->title = $request->title;
        if($request->author)
            $novo->author = $request->author;

        $novo->tekst = $request->tekst;
        $novo->save();

        Session::flash('success', 'Новоста е променента.');

        return redirect()->route('novosti.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novost = Novost::find($id);
        $novost->delete();
        Session::flash('success', 'Новоста е успешно избришана');
        return redirect()->route('novosti.index');
    }
}
