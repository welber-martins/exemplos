<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_pags.php");
$ponteiro = new pags();



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
	header("location:index.php?id=".$_POST['id']."");	
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
                	<li>Cadastro de Texto</li>
                    <li><?php echo $ponteiro->imprime($ponteiro->nome) ?></li>
            	</ul>
            </div>
            
            <div class="opcoes">
            	<ul>
                	<li><a href="index.php?id=<?php echo $id ?>" title="Alterar">Alterar</a></li>
                </ul>
            </div>
            <!-- ============================= CONTAINER CONTEUDO HOLDER NAVEGAÇÃO =================================== -->
           
           
            <div class="titulo-pags">
            	<?php echo $ponteiro->imprime($ponteiro->nome) ?>
            </div>
            
            
            <form action="" name="form_pags" id="form_pags" method="post" enctype="application/x-www-form-urlencoded">
            	<input type="hidden" name="valida" id="valida" value="ok" />
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                <div class="class-form-1">
                    <?php 
                    if($id >= 1 && $id <= 5)
                    {
                    ?>
                    <li>
                        <p>Título de página(SEO)<span></span></p>
                        <input type="text" name="nome" id="nome" value="<?php echo $ponteiro->imprime($ponteiro->nome) ?>" />
                    </li> 
                    
                   
                    <li>
                        <p>Descrição(SEO)<span></span></p>                        
                        <textarea name="keyword" id="keyword"><?php echo $ponteiro->imprime($ponteiro->keyword) ?></textarea>
                    </li>
                     
                    <?php
                    }
                    ?>
                    <?php 
					if($id == 1 || $id == 2)
					{
					?>
                        <li>
                            <p>Link do vídeo da página<span></span></p>                        
                            <input type="text" name="video" id="video" value="<?php echo $ponteiro->imprime($ponteiro->video) ?>" />
                        </li> 
                    <?php
					}
					?>
                   
                    
                   <div class="class-form-1-holder-editor">
                      <p>Conteúdo da página<span></span></p>
                          <textarea name="texto" id="texto"><?php echo $ponteiro->imprime($ponteiro->texto) ?></textarea>
                            <script type="text/javascript">
                            //<![CDATA[
                        
                                CKEDITOR.replace( 'texto',
                                    {
                                        skin : 'kama'
                                    });
                        
                            //]]>
                        	</script>
                       <div class="class-form-1-holder-editor-opcoes">
                       		<ul>
                                <li><a href="javascript:void(0)" onclick="abre_foto();" title="Enviar Foto"><img src="../imgs/btn-enviar-foto.jpg" alt="Enviar foto" /></a></li>
                                <li><a href="javascript:void(0)" onclick="abre_video();" title="Adicionar Vídeo"><img src="../imgs/btn-enviar-video.jpg" alt="Adicionar Vídeo" /></a></li>
                                <li><a href="javascript:void(0)" onclick="abre_arquivo();" title="Adicionar Arquivo"><img src="../imgs/btn-arquivo.jpg" alt="Adicionar Vídeo" /></a></li>
                            </ul>
                       </div>
                    </div>
                
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

<!--	====================================================================================================	 -->	
<!--	ARQUIVOS JAVASCRIPT	 -->
<!--	====================================================================================================	 -->



</body>
</html>