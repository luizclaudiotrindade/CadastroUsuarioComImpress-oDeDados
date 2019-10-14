<?php

namespace App;
use App\Opcoes;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    //
    protected $fillable = [
        'nome', 'cpf', 'opcao_id'
    ];

    public function opcoes()
    {
        return $this->hasOne('Opcoes::class');
    }
}
