<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_tv.php");
$ponteiro = new tv();




$msn = '';
/* ALTERANDO DADOS DA PAGINA */
if(isset($_POST['valida']))
{
	$ponteiro->carregaDados($_POST);
	$ok = true;	
	$arImg = $ponteiro->envia_foto($_FILES['foto'],'../uploads/');
	if ($arImg['0'])
	{
		$ponteiro->trataImgGrande('../uploads/'.$arImg['1'],700,'1');
		$ponteiro->trataImgTumb('../uploads/'.$arImg['1'],400,'r','1');		
	}
	else
	{
		$ok = false;
		$msn .= "<li>".$arImg['1']."</li>";
	}

   
    
    if(!empty($_FILES['foto_fundo']['name']))
    {
         $arImg2 = $ponteiro->envia_foto($_FILES['foto_fundo'],'../uploads/');
        if ($arImg2['0'])
        {
            $ponteiro->trataImgFixo('../uploads/'.$arImg2['1'],1920,613);
            $ponteiro->foto_fundo = $arImg2['1'];   
        }
        else
        {
            $ok = false;
            $msn .= "<li>".$arImg2['1']."</li>";
        }
    }
    
	
	if($ok)
	{
		
        $ponteiro->foto = $arImg['1'];        
		$id = $ponteiro->insert();
		header("location:edit_capa.php?id=".$id."");
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
<script src="../jquery/sample.js" type="text/javascript"></script>
<link href="../css/sample.css" rel="stylesheet" type="text/css" />
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
                	<li><?php echo $ponteiro->imprime($ponteiro->_nomePag) ?></li>
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
            	<?php echo $ponteiro->imprime($ponteiro->_nomePag) ?>
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
                            <p>Título<span></span></p>
                            <input type="text" name="titulo" id="titulo" value="<?php echo $ponteiro->imprime($ponteiro->titulo) ?>" />
                        </li>
                        <li>
                            <p>Data<span></span></p>
                            <input type="text" name="data" id="data" class="mascaraData" value="<?php echo $ponteiro->formataData($ponteiro->data,'exibir') ?>" />
                        </li> 
                        <li>
                            <p>Link<span></span></p>
                            <input type="text" name="link" id="link" value="<?php echo $ponteiro->imprime($ponteiro->link) ?>" />
                        </li>                                          
                        <li>
                            <p>Foto<span></span></p>
                            <input type="file" name="foto" id="foto" value="" />
                        </li>
                        <li>
                            <p>Foto Fundo<span>Tamanho ideal: 1920px X 610px</span></p>
                            <input type="file" name="foto_fundo" id="foto_fundo" value="" />
                        </li>
                     </ul>
                </div> 
                
                

                <div class="class-form-1">
                      <p>Descrição<span></span></p>
                       <textarea name="texto" id="texto"><?php echo $ponteiro->imprime($ponteiro->texto) ?></textarea>    
                       <br><br>                     
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