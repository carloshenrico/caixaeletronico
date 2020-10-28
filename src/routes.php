<?php
use core\Router;

$router = new Router();

$router->get('/', 'CaixaController@index');
$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');
$router->get('/sair', 'LoginController@logout');

$router->get('/historico', 'HistoricoController@historico');

$router->get('/transferencia', 'TransacaoController@transferencia');