<?php


namespace src\handlers;

use src\models\Conta;
use src\models\Historico;

class HistoricoHandler{

    /*
    * Função transacoes puxa historico de transacoes feita da conta logada
    * @param int [id] = id da conta
    * @return array
    */
    public static function transacoes($id){
        $conta = Historico::select()->where('id_conta', $id)->get();
        return $conta;
    }
}