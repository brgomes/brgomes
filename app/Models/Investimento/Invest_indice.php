<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Invest_indice extends Model
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['indice', 'mes', 'ano', 'valor'];
    protected $table 	= 'investIndice';

    public $timestamps = false;
}
