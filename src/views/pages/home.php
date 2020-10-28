<?php $render('header'); ?>

<style>
    .row [class^=col-], .row .col{
                background-color: #DDD;
                border: 1px solid #CCC;
                width: 400px;
    }
</style>

</head>
  <body>


<div class="container">
    <div class="row justify-content-around">
        <div class="col-6-md text-center">
            <h3 class="">Seu Perfil</h3><br>
            <h4>Titular: <?=$user->getTitular();?></h4><br>
            <h4>Agencia: <?=$user->getAgencia();?></h4><br>
            <h4>Conta:<?=$user->getConta();?></h4>
            
        </div>
        <div class="col-6-md text-center">
            <h3 class="text-center">Saldo Disponivel:</h3><br><Br>
            <h3>R$<?=$user->getSaldo();?></h3>
        </div>
        <div class="w-100"></div>
        <div class="">
        <a href="<?=$base;?>/sair" class="btn btn-danger">Sair da Conta</a>
        <a href="<?=$base;?>/transferencia" class="btn btn-success">Fazer uma transferencia</a>
        <a href="<?=$base;?>/historico" class="btn btn-info">Histórico de Transferencias</a>
        </div>
        </div>

</div>


<?php $render('footer'); ?>