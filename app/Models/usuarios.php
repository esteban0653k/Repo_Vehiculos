<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


class usuarios extends Authenticatable implements JWTSubject
{
    use HasFactory, softDelete;
    protected $table = "usuarios";
    protected $fillable = [
         'roles_id',
         'name',
         'email',
         'email_verified_at',
         'password',
         'remember_token'
    ];

    protected $hidden = 
    [
        'password',
        'remember_token'
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function roles(){
        return $this->belongTo(Roles::class);
    }
    
    public function getRolesName(): ?string
    {
        return $this->roles?->name;
    }

    public function getPermissions(): array
    {
        return $this->roles?->permissions() ?? [];
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->getPermissions(), true);
    }

    public function hasRoles(string $roles): bool
    {
        return $this->getRolesName() === $roles;
    }

    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

     public function getJWTCustomClaims(): array
    {
        return [
            'roles' => $this->getRolesName(),
        ];
    }


}