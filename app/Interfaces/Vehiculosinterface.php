<?php

namespace App\interfaces;

interface EventoFormacionInterface extends BaseInterface
{

public function findByName(string $marca);
public function findByModelo(string $modelo);
public function findByPlaca(string $placa);
public function getByUsuario(int $user_id);

}