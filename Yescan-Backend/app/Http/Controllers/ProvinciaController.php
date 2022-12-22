<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Mail\ListadoEmail;
use GuzzleHttp\Client;
//use Illuminate\Support\Facades\Response;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provincias = Provincia::all(); //trae todos los datos
                //$provincias = Provincia::select('nombre_provincia')->get(); esto es equivalente a la consulta que sigue
        //SELECT * FROM provincias;
        //SELECT nombre_provincia FROM provincias;

        $details = [
            'title' => 'Listado de CANdidatos registrados',
            'body' => $provincias
            ];
            Mail::to('eleceaguirre@gmail.com')->send(new ListadoEmail($details));

        return response()->json($provincias); 
        /*return response()->json([
            'mensaje' =>'Listado de provincias',
            'data' => $provincias
        ])*/

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
        $provincia = Provincia::create([
            'nombre_provincia' => $request['nombre_provincia'],
        ]);

        $details = [
            'title' => 'Se registró correctamente al CANdidato',
            'body' => $provincia->nombre_provincia
            ];
            Mail::to('eleceaguirre@gmail.com')->send(new ContactEmail($details));

        return \response([
            'mensaje' => 'La provincia se agregó correctamente',
            'data' => $provincia
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(Provincia $provincia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(Provincia $provincia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $provincia = Provincia::findOrFail($id);
 
        $provincia->nombre_provincia = $request['nombre_provincia'];
 
        $provincia->save();

        return response()->json([
            'mensaje' => 'El registro fue actualizado exitosamente',
            'data' => $provincia

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $provincia = Provincia::findOrFail($id);

        $provincia->delete();

        return response()->json([
            'mensaje' => 'El registro fue desactivado exitosamente',
            'data' => $provincia

        ], 200);
    }

    public function restore(int $id)
    {
        $provincia = Provincia::withTrashed()

            ->where('id', $id)

            ->restore();

            return response()->json([
                'mensaje' => $provincia? 'El registro fue reactivado exitosamente':'Hubo un error al reactivar el registro',
                
            ], 200);
    }
    /*public function getProvincia()
        {
        $client = new Client();
        $res = $client->request('GET', 'https://apis.datos.gob.ar/georef/api/provincias?campos=id,nombre' );
        //echo $res->getBody();
        $provincias = $res->getBody();
        return response($provincias);
        // 'application/json; charset=utf8'
        
        }*/
    public function getProvinciaSinParametro()
        {
        $client = new Client();
        $res = $client->request('GET', 'https://apis.datos.gob.ar/georef/api/municipios?provincia=22&campos=id,nombre&max=100');
        //echo $res->getBody();
        $provincias = json_decode($res->getBody(), true);

        $data = [];

        return response($provincias['municipios']);
        // 'application/json; charset=utf8'
        
        }

        //para pasar el id de una provincia
        public function getProvinciaConParametro(int $id)
        {
        $client = new Client();
        $res = $client->request('GET', "https://apis.datos.gob.ar/georef/api/municipios?provincia={$id}&campos=id,nombre&max=100");
        //echo $res->getBody();
        $provincias = json_decode($res->getBody(), true);

        //$data = [];
        
        return response()->json($provincias['municipios']);
        // 'application/json; charset=utf8'
        
        }
        public function getProvinciaAlternativa(int $id = 22)
        {
        $client = new Client();
        $res = $client->request('GET', "https://apis.datos.gob.ar/georef/api/municipios?provincia={$id}&campos=id,nombre&max=100");
        //echo $res->getBody();
        $provincias = json_decode($res->getBody(), true);

       //$data = [];
        
        return response()->json($provincias['municipios']);
        // 'application/json; charset=utf8'
        
        }               
}