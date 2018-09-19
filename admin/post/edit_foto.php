<?php
$nivel_diretorio = "../../..";
require_once("$nivel_diretorio/control/Post_Control.php");
$ponteiro = new Post_Control();

if($_SESSION['perPosts'] != 'OK')
	die('Acesso negado');

if(isset($_GET['PST_Id']))
{
	$PST_Id = intval(base64_decode($_GET['PST_Id']));	
	$dbRow = mssql_fetch_array($ponteiro->exeProcedure($PST_Id,'','','','','','','P'));
	$img_original = "../../../uploads/".$dbRow['PST_Img'];
	$nomeTum = "../../../uploads/r".$dbRow['PST_Img'];
	$arWH = getimagesize($img_original);
	$thumb_width = 350;
	$thumb_height = 150;
	$current_large_image_width = $arWH['0'];
	$current_large_image_height = $arWH['1'];		
}

	

if (isset ($_POST["x1"]))
{
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	
	
	$scale = $_POST['thumb_width']/$w;	
	$cropped = util::crop($_POST['nomeTum'],$_POST['img_original'],$w,$h,$x1,$y1,$scale);
	header("location:index.php");
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

   	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="../css/colorbox.css" type="text/css" media="all"/>
    <title>Leonardo - Administração do site</title>
    
</head>



<body>

<!-- ============================= CONTAINER =================================== -->
<div id="container">
    
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
        	
            
			<div class='titulo-pags' style="font-size:17px;">
             EDITAR FOTO 
            </div>
            <div align="center">
                <img src="<?php echo $img_original ?>" style="float: left; margin-right: 10px;" id="thumbnail" alt="Create Thumbnail" />
            <div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
                <img src="<?php echo $img_original ?>" style="position: relative;" alt="Thumbnail Preview" />
            </div>
                <br style="clear:both;"/>
                <form name="thumbnail" action="" method="post">
                    <input type="hidden" name="x1" value="" id="x1" />
                    <input type="hidden" name="y1" value="" id="y1" />
                    <input type="hidden" name="x2" value="" id="x2" />
                    <input type="hidden" name="y2" value="" id="y2" />
                    <input type="hidden" name="w" value="" id="w" />
                    <input type="hidden" name="h" value="" id="h" />
                    <input type="hidden" name="thumb_width" value="<?php echo $thumb_width  ?>" id="thumb_width" />
                    <input type="hidden" name="img_original" value="<?php echo $img_original  ?>" id="img_original" />
                    <input type="hidden" name="nomeTum" value="<?php echo $nomeTum  ?>" id="nomeTum" />
                    <input type="hidden" name="id" value="<?php echo $id  ?>" id="id" />
                   
                 
             
                    <input type="submit" name="upload_thumbnail" value="Cortar Foto" id="save_thumb" />
                </form>
            </div>
            
                
               
           
	  </div>
        <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
        
    	
    
    
    
    </div>
    <!-- ============================= CONTAINER CONTEUDO =================================== -->


</div>
<!-- ============================= CONTAINER =================================== -->


</body>
</html>

<!--	====================================================================================================	 -->	
<!--	ARQUIVOS JAVASCRIPT	 -->
<!--	====================================================================================================	 -->
<script src="../../../admin/jquery/jquery-1.4.4.min.js" type="text/javascript" ></script>
<script src="../../../admin/jquery/jquery.colorbox-min.js" type="text/javascript" ></script>
<script src="../../../admin/jquery/jquery.validate.js" type="text/javascript" ></script>
<script src="../../../admin/jquery/add-video.js" type="text/javascript" ></script>
<script type="text/javascript" src="../../../admin/jquery/jquery.imgareaselect.min.js"></script>
<script type="text/javascript"> 
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 
	
	$('#thumbnail + div > img').css({ 
		width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px', 
		height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 
 
$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("You must make a selection first");
			return false;
		}else{
			return true;
		}
	});
}); 
 
$(window).load(function () { 
	$('#thumbnail').imgAreaSelect({ aspectRatio: '1:<?php echo $thumb_height/$thumb_width;?>', onSelectChange: preview }); 
});
 
</script>