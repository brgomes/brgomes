<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Conta extends Model
{
	use \OwenIt\Auditing\Auditable;

    protected $fillable = ['pessoa_id', 'categoria_id', 'subcategoria_id', 'nome', 'vencimento', 'patrimonio'];
    protected $table 	= 'investConta';

    public $timestamps = false;
}
