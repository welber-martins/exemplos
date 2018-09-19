<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_user.php");
require_once("../classes/class_modulo.php");
$ponteiro = new user();
$ponteiroM = new modulo();



 $msn = '';
 $ok = true;
/* ALTERANDO DADOS DA PAGINA */
if(isset($_POST['valida']))
{
	if(strlen($_POST['nome']) < 4 ){
        $ok = false;
        $msn .= "<li>NOME INVÁLIDO</li>";
    }
    
    if(strlen($_POST['email']) < 4 ){
        $ok = false;
        $msn .= "<li>LOGIN INVÁLIDO</li>";
    }

    if(strlen($_POST['senha']) < 4 ){
        $ok = false;
        $msn .= "<li>SENHA INVÁLIDO</li>";
    }

    if($_POST['senha'] != $_POST['senha2']){
        $ok = false;
        $msn .= "<li>SENHAS DIFERENTES</li>";
    }

    if($ok){
        $ponteiro->carregaDados($_POST);
        $id = $ponteiro->insert();
        $ponteiro->insertVinculo($id,'user_id',$_POST['modulo'],'user_modulo');
        header("location:listar.php");
    }
    	
	
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
                	<li>Cadastro de e-mail</li>
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
                    <?php echo $msn ?>
                </ul>
            </div>
            
            <form action="" name="form_pags" id="form_pags" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="valida" id="valida" value="ok" />
                 <div class="class-form-2">
                    <ul>
                        <li>
                            <p>Nome<span></span></p>
                            <input type="text" name="nome" id="nome" value="<?php echo $ponteiro->imprime($ponteiro->nome) ?>" />
                        </li>
                        <li>
                            <p>Login<span></span></p>
                            <input type="text" name="email" id="email" value="<?php echo $ponteiro->imprime($ponteiro->email) ?>" />
                        </li>
                      <li>
                        <p>Senha<span></span></p>
                          <input type="password" name="senha" id="senha" value="" />
                        </li>
                      <li>
                        <p>Confirmar senha<span></span></p>
                          <input type="password" name="senha2" id="senha2"  />
                        </li>
                     </ul>
                </div> 
                

                <div class="class-form-check">
                    <p>Permissões:<span></span></p>
                    <ul>
                        <?php                        
                        $arDadosT  = $ponteiroM->select();
                        if($arDadosT != 0)
                        {
                            foreach($arDadosT as $dbRowT)
                            {
                        ?>
                        <li>
                            <label>
                            <input type="checkbox" name="modulo[]" id="modulo[]" value="<?php echo $ponteiro->imprime($dbRowT['modulo_id']) ?>" />
                            <?php echo $ponteiro->imprime($dbRowT['nome']) ?>
                            </label>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>                 
                </div> 
                
                
             
                
                <div class="holder-btns">
                	<input type="hidden" name="data" id="data" value="<?php echo date("Y-m-d")?>"  />
                    <input type="hidden" name="acessos" id="acessos" value="0"  />
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