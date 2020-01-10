<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Crteira extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['pessoa_id', 'conta_id', 'ativo_id', 'mes', 'ano', 'totalcompra', 'totalvenda', 'totaldividendos', 'saldo'];
    protected $table 	= 'investCarteira';

    public $timestamps = false;
}
