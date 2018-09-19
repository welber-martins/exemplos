<?php
$nivel_diretorio = "../../..";

ini_set('mssql.connect_timeout',    60000);
ini_set('mssql.timeout',            60000);
ini_set('max_execution_time', 60000);



require_once("$nivel_diretorio/control/Post_Control.php");
require_once("$nivel_diretorio/class/bdSite.php");
require_once("$nivel_diretorio/class/bdSql.php");
$ponteiro = new Post_Control();
$ponteiroSite = new bdSite();
$ponteiroSql = new bdSql();



/*$num = intval($_GET['num']);

if(isset($_POST['PST_Titulo']))
{
	

		
		
		$dbQuery= '
		SET identity_insert dbleonardo..WEB_TbPost ON
		
		insert into dbleonardo..WEB_TbPost (PST_Id, PST_Titulo, PST_Texto, PST_DataHoraPublica, PST_Img, PCT_Id, PST_Ordem) 
		VALUES (	"'.$_POST['PST_Id'].'",
					"'.Util::trata_dados_formulario($_POST['PST_Titulo']).'",
					"'.Util::trata_dados_formulario($_POST['PST_Texto']).'",
					"'.$_POST['PST_Data'].'",
					"'.$_POST['PST_Img'].'",
					"'.$_POST['PCT_Id'].'",
					"99")
		
		SET identity_insert dbleonardo..WEB_TbPost OFF';
		
		echo $dbQuery;
		$ponteiroSql->exeQuery($dbQuery);
		$ponteiro->criaXmlPost($_POST['PST_Id']);
		echo "<script>location.href='import.php?num=".($_GET['num']+1)."'</script>";
			
	
		
}*/

/*$dbQuery = "select * from dbleonardo..WEB_TbPost";
$dbResult = $ponteiroSql->exeQuery($dbQuery);
while($dbRow = mssql_fetch_array($dbResult))
{
	$arquivo = $dbRow['PST_Img'];
	$filename2 = '../../../uploads/'.$arquivo;	
	if(!file_exists($filename2))
	{		
		$filename = '../../../admin/uploads/'.$arquivo;
		if (file_exists($filename)) 
		{
			$data =  date ("Y-m-d H:i:s", filemtime($filename));
			copy('../../../admin/uploads/'.$arquivo,'../../../uploads/'.$arquivo);
			copy('../../../admin/uploads/r'.$arquivo,'../../../uploads/r'.$arquivo);
			
			$dbQuery2 = 'update dbleonardo..WEB_TbPost set PST_DataHoraPublica = "'.$data.'" where PST_Id='.$dbRow['PST_Id'];
			echo $dbQuery2;
			$ponteiroSql->exeQuery($dbQuery2);
			$ponteiro->criaXmlPost($dbRow['PST_Id']);
			
		}
	}
}


$dbQuery  = 'select * from arquivo_blog';
$dbResult = $ponteiroSite->exeQuery($dbQuery);
while($dbRow = mysql_fetch_array($dbResult))
{
	
	$dbResult2 = $ponteiro->exeProcedure($dbRow['blog_id'],'','','','','','','P');
	if(mssql_num_rows($dbResult2) != 0)
	{		
		$arquivo = $dbRow['arquivo'];
		$filename2 = '../../../uploads/'.$arquivo;	
		if(!file_exists($filename2))
		{		
			$filename = '../../../admin/uploads/'.$arquivo;
			if (file_exists($filename)) 
			{
				$data =  date ("Y-m-d H:i:s", filemtime($filename));
					
				
				$dbQuery2 = '
				SET identity_insert dbleonardo..WEB_TbPostAnexos ON
				
				insert into dbleonardo..WEB_TbPostAnexos (PSA_Id, PSA_Descricao, PSA_Arquivo, PSA_Datetime, PSA_Ordem, PST_Id) 
				values("'.$dbRow['arquivo_blog_id'].'","'.$dbRow['nome'].'","'.$dbRow['arquivo'].'","'.$data.'","0","'.$dbRow['blog_id'].'")
				
				SET identity_insert dbleonardo..WEB_TbPostAnexos OFF
				';
				echo $dbQuery2;
				$ponteiroSql->exeQuery($dbQuery2);
				$ponteiro->criaXmlPost($dbRow['blog_id']);
				copy('../../../admin/uploads/'.$arquivo,'../../../uploads/'.$arquivo);		
				
			}
		}	
	}
}

$dbQuery  = 'SELECT * FROM comentario where status = 1';
$dbResult = $ponteiroSite->exeQuery($dbQuery);
while($dbRow = mysql_fetch_array($dbResult))
{
	
	$dbResult2 = $ponteiro->exeProcedure($dbRow['blog_id'],'','','','','','','P');
	if(mssql_num_rows($dbResult2) != 0)
	{		
		$dbQuery2 = '
		SET identity_insert dbleonardo..WEB_TbComentarios ON
		
		insert into dbleonardo..WEB_TbComentarios (COM_Id, PST_Id, COM_Nome, COM_Email, COM_Texto, COM_Autorizado, COM_Data) 
		values("'.$dbRow['comentario_id'].'","'.$dbRow['blog_id'].'","'.htmlentities($dbRow['nome']).'","'.$dbRow['email'].'","'.htmlentities($dbRow['msn']).'","1","'.date("Y-m-d H:i:s").'")
		
		SET identity_insert dbleonardo..WEB_TbComentarios OFF
		';
		echo $dbQuery2;
		$ponteiroSql->exeQuery($dbQuery2);
		//$ponteiro->criaXmlPost($dbRow['blog_id']);			
	}	
}



$dbQuery  = 'select * from img_blog';
$dbResult = $ponteiroSite->exeQuery($dbQuery);
while($dbRow = mysql_fetch_array($dbResult))
{
	
	
		
		$arquivo = $dbRow['foto'];
		$filename2 = '../../../uploads/'.$arquivo;	
		if(!file_exists($filename2))
		{		
			$filename = '../../../admin/uploads/'.$arquivo;
			if (file_exists($filename)) 
			{
				$data =  date ("Y-m-d H:i:s", filemtime($filename));
					
				
				$dbQuery2 = '
				SET identity_insert dbleonardo..WEB_TbImgsExternas ON
				
				insert into dbleonardo..WEB_TbImgsExternas (IMX_Id, IMX_Img, IMX_Datatime) 
				values("'.$dbRow['img_blog_id'].'","'.$dbRow['foto'].'","'.$data.'")
				
				SET identity_insert dbleonardo..WEB_TbImgsExternas OFF
				';
				echo $dbQuery2;
				$ponteiroSql->exeQuery($dbQuery2);
				//$ponteiro->criaXmlPost($dbRow['blog_id']);
				copy('../../../admin/uploads/'.$arquivo,'../../../uploads/'.$arquivo);		
				
			}
		}	
	
}*/


