<?php

namespace App\Http\Controllers;

use App\Service\VehiculosServices;
use App\Http\Request\RequestVehiculos;
 
class VehiculosController extends Controller
{
    public function __construct(private VehiculosService $vehiculosService)
    {
    }
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->vehiculosService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los instructores correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestVehiculos $request)
    {
        $registroVehiculos = $this->vehiculosService->create($request->validated());
               
        return response()->json([
            'message' => 'El instructor se creó correctamente',
            'datosRegistrados' => $registroVehiculos
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->vehiculosService->getById($id);
 
        if(!registro)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se listó el registro del vehiculo correctamente',
            'data'=>$registro
        ], 200);
    }
 
 
    //Actualizar un registro
    public function update(RequestVehiculos $request, string $id)
    {
        $registroActualizado = $this->VehiculosService->update($id, $request->validated());
 
              if(!registroActualizado)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se actualizó el registro correctamente',
            'data'=>$registroActualizado
        ], 200);
    }
 

    //Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->vehiculosService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El instructor se eliminó correctamente',
        ], 200);
    }

    public function findByMarca(string $marca)
    {
        $registros = $this->vehiculosService->findByMarca($marca);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
        // Buscar instructores por usuario
    public function findByUsuario(string $userId)
    {
        $registros = $this->vehiculosService->findByUsuario($userId);
        
        return response()->json([
            'message' => 'Vehiculos filtrados por usuario',
            'data' => $registros
        ], 200);
    }


     //buscar por placa
    public function findByPlaca(string $placa)
    {
        $registro = $this->vehiculosService->findByCorreo($placa);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró ningún ningun vehiculo con esa placa'
            ], 404);
        }

        return response()->json([
            'message' => 'vehiculo encontrado por esa placa',
            'data' => $registro
        ], 200);
    }

    public function findByModelo(string $modelo)
    {
        $registros = $this->vehiculosService->findByCompetencia($modelo);
        
        return response()->json([
            'message' => 'vehiculos filtrados por modelo',
            'data' => $registros
        ], 200);
    }
}

