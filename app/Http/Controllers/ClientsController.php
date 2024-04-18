<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Vehicle;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $clients = Client::with("vehicle")->orderBy('id', 'DESC')->get();
    // return response()->json($clients);
    }

    public function list()
    {
        $clients = Client::with("vehicle")->orderBy('id', 'DESC')->get();
    return response()->json($clients);
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
        $request->validate([
            'name' => 'required|string',
            'vehicle_id' => 'required|integer',
        ]);

        // Crea un nuevo vehículo con los datos proporcionados
        $client = new Client();
        $client->name = $request->name;
        $client->vehicle_id = $request->vehicle_id;
        
        // Guarda el vehículo en la base de datos
        $client->save();

        // Retorna una respuesta indicando que el vehículo fue creado exitosamente
        return response()->json(['message' => 'cliente creado exitosamente', 'client' => $client], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $client = Client::findOrFail($id);
        $client->update($request->all());

        return response()->json(['message' => 'Cliente actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();
            return response()->json(['message' => 'Cliente eliminado exitosamente'], 200);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Error al eliminar el cliente', 'error' => $e->getMessage()], 500);
                }
    }
}
