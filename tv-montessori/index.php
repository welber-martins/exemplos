<?php
$pre = '../';
require_once("../includes/redirectSeo.php");
require_once("../includes/php/model.php");
$ponteiro = new model();
if(isset($_GET['get1']))
{
    $arGet = explode("--",$_GET['get1']);
    $idTv = intval(str_replace('tv-montessori/','',$arGet[0]));
   $dbRowMostra = mysql_fetch_array($ponteiro->selectTV('',$idTv,'','1'));
}
else
    $dbRowMostra = mysql_fetch_array($ponteiro->selectTV('','','','1')); 

$buscaTv = '';
if(isset($_POST['buscaTv']))
    $buscaTv = $ponteiro->tradaDados($_POST['buscaTv'],30);


$dbResult = $ponteiro->selectTV($buscaTv,'',$dbRowMostra['tv_id']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    
	<?php require_once("../includes/head.php") ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/topo.css" rel="stylesheet">   
    <link href="../css/banner-tv.css" rel="stylesheet">   
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/bg-internas.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/tv.css" rel="stylesheet">
   
    
    

   
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
        <div id="banner" class=" hidden-sm hidden-xs" style=" background:url(<?php echo ($dbRowMostra['foto_fundo'] == '' ? '../imgs/bg-generico-2-min.jpg':'../admin/uploads/'.$dbRowMostra['foto_fundo']) ?>)  top center no-repeat;"  >
        	 <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="list-inline nav-interna-top">
                            <li><a href="#" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="NOTÍCIAS"  class="nav-interna-top-marcada">TV MONTESSORI</a></li>                            
                        </ul>
                    </div>
                </div>
            </div>
            
                 <div class="tv-banner-play">
                    <a href="#" alt="Play" data-toggle="modal" data-target="#exampleModal" data-titulo="<?php echo $dbRowMostra['titulo'] ?>" data-texto='<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo substr($dbRowMostra['link'],strpos($dbRowMostra['link'],"v=")+2,100) ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>'  ><span class="glyphicon glyphicon-play-circle" ></span></a> 
                 </div>
                 
                                      
        </div>
        <!--BANNER  -->      
        <div id="banner-sm" class="hidden-md hidden-lg" >            
            <div class="banner-txt-small " style="position:absolute; left:0px; right:0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2 " >
                           <div class="tv-banner-play"><a href="#" alt="Play" data-toggle="modal" data-target="#exampleModal" data-titulo="<?php echo $dbRowMostra['titulo'] ?>" data-texto='<iframe width="100%" height="350" src="https://www.youtube.com/embed/<?php echo substr($dbRowMostra['link'],strpos($dbRowMostra['link'],"v=")+2,100) ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>'  ><span class="glyphicon glyphicon-play-circle" ></span></a> </div>
                        </div>
                    </div>
                </div>                 
             </div>
            <img src="<?php echo ($dbRowMostra['foto_fundo'] == '' ? '../imgs/bg-generico-min.jpg':'../admin/uploads/'.$dbRowMostra['foto_fundo']) ?>" class="img-responsive" />
        </div>   
        <!--BANNER  -->
        
        
       
        
        
        <!--conteudo int -->
        <div class="container-fluid ">        	
        	<div class="container tv-interna">
                <div class="row">
                   

                    <div class="col-md-12 col-xs-12 tv-interna-topo ">
                             
                            <h1><?php echo $dbRowMostra['titulo'] ?></h1>
                            <P>DATA DE POSTAGEM: <?php echo $ponteiro->formataData($dbRowMostra['data'],'exibir') ?> </P>
                            <p>
                               <?php echo $dbRowMostra['texto'] ?>

                            </p>
                      
                    </div>
                    
                    <div class="col-md-4 col-xs-12 pull-right">
                        <form name="buscaNot" method="post">
                           <div class="inner-addon right-addon">
                                <i class="glyphicon glyphicon-search input-lg"></i>
                                <input type="text" class="form-control input-lg" name="buscaTv" id="bustaTv" placeholder="Encontre o vídeo que deseja!" />
                            </div> 
                        </form>
                    </div> 

                    <div class="col-md-8 col-xs-12 pull-left">
                        <ul class="list-inline lista-cabecalho" >
                            <li class="li-topo-marker"></li>
                            <li class="li-topo-txt">CONFIRA MAIS VÍDEOS</li>
                        </ul>
                    </div>


                    <div class="col-xs-12 tv-interna-lista ">
                        <ul class="list-inline">
                           <?php
                           if(mysql_num_rows($dbResult) != 0)
                           { 
                              while($dbRow = mysql_fetch_array($dbResult))
                              { 
                           ?>
                                <li class="col-md-4 col-xs-6 item-tv ">
                                    <a href="../tv-montessori/<?php echo $dbRow['tv_id'].'-'.$ponteiro->formataLink($dbRow['titulo'],'-') ?>" title="<?php echo $dbRow['titulo'] ?>">
                                        <img src="../admin/uploads/r<?php echo $dbRow['foto'] ?>" alt="<?php echo $dbRow['titulo'] ?>" class="img-responsive center-block">
                                        <p><?php echo $dbRow['titulo'] ?></p> 
                                    </a>
                                </li>  
                            <?php
                                }
                            }
                            ?>                          
                        </ul>


                    </div>

                    

                                       
                </div>                
            </div> 
        </div>
        <!--conteudo int -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title titulo-modal" id="exampleModalLabel"></h4>
              </div>
              <div class="modal-body corpo-modal">
                <p></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>               
              </div>
            </div>
          </div>
        </div>
        


        
         
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