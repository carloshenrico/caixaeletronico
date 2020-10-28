<?php
namespace src\models;
use \core\Model;

class Conta extends Model {
    
    public $id;
    public $titulo;
    public $agencia;
    public $conta;
    public $saldo;

    public function setTitular($i){
        $this->titulo = $i;
    }
    
    public function getTitular(){
        return $this->titulo;
    }

    public function setAgencia($i){
        $this->agencia = $i;
    }
    
    public function getAgencia(){
        return $this->agencia;
    }

    public function setConta($i){
        $this->conta = $i;
    }
    
    public function getConta(){
        return $this->conta;
    }
    
    public function setSaldo($i){
        $this->saldo = $i;
    }
    
    public function getSaldo(){
        return $this->saldo;
    }

    public function setId($i){
        $this->id = $i;
    }
    
    public function getId(){
        return $this->id;
    }
}