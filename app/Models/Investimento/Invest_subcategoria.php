<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Invest_subcategoria extends Model
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['categoria_id', 'nome'];
    protected $table 	= 'investSubcategoria';

    public $timestamps = false;
}
