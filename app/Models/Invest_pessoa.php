<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Invest_pessoa extends Model
{
	use \OwenIt\Auditing\Auditable;

    protected $fillable = ['nome'];

    public $timestamps = false;
}
