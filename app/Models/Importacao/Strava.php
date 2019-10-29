<?php

namespace App\Models\Importacao;

use Illuminate\Database\Eloquent\Model;

class Strava extends Model
{
    protected $connection 	= 'mysql2';
    protected $table 		= 'strava';
}
