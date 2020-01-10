<?php

namespace App\Models\Importacao;

use Illuminate\Database\Eloquent\Model;

class Indice extends Model
{
    protected $connection 	= 'mysql2';
    protected $table 		= 'invest_indice';
}
