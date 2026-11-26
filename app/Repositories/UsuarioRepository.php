<?php
namespace App\Repositories;

class UsuarioRepository extends BaseRepository implements UsuarioInterface
{
    public function __construct(Usuario $usuario){
        parent::__construct($usuario);
    }
    public function findByEmail(string $email)
    {
        $registro = $this->model->where("correo","LIKE","%", $correo,"%")->get();  
        if(isEmpty($registro))
        {
            return null;
        }
        return $registro;
    }
    public function findByName(string $name)
    {
        $registro = $this->model->where("nombre","LIKE", "%",$name,"%")->get();  
        if(isEmpty($registro))
        {
            return null;
        }
        return $registro;    
    }
}  