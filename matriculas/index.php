<?php
$pre = '../';
require_once("../includes/redirectSeo.php");
require_once("../includes/php/model.php");
$ponteiro = new model();
$dbRowT = $ponteiro->selectTextos('4');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    
	<?php require_once("../includes/head.php") ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/topo.css" rel="stylesheet">
    <link href="../css/topo-aescola.css" rel="stylesheet">
    <link href="../css/banner-matricula.css" rel="stylesheet">   
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/bg-internas.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/matricula.css" rel="stylesheet">
   
    <script src='https://www.google.com/recaptcha/api.js'></script>
    

   
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
        <div id="banner" class="hidden-sm hidden-xs"  >
        	 <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="list-inline nav-interna-top">
                            <li><a href="#" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="FALE CONOSCO" class="nav-interna-top-marcada">MATRÍCULAS</a></li>
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
                            <img src="../imgs/titulo-sm-mat-min.png" alt="Imagem do banner 1 o seu futuro começa aqui."  class="img-responsive "  />
                        </div>
                    </div>
                </div>                 
             </div>
            <img src="../imgs/bg-matriculas-min.jpg" class="img-responsive" />
        </div>   
      
        <div class="container titulo-mais-infos hidden-sm hidden-xs"   >
            <div class="row">
                <div class="col-xs-6">
                    <img src="../imgs/titulo-infos-matricula-min.png" align="Informações para matrículas" class="img-responsive" />
                </div>
            </div>
        </div>
        
        <div class="container-fluid bg-interna-branca">
        	
        	<div class="container">
                <div class="row">
                    <ul class="list-inline lista-infos-mat">
                         <li class="col-md-4 col-sm-6 col-xs-12">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCont" data-titulo="MATRÍCULAS NOVAS" data-pagina="novas" data-pre="<?php echo $pre ?>">
                                <img src="../imgs/btn-1-mat-min.png" class="img-responsive center-block">
                            </a>
                        </li>
                         <li class="col-md-4 col-sm-6 col-xs-12">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCont" data-titulo="RENOVAÇÕES DE MATRÍCULAS" data-pagina="renovacao" data-pre="<?php echo $pre ?>">
                                <img src="../imgs/btn-2-mat-min.png" class="img-responsive  center-block">
                            </a>
                        </li>
                         <li class="col-md-4 col-sm-6 col-xs-12">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCont" data-titulo="MENSALIDADES E TAXAS" data-pagina="taxa" data-pre="<?php echo $pre ?>">
                                <img src="../imgs/btn-3-mat-min.png" class="img-responsive  center-block">
                            </a>
                        </li>
                         <li class="col-md-4 col-sm-6 col-xs-12">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCont" data-titulo="LISTAS DE MATERIAS" data-pagina="lista" data-pre="<?php echo $pre ?>">
                                <img src="../imgs/btn-4-mat-min.png" class="img-responsive  center-block">
                            </a>
                        </li>
                         <li class="col-md-4 col-sm-6 col-xs-12">
                            <a href="../admin/uploads/<?php echo $ponteiro->selectArquivo(2) ?>" target="_blank" title="CONTRATO DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS ANO LETIVO 2017">
                                <img src="../imgs/btn-5-mat-min.png" class="img-responsive  center-block">
                            </a>
                        </li>
                         <li class="col-md-4 col-sm-6 col-xs-12">
                            <a href="../admin/uploads/<?php echo $ponteiro->selectArquivo(3) ?>" target="_blank" title="Programa de adaptação  1º semestre - 2017" >
                                <img src="../imgs/btn-6-mat-min.png" class="img-responsive  center-block">
                            </a>
                        </li>                        
                    </ul>                   
                </div>
            </div>
            

        </div>
        <div class="container-fluid bg-interna-branca-sombra">&nbsp;</div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 titulo-dif-mat">
                    <img src="../imgs/titulo-dif-mat-min.png" class="center-block img-responsive">
                </div>
                
                <ul class="col-xs-12 list-unstyled lista-dif-mat">
                    <li>
                        <div class="holde-btn-titulo-dif">
                            <a href="javascript:void(0)" title="NOSSA ESCOLA - CONHEÇA NOSSA HISTÓRIA E MÉTODO">
                                <span class="glyphicon glyphicon-home"></span>
                                CONHEÇA A HISTÓRIA DA ESCOLA MARIA MONTESSORI. 
                                <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm hidden-xs"></span>
                            </a> 
                         </div>
                        <div class="holde-btn-content-dif">
                           
                             <?php 
                                $dbRowT = $ponteiro->selectTextos('6');
                                echo $dbRowT['texto']
                               ?>
                        </div>
                    </li>
                     <li>
                        <div class="holde-btn-titulo-dif">
                            <a href="javascript:void(0)" title="NOSSA MESTRES - profissionais altamente qualificados">
                                <span class="glyphicon glyphicon-user"></span>
                                 NOSSOS PROFESSORES 
                                <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm hidden-xs"></span>
                            </a> 
                         </div>
                        <div class="holde-btn-content-dif">
                         <?php 
                                $dbRowT = $ponteiro->selectTextos('8');
                                echo $dbRowT['texto']
                               ?>
                              
                          
                        </div>
                    </li>
                    <li>
                        <div class="holde-btn-titulo-dif">
                            <a href="javascript:void(0)" title="NOSSA METAS - CONHEÇA NOSSA MISSÃO, VISÃO E VALORES">
                                <span class="glyphicon glyphicon-star"></span>
                                MISSÃO, VISÃO E VALORES. 
                                <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm hidden-xs"></span>
                            </a> 
                         </div>
                        <div class="holde-btn-content-dif">
                             <?php 
                                $dbRowT = $ponteiro->selectTextos('7');
                                echo $dbRowT['texto']
                               ?>    
                           
                        </div>
                    </li>
                   
                   <!-- <li>
                        <div class="holde-btn-titulo-dif">
                            <a href="javascript:void(0)" title="NOSSA ESCOLA - CONHEÇA NOSSA HISTÓRIA E MÉTODO">
                                <span class="glyphicon glyphicon-education"></span>
                                NOSSAS EDUCAÇÃO INFANTIL - A ENTRADA NO UNIVERSO ESCOLAR
                                <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm hidden-xs"></span>
                            </a> 
                         </div>
                        <div class="holde-btn-content-dif">
                           
                               <?php 
                                $dbRowT = $ponteiro->selectTextos('9');
                                echo $dbRowT['texto']
                               ?>
                        </div>
                    </li>
                    <li>
                        <div class="holde-btn-titulo-dif">
                            <a href="javascript:void(0)" title="NOSSA ESCOLA - CONHEÇA NOSSA HISTÓRIA E MÉTODO">
                                <span class="glyphicon glyphicon-education"></span>
                                NOSSOS ENSINO FUNDAMENTAL - CONHEÇA A METODOLOGIA MONTESSORIANA
                                <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm hidden-xs"></span>
                            </a> 
                         </div>
                        <div class="holde-btn-content-dif">
                             
                               <?php 
                                $dbRowT = $ponteiro->selectTextos('10');
                                echo $dbRowT['texto']
                               ?>
                        </div>
                    </li> -->
                </ul>
                    
               
            </div>
        </div>


         <div class="modal fade" id="exampleModalCont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title " id="exampleModalLabel"></h4>
              </div>
              <div class="modal-body ">
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
   
   
    <div id="enviaContato" style="display: none;">--</div>
    



            

    
	<script src="../js/jquery-3.1.1.min.js"></script>    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/js.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
            $('.lista-dif-mat a').click(function() {
                var li = $(this).closest('li');
                var verifica = '';
                if ( li.find('.holde-btn-content-dif').is(':visible'))
                    verifica = 0
                else
                    verifica = 1
                $('.holde-btn-content-dif').stop(1,1).fadeOut(0, function() {
                    if(verifica)
                        li.find('.holde-btn-content-dif').stop(0,0).fadeIn(500);

                });
            });    
        });
    </script>

</body>
</html>