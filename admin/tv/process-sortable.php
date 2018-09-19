<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_tv.php");
$ponteiro = new tv();

foreach ($_GET['listItem'] as $position => $item) :
	$ponteiro->atualizaOrdem($item,$position);
endforeach;


?>