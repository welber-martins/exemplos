<?php
$nivel_diretorio = "../../..";
require_once("$nivel_diretorio/control/Post_Control.php");
$ponteiro = new Post_Control();

if($_SESSION['perPosts'] != 'OK')
	die('Acesso negado');

foreach ($_GET['listItem'] as $position => $item) :
	$ponteiro->exeProcedure($item,'','','','','',$position,'O');
endforeach;
$ponteiro->criaXmlLista('../../../includes/xmls/');

?>