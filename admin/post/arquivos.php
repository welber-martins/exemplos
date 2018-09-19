<?php
$nivel_diretorio = "../../..";
//require_once("../../trava.php");
require_once("$nivel_diretorio/control/Post_Control.php");
$ponteiro = new Post_Control();

if($_SESSION['perPosts'] != 'OK')
	die('Acesso negado');

if(isset($_GET['PST_Id']))
	$PST_Id  =  intval(base64_decode($_GET['PST_Id']));	
else
	die('Post ID Ausente');

if(isset($_POST['PSA_Descricao']))
{
	if(!empty($_POST['PSA_Id']) && empty($_FILES['PSA_Arquivo']['name']))
	{
		$arquivo = $_POST['PSA_ArquivoEdit'];		
	}
	else
	{
		$arquivo = Util::upload_arquivo("../../../uploads", $_FILES['PSA_Arquivo']);
	}
	
	$dbRowResposta = mssql_fetch_array($ponteiro->exeProcedureAnexo(	$_POST['PSA_Id'],
																		$_POST['PSA_Descricao'],
																		$arquivo,
																		'' ,
																		'',																		
																		$PST_Id,
																		'C'));
	if($dbRowResposta['Res'] == 'OK')
	{
		echo "<script>alert('Cadastrado com sucesso'); location.href='arquivos.php?PST_Id=".$_GET['PST_Id']."'</script>";
	}	
	
}


if(isset($_GET['acao']))
{
	$acao = base64_decode($_GET['acao']);
	$id = base64_decode($_GET['PSA_Id']);
	if($acao == 'edit')
	{
		$_POST = mssql_fetch_array($ponteiro->exeProcedureAnexo($id,'','','','','','P'));		
	}
	
	if($acao == 'del')
	{
		$ponteiro->exeProcedureAnexo($id,'','','','','','D');
		echo "<script>alert('Deletado com sucesso'); location.href='arquivos.php?PST_Id=".$_GET['PST_Id']."'</script>";	
	}
}

$ponteiro->criaXmlPost($PST_Id,'../../../includes/xmls/');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all"/>
    <?php require_once("../includes/head.php"); ?>  
      <script type="text/javascript">
	  // When the document is ready set up our sortable with it's inherant function(s)
	  $(document).ready(function() {
		$("#test-list").sortable({
		  handle : '.handle',
		  update : function () {
			var order = $('#test-list').sortable('serialize');
			$("#info").html('Atualizando');
			$("#info").load("ordemArquivo.php?"+order+"PST_Id=<?php echo $PST_Id ?>",'',function(){$("#info").html('Atualizado');});
		  }
		});
	});
	</script>
   
    
    
</head>



<body class="bg-sem">


        	
            
<div style="width:690px; overflow:hidden; margin:0px auto; padding:0px">		
    <form action="" name="frmAnexo" id="frmAnexo" onsubmit="validaFormulario('frmAnexo'); return false;" method="post" enctype="multipart/form-data">                
		<?php $ponteiro->formularioAnexos($_POST);  ?>    
        <div class="holder-btns">
            <input type="image" src="../imgs/btn-cadastrar.jpg" alt="Cadastar" />
        </div>
    </form>
    
    <br />
    
    <div class="titulo-pags">
        Cadastros 
    </div>
    
    <div id="info" style="display:none">Waiting for update</div>
    
    
    <ul id="test-list">
        <?php
        $dbResultLista =  $ponteiro->exeProcedureAnexo('','','','','',$PST_Id,'P');
        if(mssql_num_rows($dbResultLista) != 0)
        {
           while($dbRowLista = mssql_fetch_array($dbResultLista))
           {
        ?> 	
                <li id="listItem_<?php echo $dbRowLista['PSA_Id'] ?>">                            	
                    <table width="100%" border="0" cellpadding="5" cellspacing="5">
                      <tr>
                        <td width="6%"><img src="../imgs/arrow.png" alt="move" width="16" height="16" class="handle" /></td>
                        <td width="65%"><a href="../../../uploads/<?php echo $dbRowLista['PSA_Arquivo']  ?>" target="_blank" title="Arquivo Cadastrado"><?php util::imprime($dbRowLista['PSA_Descricao'])  ?></a></td>
                        <td width="5%">
                             <a href="?acao=<?php echo base64_encode('edit'); ?>&PSA_Id=<?php echo base64_encode($dbRowLista['PSA_Id']); ?>&PST_Id=<?php echo $_GET['PST_Id'] ?>" title="Editar">
                                  <img src="../imgs/Comment-edit-64.jpg" alt="Editar" />
                              </a>
                         </td>
                        <td width="5%" align="center">
                            <a href="?PSA_Id=<?php echo base64_encode($dbRowLista['PSA_Id']) ?>&acao=<?php echo base64_encode('del') ?>&PST_Id=<?php echo $_GET['PST_Id'] ?>" onclick="return confirm('Deseja mesmo deletar?')" title="Deletar?">
                                <img src="../imgs/Comment-delete-64.jpg" alt="Retirar dos selecionados" />
                            </a>
                        </td>
                      </tr>
                    </table>
                </li>
          <?php
           }
        }
        ?>
    </ul>
</div>

</body>
</html>