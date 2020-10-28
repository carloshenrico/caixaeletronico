<?php $render('header'); ?>
<style>

</style>
</head>
  <body>
<div class="container">
    <h1 class="text-center">Historico de Transações</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Titular</th>
      <th scope="col">Data</th>
      <th scope="col">Tipo</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($transacoes as $item):?>
    <tr>
      <td><?=$user->getTitular();?></td>
      <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])) ?></td>
      <td><?php
      if($item['tipo'] == '0'){
          echo "<font color='green'>ADICIONOU</font>";
      }else{
          echo "<font color='red'>RETIROU</font>";
      }
      ?></td>
      <td><?=$item['valor'];?></td>
    </tr>
      <?php endforeach;?>
  </tbody>
</table>
<a href="<?=$base;?>/" class="btn btn-danger">Voltar para o menu</a>
</div>

<?php $render('footer'); ?>