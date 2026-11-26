<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Http\Requests\RolRequest;
use App\Services\RolService;

class RolController extends Controller
{
    protected RolService $rolService;

    public function __construct(RolService $rolService) {
        $this->rolservice = $rolService;
    }

    public function index()
    {
        $registros = $this->rolService->getAll();

        return response()->json([
            'message' => 'Se listaron los roles con exito',
            'data' => $registros
        ],200);
    }

    public function store(RolRequest $request)
    {
        $registroRol = $this->rolService->create($request->validated());

        return response()->json([
             'message' => 'El rol se creó correctamente',
             'datosRegistrados' => $registroRol
        ],201);
    }

     public function show(string $id)
    {
        $registro = $this->rolService->getById($id);
 
        if(!registro)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se listó el registro correctamente',
            'data'=>$registro
        ], 200);
    }
    public function update(RolRequest $request, string $id)
    {
        $registroActualizado = $this->rolService->update($id, $request->validated());
 
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
    public function destroy(string $id)
    {
        $validar = $this->rolService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'Manito no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El rol se eliminó correctamente',
        ], 200);
    }
    public function findByName(string $name)
    {
        $registros = $this->rolService->findByName($name);
 
        return response()->json([
            'message' =>'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }
 
    public function findByDescription(string $description)
    {
        $registros = $this->rolService->findByDescription($description);
        
        return reponse()->json([
            'menssage' => 'Se listó correctamente por descripción',
            'data' => $registros
        ], 200);
    }

}