/*$dbQuery  = 'SELECT cib.blog_id, ib.img_blog_id	
			FROM img_blog ib
			INNER JOIN cat_img_blog cib ON ib.blog_id = cat_img_blog_id';
$dbResult = $ponteiroSite->exeQuery($dbQuery);
while($dbRow = mysql_fetch_array($dbResult))
{
	
	$dbResult2 = $ponteiro->exeProcedure($dbRow['blog_id'],'','','','','','','P');
	$dbResult3 =  $ponteiroSql->exeQuery('select * from dbleonardo..WEB_TbImgsExternas where IMX_Id = '.$dbRow['img_blog_id']);
	
	if(mssql_num_rows($dbResult2) != 0 && mssql_num_rows($dbResult3) != 0 )
	{		
		$dbQuery2 = '
			insert into dbleonardo..[WEB_TbPostImgs] (PST_Id, IMX_Id) 
			values("'.$dbRow['blog_id'].'","'.$dbRow['img_blog_id'].'")
		';
		echo $dbQuery2;
		$ponteiroSql->exeQuery($dbQuery2);
		$ponteiro->criaXmlPost($dbRow['blog_id']);			
	}	
}
*/


$dbResult = $ponteiroSql->exeQuery('select * from dbleonardo..WEB_TbBannerExterno');
while($dbRow = mssql_fetch_array($dbResult))
{
	
		$img_velha = imagecreatefromjpeg('../../../uploads/r'.$dbRow['BNE_Img']);			
		$largurao = imagesx($img_velha);
		$alturao = imagesy($img_velha);
		$img_nova = imagecreatetruecolor( $largurao , $alturao );
		imagecopyresampled($img_nova,$img_velha, 0, 0, 0, 0, $largurao,$alturao, $largurao, $alturao);	
		imagejpeg($img_nova,'../../../uploads/r'.$dbRow['BNE_Img'],10);		
		imagedestroy($img_nova);
		imagedestroy($img_velha);
}

