<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_lista_material.php");
$ponteiro = new lista_material();

foreach ($_GET['listItem'] as $position => $item) :
	$ponteiro->atualizaOrdem($item,$position);
endforeach;


?>