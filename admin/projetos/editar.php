<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_projetos.php");
$ponteiro = new projetos();



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
	
	if(empty($_POST['ensino_infantil']))
        $_POST['ensino_infantil'] = '2';

    if(empty($_POST['ensino_fundamental']))
        $_POST['ensino_fundamental'] = '2';

    
           
    $ponteiro->carregaDados($_POST);
	$ponteiro->update($_POST['id']);
	header("location:editar.php?id=".$_POST['id']."");	
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
            
            
            <form action="" name="form_pags" id="form_pags" method="post" enctype="multipart/form-data">
            	<input type="hidden" name="valida" id="valida" value="ok" />
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                 <div class="class-form-2">
                    <ul>                       
                        <li>
                            <p>Título<span></span></p>
                            <input type="text" name="titulo" id="titulo" value="<?php echo $ponteiro->imprime($ponteiro->titulo) ?>" />
                        </li>  
                     </ul>
                </div>
                <img src="../uploads/r<?php echo $ponteiro->foto ?>" alt="Capa">
                <p><a href="troca-foto.php?id=<?php echo $id ?>" class="troca_foto" title="Alterar capa">Alterar capa</a></p><br />
                <br />

                
                <div class="class-form-check">
                    <p>Para os Ensinos:<span></span></p>
                    <ul>                        
                        <li>
                            <input type="checkbox" name="ensino_infantil" id="ensino_infantil" value="1" <?php echo ($ponteiro->ensino_infantil == 1? 'checked="checked"':'')  ?>  />
                            Ensino Infantil 
                        </li>

                        <li>
                            <input type="checkbox" name="ensino_fundamental" id="ensino_fundamental" value="1" <?php echo ($ponteiro->ensino_fundamental == 1? 'checked="checked"':'')  ?> />
                            Ensino Fundamental 
                        </li>
                       
                    </ul>                 
                </div> 

                <div class="class-form-1-holder-editor">
                      <p>Descrição<span></span></p>
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
                                <li><a href="<?php echo $pre ?>upload.php" class="example7"  title="Enviar Foto"><img src="../imgs/btn-enviar-foto.jpg" alt="Enviar foto" /></a></li>
                                <li><a href="javascript:void(0)" onclick="abre_video();" title="Adicionar Vídeo"><img src="../imgs/btn-enviar-video.jpg" alt="Adicionar Vídeo" /></a></li>
                         </ul>
                    </div>
                </div>      

                <div class="holder-btns">
                	
                    <input type="image" src="../imgs/btn-cadastrar.jpg" alt="Cadastar" />
                </div>
            </form>
            
            
            
           
                
            </div>
            <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
            
            
            
        
</div>
        <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
        
    	
    
    
    
    </div>
    <!-- ============================= CONTAINER CONTEUDO =================================== -->


</div>
<!-- ============================= CONTAINER =================================== -->


</body>
</html>