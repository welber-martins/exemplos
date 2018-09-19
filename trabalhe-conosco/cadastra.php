<?php
$pre = '../';
require_once("../includes/php/model.php");
$ponteiro = new model();
$dbResultArea = $ponteiro->selectArea();
if(!empty($_POST['nome'])){
    
    echo $ponteiro->cadastraCurriculo($_POST,$_FILES);
}


?>
