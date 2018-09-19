<?php
$nivel_diretorio = "../../..";
require_once("../../trava.php");
require_once("$nivel_diretorio/control/Post_Control.php");
$ponteiro = new Post_Control();

$_SESSION['perPosts'] = 'OK';

if(isset($_POST['PST_Titulo']))
{
	if(!empty($_POST['PST_Id']) && empty($_FILES['PST_Img']['name']))
	{
		$arImg['0'] = true;
		$arImg['1'] = $_POST['PST_ImgEdit'];		
	}
	else
		$arImg = util::envia_foto($_FILES['PST_Img'],'../../../uploads/');
		
	if ($arImg['0'])
	{
		util::trataImgGrande('../../../uploads/'.$arImg['1'],700,'1');
		$dbRowResposta = mssql_fetch_array($ponteiro->exeProcedure(		$_POST['PST_Id'],
																		$_POST['PST_Titulo'],
																		$_POST['PST_Texto'],
																		util::formata_data($_POST['PST_Data'],'banco').'  '.$_POST['PST_Hora'].':00' ,
																		$arImg['1'],																		
																		$_POST['PCT_Id'],
																		'',
																		'C'));
		
		if($dbRowResposta['Res'] == 'OK')
		{
			
			$ponteiro->criaXmlPost($dbRowResposta['PST_Id'],'../../../includes/xmls/');
			if(!empty($_FILES['PST_Img']['name']))
				header("Location:edit_foto.php?PST_Id=".base64_encode($dbRowResposta['PST_Id']));				
			else
				echo "<script>alert('Cadastrado com sucesso'); location.href='index.php'</script>";
		}	
	}
	else
	{
		echo "<script>alert('".$arImg['1']."'); </script>";	
	}		
}


if(isset($_GET['acao']))
{
	$acao = base64_decode($_GET['acao']);
	$id = base64_decode($_GET['PST_Id']);
	if($acao == 'edit')
	{
		$_POST = mssql_fetch_array($ponteiro->exeProcedure($id,'','','','','','','P'));		
	}
	
	if($acao == 'del')
	{
		$ponteiro->exeProcedure($id,'','','','','','','D');
		echo "<script>alert('Deletado com sucesso'); location.href='index.php'</script>";	
	}
}

$ponteiro->criaXmlLista('../../../includes/xmls/');
$ponteiro->criaXmlGaleria('../../../includes/xmls/');
$ponteiro->criaXmlGaleriaImgs('../../../includes/xmls/');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all"/>
    <?php require_once("../includes/head.php"); ?>  
     <script src="../../../jquery/ckeditor/ckeditor.js" type="text/javascript" ></script> 
     <script src="../js/jquery.form.min.js" type="text/javascript" ></script>  
 
    <script type="text/javascript">
	  // When the document is ready set up our sortable with it's inherant function(s)
	  $(document).ready(function() {
			$("#test-list").sortable({
			  handle : '.handle',
			  update : function () {
				var order = $('#test-list').sortable('serialize');
				$("#info").html('Atualizando');
				$("#info").load("process-sortable.php?"+order,'',function(){$("#info").html('Atualizado');});
			  }
			});
		});
		function envia_video()
		{
			// Get the editor instance that we want to interact with.
			var oEditor = CKEDITOR.instances.PST_Texto;			
			var texto = "";
			texto = "<p>&nbsp;</p><div align='center'>";
			texto += $("#video").val();
			texto += "</div><p>&nbsp;</p>";
			$("#video").val("");
			// Check the active editing mode.
			if ( oEditor.mode == 'wysiwyg' )
			{
				// Insert the desired HTML.
				oEditor.insertHtml( texto );
				fecha_video();
			}
			else
				alert( 'You must be on WYSIWYG mode!' );
		}
		function abre_video()
		{
			$("#div-video-post").fadeIn('500');	
		}
		function fecha_video()
		{
			$("#div-video-post").fadeOut('500');	
		}
		function abre_foto()
		{
			$("#div-foto-post").fadeIn('500');	
		}
		function fecha_foto()
		{
			$("#div-foto-post").fadeOut('500');	
		}
	</script>
     <script type="text/javascript">
	 $(document).ready(function(){
		  $('#imagem').live('change',function(){ 
		  		$('#recebe-foto').html('<img src="ajax-loader.gif" alt="Enviando..."/> Enviando...');		   		
		   		$('#recebe-foto').html('');
				$('#formulario').ajaxForm({ 
											target:'#recebe-foto', 
												success:    function() { 
													var oEditor = CKEDITOR.instances.PST_Texto;			
													if ( oEditor.mode == 'wysiwyg' )
													{
														// Insert the desired HTML.
														oEditor.insertHtml($("#recebe-foto").html());
														fecha_foto();
													}
													else
														alert( 'You must be on WYSIWYG mode!' );	 
												} 
											}
				
				).submit(); 
				
				
			}); 
		}); 
   </script>
   
    
    
