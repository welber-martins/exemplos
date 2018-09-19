<?php
$pre = '../';
require_once("../includes/redirectSeo.php");
require_once("../includes/php/model.php");
$ponteiro = new model();
$dbResultFalar = $ponteiro->selectFalarCom();
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
    <link href="../css/banner-fale.css" rel="stylesheet">   
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/bg-internas.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/fale.css" rel="stylesheet">
   
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
        <div id="banner" class=" hidden-sm hidden-xs"  >
        	 <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="list-inline nav-interna-top">
                            <li><a href="#" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="CONTATOS">CONTATOS</a></li>
                            <li><span class="glyphicon glyphicon-menu-right"></span></li>
                            <li><a href="#" title="FALE CONOSCO" class="nav-interna-top-marcada">FALE CONOSCO</a></li>
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
                            <img src="../imgs/titulo-fale-conosco-sm-min.png" alt="Imagem do banner 1 o seu futuro começa aqui."  class="img-responsive "  />
                        </div>
                    </div>
                </div>                 
             </div>
            <img src="../imgs/bg-generico-2-min.jpg" class="img-responsive" />
        </div>   
      
        
        
        <div class="container-fluid bg-interna-branca">
        	
        	<div class="container">
                <div class="row">
                    <div class="col-md-4 pull-left  hidden-sm hidden-xs">
                        <p>
                            Entre em contato conosco. <br>
                            Envie suas sugestões, elogios ou críticas. 
                         </p>
                        <p class="contatos-fone">(61) 3346-2733</p>
                        <p>
                            Horário de Funcionamento Financeiro:<br> 
                             De 7h30 às 12h30 <br>
                            e das 13h30 às 18h15
                        </p>
                        <ul class="list-unstyled menu-fale-int" >
                            <li><a href="#" title="Tire suas dúvidas - fale conosco" class="menu-fale-int-marcado"><img src="../imgs/btn-contatos-1-min.png" alt="Tire suas dúvidas - fale conosco"></a></li>  
                            <li><a href="../trabalhe-conosco/" title="Faça parte da nossa equipe - trabalhe conosco"><img src="../imgs/btn-contatos-2-min.png" alt="Faça parte da nossa equipe - trabalhe conosco"></a></li>  
                            <li><a href="#" title="Veja nossa localização - saiba como chegar"><img src="../imgs/btn-contatos-3-min.png" alt="Veja nossa localização - saiba como chegar"></a></li> 
                        </ul>
                        
                        <p class="contatos-endereco">
                            SGAS 913 Conjunto A - Brasília-DF <br>
                            CEP: 70.390-130
                        </p>  
                       
                        
                    </div>

                    <div class="col-md-8 col-xs-12 pull-right" >
                        
                        <div class="col-md-4 pull-left  hidden-lg hidden-md">
                            <p>
                                Entre em contato conosco.  Envie suas sugestões, elogios ou críticas. 
                             </p>
                            <p class="contatos-fone"><a href="tel:06133462733" >(61) 3346-2733 </a></p>
                            <p>
                               <strong> Horário de Funcionamento Financeiro:</strong> De 7h30 às 12h30  e das 13h30 às 18h15
                            </p>  
                        </div>
                        <ul class="list-inline lista-cabecalho col-xs-12 col-md-8 " >
                            <li class="li-topo-marker"></li>
                            <li class="li-topo-txt">ENIVE UM E-MAIL</li>
                        </ul>
                        <div class="form-contatos">
                            
                            <form name="formContatos" id="formContatos" method="post" onsubmit="validaForm(); return false;" action="envia.php"> 
                                <div class="col-md-6 col-xs-12 " >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-user input-lg"></i>
                                        <input type="text" name="faleNome" id="faleNome" class="form-control input-lg" placeholder="Informe seu nome" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12 " >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-envelope input-lg"></i>
                                        <input type="text" name="faleEmail" id="faleEmail" class="form-control input-lg" placeholder="Informe seu e-mail" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12" >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-phone-alt input-lg"></i>
                                        <input type="text" name="faleTelefone" id="faleTelefone"   class="form-control input-lg" placeholder="Informe seu telefone" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12" >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-star input-lg"></i>
                                        <input type="text" name="faleAssunto" id="faleAssunto"  class="form-control input-lg" placeholder="Informe o assunto" />
                                    </div>
                                </div>

                                <div class="col-xs-12" >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-check input-lg"></i>
                                        <select class="form-control input-lg" name="faleLocal" id="faleLocal" >
                                            <option value="">Quero falar com</option>
                                            <?php
                                            if(mysql_num_rows($dbResultFalar) != 0){
                                                while($dbRowFalar = mysql_fetch_array($dbResultFalar)){

                                            ?>
                                                    <option value="<?php echo $dbRowFalar['assuntos_id'] ?>" ><?php echo $dbRowFalar['descricao'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12" >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-pencil input-lg"></i>
                                        <textarea name="faleMensagem" id="faleMensagem"  placeholder="Escreva sua mensagem" class="form-control input-lg"></textarea>
                                    </div>
                                </div>

                                <div class="col-xs-12" >
                                        <input type="submit" value="ENVIAR" class="pull-right" name="" >
                                        <div class="g-recaptcha pull-right" style="margin-right: 40px;" data-sitekey="6LeMZQ0UAAAAAASRi3KDoUf3EdSCOMPpNCLSHajz"></div>

                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            

        </div>
        <div class="container-fluid bg-interna-branca-sombra">&nbsp;</div>


        <div class="container chegar">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12    col-md-offset-3 col-sm-offset-2">
                    <img src="../imgs/titulo-como-chegar-min.png" alt="Titulo para descrever os ensinos da escola Maria Montessori"  class="img-responsive center-block" />
                </div>
                
                <!--<div class="col-xs-12">
                    <div class="input-group input-group-lg rota-mapa">
                                
                        <span class="input-group-addon hidden-sm hidden-xs">
                            <span class="glyphicon glyphicon-map-marker"></span>
                            TRAÇAR ROTA
                        </span>
                        
                        <input type="text" class="form-control" placeholder="Informe sua localização" />
                        
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary">OK</button>
                        </span>
                    </div> 
                </div>-->

                <div class="col-xs-12 holder-mapa">
                        
                        <iframe width="100%"  height="500px" frameborder="0" style="border:0"   src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA5BRrUBDtQNmfUfYtN86luoHzSh3ouOwE&q=SHCS St. de Grandes Áreas Sul 913 - Brasília, DF, 70390-130" allowfullscreen>
                        </iframe>
                </div>
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
    <?php require_once("../includes/rodape.php") ?>
    <!--rodape  -->
   
   
    <div id="enviaContato" style="display: none;">--</div>
    



            

    
	<script src="../js/jquery-3.1.1.min.js"></script>    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/js.js"></script>
    <script type="text/javascript" src="../js/jquery.form.min.js"></script>
    <script type="text/javascript">
       

        function validaForm()
        {
          
            var v = grecaptcha.getResponse();
            var verifica  = true;
            var html = '';
            if($("#faleNome").val() == '')
            {
                html += ' - CAMPO <strong>NOME</strong> OBRIGATÓRIO <BR />'; 
                verifica = false;
            }
            if(!checkMail($("#faleEmail").val()) )
            {
                html += ' - CAMPO <strong>E-MAIL</strong> INVÁLIDO <BR />'; 
                verifica = false;
            }
           
            if($("#faleAssunto").val() == '')
            {
                html += ' - CAMPO <strong>ASSUNTO</strong> OBRIGATÓRIO <BR />'; 
                verifica = false;
            }
           if($("#faleLocal").val() == '')
            {
                html += ' - CAMPO <strong>FALAR COM </strong> OBRIGATÓRIO <BR />'; 
                verifica = false;
            }
            if($("#faleMensagem").val() == '')
            {
                html += ' - CAMPO <strong>MENSAGEM</strong> OBRIGATÓRIO <BR />'; 
                verifica = false;
            }
            if(v.length == 0)
            {
                html += ' - POR FAVOR MARQUE A VERIFICAÇÃO <BR />';                 
                verifica = false;
            }
            
                    
            if (verifica == false)
            {
                $('#exampleModal').find('.modal-title').text('Atenção campos obrigatórios!');
                $('#exampleModal').find('.modal-body p').html(html);
                $('#exampleModal').modal('show');
            }
            else
            {
                $("#formContatos").attr('onsubmit','');
                $('#formContatos').ajaxForm({ 
                   target:'#enviaContato', 
                    beforeSubmit:  function(){
                        $('#exampleModal').find('.modal-title').text('Enviado...');
                        $('#exampleModal').find('.modal-body p').html('Estamos enviando sua mensagem, aguarde.<br><div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>');
                        $('#exampleModal').modal('show');
                    },  
                   success:  function() {
                        $('#exampleModal').find('.modal-title').text('Contato Enviado');
                        $('#exampleModal').find('.modal-body p').html('Sua mensegam foi enviada com sucesso, em breve entraremos em contato. <br> Ateciosamente, Escola Maria Motessori');
                        $('#exampleModal').modal('show');
                        $('#exampleModal').on('hidden.bs.modal', function () { 
                            window.location='../fale-conosco/';          
                        });


                   } 
                }).submit();

            } 
        }


    </script>

</body>
</html>