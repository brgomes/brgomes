<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Invest_listagem extends Model
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['nome', 'descricao'];
    protected $table 	= 'investListagem';

    public $timestamps = false;
}
