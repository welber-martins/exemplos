<?php
$pre = "./";
require_once("includes/redirectSeo.php");
require_once("includes/php/model.php");
include_once("banco.php");
$ponteiro = new model();
$dbRowEscola = $ponteiro->selectTextos('1');
$dbRowEI = $ponteiro->selectTextos('4');
$dbRowEF = $ponteiro->selectTextos('5');
$dbResultN = $ponteiro->selectNoticias('','','','3');
$dbResultB = $ponteiro->selectBanner();
$totalBanner = mysqli_num_rows($dbResultB);
$dbResultDE = $ponteiro->selectDepoimentos();
if(mysqli_num_rows($dbResultDE) != 0)
    $dbRowDE = mysqli_fetch_array($dbResultDE);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    <?php require_once("includes/head.php") ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/topo.css" rel="stylesheet">
    <link href="css/banner.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
   
    
    

   
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   <!--TOPO DE SITE -->
    <?php require_once("includes/topo.php") ?>
   <!--TOPO DE SITE -->
   
   
   <!--CONTEUDO  -->
   <content>
        <!--BANNER  -->
         <div id="banner-home" class=" hidden-sm hidden-xs">
             <div id="bannerh-1">
                 <div >
                     <div id="bannerh-1-1" class="banner-1">&nbsp;</div>
                     <div id="bannerh-1-2" class="banner-2">&nbsp;</div>
                     <div id="bannerh-1-3" class="banner-3">&nbsp;</div>
                     <div id="bannerh-1-4" class="banner-4"><a href="javascript:void(0)" title="Nosso ensino"><span>nosso ensino</span></a></div> 
                 </div>                  
            </div>

             <div id="bannerh-2">
                 <div >
                     <div id="bannerh-2-1" class="banner-1">&nbsp;</div>
                     <div id="bannerh-2-2" class="banner-2">&nbsp;</div>
                     <div id="bannerh-2-3" class="banner-3">&nbsp;</div>
                     <div id="bannerh-2-4" class="banner-4"><a href="nosso-ensino/ensino-infantil/" title="Nossa educação infantil"><span>Nossa educação infantil</span></a></div> 
                 </div>                  
            </div>

            <div id="bannerh-3">
                 <div >
                     <div id="bannerh-3-1" class="banner-1">&nbsp;</div>
                     <div id="bannerh-3-2" class="banner-2">&nbsp;</div>
                     <div id="bannerh-3-3" class="banner-3">&nbsp;</div>
                     <div id="bannerh-3-4" class="banner-4"><a href="nosso-ensino/ensino-fundamental/" title="Nosso Ensino Fundamental"><span>Nosso Ensino Fundamental</span></a></div> 
                 </div>                  
            </div>
        </div>
        <div id="banner-sm" class="hidden-md hidden-lg" >            
            <div class="banner-txt-small " style="position:absolute; left:0px; right:0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1 " >
                           <a href="javascript:void(0)" id="btn-home-banner" title="Nosso ensino"><img src="imgs/txt-banner1-sm-min.png" alt="Imagem do banner 1 o seu futuro começa aqui."  class="img-responsive "  /></a>
                        </div>
                    </div>
                </div>                 
             </div>
            <img src="imgs/banner-1-min.jpg" class="img-responsive" />
        </div>
        <!--BANNER  -->
        
        <!--informações importantes  -->
        <div id="home-info" class=" hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <img src="imgs/tituli-infos-import-min.png"  alt="Titulo de informações importantes da escola Maria Motessori" class="img-titulo-infos" />
                        <ul class="list-inline lista-infos-home">
                            <li><a href="admin/uploads/<?php echo $ponteiro->selectArquivo(1) ?>" target="_blank" title="Nosso Calendário  da Escola Maria Montessori"><img src="imgs/btn-infos-1-min.png" alt="Botão para abrir o calendário  da escola Maria Montessori" /></a></li>
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCont" data-titulo="NOSSAS LISTAS DE MATERIAS" data-pagina="lista" data-pre="<?php echo $pre ?>" title="Lista de Material da Escola Maria Montessori"><img src="imgs/btn-infos-2-min.png" alt="Botão para abrir a Lista de Material da Escola Maria Montessori" /></a></li>
                            <li ><a href="a-escola/metodo-de-ensino/" title="O método de ensino da Escola Maria Montessori"><img src="imgs/btn-infos-3-min.png" alt="Botão para abrir o método de ensino da Escola Maria Montessori" /></a></li>
                            <li ><a href="admin/uploads/<?php echo $ponteiro->selectArquivo(6) ?>" target="_blank" title="Cronograma de eventos da Escola Maria Montessori"><img src="imgs/btn-infos-5-min.png" alt="Botão para abrir o cronograma de eventos Escola Maria Montessori" /></a></li>
                            <li class="pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal"  title="Acessar ao Portal Educacional"><img src="imgs/btn-infos-4-min.png" alt="Botão para acessar ao Portal Educacional" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="home-info-sm" class="hidden-md hidden-lg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 dropdown" >
                        
                        <a href="#" title="INFORMAÇÕES IMPORTANTES" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            INFORMAÇÕES IMPORTANTES
                            <span class="caret pull-right"></span>
                        </a>
                        <ul class="dropdown-menu topo-1-drop pull-left">
                            <li><a href="admin/uploads/<?php echo $ponteiro->selectArquivo(1) ?>" target="_blank"  title="NOSSO CALENDÁRIO"><i class="glyphicon glyphicon-calendar"></i> &nbsp; NOSSO CALENDÁRIO</a></li>
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCont" data-titulo="NOSSAS LISTAS DE MATERIAS" data-pagina="lista" data-pre="<?php echo $pre ?>"  title="NOSSA LISTA DE MATERIAIS "><i class="glyphicon glyphicon-list-alt"></i> &nbsp; NOSSAS LISTAS DE MATERIAIS</a> </</li>                        
                            <li><a href="a-escola/metodo-de-ensino/"  title="NOSSO MÉTODO DE ENSINO"><i class="glyphicon glyphicon-book"></i> &nbsp; NOSSO MÉTODO DE ENSINO</a></li> 
                            <li><a href="admin/uploads/<?php echo $ponteiro->selectArquivo(6) ?>" target="_blank"  title="CRONOGRAMA DE EVENTOS"><i class="glyphicon glyphicon-calendar"></i> &nbsp; CRONOGRAMA DE EVENTOS</a></li>
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal"   title="ACESSO AO PORTAL EDUCACIONAL"><i class="glyphicon glyphicon-lock"></i> &nbsp; ACESSO AO PORTAL EDUCACIONAL</a></li>                         
                          </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--informações importantes  -->
        
         <!--banner e noticias  -->
        <div class="container" id="meio-home">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="list-inline lista-cabecalho" >
                        <li class="li-topo-marker"></li>
                        <li class="li-topo-txt">nossos destaques</li>
                    </ul>
                    
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">                      
                      
                      
                    </div> 
                    <img src="imgs/bg-slider-min.png" alt="sombra para o silder" class="img-responsive hidden-sm hidden-xs sombra-slider" />                   
                </div>
                
                <div class="col-md-4 col-xs-12">
                    <ul class="list-inline lista-cabecalho" >
                        <li class="li-topo-marker"></li>
                        <li class="li-topo-txt">últimas notícias</li>
                    </ul>
                    <ul class="list-unstyled ul-noticias">
                        <?php
                        if(mysqli_num_rows($dbResultN) != 0)
                        {
                            while($dbRowN = mysqli_fetch_array($dbResultN))
                            { 
                            
                        ?>

                                <li>
                                    <a href="noticias/<?php echo $dbRowN['noticias_id'].'-'.$ponteiro->formataLink($dbRowN['titulo'],'-') ?>" title="<?php echo $dbRowN['titulo'] ?>">
                                        <div class="not-img pull-left">
                                            <img src="admin/uploads/r<?php echo $dbRowN['foto'] ?>" width='110' alt="<?php echo $dbRowN['titulo'] ?>" />
                                        </div>
                                        <span><?php echo $ponteiro->formataData($dbRowN['data'],'exibir') ?></span>
                                        <p><?php echo $dbRowN['titulo'] ?></p>
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
        <!--banner e noticias  -->
        
        
        <!-- ensino home  -->
        <div class="container" id="ensino-home">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12    col-md-offset-3 col-sm-offset-2">
                    <img src="imgs/titulo-nosso-ensino-min.png" alt="Titulo para descrever os ensinos da escola Maria Montessori"  class="img-responsive center-block" />
                </div>
                <div class="col-xs-12">
                    <ul class="list-inline">
                        <li class="ens-infantil col-xs-12 col-md-6">
                            <img src="imgs/titulo-en-infantil-min.png" alt="Titulo Ensino Infantil Maria Montessori"  class="img-responsive center-block" />
                            <div class="col-md-7 col-xs-12   ensino-home-txt">
                                <?php echo substr(strip_tags($dbRowEI['texto']),0,250) ?>...
                                <a href="nosso-ensino/ensino-infantil/" title="Saiba Mais" class="btn-ens-mais">SAIBA MAIS</a>
                            </div>
                        </li>
                        
                        <li class="ens-fundamental col-xs-12 col-md-6">
                            <img src="imgs/titulo-en-fundamental-min.png" alt="Titulo Ensino Fundamental Maria Montessori"  class="img-responsive center-block" />
                            <div class="col-md-7 col-xs-12  ensino-home-txt">
                                <?php echo substr(strip_tags($dbRowEF['texto']),0,250) ?>...
                                <a href="nosso-ensino/ensino-fundamental/" title="Saiba Mais" class="btn-ens-mais">SAIBA MAIS</a>
                            </div>
                        </li>
                    </ul>
                </div>
                
            </div>
            
        </div>
        <!-- ensino home  -->
        
        
        <!-- escola home  -->
        <div class="container-fluid" id="escola-home">
            <img src="imgs/img-bg-sobre-escola-min.jpg" alt="Imagem de backgroud sobra a Escola Maria Montessori" class="img-responsive" />
            
            <div class="container escola-content">
                <div class="row">
                    <div class="col-xs-12 text-center titulo-esola-home hidden-sm hidden-xs">
                        CONHEÇA MAIS A ESCOLA MARIA MONTESSORI
                    </div>
                    <div class="col-xs-12 titulo-escola-quem">
                        <img src="imgs/titulo-sobre-escola-min.png" alt="Titulo Saiba Quem Somos" class="pull-right" />
                    </div>
                    <div class="col-xs-12 titulo-escola-holder">
                        <div class="col-xs-12 col-md-4 hidden-sm hidden-xs ">
                            <ul class="list-unstyled">
                                <li><a href="tv-montessori/" title="TV MONTESSORI"><img src="imgs/btn-1-escola-home-min.png" alt="Botão para abrir a página tv montessori" /> </a></li>
                                <li><a href="a-escola/regimento-escolar/" title="REGIMENTO ESCOLAR ESCOLA MARIA MONTESSORI"><img src="imgs/btn-2-escola-home-min.png" alt="Botão para abrir o regimento escolar da escola maria montessori" /> </a></li>
                                <li><a href="a-escola/nossa-historia/" title="HISTÓRIA DA ESCOLA MARIA MONTESSORI"><img src="imgs/btn-3-escola-home-min.png" alt="Botão para abrir a página história da maria montessori" /> </a></li>
                                <li><a href="a-escola/galeria-de-fotos/" title="GALERIA DE FOTOS DA ESCOLA MARIA MONTESSORI"><img src="imgs/btn-4-escola-home-min.png" alt="Botão para galeria de fotos da escola maria montessori" /> </a></li>
                            </ul>                            
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <p><?php echo substr(strip_tags($dbRowEscola['texto']),0,750) ?>...</p>
                            <a href="a-escola/nossa-historia/" title="Saiba Mais" class="btn-ens-mais pull-right">SAIBA MAIS</a>
                        </div>                          
                    </div>
                </div>
            </div>
            
           
        
        </div>
         <!-- escola home  -->
         
          <!-- depoimenti home  -->
         <div class="container depoimento-content">                 
                    <div class="col-xs-12 ">
                        <img src="imgs/titulo-depoimentos-min.png" alt="titulo dos depoimentos do site" class="img-responsive center-block"  />
                    </div>                  
                    <div class="col-xs-12 depoimento-content-bg">
                        <div class="col-xs-12 col-md-2">
                            <img src="<?php echo (!empty($dbRowDE['foto']) ? 'admin/uploads/r'.$dbRowDE['foto']:'imgs/img-dp-min.jpg') ?>" class="img-circle img-responsive center-block"  />
                        </div>
                        <div class="col-xs-12 col-md-9">
                            <h1><?php echo $dbRowDE['nome'].' - '.$dbRowDE['tipo'] ?></h1>
                            <p><span>"</span><?php echo $dbRowDE['texto'] ?><span>"</span></p>
                                                            
                        </div>
                    </div>
          </div>
        
        
        
      
             
    </content>
    <!--CONTEUDO  -->
    
    <!--rodape  -->        
    <?php require_once("includes/rodape.php") ?>
    <!--rodape  -->
   
   
    
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


    <div class="modal fade" id="exampleModalPop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelPop">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 550px; margin-top: 100px;">
          <div class="modal-body" align="center">
                <div style="display: block;overflow: hidden; width: 100%; " align="right">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div id="pophome">
                   
                </div>
                   
          </div>          
        </div>
      </div>
    </div>



            


    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({ 
                type: 'GET', 
                url: "https://hd.escolamontessori.com.br/webservice/popup.php",
                dataType: 'json',
                beforeSend:function(){
                    
                }, 
                success: function(data) { 
                     if(data.verifica == 'true'){
                        if(data.arDados.length == 1){
                            $.each(data.arDados,function(i,dados){
                               var html ='<a href="'+dados.POP_Link+'" target="_black"> <img src="https://hd.escolamontessori.com.br/intranet/files/'+dados.POP_File+'" class="img-responsive" alt="Pop up informativo" /></a>';
                               $("#pophome").html(html);
                                $('#exampleModalPop').modal('show');
                                setTimeout(function(){$('#exampleModalPop').modal('hide');},30000); 
                            });
                        }
                    }
                },
                error: function()
                {
                   console.log('Não foi possível estabelecer uma conexão!', ':(');  
                }
            }); 
        
            $.ajax({ 
                type: 'GET', 
                url: "https://hd.escolamontessori.com.br/webservice/banner.php",
                dataType: 'json',
                beforeSend:function(){
                    
                }, 
                success: function(data) {
                    if(data.verifica == 'true'){
                        let ols = `<ol class="carousel-indicators">`;
                        let i = 0;
                        data.arDados.forEach(banner => {
                            ols += `<li data-target="#carousel-example-generic" data-slide-to="${i}" ${i == 0 ? 'class="active"': ''} ></li>`;
                            i++;
                        });
                        ols +=`</ol>`;

                        let divs = `<div class="carousel-inner" role="listbox">`;
                        i=0
                        data.arDados.forEach(banner => {
                            divs += `
                                <div class="item ${i == 0 ? 'active': ''}">
                                  <a href="${banner.BNN_Link}" >
                                        <img src="https://hd.escolamontessori.com.br/intranet/files/${banner.BNN_File}"  alt="">
                                  </a>
                                </div>
                            `;
                            i++;
                        });
                        divs += `</div>
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>`;
                        $("#carousel-example-generic").html(ols+divs);

                  
                    }  
                },
                error: function(data)
                {
                    console.log(data);  
                    console.log('Não foi possível estabelecer uma conexão!', ':(');  
                }
            }); 
            
        });
    </script>

</body>
</html>