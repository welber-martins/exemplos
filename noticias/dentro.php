<?php
$pre = '../';
require_once("../includes/redirectSeo.php");
require_once("../includes/php/model.php");
$ponteiro = new model();

if(isset($_GET['get1']))
{
    $arGet = explode("--",$_GET['get1']);
    $id = intval(str_replace('noticias/','',$arGet[0]));
    $dbRow = mysql_fetch_array($ponteiro->selectNoticias('',$id));
    if(empty($dbRow['noticias_id']))
         header("Location:../noticias/");

}
else
{
    header("Location:../noticias/");
}



$dbResult = $ponteiro->selectNoticias('','',$id,'5');



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    
	<?php require_once("../includes/head.php") ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/topo.css" rel="stylesheet">   
    <link href="../css/banner-noticias-dentro.css" rel="stylesheet">   
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/bg-internas.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/noticias-dentro.css" rel="stylesheet">
   
    
    

   
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   <!--TOPO DE SITE -->
    <?php require_once("../includes/topo.php") ?>
   <!--TOPO DE SITE -->
   
   
   <!--CONTEUDO  -->
   <content>
        
        
        
        <!--BANNER  -->
        <div id="banner" class=" hidden-sm hidden-xs" style="background: url(<?php echo ($dbRow['foto_fundo'] == '' ? '../imgs/bg-generico-min.jpg':'../admin/uploads/'.$dbRow['foto_fundo']) ?>) top center;"  >
        	 <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="list-inline nav-interna-top">
                            <li><a href="<?php echo $pre ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="../noticias/" title="NOTÍCIAS"  >NOTÍCIAS</a></li> 
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="NOTÍCIAS"  class="nav-interna-top-marcada"><?php echo $dbRow['titulo'] ?></a></li>                            
                        </ul>
                    </div>
                </div>
            </div>
             <div >
                 <div id="banner-titulo"><?php echo $dbRow['titulo'] ?></div>
                 <div id="banner-linha">&nbsp;</div>
                 <div id="banner-data"><?php echo $ponteiro->formataData($dbRow['data'],'exibir') ?></div>
             </div>                            
        </div>
        <!--BANNER  -->      
        <div id="banner-sm" class="hidden-md hidden-lg" >            
            <div class="banner-txt-small " style="position:absolute; left:0px; right:0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2 " >
                            <p><?php echo $dbRow['titulo'] ?></p>
                            <p class="banner-txt-small-data"><?php echo $ponteiro->formataData($dbRow['data'],'exibir') ?></p>
                        </div> 
                    </div>
                </div>                 
             </div>
            <img src="<?php echo ($dbRow['foto_fundo'] == '' ? '../imgs/bg-generico-min.jpg':'../admin/uploads/'.$dbRow['foto_fundo']) ?>" class="img-responsive" />
        </div>   
        <!--BANNER  -->
        
        
       
        
        
        <!--conteudo int -->
        <div class="container-fluid ">        	
        	<div class="container noticia-interna-dentro">
                <div class="col-xs-12 col-md-8 pull-left noticia-dentro-textos">
                    <p><?php echo $dbRow['texto'] ?></p>
                </div>

                <div class="col-md-4 pull-right hidden-sm hidden-xs noticia-dentro-mais">
                    <ul class="list-inline lista-cabecalho" >
                        <li class="li-topo-marker"></li>
                        <li class="li-topo-txt">MAIS NOTÍCIAS</li>
                    </ul>
                    <ul class="list-unstyled ul-noticias">
                        <?php
                        if(mysql_num_rows($dbResult) != 0)
                        {
                            while($dbRow = mysql_fetch_array($dbResult))
                            { 
                            
                        ?>

                                <li>
                                    <a href="../noticias/<?php echo $dbRow['noticias_id'].'-'.$ponteiro->formataLink($dbRow['titulo'],'-') ?>" title="<?php echo $dbRow['titulo'] ?>">
                                        <div class="not-img pull-left">
                                            <img src="../admin/uploads/r<?php echo $dbRow['foto'] ?>" width='110' alt="<?php echo $dbRow['titulo'] ?>" />
                                        </div>
                                        <span><?php echo $ponteiro->formataData($dbRow['data'],'exibir') ?></span>
                                        <p><?php echo $dbRow['titulo'] ?></p>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                        
                                          
                       
                    </ul>
                    <ul class="list-inline lista-cabecalho" >
                        <li class="li-topo-marker"></li>
                        <li class="li-topo-txt">REDES SOCIAIS</li>
                    </ul>
                    <ul class="social-network-footer social-circle-footer">                       
                        <li><a href="#" class="icoFacebook"  title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoYoutube" title="Youtube"><i class="fa fa-youtube"></i></a></li>                        
                        <li><a href="#" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                    </ul>  
                </div>
                
            </div> 
        </div>
        <!--conteudo int -->
        
        
         
    </content>
    <!--CONTEUDO  -->
    
    <!--rodape  -->        
    <?php require_once("../includes/rodape.php") ?>
    <!--rodape  -->
   
   
    
    



            


	<script src="../js/jquery-3.1.1.min.js"></script>    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/js.js"></script>

</body>
</html>