<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Invest_movimento extends Model
{
	use \OwenIt\Auditing\Auditable;

    protected $fillable = ['conta', 'mes', 'ano', 'aporte', 'saldo'];

    public $timestamps = false;
}
