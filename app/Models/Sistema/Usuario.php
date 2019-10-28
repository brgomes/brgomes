<?php

namespace App\Models\Sistema;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;

class Usuario extends Authenticatable implements Auditable
{
    use Notifiable, \OwenIt\Auditing\Auditable;

    protected $table    = 'sistemaUsuario';
    protected $fillable = ['primeironome', 'sobrenome', 'email', 'senha', 'ultimoacesso', 'timezone'];
    protected $hidden   = ['senha', 'remember_token'];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['senha'] = $value;
    }
}
