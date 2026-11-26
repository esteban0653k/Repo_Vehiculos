<?php

    namespace use\Repositories;
    use App\Interface\RolInterface;
    use App\Model\Roles;

    class RolRepository extends BaseRepository implements RolInterface
    {
        public function __construct(Rol $roles)
        {
            parent::__construct($roles);
        }
        public function findByName(string $name)
        {
            return $this->model->where("name", "LIKE", "%". $name. "%")->get();
        }
    
        public function findByDescription(string $description)
        {
        return $this->model->where("description", "LIKE", "%". $description. "%")->get();
        }
    }