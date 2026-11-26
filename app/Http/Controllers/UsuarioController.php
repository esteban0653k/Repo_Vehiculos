<?php
 
namespace App\Http\Controllers;
 
use App\Services\UsuarioService;
use App\Http\Requests\UsuarioRequest   ;
 
class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }

 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->usuarioService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los usuarios correctamente",
            'data' => $registros
        ], 200);
    }
 //para crear un registro

    public function store(UsuarioRequest $request)
    {
        $registroUsuario = $this->usuarioService->create($request->validated());
               
        return response()->json([
            'message' => 'El rol se creó correctamente',
            'datosRegistrados' => $registroUsuario
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->usuarioService->getById($id);
 
        if(!registro)
        {
            return response()->json([
                'message' => 'No se encontro registro con ese ID'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se listó el registro correctamente',
            'data'=>$registro
        ], 200);
    }
 
 
    //Actualizar un registro
    public function update(RequestUsuario $request, string $id)
    {
        $registroActualizado = $this->usuarioService->update($id, $request->validated());
 
              if(!registroActualizado)
        {
            return response()->json([
                'message' => 'No se encontro registro con ese ID'
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
        $validar = $this->usuarioService->delete($id);
               if(!validar)
        {
            return response()->json([
                'message' => 'No se encontro registro con ese ID'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El rol se eliminó correctamente',
        ], 200);
    }
    
    public function findByEmail(string $email){
        $registros = $this->$usuarioService->findByCorreo($email);
               if(!validar)
        {
            return response()->json([
                'message' => 'No se encontro el registro con ese correo'.$email
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se encontro el usuario con el correo '.$correo,
        ], 200);

    }
    public function findByName(string $name)
    {
        $registros = $this->usuarioService->findByName($name);
               if(!validar)
        {
            return response()->json([
                'message' => 'No se encontro el registro con ese nombre '.$name
            ], 404);
        }
 
        return response()->json([
            'message' =>'Se encontro el usuario con el nombre: '.$name,
        ], 200);

    }
 
}
 
 