<?php

namespace App\Models\Outros;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
	public $timestamps = false;

    protected $table 	= 'livro';
    protected $fillable = ['nome', 'dataaquisicao', 'ordem', 'totalpaginas', 'paginaslidas'];
}
