<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\CaixaHandler;
use src\handlers\TransferenciaHandler;

class TransacaoController extends Controller{

    private $loggedUser;


    public function __construct()
    {
        if(CaixaHandler::checkLogin() === false){
            $this->redirect('/login');
        }
        $this->loggedUser = CaixaHandler::checkLogin();
    }


    public function transferencia(){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('transacao', [
            'flash' => $flash
            ]);
    }

    public function transferir(){
        $agenciaDestino = filter_input(INPUT_POST, 'agencia');
        $contaDestino = filter_input(INPUT_POST, 'conta');
        $valor = filter_input(INPUT_POST, 'valor');
        
        if(TransferenciaHandler::contaExistente($agenciaDestino, $contaDestino) === true){
            $transferir = TransferenciaHandler::transferir($this->loggedUser->getConta(), $agenciaDestino, $contaDestino, $valor);
            if($transferir){
                $_SESSION['flash'] = "<font color='green'>Dinheiro enviado com sucesso!";
                $this->redirect('/transferencia');
            }else{
                $_SESSION['flash'] = "<font color='red'>[ERROR] Dinheiro Insuficiente!</font>";
                $this->redirect('/transferencia');
            }
        }else{
            $_SESSION['flash'] = "<font color='red'>[ERROR] Conta Destino não existe</font>";
            $this->redirect('/transferencia'); 
        }
    }
}