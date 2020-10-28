<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\CaixaHandler;
use src\handlers\HistoricoHandler;

class HistoricoController extends Controller{

    private $loggedUser;

    public function __construct()
    {
        if(CaixaHandler::checkLogin() === false){
            $this->redirect('/login');
        }
        $this->loggedUser = CaixaHandler::checkLogin();
    }

    public function historico(){

        $transacoes = HistoricoHandler::transacoes($this->loggedUser->getId());
        $this->render('historico', [
            'transacoes' => $transacoes,
            'user' => $this->loggedUser
        ]);
    }
}