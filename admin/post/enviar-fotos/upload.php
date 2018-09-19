<?php
$nivel_diretorio = "../../../..";
//require_once("../../trava.php");
require_once("$nivel_diretorio/control/Post_Control.php");
$ponteiro = new Post_Control();

if($_SESSION['perPosts'] != 'OK')
	die('Acesso negado');


$arImg = util::envia_foto($_FILES['foto'],'../../../../uploads/');
util::trataImgGrande('../../../../uploads/'.$arImg['1'],1100,'0');
util::trataImgTumb('../../../../uploads/'.$arImg['1'],100,'r','1');
$file = $_FILES['foto'] ;
$dbRow = mssql_fetch_array($ponteiro->exeProcedureImgs('',$arImg['1'],$_POST['PST_Id'],$_POST['galeria_id'],'C',$_POST['PCI_Id']));
$ponteiro->criaXmlPost($_POST['PST_Id2'],'../../../../includes/xmls/');
echo '{"img":"'.$dbRow['IMX_Img'].'","name":"'.$dbRow['IMX_Id'].'"}';

?>
