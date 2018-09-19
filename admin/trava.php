<?php
session_start();
if(empty($_SESSION['user']['user_id']))
{
	header("Location:".$pre.'index.php');
}

$arPagina = explode("/",$_SERVER['PHP_SELF']);
$cont = array_search('admin', $arPagina);
if(substr($arPagina[$cont+1],strlen($arPagina[$cont+1])-4,4) != '.php' ){
	$verifica = 0;
	foreach($_SESSION['user']['pags'] as $paginas){
		if($paginas['pasta'] == $arPagina[$cont+1])
			$verifica = 1;
	}
	if($verifica == 0)
			header("Location:".$pre.'inicial.php');
}
?>