<?php

namespace\Repositories;

use App\Models\Vehiculos;


class VehiculosRepository extends BaseRepository implements VehiculosInterface
{

  public function __construct(Vehiculos $vehiculos)
  {
    parent::__construct($vehiculos);
  }

   public function findByMarca(string $marca){
    return $this->model->where("marca", $marca)->get();
   }
   public function findByModelo(string $modelo){
    return $this->model->where("modelo, $modelo")->get();
   }

   public function findByPlaca(string $placa){
    return $this->model->where("email", "LIKE", "%" . $placa. "%")->get();
   }

   public function findByUsuario(int $userId)
   {
       return $this->model->where('user_id', $userId)->get();
   }



}