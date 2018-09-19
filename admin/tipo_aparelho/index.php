<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_tipo_aparelho.php");
$ponteiro = new tipo_aparelho();

/* ALTERANDO DADOS DA PAGINA */
if(isset($_POST['valida']))
{
	$ponteiro->carregaDados($_POST);
	$ponteiro->insert();
	echo "<script> alert('Cadastrado com sucesso'); location.href='index.php'</script>";
	
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
<script type="text/javascript"> 
$.validator.setDefaults({
	submitHandler: function() { $("#form_pags").submit(); }
});
 
$().ready(function() {
	$("#form_pags").validate({
		rules: {
			nome: "required",			
		},
		messages: {
			nome: "Por favor entre com o nome",			
		}
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
                	<li>Cadastro de Tipo de Aparelho</li>
                    <li>Cadastrar</li>
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
                 <div class="class-form-2">
                    <ul>
                        <li>
                            <p>Tipo de Aparelho<span></span></p>
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