<?php

namespace src\handlers;

use src\models\Conta;
use src\models\Historico;

class TransferenciaHandler{

    /*
    * Função saldo pega o saldo da conta
    * @param int @conta
    * @return float 
    */
    public static function saldo($conta){
        $saldo = Conta::select()->where('conta', $conta)->one();
        return $saldo['saldo'];
    }

    /*
    * Funão contaExistente verifica se a conta é existente
    * @param int $agencia
    * @param int $conta
    * @return boolean
    */
    public static function contaExistente($agencia, $conta){
        $conta = Conta::select()->where(['agencia' => $agencia, 'conta' => $conta])->one();
        if($conta > 0){
            return true;
        }
        return false;
    }


    /*
    * Função transferir, irá transferir o saldo de uma conta para conta destino
    * @param int $minhaConta - Numero da conta que vai enviar
    * @param int $agenciaDestino - Numero da agencia de destino
    * @param int $contaDestino - Numero da conta de destino
    * @param float $valor - Valor da transferencia
    * @return boolean - Retorna True se foi concluido | FALSE se deu error
    */
    public static function transferir($minhaConta, $agenciaDestino, $contaDestino, $valor){
        $saldo = self::saldo($minhaConta);
        $valorReplace = str_replace(",", ".", $valor);
        $valorCerto = floatval($valorReplace);

        if($saldo > $valorCerto){

            $conta = Conta::select()
            ->where('conta', $minhaConta)
            ->one();

            $destino = Conta::select()
            ->where(['agencia' => $agenciaDestino, 'conta' => $contaDestino])
            ->one();


            // RETIRAR SALDO DA CONTA
            $saldoRetirar = $saldo - $valorCerto;
            Conta::update()
            ->set('saldo', $saldoRetirar)
            ->where('conta', $conta['conta'])
            ->execute();

            // ADICIONAR SALDO NA CONTA DESTINO
            $saldoAdicionar = $destino['saldo'] + $valorCerto;
            Conta::update()
            ->set('saldo', $saldoAdicionar)
            ->where('conta', $destino['conta'])
            ->execute();

            // HISTORICO ADICIONADO PARA QUEM RETIROU
            Historico::insert(
                ['id_conta' => $conta['id'], 'tipo' => '1', 'valor' => $valorCerto, 'data_operacao' => date('Y-m-d H:i'), 'destino' => $destino['conta']])
                ->execute();

            // HISTORICO ADICIONADO PARA QUEM RECEBEU
            Historico::insert(
                ['id_conta' => $destino['id'], 'tipo' => '0', 'valor' => $valorCerto, 'data_operacao' => date('Y-m-d H:i'), 'destino' => $conta['conta']])
                ->execute();

            return true;
        }
        return false;
    }

}