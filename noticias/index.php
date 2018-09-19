<?php
$pre = '../';
require_once("../includes/redirectSeo.php");
require_once("../includes/php/model.php");
$ponteiro = new model();

$buscaNot = '';
if(isset($_POST['buscaNot']))
    $buscaNot = $ponteiro->tradaDados($_POST['buscaNot'],30);

$dbResult = $ponteiro->selectNoticias($buscaNot);



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    
	<?php require_once("../includes/head.php") ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/topo.css" rel="stylesheet">   
    <link href="../css/banner-noticias.css" rel="stylesheet">   
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/bg-internas.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/noticias.css" rel="stylesheet">
   
    
    

   
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
        <div id="banner" class=" hidden-sm hidden-xs"  >
        	 <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="list-inline nav-interna-top">
                            <li><a href="#" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="NOTÍCIAS"  class="nav-interna-top-marcada">NOTÍCIAS</a></li>                            
                        </ul>
                    </div>
                </div>
            </div>
             <div >
                 <div id="banner-1">&nbsp;</div>
                 <div id="banner-2">&nbsp;</div>
                 <div id="banner-3">&nbsp;</div>
                 <div id="banner-4">&nbsp;</div> 
             </div>                            
        </div>
        <!--BANNER  -->      
        <div id="banner-sm" class="hidden-md hidden-lg" >            
            <div class="banner-txt-small " style="position:absolute; left:0px; right:0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2 " >
                            <img src="../imgs/titulo-noticias-sm-min.png" alt="Imagem do banner 1 o seu futuro começa aqui."  class="img-responsive "  />
                        </div>
                    </div>
                </div>                 
             </div>
            <img src="../imgs/bg-generico-min.jpg" class="img-responsive" />
        </div>   
        <!--BANNER  -->
        
        
       
        
        
        <!--conteudo int -->
        <div class="container-fluid ">        	
        	<div class="container noticia-interna">
                <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                        <form name="FrmbuscaNot" id="FrmbuscaNot" method="post">
                           <div class="inner-addon right-addon">
                                <i class="glyphicon glyphicon-search input-lg"></i>
                                <input type="text" name="buscaNot" id="buscaNot"  class="form-control input-lg" placeholder="Encontre a notícias que deseja!" />
                            </div> 
                        </form>
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <?php
                        if(mysql_num_rows($dbResult) != 0)
                        {
                        ?>
                        <ul class="list-inline lista-noticias-int">
                            <?php
                            while($dbRow = mysql_fetch_array($dbResult))
                            { 
                            ?>
                            <li class="col-xs-6 col-md-4">
                                <a href="../noticias/<?php echo $dbRow['noticias_id'].'-'.$ponteiro->formataLink($dbRow['titulo'],'-') ?>" title="<?php echo $dbRow['titulo'] ?>">
                                    <img src="../admin/uploads/r<?php echo $dbRow['foto'] ?>" alt='<?php echo $dbRow['titulo'] ?>' class="img-responsive center-block">
                                    <p class="noticas-texto"><?php echo $ponteiro->formataData($dbRow['data'],'exibir') ?></p>
                                    <p class="noticas-titulo"><?php echo $dbRow['titulo'] ?></p>
                                    <p class="noticas-texto">
                                        <?php echo substr(strip_tags($dbRow['texto']),0,220) ?>
                                    </p>
                                </a>
                            </li> 
                            <?php
                            }
                            ?>                          
                        </ul>
                        <?php
                        }
                        ?>
                    </div>
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