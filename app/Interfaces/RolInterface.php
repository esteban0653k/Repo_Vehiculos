<?php

    namespace App\Interfaces;

    Interface RolInterface extends BaseInterface
    {
        public function findByName(string $name);
    }