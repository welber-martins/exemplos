<?php
$caminho = substr('http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'],0,-17);
require_once("classes/class_upload.php");
$ponteiro = new upload();
if (!empty($_FILES['arquivoTexto']['tmp_name']))
{
	
	$tipo = substr($_FILES['arquivoTexto']['name'],-3);
    $nomeArquivo = time().rand(100,999).".$tipo";
    $arTipo =  array('pdf');
    $ok = $ponteiro->enviaArquivo($_FILES['arquivoTexto']['name'],$arTipo,$_FILES['arquivoTexto']['tmp_name'],'uploads/'.$nomeArquivo);  
    if($ok == 'ok'){
    	echo '<a target="_blank" href="'.$caminho."uploads/".$nomeArquivo.'">'.$_POST['descricaoArquivo'].'</a>';
    }
	else
	{
		echo "<script>alert('$ok')</script>";
	}
	die();
}
?>

