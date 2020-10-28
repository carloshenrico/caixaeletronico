<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\CaixaHandler;

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
    }
}