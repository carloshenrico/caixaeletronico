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
<form action="<?=$base;?>/transferencia" method="POST" class="align-center">
<img src="<?=$base;?>/assets/img/logo.png" class="img-fluid logo">
<br><br>
    Agência: </br>
    <input type="text" name="agencia" placeholder="Agencia"> <br><br>
    Conta: </br>
    <input type="text" name="conta" placeholder="Conta"> <br><br>
    Senha: </br>
    <input type="text" name="valor" placeholder="Valor para transferencia"> <br><br>

    <button type="submit" class="btn btn-success">Transferir</button>
    <a href="<?=$base;?>/" class="btn btn-danger">Voltar</a>
    <br><br>    
    <p style="color:red"><?=$flash;?></p>
</form>
    </div>
</div>

<?php $render('footer'); ?>