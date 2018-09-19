<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_modelo_aparelho.php");
$ponteiro = new modelo_aparelho();


/* CARREGANDO DADOS DA PAGINA */
if(isset($_GET['id']))
{
	$id = intval($_GET['id']);
	$ponteiro->carregaDadosPorId($id);	
}
/* CARREGANDO DADOS DA PAGINA */



/* ALTERANDO DADOS DA PAGINA */
if(isset($_POST['valida']))
{
	$ponteiro->carregaDados($_POST);
	$ponteiro->update($_POST['id']);
	echo "<script> alert('Cadastrado com sucesso'); location.href='listar.php'</script>";
	
}
/* ALTERANDO DADOS DA PAGINA */



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"/>
<link rel="stylesheet" href="../css/colorbox.css" type="text/css" media="all"/>
<script src="<?php echo $pre ?>ckeditor.js" type="text/javascript" ></script>
<?php require_once("../includes/head.php") ?>


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
                	<li>Modelos</li>
                    <li>Editar</li>
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
            	<?php echo utf8_encode($ponteiro->_nomePag) ?>
            </div>
             <div class="holder-erro">
                <ul>
                    <?php //echo $msn ?>
                </ul>
            </div>
            
            <form action="" name="form_pags" id="form_pags" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="valida" id="valida" value="ok" />
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                 <div class="class-form-2">
                    <ul>
                       
                        <li>
                            <p>Tipo de Aparelho<span></span></p>
                            <select name="tipo_aparelho_id" id="tipo_aparelho_id">
                            	<option value="">Selecione o tipo de aparelho</option>
                                <?php
								require_once("../classes/class_tipo_aparelho.php");
								$ponteiroCombo = new tipo_aparelho();
								$arDadosCombo = $ponteiroCombo->select('',' and status = 1');
								if($arDadosCombo != 0) 
								{
									foreach($arDadosCombo as $dbRowCombo)
									{
								?>
                                	<option value="<?php echo $dbRowCombo['tipo_aparelho_id'] ?>" <?php echo ($ponteiro->tipo_aparelho_id == $dbRowCombo['tipo_aparelho_id'] ? 'selected="selected"':'') ?>><?php echo $ponteiroCombo->imprime($dbRowCombo['nome']) ?></option>
                                <?php
									}
								}
								?>
                            </select>
                        </li>
                        <li>
                            <p>Marca<span></span></p>
                            <select name="marca_id" id="marca_id">
                            	<option value="">Selecione a marca</option>
                                <?php
								require_once("../classes/class_marca.php");
								$ponteiroCombo = new marca();
								$arDadosCombo = $ponteiroCombo->select('',' and status = 1');
								if($arDadosCombo != 0) 
								{
									foreach($arDadosCombo as $dbRowCombo)
									{
								?>
                                	<option value="<?php echo $dbRowCombo['marca_id'] ?>" <?php echo ($ponteiro->marca_id == $dbRowCombo['marca_id'] ? 'selected="selected"':'') ?>><?php echo $ponteiroCombo->imprime($dbRowCombo['nome']) ?></option>
                                <?php
									}
								}
								?>
                            </select>
                        </li>
                        <li>
                            <p>Modelo<span></span></p>
                            <input type="text" name="nome" id="nome" value="<?php echo $ponteiro->imprime($ponteiro->nome) ?>" />
                        </li>
                     </ul>
                </div>                 
                <div class="holder-btns">                	
                    <input type="image" src="../imgs/btn-cadastrar.jpg" alt="Cadastar" />
                </div>
            </form>
            
            
            
          
            
            
            
        
</div>
        <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
        
    	
    
    
    
    </div>
    <!-- ============================= CONTAINER CONTEUDO =================================== -->


</div>
<!-- ============================= CONTAINER =================================== -->




</body>
</html>