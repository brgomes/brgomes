<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Setor extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['nome'];
    protected $table 	= 'investSetor';

    public $timestamps = false;
}
