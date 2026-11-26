<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    public function findByEmail(string $email);
    public function findByName(string $name); 
}