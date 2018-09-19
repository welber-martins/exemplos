<?php
$nivel_diretorio = "../../..";
//require_once("../../trava.php");
require_once("$nivel_diretorio/control/Post_Control.php");
$ponteiro = new Post_Control();

if($_SESSION['perPosts'] != 'OK')
	die('Acesso negado');
$arImg = util::envia_foto($_FILES['imagem'],'../../../uploads/');
if($arImg['0'])
{
	util::trataImgGrande('../../../uploads/'.$arImg['1'],700,'1');
	echo "<img src='../../../uploads/".$arImg['1']."' title='' />"; 
}
else
	echo $arImg['1'];

?>
