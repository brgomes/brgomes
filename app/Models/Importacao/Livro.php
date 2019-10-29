<?php

namespace App\Models\Importacao;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $connection 	= 'mysql2';
    protected $table 		= 'livros';
}
