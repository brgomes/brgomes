<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Invest_conta extends Model
{
	use \OwenIt\Auditing\Auditable;

    protected $fillable = ['pessoa', 'nomeconta', 'categoria', 'vencimento'];

    public $timestamps = false;
}