/*

$dbResult = $ponteiroSql->exeQuery('select * from dbleonardo..WEB_TbPost');
while($dbRow = mssql_fetch_array($dbResult))
{
	
		$img_velha = imagecreatefromjpeg('../../../uploads/r'.$dbRow['PST_Img']);			
		$largurao = imagesx($img_velha);
		$alturao = imagesy($img_velha);
		$img_nova = imagecreatetruecolor( $largurao , $alturao );
		imagecopyresampled($img_nova,$img_velha, 0, 0, 0, 0, $largurao,$alturao, $largurao, $alturao);	
		imagejpeg($img_nova,'../../../uploads/r'.$dbRow['PST_Img'],55);		
		imagedestroy($img_nova);
		imagedestroy($img_velha);
		
		
		$img_velha = imagecreatefromjpeg('../../../uploads/'.$dbRow['PST_Img']);			
		$largurao = imagesx($img_velha);
		$alturao = imagesy($img_velha);
		$img_nova = imagecreatetruecolor( $largurao , $alturao );
		imagecopyresampled($img_nova,$img_velha, 0, 0, 0, 0, $largurao,$alturao, $largurao, $alturao);	
		imagejpeg($img_nova,'../../../uploads/'.$dbRow['PST_Img'],55);		
		imagedestroy($img_nova);
		imagedestroy($img_velha);
	
}


$dbQuery  = "select distinct ROT_Arquivo from dbleonardo..WEB_TbRoteiros a inner join dbleonardo..WEB_TbRoteirosTurmas at on a.ROT_Id = at.ROT_Id  where ROT_Ano = '2015'
and CodTurma in(select tur.CodTurma from sgre..TbTurmas tur where Ano = '2015' and Curso in ('22','31') and Serie in('3') )";
$dbResult = $ponteiroSql->exeQuery($dbQuery);
while($dbRow = mssql_fetch_array($dbResult))
{
		$arquivo = $dbRow['ROT_Arquivo'];
		$filename2 = '../../../roteiros-aluno/3/'.$arquivo;	
		if(!file_exists($filename2))
		{		
			$filename = '../../../uploads/'.$arquivo;
			if (file_exists($filename)) 
			{
				copy('../../../uploads/'.$arquivo,'../../../roteiros-aluno/3/'.$arquivo);				
			}
		}
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all"/>
    <?php require_once("../includes/head.php"); ?>  
    <script src="../../../admin/ckeditor.js" type="text/javascript" ></script>  
 
    <script type="text/javascript">
	  // When the document is ready set up our sortable with it's inherant function(s)
	 /* $(document).ready(function() {			
			setTimeout(function(){
			  $("#frmFVC").submit();	
			}, 500);
	   });*/
	</script>
   
    
    
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
        	
            
			
           <form action="" name="frmFVC" id="frmFVC" method="post" enctype="multipart/form-data">                
              <?php
			  $query = 'select * from blog limit '.$num.',1';
			  $dbResult = $ponteiroSite->exeQuery($query);
			  $dbRow = mysql_fetch_array($dbResult);
			  ?>
               <div class="class-form-2">
                   <ul> 
                    <li>
                       <p>Título<span></span></p>
                        <input type="text" name="PST_Titulo" id="PST_Titulo" value="<?php Util::imprime($dbRow['titulo']) ?>"  />
                    </li> 
                    <li>
                       <p>Data/Hora de publicação<span></span></p>
                        <input type="text" name="PST_Data" id="PST_Data" value="<?php echo date("Y-m-d H:m:s") ?>" maxlength="150"  />
                       
                    <li>
                       <p>Categoria<span></span></p>
                        <input type="text" name="PCT_Id" id="PCT_Id" value="<?php echo ($dbRow['categoria_blog_id'] == '1' || $dbRow['categoria_blog_id'] == '2' || $dbRow['categoria_blog_id'] == '3' || $dbRow['categoria_blog_id'] == '4'  ? $dbRow['categoria_blog_id'] :'1') ?>" >
                           
                    </li> 
                    <li>
                        <p>Foto</p>
                        <input type="text" name="PST_Img" id="PST_Img" value="<?php Util::imprime($dbRow['foto']) ?>"    />                       
                    </li>                   
                   </ul>
                </div> 
               <div class="class-form-1">
                  <div class="class-form-1-holder">                
                      <p>Texto<span></span></p>
                      <textarea name="PST_Texto" id="PST_Texto" ><?php util::imprimeText($dbRow['texto']) ?></textarea>
                        <script type="text/javascript">
                        //<![CDATA[               
                            CKEDITOR.replace( 'PST_Texto',{skin : 'kama'});                    
                        //]]>
                        </script>
                  </div>
               </div>
                <input type="hidden" value="<?php echo $dbRow['blog_id'] ?>" name="PST_Id" id="PST_Id"  />   
               <div class="holder-btns">
                    <input type="image" src="../imgs/btn-cadastrar.jpg" alt="Cadastar" />
                </div>
            </form>
                      
            
            
           <br />

               
                    
                                
                               
                   
                   
           
        
        
	  </div>
        <!-- ============================= CONTAINER CONTEUDO HOLDER =================================== -->
        
    	
    
    
    
    </div>
    <!-- ============================= CONTAINER CONTEUDO =================================== -->


</div>
<!-- ============================= CONTAINER =================================== -->


</body>
</html>