<?php
$pre = '../../';
require_once("../../includes/redirectSeo.php");
require_once("../../includes/php/model.php");
$ponteiro = new model();
$dbRow = $ponteiro->selectTextos('5');
$titulo = $dbRow['titulo'];
$dbResultC = $ponteiro->selectColaboradores('2');
$dbResultP = $ponteiro->selectProjetos('2');
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
    <link href="../../css/banner-ensino-fundamental.css" rel="stylesheet">   
    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/bg-internas.css" rel="stylesheet">
    <link href="../../css/footer.css" rel="stylesheet">
    <link href="../../css/ensino.css" rel="stylesheet">
   
    
    

   
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
                            <li><a href="<?php echo $pre ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="NOSSO ENSINO">NOSSO ENSINO</a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="ENSINO FUNDAMENTAL" class="nav-interna-top-marcada">ENSINO FUNDAMENTAL</a></li>
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
             
             <div class="container infos-ensino">
                <div class="row">
                    <div class="col-xs-12">
                    	<ul class="list-unstyled">
                        	<li> 
                            	<div class="infos-ensino-1 pull-left"><span class="glyphicon glyphicon-ok"> </span> 1º AO 5º ANO</div>  
                                
                            </li>                            
                            <li> 
                            	<div class="infos-ensino-2 pull-left"> <span class="glyphicon glyphicon-time"> </span> Matutino - 7h45 às 12h15</div>  
                                <div class="infos-ensino-2 pull-left"><span class="glyphicon glyphicon-time"> </span> Vespertino - 13h45 às 18h15 </div>
                            </li>
                           
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
                        <div class="col-xs-10 col-xs-offset-1 " >
                            <img src="../../imgs/titulo-en-fundamental-sm-min.png" alt="Imagem do banner 1 o seu futuro começa aqui."  class="img-responsive "  />
                        </div>
                    </div>
                </div> 
                 <div class="container infos-ensino-sm">
                <div class="row">
                    <div class="col-xs-12">
                    	<ul class="list-unstyled">
                       		<li> 
                                <div class="infos-ensino-1 pull-left"><span class="glyphicon glyphicon-ok"> </span> 1º AO 5º ANO</div>  
                                
                            </li>                            
                            <li> 
                                <div class="infos-ensino-2 pull-left"> <span class="glyphicon glyphicon-time"> </span> Matutino - 7h45 às 12h15</div>  
                                <div class="infos-ensino-2 pull-left"><span class="glyphicon glyphicon-time"> </span> Vespertino - 13h45 às 18h15 </div>
                            </li>
                        </ul> 	
                        
                    </div>
                 </div>
             </div>                
             </div>
            
            <img src="../../imgs/bg-ensino-fundamental-min.jpg" class="img-responsive" />
        </div>   
        
        
        <div class="container-fluid bg-interna-branca">
        	
        	<div class="container">
                <div class="row">                    
                    <div class="col-xs-12" >                        
                        <p>
                            <?php echo $dbRow['texto'] ?>
                        </p>
                        
                    </div>
                </div>
            </div>
            

        </div>
        <div class="container-fluid bg-interna-branca-sombra">&nbsp;</div>
        
        
        <div class="container ensino-profissionais">
            <div class="row">
                <ul class="list-inline lista-cabecalho col-xs-12 " >
                    <li class="li-topo-marker"></li>
                    <li class="li-topo-txt">NOSSOS PROFISSIONAIS</li>
                </ul>

                <?php
                if(mysql_num_rows($dbResultC) != 0)
                {   
                    while($dbRowC = mysql_fetch_array($dbResultC)) 
                    {  
                ?>
                    
                    <div class="col-xs-6 col-md-3  item-profissional " >                        
                        <img src="../../admin/uploads/r<?php echo $dbRowC['foto'] ?>" height='500px' alt="<?php echo $dbRowC['nome'] ?>" class="img-responsive" />
                        <div class="item-profissional-txt">
                            <p><?php echo $dbRowC['nome'] ?></p>
                            <hr>
                            <p><span><?php echo $dbRowC['funcao'] ?></span></p>  
                        </div>                        
                    </div>
                <?php
                    }
                }
                ?>             
               
            </div>
        </div>

         <div class="container ensino-projetos">
            <div class="row">
                 <div class="col-md-6 col-sm-8 col-xs-12    col-md-offset-3 col-sm-offset-2 ensino-projetos-titulo">
                    <img src="../../imgs/titulo-projetos-min.png" alt="Titulo para descrever os projetos do ensino infantil da escola Maria Montessori"  class="img-responsive center-block" />
                </div>
                <ul class="list-inline ensino-projetos-lista col-xs-12 ">
                    <?php
                    if(mysql_num_rows($dbResultP) != 0)
                    {   
                        while($dbRowP = mysql_fetch_array($dbResultP)) 
                        {  
                    ?>
                        <li class="col-xs-6 col-md-4 ">
                            <a href="#" title="Projeto 1" data-toggle="modal" data-target="#exampleModal" data-titulo="<?php echo $dbRowP['titulo'] ?>" data-texto="<?php echo $dbRowP['texto'] ?>">
                                <img src="../../admin/uploads/r<?php echo $dbRowP['foto'] ?>" class="img-responsive" >
                                <p><?php echo $dbRowP['titulo'] ?></p>
                            </a>
                            <div class="linha-projeto">
                                &nbsp
                            </div>
                        </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        
        

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
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
    <?php require_once("../../includes/rodape.php") ?>
    <!--rodape  -->
	<script src="../../js/jquery-3.1.1.min.js"></script>    
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/js.js"></script>

</body>
</html>