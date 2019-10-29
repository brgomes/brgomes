<?php

namespace App\Models\Outros;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Livro extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

	public $timestamps = false;

    protected $table 	= 'livro';
    protected $fillable = ['nome', 'dataaquisicao', 'ordem', 'totalpaginas', 'paginaslidas'];
}
