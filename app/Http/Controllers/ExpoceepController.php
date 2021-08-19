<?php

namespace App\Http\Controllers;

use App\Expoceep as AppExpoceep;
use App\Models\Expoceep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;


class ExpoceepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->all();

        if ($request->hasfile('arquivo')) {
            $path = $request->file('arquivo')->store('ceep/expoceep');

            $url = Storage::url($path);

            $data['arquivo'] = $url;
        }
       
        $data['data_hora'] = date('Y-m-d H:i:s');
        $data['idusuario'] = Auth::guard('web')->user()->id;

        $projeto = Expoceep::create($data);
        return redirect('/expoceep');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expoceep  $expoceep
     * @return \Illuminate\Http\Response
     */
    public function show(Expoceep $expoceep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expoceep  $expoceep
     * @return \Illuminate\Http\Response
     */
    public function edit(Expoceep $expoceep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expoceep  $expoceep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expoceep $expoceep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expoceep  $expoceep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expoceep $expoceep)
    {
        //
    }
}
