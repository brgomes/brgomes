<?php

namespace App\Models\Investimento;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Ativo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['pessoa_id', 'conta_id', 'ticket', 'nome', 'posicao', 'patrimonio', 'precomedio', 'listagem_id', 'setor_id', 'ativa'];
    protected $table 	= 'investAtivo';
}
