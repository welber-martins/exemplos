<?php
$caminho = substr('http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'],0,-10);
require_once("classes/class_upload.php");
$ponteiro = new upload();
if (!empty($_FILES['imagem']['tmp_name']))
{
	
	$arImg = $ponteiro->envia_foto($_FILES['imagem'],'uploads/');
	if ($arImg['0'])
	{
		$ponteiro->trataImgGrande('uploads/'.$arImg['1'],1170,'1');		
		echo "<img src='".$caminho."uploads/".$arImg['1']."' title='' class='img-responsive' />"; 		
	}
	else
	{
		
		echo "<li>".$arImg['1']."</li>";
	}
	
}
?>

<?php

?>