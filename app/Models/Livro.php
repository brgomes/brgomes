<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Livro extends Model
{
	use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'idlivro';
    protected $fillable   = ['nome', 'dataaquisicao', 'ordem', 'totalpaginas', 'paginaslidas'];

    public $timestamps = false;
}
