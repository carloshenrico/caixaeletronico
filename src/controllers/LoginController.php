<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\CaixaHandler;

class LoginController extends Controller {

    public function login(){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';

        }
        $this->render('login', ['flash' => $flash]);
    }

    public function loginAction(){
        $agencia = filter_input(INPUT_POST, 'agencia');
        $conta = filter_input(INPUT_POST, 'conta');
        $senha = filter_input(INPUT_POST, 'senha');
        
        if(!empty($agencia) && !empty($conta) && !empty($senha)){
            if(is_numeric($agencia) && is_numeric($conta) && is_numeric($senha)){
                
                $login = CaixaHandler::verifyLogin($agencia, $conta, $senha);
                if($login){
                    $_SESSION['token'] = $login;
                    $this->redirect('/');   

                }else{
                    $_SESSION['flash'] = '[ERROR] Dados Incorretos';
                $this->redirect('/login');
                }


            }else{
                $_SESSION['flash'] = "[ERROR] Apenas numeros nos campos [Agencia, Conta, Senha]!";
                $this->redirect('/login');
            }
        }else{
            $_SESSION['flash'] = "PREENCHER OS CAMPOS OBRIGATORIOS";
            $this->redirect('/login');
        }
    }

    public function logout(){
        if(!empty($_SESSION['token'])){
            unset($_SESSION['token']);
            $this->redirect('/login');
        }
    }

}