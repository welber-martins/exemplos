<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_marca.php");
$ponteiro = new marca();
$arDados = $ponteiro->select();
if(isset($_GET['acao']) && isset($_GET['id']))
{
	if($_GET['acao'] == "del")
	{
		$ponteiro->del($_GET['id']);
		header("location:listar.php");
	}
	if($_GET['acao'] == "exibir")
	{
		$ponteiro->exibir($_GET['id']);	
		header("location:listar.php");
	}
}
if(isset($_POST['listagem_del']))
{
	$ponteiro->deleteGrupo($_POST['listagem_del']);
	header("location:listar.php");	
}
if (isset($_POST['listagem_ordem']))
{
    $ponteiro->upOrdem($_POST['listagem_ordem']);
	header("location:listar.php");
}





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"/>
<link rel="stylesheet" href="../css/colorbox.css" type="text/css" media="all"/>
<script src="<?php echo $pre ?>ckeditor.js" type="text/javascript" ></script>
<?php require_once("../includes/head.php") ?>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
	$("#selecionar_todos").toggle(function(){
		$(".tabela-holder input[type=checkbox]").each(function(){this.checked = true;});
	},function(){
		$("input[type=checkbox]").each(function(){this.checked = false;});
	});
});	
</script>
</head>

<body>
<!-- ============================= CONTAINER =================================== -->
<div id="container">
	
   	<!-- ============================= CONTAINER LATERAL =================================== -->
    <?php require_once("../includes/add-video.php") ?>
    <!-- ============================= CONTAINER LATERAL =================================== -->
	
    
    <!-- ============================= CONTAINER LATERAL =================================== -->
    <?php require_once("../includes/lateral.php") ?>
    <!-- ============================= CONTAINER LATERAL =================================== -->
    
    
    <!-- ============================= CONTAINER CONTEUDO =================================== -->
    <div id="container-conteudo">
    	
        <!-- ============================= CONTAINER CONTEUDO TOPO =================================== -->
        <?php require_once("../includes/topo.php") ?>
        <!-- ============================= CONTAINER CONTEUDO TOPO =================================== -->
        
        
        <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
        <div id="container-conteudo-holder">
        	
            
            <!-- ============================= CONTAINER CONTEUDO HOLDER NAVEGAÇÃO =================================== -->
            <div class="onde">
            	<ul>
                	<li><?php echo $ponteiro->imprime($ponteiro->_nomePag) ?></li>
                    <li>Listar</li>
            	</ul>
            </div>
            
            <div class="opcoes">
            	<ul>
                	<li><a href="index.php" title="Cadastrar">Cadastrar</a></li>
                	<li><a href="listar.php" title="Listar">Listar</a></li>
                </ul>
            </div>
            <!-- ============================= CONTAINER CONTEUDO HOLDER NAVEGAÇÃO =================================== -->
            
            <div class="titulo-pags">
            	<?php echo $ponteiro->imprime($ponteiro->_nomePag) ?>
            </div>
            
            <?php
			if($arDados != 0)
			{
			?>
            <form action="" method="post" name="form_listagem" id="form_listagem" enctype="multipart/form-data">
            <div class="tabela-holder">
            
            	<table cellpadding="2" cellspacing="3"> 
                    <thead> 
                        <tr> 
                            <th width="446" height="32">TÍTULO</th> 
                            <th width="41">EXIBIR</th> 
                            <th width="37">EDITAR</th> 
                            <th width="52">DELETAR</th>                             
                        </tr> 
                    </thead> 
                    <tbody> 
                       <?php
					   foreach ($arDados as $dbRow)
					   {
					   ?>
                        <tr> 
                            <td class="titulo-componente-tabela"><?php echo $ponteiro->imprime($dbRow['nome']) ?></td> 
                            <td align="center"><a href="?acao=exibir&id=<?php echo $dbRow[$ponteiro->_nomeChave] ?>" title="<?php echo ($dbRow['status'] == 1 ? 'Desativar':'Ativar') ?>"  onclick="return confirm('deseja mesmo <?php echo ($dbRow['status'] == 1 ? 'Desativar':'Ativar') ?>?')"><img src="../imgs/Comment-<?php echo ($dbRow['status'] == 1 ? 'remove':'add') ?>-64.jpg" alt="<?php echo ($dbRow['status'] == 1 ? 'Desativar':'Ativar') ?>" /></a></td> 
                            <td align="center"><a href="editar.php?id=<?php echo $dbRow[$ponteiro->_nomeChave] ?>" title="Editar"><img src="../imgs/Comment-edit-64.jpg" alt="Editar" /></a></td> 
                            <td align="center"><a href="?acao=del&id=<?php echo $dbRow[$ponteiro->_nomeChave] ?>" onclick="return confirm('deseja mesmo deletar?')" title="Deletar"><img src="../imgs/Comment-delete-64.jpg" alt="Deletar" /></a></td> 
                        </tr>
                        <?php
					   }
						?>
                    </tbody> 
                </table> 
          	</div>
            
            <div class="tabela-fundo">
            	&nbsp;
            </div>
            </form>
            <?php
			}
			else
				echo "<h1>Nenhum resultado cadastrado</h1>";
			?>
            
	  </div>
        <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
        
    </div>
    <!-- ============================= CONTAINER CONTEUDO =================================== -->
</div>
<!-- ============================= CONTAINER =================================== -->


</body>
</html>