</head>



<body>

<!-- ============================= CONTAINER =================================== -->
<div id="container">
    
    <div id="recebe-foto" style="display:none;" ></div>
    <div id="div-video-post" class="holder-add-video-holder">
        <div class="holder-add-video">
           <div class="holder-add-video-btn">
                 <img src="../imgs/btn-fechar.jpg" alt="Fechar" onclick="fecha_video();" />
           </div>
            
            <div class="class-form-1">
                <div class="class-form-1-holder">
                  <p>Colar código do vídeo<span>emblend</span></p>
                  <textarea name="video"  style="width:500px;" id="video"></textarea>
                </div>
            </div>
            
            <div class="holder-add-video-btn">
                <img src="../imgs/btn-enviar.jpg" alt="Enviar" onclick="envia_video();" />
            </div>
              
        </div>
    </div>
    
     <div id="div-foto-post" class="holder-add-video-holder">
        <div class="holder-add-video">
           <div class="holder-add-video-btn">
                 <img src="../imgs/btn-fechar.jpg" alt="Fechar" onclick="fecha_foto();" />
           </div>            
            <form id="formulario" method="post" enctype="multipart/form-data" action="upload.php">                
                Foto somente em jpg <input type="file" id="imagem" name="imagem" /> 
            </form>
              
        </div>
    </div>
    
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
        	
            
			
           <form action="" name="frmFVC" id="frmFVC" onsubmit="validaFormulario('frmFVC'); return false;" method="post" enctype="multipart/form-data">                
               <?php $ponteiro->formulario($_POST);  ?> 
               <div >
               		 <ul>
                        <li style="float:left; margin:0 20px 0 0;"><a href="javascript:void(0)" onclick="abre_foto();"  title="Enviar Foto"><img src="../imgs/btn-enviar-foto.jpg" alt="Enviar foto" /></a></li>
                        <li><a href="javascript:void(0)" onclick="abre_video();" title="Adicionar Vídeo"><img src="../imgs/btn-enviar-video.jpg" alt="Adicionar Vídeo" /></a></li>
                    </ul>
               </div>
                  
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
                    $dbResultLista =  $ponteiro->exeProcedure('','','','','','','','P');
                    if(mssql_num_rows($dbResultLista) != 0)
                    {
                       while($dbRowLista = mssql_fetch_array($dbResultLista))
                       {
                    ?> 	
                            <li id="listItem_<?php echo $dbRowLista['PST_Id'] ?>">                            	
                                <table width="100%" border="0" cellpadding="5" cellspacing="5">
                                  <tr>
                                    <td width="6%"><img src="../imgs/arrow.png" alt="move" width="16" height="16" class="handle" /></td>
                                    <td width="65%"><?php util::imprime($dbRowLista['PST_Id'].' - '.$dbRowLista['PST_Titulo'])  ?></td>
                                     
                                     <td width="5%">
                                     	 <a href="enviar-fotos/index.php?PST_Id=<?php echo base64_encode($dbRowLista['PST_Id']); ?>" class="acessos" title="Enviar Fotos">
                                              <img src="../imgs/file_upload-32.jpg" alt="Anexar Arquivos" />
                                          </a>
                                     </td>
                                     
                                     <td width="5%">
                                     	 <a href="arquivos.php?PST_Id=<?php echo base64_encode($dbRowLista['PST_Id']); ?>" class="acessos" title="Anexar Arquivos">
                                              <img src="../imgs/envia_pdf.jpg" alt="Anexar Arquivos" />
                                          </a>
                                     </td>
                                    
                                    <td width="5%">
                                     	 <a href="?acao=<?php echo base64_encode('edit'); ?>&PST_Id=<?php echo base64_encode($dbRowLista['PST_Id']); ?>" title="Editar">
                                              <img src="../imgs/Comment-edit-64.jpg" alt="Editar" />
                                          </a>
                                     </td>
                                    <td width="5%" align="center">
                                    	<a href="?PST_Id=<?php echo base64_encode($dbRowLista['PST_Id']) ?>&acao=<?php echo base64_encode('del') ?>" onclick="return confirm('Deseja mesmo deletar?')" title="Deletar?">
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
        <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
        
    	
    
    
    
    </div>
    <!-- ============================= CONTAINER CONTEUDO =================================== -->


</div>
<!-- ============================= CONTAINER =================================== -->


</body>
</html>