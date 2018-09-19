<?php
$nivel_diretorio = "../../../..";
//require_once("../../trava.php");
require_once("$nivel_diretorio/control/Post_Control.php");
$ponteiro = new Post_Control();





if($_SESSION['perPosts'] != 'OK')
	die('Acesso negado');

if(isset($_GET['PST_Id']))
	$PST_Id  =  intval(base64_decode($_GET['PST_Id']));	
else
	die('Post ID Ausente');
	
if(isset($_POST['GAL_Descricao']))
{
	$ponteiro->exeProcedureGaleria($_POST['GAL_Id'],$_POST['GAL_Descricao'],'C');
	header("Location:index.php?PST_Id=".$_GET['PST_Id']);		
}

if(isset($_POST['PCI_Descricao']))
{
	$ponteiro->exeProcedureCategoriaImgs($_POST['PCI_Id'],$PST_Id,$_POST['PCI_Descricao'],'C');
	$ponteiro->criaXmlPost($PST_Id,'../../../../includes/xmls/');
	header("Location:index.php?PST_Id=".$_GET['PST_Id']);		
}

if(isset($_GET['acao']))
{
	$acao = base64_decode($_GET['acao']);
	if($acao == 'editCat')	
	{
		$GAL_Id  =  intval(base64_decode($_GET['GAL_Id']));	
		$dbRowCat = mssql_fetch_array($ponteiro->exeProcedureGaleria($GAL_Id,'','P'));	
	}
	$acao = base64_decode($_GET['acao']);
	if($acao == 'editCatGal')	
	{
		$PCI_Id  =  intval(base64_decode($_GET['PCI_Id']));	
		$dbRowCatGal = mssql_fetch_array($ponteiro->exeProcedureCategoriaImgs($PCI_Id,'','','P'));
			
	}
	if($acao == 'deletarCatPostGal')	
	{
		$PCI_Id  =  intval(base64_decode($_GET['PCI_Id']));	
		$ponteiro->exeProcedureCategoriaImgs($PCI_Id,'','','D');
		$ponteiro->criaXmlPost($PST_Id,'../../../../includes/xmls/');
		header("Location:index.php?PST_Id=".$_GET['PST_Id']);
	}
	
	
	
}
	
