<?php
$pre = "../";
require_once($pre."trava.php");
require_once("../classes/class_tv.php");
$ponteiro = new tv();
$ok = true;
$msn = "";
if(isset($_GET['id']))
	$id = intval($_GET['id']);

if (!empty($_POST['go']))
{
	
	$id = $_POST['id'];
	$arImg = $ponteiro->envia_foto($_FILES['foto'],'../uploads/');
   
    $ponteiro->trataImgFixo('../uploads/'.$arImg['1'],1920,613);
	if (!$arImg['0'])
	{
		$ok = false;
		$msn .= "<li>".$arImg['1']."</li>";	
	}
	if ($ok)
	{
			$ponteiro->foto_fundo = $arImg['1'];			
			$ponteiro->update($id);
			header("location:../uploads/".$arImg['1']);		
	}
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enviar Fotos</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"/>
</head>

<body class="bg-sem">
	
   	<form action="" method="post" name="form-upload" id="form-upload" enctype="multipart/form-data">
        <div class="holder-erro">
            <ul>
                <?php echo $msn ?>
            </ul>
        </div>
        
        
        <div class="class-form-1">
            <div class="class-form-1-holder">
                <p>Selecione a imagem desejada<span>somente .jpg</span></p>
                <input type="file" name="foto" id="foto" />
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />  
                <input type="hidden" name="go" id="go" value="go">
            </div>
        </div>	
        <div class="holder-btns">
            <input type="image" src="../imgs/btn-enviar.jpg" alt="Enviar" />
        </div>
    </form>
</body>
</html>