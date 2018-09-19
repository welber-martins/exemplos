<?php
$pre = '../';
require_once("../includes/php/model.php");
$ponteiro = new model();
if(isset($_POST['faleNome'])){
    $ok = $ponteiro->enviaContato($_POST);
}
?>
