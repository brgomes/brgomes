<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Pessoa extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    protected $fillable = ['nome', 'patrimonio'];
    protected $table 	= 'investPessoa';

    public $timestamps = false;
}
