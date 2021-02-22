<?php

namespace App\Http\Controllers;

use App\Prueba;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prueba = Prueba::all();
        return $prueba;
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
        //
        $prueba = new Prueba();
        $prueba->nombre = $request->nombre;
        $prueba->descripcion = $request->descripcion;
        $prueba->contenido = $request->contenido;
        $prueba->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $prueba = Prueba::findOrFail($request->id);
        return $prueba;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueba $prueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $prueba = Prueba::findOrFail($request->id);
        $prueba->nombre = $request->nombre;
        $prueba->descripcion = $request->descripcion;
        $prueba->contenido = $request->contenido;
        $prueba->save();
        return $prueba;   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $prueba = Prueba::destroy($request->id);
        return $prueba;
    }
}