if(isset($_POST['del']))
{	
	$ids = '';
	foreach ($_POST['galeriaImg'] as $id => $img)
	{
		$ids .= $id.', ';
		unlink('../../../../uploads/'.$img);
		unlink('../../../../uploads/r'.$img);		
	}
	$ponteiro->exeProcedureImgs('',$ids,'','','D');
	$ponteiro->criaXmlPost($PST_Id,'../../../../includes/xmls/');
	header("Location:index.php?PST_Id=".$_GET['PST_Id']);
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enviar Fotos</title>
<link rel="stylesheet" href="../../css/style.css" type="text/css" media="all"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" id="theme">
<link rel="stylesheet" href="../../css/jquery.fileupload-ui.css">
</head>


<body class="bg-sem">

<div style="width:690px; overflow:hidden; margin:0px auto; padding:0px">
	<div style="margin:20px auto">
    	<h1 style="margin-bottom:10px">Enviar fotos também para a(s) galeria(s):</h1>
    	
         <a href="javascript:void(0)" title="Adiconar nova categoria." id="link-nova-categoria" style="margin-left:5px;">Adiconar nova categoria.</a>
         <div style="padding:5px; <?php echo ($acao == 'editCat' ? '':'display:none;') ?> " id="div-nova-categoria">
            <form action="?PST_Id=<?php echo $_GET['PST_Id'] ?>" name="addCat" id="addCat" method="post">
                <input type="text" name="GAL_Descricao" id="GAL_Descricao" placeholder="DESCRIÇÃO DA CATEGORIA" value="<?php echo $dbRowCat['GAL_Descricao'] ?>" style="width:400px; height:40px;" />
                <input type="hidden" name="GAL_Id" value="<?php echo $dbRowCat['GAL_Id'] ?>" id="GAL_Id" />
                <input type="submit" value="OK"  style=" height:46px; width:50px;" /><br /><br />
            </form>
        </div>
        <ul style="width:690px; overflow:hidden; ">
        	
			<?php
			$dbResultaGal = $ponteiro->exeProcedureGaleria('','','P');
			if(mssql_num_rows($dbResultaGal) != 0)
			{
				while($dbRowGal = mssql_fetch_array($dbResultaGal))
				{
			?>            
            		<li style="float:left; width:330px; margin:5px; border:1px #CCCCCC solid">
                    	  
                        <table width="100%" border="0" cellpadding="0">
                          <tr>
                            <td width="78%"><input type="checkbox"  name="galeria-<?php echo $dbRowGal['GAL_Id'] ?>" value="<?php echo $dbRowGal['GAL_Id'] ?>"><?php util::imprime($dbRowGal['GAL_Descricao']) ?></td>
                            <td width="11%"><a href="?PST_Id=<?php echo $_GET['PST_Id'] ?>&GAL_Id=<?php echo base64_encode($dbRowGal['GAL_Id'])  ?>&acao=<?php echo base64_encode('editCat') ?>" title="Editar"><img src="../../imgs/Comment-edit-64.jpg"></a></td>
<!--                            <td width="11%"><a href="?PST_Id=<?php echo $_GET['PST_Id'] ?>&GAL_Id=<?php echo base64_encode($dbRowGal['GAL_Id'])  ?>&acao=<?php echo base64_encode('delCat') ?>" title="Delete"><img src="../../imgs/Comment-delete-64.jpg"></a></td>
-->                          </tr>
                        </table>

                    </li>
            <?php
				}
			}
			?>
          
        </ul>
    </div>	
    

	
    <a href="javascript:void(0)" title="Adiconar nova categoria para a galeria  do post." id="link-nova-categoria-post" style="margin-left:5px;">Adiconar nova categoria para a galeria  do post.</a>
     <div style="padding:5px; <?php echo ($acao == 'editCatGal' ? '':'display:none;') ?> " id="div-nova-categoria-post">
        <form action="?PST_Id=<?php echo $_GET['PST_Id'] ?>" name="addCat" id="addCat" method="post">
            <input type="text" name="PCI_Descricao" id="PCI_Descricao" placeholder="DESCRIÇÃO DA CATEGORIA" value="<?php echo $dbRowCatGal['PCI_Descricao'] ?>" style="width:400px; height:40px;" />
            <input type="hidden" name="PCI_Id" value="<?php echo $dbRowCatGal['PCI_Id'] ?>" id="PCI_Id" />
            <input type="submit" value="OK"  style=" height:46px; width:50px;" /><br /><br />
        </form>
    </div>
    
    
    
    
    <?php
	$dbResultPGS =  $ponteiro->exeProcedureCategoriaImgs('',$PST_Id,'','P');
	if(mssql_num_rows($dbResultPGS) != 0 )
	{
		$classes = '';
		while($dbRowPSG = mssql_fetch_array($dbResultPGS))
		{
	?>
    <div style="border:1px solid #CCC; padding:10px; margin:10px auto;">
    	<p>
        	Enviar para a galeria: <?php util::imprime($dbRowPSG['PCI_Descricao']) ?> 
            <a href="index.php?PST_Id=<?php echo $_GET['PST_Id'] ?>&PCI_Id=<?php echo base64_encode($dbRowPSG['PCI_Id']) ?>&acao=<?php echo base64_encode('deletarCatPostGal') ?>" onclick="return confirm('Deseja mesmo deletar?')" title="Deletar" style="float:right; display:block; margin:5px;"><img src="../../imgs/cancel.png" alt="Deletar" style="float:left" /></a>
            <a href="index.php?PST_Id=<?php echo $_GET['PST_Id'] ?>&PCI_Id=<?php echo base64_encode($dbRowPSG['PCI_Id']) ?>&acao=<?php echo base64_encode('editCatGal') ?>" title="Editar" style="float:right; display:block; margin:5px;" ><img src="../../imgs/icon-editar.jpg" alt="Editar" /></a>  
        </p> 
        
        
        <br />

        <div class="holder-upload-<?php util::imprime($dbRowPSG['PCI_Id']) ?> galerias" style="width:100%;">
            <form class="upload-<?php util::imprime($dbRowPSG['PCI_Id']) ?>" action="upload.php" method="POST" enctype="multipart/form-data">
                <input name="foto"  type="file" multiple />
                <input type="hidden" name="PCI_Id" id="PCI_Id" value="<?php util::imprime($dbRowPSG['PCI_Id']) ?>" />
              	<input type="hidden" name="PST_Id2" id="PST_Id2" value="<?php echo $PST_Id ?>" />
                <button>Upload</button>
                <div>Enviar Fotos</div>
            </form>
            <table class="upload_files-<?php util::imprime($dbRowPSG['PCI_Id']) ?>"></table>
        </div>
        
        <form action="?PST_Id=<?php echo $_GET['PST_Id'] ?>" name="frmDel" id="frmDel" method="POST" >
        <div class="download_files-<?php util::imprime($dbRowPSG['PCI_Id']) ?> downloads">
            <ul>
                <?php
                $dbResult = $ponteiro->exeProcedureImgs('','','','','P2',$dbRowPSG['PCI_Id']);
                if(mssql_num_rows($dbResult) != 0)
                {
                    while($dbRow = mssql_fetch_array($dbResult))
                    {	
                ?>
                <li>
                    <div class="holder-imgs-galeria">
                        <img src="../../../../uploads/r<?php echo $dbRow['IMX_Img'] ?>" width="100" />
                    </div>
                    <input type="checkbox" name="galeriaImg[<?php echo $dbRow['IMX_Id'] ?>]" value="<?php echo $dbRow['IMX_Img'] ?>" />
                </li>
                <?php
                    }
                }
                ?>
            </ul>
            <div align="center" style="width:690px; overflow:hidden; margin:0px auto; padding:0px">
                <br />
                <input type="hidden" name="del" value="del" /> 
                <input type="submit" value="DELETAR SELECIONADOS" style="padding:20px 50px;" />
            </div>
         </div>
        </form>
	</div>    
    <?php
			 $classes .= 'upload-'.$dbRowPSG['PCI_Id'].',';
		}
	}
	?>
    
    
    <div style="border:1px solid #CCC; padding:10px; margin:10px auto;">
    	<p>Enviar direito no Post</p><br />

        <div class="holder-upload" style="width:100%;">
            <form class="upload" action="upload.php" method="POST" enctype="multipart/form-data">
                <input name="foto" id="foto" type="file" multiple />
                <input type="hidden" name="galeria_id" id="galeria_id" value="" />
                <input type="hidden" name="PST_Id" id="PST_Id" value="<?php echo $PST_Id ?>" />
                <input type="hidden" name="PST_Id2" id="PST_Id2" value="<?php echo $PST_Id ?>" />
                <button>Upload</button>
                <div>Enviar Fotos</div>
            </form>
            <table class="upload_files"></table>
        </div>
        
        <form action="?PST_Id=<?php echo $_GET['PST_Id'] ?>" name="frmDel" id="frmDel" method="POST" >
        <div class="download_files">
            <ul>
                <?php
                $dbResult = $ponteiro->exeProcedureImgs('','',$PST_Id,'','P','');
                if(mssql_num_rows($dbResult) != 0)
                {
                    while($dbRow = mssql_fetch_array($dbResult))
                    {	
                ?>
                <li>
                    <div class="holder-imgs-galeria">
                        <img src="../../../../uploads/r<?php echo $dbRow['IMX_Img'] ?>" width="100" />
                    </div>
                    <input type="checkbox" name="galeriaImg[<?php echo $dbRow['IMX_Id'] ?>]" value="<?php echo $dbRow['IMX_Img'] ?>" />
                </li>
                <?php
                    }
                }
                ?>
            </ul>
            <div align="center" style="width:690px; overflow:hidden; margin:0px auto; padding:0px">
                <br />
                <input type="hidden" name="del" value="del" /> 
                <input type="submit" value="DELETAR SELECIONADOS" style="padding:20px 50px;" />
            </div>
         </div>
        </form>
	</div>    
    
    
    
    
 	 
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script src="../../js/jquery.fileupload.js"></script>
<script src="../../js/jquery.fileupload-ui.js"></script>
<?php
$dbResultPGS =  $ponteiro->exeProcedureCategoriaImgs('',$PST_Id,'','P');
if(mssql_num_rows($dbResultPGS) != 0 )
{
	$classes = '';
	while($dbRowPSG = mssql_fetch_array($dbResultPGS))
	{
?>
		<script>
		/*global $ */
		$(function () {
			var test = 0;
			var total = 0;
			$('.upload-<?php util::imprime($dbRowPSG['PCI_Id']) ?>').fileUploadUI({
				uploadTable: $('.upload_files-<?php util::imprime($dbRowPSG['PCI_Id']) ?>'),
				downloadTable: $('.download_files-<?php util::imprime($dbRowPSG['PCI_Id']) ?> ul'),
				buildUploadRow: function (files, index) {
					test++; 
					total = files.length;			
					var file = files[index];
					return $('<tr><td>' + file.name + '<\/td>' +
							'<td class="file_upload_progress"><div><\/div><\/td>' +
							'<td class="file_upload_cancel">' +
							'<div class="ui-state-default ui-corner-all ui-state-hover" title="Cancel">' +
							'<span class="ui-icon ui-icon-cancel">Cancel<\/span>' +
							'<\/div><\/td><\/tr>');
				},
				buildDownloadRow: function (file) {           
					var html = '<li>';
					html +='		<div class="holder-imgs-galeria">';
					html +='			<img src="../../../../uploads/r' + file.img + '" width="100" />';
					html +='		</div>';
					html +='		<input type="checkbox" name="galeriaImg[' + file.name + ']" value="' + file.img + '" />';
					html +='    </li>';
					return $(html);			
				}
			});
		});
		</script>

<?php
	}
}
?>


<script>
/*global $ */
$(function () {
    var test = 0;
	var total = 0;
	$('.upload').fileUploadUI({
        uploadTable: $('.upload_files'),
        downloadTable: $('.download_files ul'),
        buildUploadRow: function (files, index) {
            test++; 
			total = files.length;			
			var file = files[index];
            return $('<tr><td>' + file.name + '<\/td>' +
                    '<td class="file_upload_progress"><div><\/div><\/td>' +
                    '<td class="file_upload_cancel">' +
                    '<div class="ui-state-default ui-corner-all ui-state-hover" title="Cancel">' +
                    '<span class="ui-icon ui-icon-cancel">Cancel<\/span>' +
                    '<\/div><\/td><\/tr>');
        },
        buildDownloadRow: function (file) {           
			var html = '<li>';
			html +='		<div class="holder-imgs-galeria">';
			html +='			<img src="../../../../uploads/r' + file.img + '" width="100" />';
			html +='		</div>';
			html +='		<input type="checkbox" name="galeriaImg[' + file.name + ']" value="' + file.img + '" />';
			html +='    </li>';
			return $(html);			
        }
    });
});

$(document).ready(function(){
	$('input:checkbox').click(function(){
		var galeriaid = '';
		$('input:checkbox' ).each(function() {			
			if($(this).attr('checked'))
				galeriaid += $(this).val()+', '; 	
		});
		$('#galeria_id').val(galeriaid);
	});	
	
	
	
	$("#link-nova-categoria").click(function(){
		$("#div-nova-categoria").toggle( "fast" );		
	});
	$("#link-nova-categoria-post").click(function(){
		$("#div-nova-categoria-post").toggle( "fast" );		
	});
});
</script> 

</body>

</html>