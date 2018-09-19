<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_noticias.php");
$ponteiro = new noticias();

foreach ($_GET['listItem'] as $position => $item) :
	$ponteiro->atualizaOrdem($item,$position);
endforeach;


?>