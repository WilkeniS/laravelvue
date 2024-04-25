<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyFirstModel;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Log;

class VehiclesController extends Controller
{
    // public function list()
    // {
    //     $vehicles = MyFirstModel::all();
    //     return response()->json($vehicles);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicles = Vehicle::with("client")->orderBy('year', 'DESC')->get();
    return response()->json($vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->year);
             // Valida los datos de la solicitud
             $request->validate([
                'brand' => 'required|string',
                'year' => 'required|integer',
            ]);
    
            // Crea un nuevo vehículo con los datos proporcionados
            $vehicle = new Vehicle();
            $vehicle->brand = $request->brand;
            $vehicle->year = $request->year;
            
            // Guarda el vehículo en la base de datos
            $vehicle->save();
    
            // Retorna una respuesta indicando que el vehículo fue creado exitosamente
            return response()->json(['message' => 'Vehículo creado exitosamente', 'vehicle' => $vehicle], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json($vehicle);
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
    public function update(Request $request, Vehicle $vehicle)
    {
        try {
        // Actualiza el vehículo con los datos de la solicitud
        $vehicle->update($request->all());

        // Retorna una respuesta indicando que el vehículo fue actualizado correctamente
        return response()->json(['message' => 'Vehículo actualizado correctamente']);
    } catch (\Exception $e) {
        // Retorna una respuesta de error
        return response()->json(['message' => 'Error al actualizar el vehículo', 'error' => $e->getMessage()], 500);
    }
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
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->delete();
            return response()->json(['message' => 'Vehículo eliminado exitosamente'], 200);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Error al eliminar el vehículo', 'error' => $e->getMessage()], 500);
                }
    }

    public function search(Request $request)
{
    $searchTerm = $request->get('q');

    $vehicles = Vehicle::where('name', 'like', "%$searchTerm%")
                        ->orWhere('brand', 'like', "%$searchTerm%")
                        ->orWhere('model', 'like', "%$searchTerm%")
                        ->get();

    return view('vehicles.index', compact('vehicles'));
}
    
    
}
