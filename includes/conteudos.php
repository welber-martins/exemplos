<?php
require_once("php/model.php");
$ponteiro = new model();
$pagina = $_GET['pagina'];
if($pagina == 'lista')
{
?>
Selecione abaixo a lista de materiais escolares, desejada, clique e faça o download.
<ul class="list-inline lista-material">
  <?php  
  $dbResultLM = $ponteiro->selectListaMaterial();
  if(mysql_num_rows($dbResultLM) != 0){
    while ($dbRowLM = mysql_fetch_array($dbResultLM)) {
      ?>
         <li class="col-xs-12 col-sm-6" >
            <a href="<?php echo $_GET['pre'] ?>admin/uploads/<?php echo $dbRowLM['arquivo'] ?>" target="_blank">
              <span class="glyphicon glyphicon-ok"></span> &nbsp; &nbsp;
               <?php echo $dbRowLM['descricao']  ?>
            </a>
        </li>
      <?php
    }
  }
  ?>
</ul>


<?php
}
if($pagina == 'taxa')
{
  //$dbRowTaxa = $ponteiro->selectTextos('11');
  //echo $dbRowTaxa['texto'];
?>
  MENSALIDADES E TAXAS

  <ul class="list-inline lista-material">
    <?php  
    $dbResultLM = $ponteiro->selectMatriculas('T');
    if(mysql_num_rows($dbResultLM) != 0){
      while ($dbRowLM = mysql_fetch_array($dbResultLM)) {
        ?>
           <li class="col-xs-12 " >
              <a href="<?php echo $_GET['pre'] ?>admin/uploads/<?php echo $dbRowLM['arquivo'] ?>" target="_blank">
                <span class="glyphicon glyphicon-ok"></span> &nbsp; &nbsp;
                 <?php echo $dbRowLM['descricao']  ?>
              </a>
          </li>
        <?php
      }
    }
    ?>
  </ul>
<?php
}
if($pagina == 'novas')
{
?>
INFORMATIVOS SOBRE MATRÍCULAS

<ul class="list-inline lista-material">
  <?php  
  $dbResultLM = $ponteiro->selectMatriculas('N');
  if(mysql_num_rows($dbResultLM) != 0){
    while ($dbRowLM = mysql_fetch_array($dbResultLM)) {
      ?>
         <li class="col-xs-12 " >
            <a href="<?php echo $_GET['pre'] ?>admin/uploads/<?php echo $dbRowLM['arquivo'] ?>" target="_blank">
              <span class="glyphicon glyphicon-ok"></span> &nbsp; &nbsp;
               <?php echo $dbRowLM['descricao']  ?>
            </a>
        </li>
      <?php
    }
  }
  ?>
</ul>
<?php
}
if($pagina == 'renovacao')
{
?>
INFORMATIVOS SOBRE RENOVAÇÃO DE MATRÍCULAS
<ul class="list-inline lista-material" style="margin-bottom: 20px">
  <?php  
  $dbResultLM = $ponteiro->selectMatriculas('R');
  if(mysql_num_rows($dbResultLM) != 0){
    while ($dbRowLM = mysql_fetch_array($dbResultLM)) {
      ?>
         <li class="col-xs-12 " >
            <a href="<?php echo $_GET['pre'] ?>admin/uploads/<?php echo $dbRowLM['arquivo'] ?>" target="_blank">
              <span class="glyphicon glyphicon-ok"></span> &nbsp; &nbsp;
               <?php echo $dbRowLM['descricao']  ?>
            </a>
        </li>
      <?php
    }
  }
  ?>
  
  <li class="col-xs-12" >
    <a href="https://www.youtube.com/watch?v=vov95k2yEuQ&feature=youtu.be" target="_blank">
       <span class="glyphicon glyphicon-ok"></span> &nbsp; &nbsp; 
      Passo a passo em Vídeo (Renovação de Matrícula)
    </a>
  </li>
 
</ul>


<center><a class="btn btn-danger btn-lg" href="http://rm.escolamontessori.com.br/corpore.net/login.aspx" target="_blank" role="button">FAZER A RENOVAÇÃO DE MATRÍCULA</a></center>
<?php
}
?>