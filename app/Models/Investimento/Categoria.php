<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Categoria extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['nome'];
    protected $table 	= 'investCategoria';

    public $timestamps = false;
}
