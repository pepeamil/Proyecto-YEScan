<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Mail\ListadoEmail;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use App\Htpp\Requests\StorePostRequest;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all();
        $details = [
            'title' => 'Listado de Consultas Realizadas',
            'body' => $consultas
            ];
            Mail::to('eleceaguirre@gmail.com')->send(new ListadoEmail($details));

        return response()->json($consultas); 
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
        

        $consulta = Consulta::create([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'email' => $request['email'],
            'mensaje' => $request['mensaje'],
        ]);

        $details = [
            'title' => 'Muchas Gracias por contactarse con nosotros.',
            'body' => $consulta->nombre
            ];
            Mail::to($consulta->email)->send(new ContactEmail($details));

        return \response([
            'mensaje' => 'La consulta fue recibida exitosamente',
            'data' => $consulta
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}
