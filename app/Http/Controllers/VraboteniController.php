<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vraboten;
use Image;
use Session;

class VraboteniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vraboteni = Vraboten::all();
        return view('vraboteni.index')->withVraboteni($vraboteni);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'ime' => 'required|min:4',
                'pozicija' => 'required|min:2',
                'slika' => 'sometimes|image'
            ]);

        $vraboten = new Vraboten();
        $vraboten->ime = $request->ime;
        $vraboten->pozicija = $request->pozicija;
        if($request->slika){
            $slikaV = $request->file('slika');
            $fnameV = time() . '.' . $slikaV->getClientOriginalExtension();
            $fpathV = public_path() . '/img/vraboteni/' . $fnameV;
            Image::make($slikaV)->fit(300,150)->save($fpathV);
            $vraboten->slika = $fnameV;
        }

        Session::flash('success', 'Додаден нов вработен');
        $vraboten->save();

        return redirect()->route('vraboteni.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
                'ime' => 'required|min:4',
                'pozicija' => 'required|min:2',
                'slika' => 'sometimes|image'
            ]);

        $vraboten = Vraboten::find($id);
        $vraboten->ime = $request->ime;
        $vraboten->pozicija = $request->pozicija;

        if($request->slika){
            $slikaV = $request->file('slika');
            $fnameV = time() . '.' . $slikaV->getClientOriginalExtension();
            $fpathV = public_path() . '/img/vraboteni/' . $fnameV;
            Image::make($slikaV)->save($fpathV);
            $vraboten->slika = $fnameV;
        }

        $vraboten->save();

        Session::flash('success', 'Информациите се сменети');

        return redirect()->route('vraboteni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vraboten = Vraboten::find($id);
        Session::flash('success', 'Вработениот е успешно избришан');
        $vraboten->delete();
        return redirect()->route('vraboteni.index');
    }
}
