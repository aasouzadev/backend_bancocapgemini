<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [
        'conta', 'senha', 'tipo_transacao', 'valor', 'saldo'
    ];

    private function hasBalance($valor)
    {
        if ($valor > $this->saldo) {

            return false;
        }
        return true;
    }
    public function passwordCheck($senha)
    {
        if ($senha == $this->senha) {
            return true;
        } else {
            return false;
        }
    }
    public function newBalance($valor, $tipo_transacao)
    {
        if ($tipo_transacao == 'W') {

            if ($this->hasBalance($valor)) {
                $this->saldo = $this->saldo - $valor;
                $this->tipo_transacao = $tipo_transacao;
                $this->valor = $valor;
                $this->save();
                return true;
            } else {
                return false;
            }
        } else {
            $this->saldo = $this->saldo + $valor;
            $this->tipo_transacao = $tipo_transacao;
            $this->valor = $valor;
            $this->save();
            return true;
        }
    }
}
