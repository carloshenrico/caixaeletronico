<?php

namespace src\handlers;

use src\models\Conta;

class CaixaHandler{

    /*
    * Função checkLogin
    *
    * Esta função vai verificar se existe uma $_SESSION['token'] e ira buscar na db do servidor o usuario *
    * @return object (Conta)
    */

    public static function checkLogin(){
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];
            $data = Conta::select()->where('token', $token)->one();
            if($data){
                $loggedUser = new Conta();
                $loggedUser->setId($data['id']);
                $loggedUser->setTitular($data['titular']);
                $loggedUser->setAgencia($data['agencia']);
                $loggedUser->setConta($data['conta']);
                $loggedUser->setSaldo($data['saldo']);
                return $loggedUser;
            }
        }
        return false;
    }

    public static function verifyLogin($agencia, $conta, $senha){
        $acesso = Conta::select()->where(['agencia' => $agencia, 'conta' => $conta])->one();
        if($acesso){
            if(password_verify($senha, $acesso['senha'])){
                $token = md5(time().rand(1, 66666).time());
                Conta::update()
                    ->set('token', $token)
                    ->where('conta', $conta)
                    ->execute();
                return $token;
            }
        }
        return false;
        
    }
}