<?php

namespace App\Models\Sistema;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;
use Laravel\Passport\HasApiTokens;

class Usuario extends Authenticatable implements Auditable
{
    use Notifiable, \OwenIt\Auditing\Auditable, HasApiTokens;

    protected $table    = 'sistemaUsuario';
    protected $fillable = ['primeironome', 'sobrenome', 'email', 'senha', 'ultimoacesso', 'timezone'];
    protected $hidden   = ['senha', 'access_token', 'remember_token'];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['senha'] = $value;
    }
}
