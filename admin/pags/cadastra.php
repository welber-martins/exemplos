<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_arquivo.php");
$ponteiro = new arquivo();

$id = intval($_GET['id']);



/* ALTERANDO DADOS DA PAGINA */
if(isset($_POST['valida']))
{
	$ponteiro->carregaDados($_POST);
	$ok = true;	
	
	$name = time().rand(100,999);
	$tipo =  $ponteiro->verificaTipo($_FILES['arquivo']['name']);
	$arTipo = array('doc','docx','pdf');	
	$okF =  $ponteiro->enviaArquivo($_FILES['arquivo']['name'],$arTipo,$_FILES['arquivo']['tmp_name'],"../uploads/".$name.".$tipo");	
	if ($okF != "ok")
	{
		$ok = false;
		$msn .= "<li>".$okF."</li>";
	}	
	if ($ok)
	{			
		$ponteiro->arquivo = $name.".$tipo";
		$ponteiro->insert();
		header("location:cadastra.php?id=".$_POST['pags_id']."");	
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


        
        
        <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
        <div id="container-conteudo-holder">
        	
            <div class="titulo-pags">
            	Enviar arquivos
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
                            <p>Descrição do arquivo<span></span></p>
                            <input type="text" name="nome" id="nome" value="<?php echo $ponteiro->imprime($ponteiro->nome) ?>" />
                            <input type="hidden" name="pags_id" id="pags_id" value="<?php echo $_GET['id'] ?>" />
                        </li>
                        <li>
                            <p>Arquivo<span></span></p>
                            <input type="file" name="arquivo" id="arquivo" value="" />
                        </li>
                     </ul>
                </div>   
                
               	
                
                <div class="holder-btns">
                    <input type="image" src="../imgs/btn-cadastrar.jpg" alt="Cadastar" />
                </div>
            </form>
          </div>  
            
            
          
            
            
            



<!-- ============================= CONTAINER =================================== -->

<!--	====================================================================================================	 -->	
<!--	ARQUIVOS JAVASCRIPT	 -->
<!--	====================================================================================================	 -->
<script src="<?php echo $pre ?>jquery/jquery-1.4.4.min.js" type="text/javascript" ></script>
<script src="<?php echo $pre ?>jquery/jquery.colorbox-min.js" type="text/javascript" ></script>
<script src="<?php echo $pre ?>jquery/jquery.validate.js" type="text/javascript" ></script>
<script src="<?php echo $pre ?>jquery/add-video.js" type="text/javascript" ></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".example7").colorbox({width:"80%", height:"80%", iframe:true});				
});




$(document).ready(function(){
	$(".colorbox_galeria").colorbox({width:"500px", height:"70%", iframe:true});				
});

$(".colorbox_galeria").colorbox({					
	onClosed:function(){  window.location.reload(); }
});

$(document).ready(function(){
	$(".editar_galeria").colorbox({width:"750px", height:"250px", iframe:true});				
});

$(".editar_galeria").colorbox({					
	onClosed:function(){  window.location.reload(); }
});


$("a[rel='galeria1']").colorbox();


</script>

<script type="text/javascript"> 
$.validator.setDefaults({
	submitHandler: function() { $("#form_pags").submit(); }
});
 
$().ready(function() {
	$("#form_pags").validate({
		rules: {
			nome: {
				required: true,
				texto: 'titulo'			
			}/*,
			texto: {
				required: true,
				texto: 'titulo'			
			}*/
			
			
		},
		messages: {
			nome: "Por favor entre com o nome",
			texo: "Por favor entre com o texto da pagina"
		}
	});
});
</script> 
</body>
</html>