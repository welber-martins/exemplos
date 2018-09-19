<?php
$pre = '../../';
require_once("../../includes/redirectSeo.php");
require_once("../../includes/php/model.php");
$ponteiro = new model();
$dbRow = $ponteiro->selectTextos('2');
$titulo = $dbRow['titulo'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    
	<?php require_once("../../includes/head.php") ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../../css/topo.css" rel="stylesheet">
    <link href="../../css/topo-aescola.css" rel="stylesheet">
    <link href="../../css/banner-metodo.css" rel="stylesheet">   
    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/bg-internas.css" rel="stylesheet">
    <link href="../../css/footer.css" rel="stylesheet">
    <link href="../../css/metodo.css" rel="stylesheet">
   
    
    

   
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   <!--TOPO DE SITE -->
    <?php require_once("../../includes/topo.php") ?>
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
                            <li><a href="#" title="A ESCOLA">A ESCOLA</a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="NOSSA HISTÓRIA" class="nav-interna-top-marcada">MÉTODO DE ENSINO</a></li>
                        </ul>
                    </div>
                </div>
            </div>
             <div >
                 <div id="banner-1">
                         <a href="#" alt="Play" data-toggle="modal" data-target="#exampleModal" data-titulo="<?php echo $dbRow['titulo'] ?>" data-texto='<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo substr($dbRow['video'],strpos($dbRow['video'],"v=")+2,100) ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>'  >
                          <span>abrir vídeos</span>
                         </a>
                 </div>
                 <div id="banner-2">&nbsp;</div>
                 <div id="banner-3">&nbsp;</div>
                 <div id="banner-4">&nbsp;</div> 
             </div>
             <div class="container menu-a-escola">
                 <div class="row" >
                    <div class="col-xs-12">
                        <ul class="list-inline nav-interna-aescola">
                            <li><a href="../regimento-escolar/" title="REGIMENTO ESCOLAR"><span class="glyphicon glyphicon-star"></span> REGIMENTO ESCOLAR</a></li>
                            <li><a href="../nossa-historia/" title="NOSSA HISTÓRIA"><span class="glyphicon glyphicon-star"></span> NOSSA HISTÓRIA</a></li>
                            <li><a href="../galeria-de-fotos/" title="GALERIA DE FOTOS"><span class="glyphicon glyphicon-star"></span> GALERIA DE FOTOS</a></li>
                        </ul>
                    </div>
                </div> 
            </div>                 
        </div>
        <!--BANNER  -->      
        <div id="banner-sm" class="hidden-md hidden-lg" >            
            <div class="banner-txt-small " style="position:absolute; left:0px; right:0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2 " >
                            <a href="#" alt="Play" data-toggle="modal" data-target="#exampleModal" data-titulo="<?php echo $dbRow['titulo'] ?>" data-texto='<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo substr($dbRow['video'],strpos($dbRow['video'],"v=")+2,100) ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>'  >
                                <img src="../../imgs/titulo-metodo-sm-min.png" alt="Imagem do banner 1 o seu futuro começa aqui."  class="img-responsive "  />
                            </a>
                        </div>
                    </div>
                </div>                 
             </div>
            <img src="../../imgs/bg-metodo-min.jpg" class="img-responsive" />
        </div>   
        
        
        
        <div id="aescola-info-sm" class="hidden-md hidden-lg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 dropdown" >
                        
                        <a href="#" title="INFORMAÇÕES IMPORTANTES" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            MENU A ESCOLA
                            <span class="caret pull-right"></span>
                        </a>
                        <ul class="dropdown-menu topo-1-drop pull-left">
                            <li><a href="../regimento-escolar/" title="REGIMENTO ESCOLAR"><span class="glyphicon glyphicon-star"></span> REGIMENTO ESCOLAR</a></li>
                            <li><a href="../nossa-historia/" title="NOSSA HISTÓRIA"><span class="glyphicon glyphicon-star"></span> NOSSA HISTÓRIA</a></li>
                            
                            <li><a href="../galeria-de-fotos/" title="GALERIA DE FOTOS"><span class="glyphicon glyphicon-star"></span> GALERIA DE FOTOS</a></li>                        
                         </ul>
                    </div>
                </div>
            </div>
        </div> 
        
        
        
        <div class="container-fluid ">
        	
        	<div class="container historia-interna">
                <div class="row">
                    <div class="col-xs-12" >
                        <img src="../../imgs/img-metodo-min.png" class="pull-right hidden-sm hidden-xs" style="margin-top:-100px;" />
                       
                        <p>
                            <?php echo $dbRow['texto'] ?>
                        </p>
                        
                    </div>
                </div>
            </div>
            

        </div>
        
        
         
    </content>
    <!--CONTEUDO  -->
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
    
    <!--rodape  -->        
    <?php require_once("../../includes/rodape.php") ?>
    <!--rodape  -->
   
   
    
    



            


	<script src="../../js/jquery-3.1.1.min.js"></script>    
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/js.js"></script>

</body>
</html>