<?php $render('header'); ?>

<style>

    form{
        width: 400px;
        height: 500px;
        border: 1px solid black;
        padding: 60px;
        padding-left: 100px;
    }
    .logo{
        width: 200px;
        height: auto;
    }
</style>
</head>
  <body>


<div class="container">
    <div class="row justify-content-center align-items-center">
<form action="<?=$base;?>/login" method="POST" class="align-center">
<img src="<?=$base;?>/assets/img/logo.png" class="img-fluid logo">
<br><br>
    Agência: </br>
    <input type="text" name="agencia" placeholder="Agencia"> <br><br>
    Conta: </br>
    <input type="text" name="conta" placeholder="Conta"> <br><br>
    Senha: </br>
    <input type="password" name="senha" maxlength="6s" placeholder="Senha 6 digitos"> <br><br>

    <button type="submit" class="btn btn-success">Acessar Conta</button>
    <br><br>    
    <p style="color:red"><?=$flash;?></p>
</form>
    </div>
</div>


<?php $render('footer'); ?>