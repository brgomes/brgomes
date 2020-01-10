<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Indice extends Model
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['indice', 'mes', 'ano', 'valor'];
    protected $table 	= 'investIndice';

    public $timestamps = false;
}
