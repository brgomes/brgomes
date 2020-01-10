<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Fundamento extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['ativo_id', 'ano', 'trimestre', 'valormercado', 'qtdeacoes', 'pl', 'pvp', 'lpa', 'vpa'];
    protected $table 	= 'investFundamento';

    public $timestamps = false;
}
