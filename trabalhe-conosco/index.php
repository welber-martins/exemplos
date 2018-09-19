<?php
$pre = '../';
require_once("../includes/redirectSeo.php");
require_once("../includes/php/model.php");
$ponteiro = new model();
$dbResultArea = $ponteiro->selectArea();
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
    <link href="../css/banner-trabalhe.css" rel="stylesheet">   
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/bg-internas.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/trabalhe.css" rel="stylesheet">

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
                            <li><a href="#" title="FALE CONOSCO" class="nav-interna-top-marcada">TRABALHE CONOSCO</a></li>
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
                            <img src="../imgs/titulo-trabalhe-sm-min.png" alt="Imagem do banner 1 o seu futuro começa aqui."  class="img-responsive "  />
                        </div>
                    </div>
                </div>                 
             </div>
            <img src="../imgs/bg-generico-2-min.jpg" class="img-responsive" />
        </div>   
      
        
        
        <div class="container-fluid bg-interna-branca">
        	
        	<div class="container">
                <div class="row">
                     <ul class="list-inline lista-cabecalho col-xs-12 col-md-8 " >
                            <li class="li-topo-marker"></li>
                            <li class="li-topo-txt">VAGAS ABERTAS</li>
                        </ul>
                        <ul class="list-inline lista-material col-xs-12" id="vagas-abertas">
                                 <li class="col-xs-12 col-sm-3" >
                                    <a href="javascript:void(0)" onclick="abreTrabalhe('Contabilidade - Analista Contábil Júnior','- Superior completo em Ciências Contábeis;- Experiência sólida com rotinas de contabilidade e geração de relatórios, além de Excel avançado. É desejável ter habilidade com o sistema TOTVS/RM e passagens por escolas e instituições sem fins lucrativos.- Efetivo - CLT - Remuneração: R$ 2.791,56')" title="Contabilidade - Analista Contábil Júnior"><span class="glyphicon glyphicon-user"></span> <br> Contabilidade - Analista Contábil Júnior</a>
                                </li>
                               
                        </ul>
                </div> 
                <br> 

                <div class="row">


                    <div class="col-md-4 pull-left  hidden-sm hidden-xs">
                        <p>
                            Junte-se ao nosso time. <br>
                            Envie seu currículo
                         </p>
                        <p class="contatos-fone">(61) 3346-2733</p>
                        <p>
                            Horário de Funcionamento Financeiro:<br> 
                             De 7h30 às 12h30 <br>
                            e das 13h30 às 18h15
                        </p>
                        <ul class="list-unstyled menu-fale-int" >
                            <li><a href="../fale-conosco/" title="Tire suas dúvidas - fale conosco" ><img src="../imgs/btn-contatos-1-min.png" alt="Tire suas dúvidas - fale conosco"></a></li>  
                            <li><a href="#" title="Faça parte da nossa equipe - trabalhe conosco" class="menu-fale-int-marcado"><img src="../imgs/btn-contatos-2-min.png" alt="Faça parte da nossa equipe - trabalhe conosco"></a></li>  
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
                                Junte-se ao nosso time. Envie seu currículo
                             </p>
                            <p class="contatos-fone"><a href="tel:06133462733" >(61) 3346-2733 </a></p>
                            <p>
                               <strong> Horário de Funcionamento Financeiro:</strong> De 7h30 às 12h30  e das 13h30 às 18h15
                            </p>  
                        </div>
                       
                        <ul class="list-inline lista-cabecalho col-xs-12 col-md-8 " >
                            <li class="li-topo-marker"></li>
                            <li class="li-topo-txt">ENVIE SEUS DADOS PROFISSIONAIS</li>
                        </ul>
                        <div class="form-contatos">
                            <a href="modelo-de-curriculo.doc" class="btn btn-primary btn-lg" style="text-transform: uppercase; margin-left: 10px; margin-bottom:20px; white-space: normal; "> baixe nosso modelo de currículo, preencha e envie no formulário abaixo.</a>
                            
                            <form name="formTrabalhe" action="cadastra.php" id="formTrabalhe" method="post" onsubmit="validaForm();return false;"   enctype="multipart/form-data">

                                <div class="col-md-6 col-xs-12 " >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-user input-lg"></i>
                                        <input type="text" name="nome" id="nome" class="form-control input-lg" placeholder="Informe seu nome" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12 " >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-envelope input-lg"></i>
                                        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Informe seu e-mail" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12" >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-phone-alt input-lg"></i>
                                        <input type="text" name="telefone" id="telefone" class="form-control input-lg" placeholder="Informe seu telefone" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12" >
                                     <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-star input-lg"></i>
                                        <select name="sexo" id="sexo" class="form-control input-lg">
                                            <option value="" >Informe seu sexo</option>
                                            <option value="M" >Masculino</option>
                                            <option value="F" >Feminino</option>
                                        </select>
                                    </div>
                                </div>

                                 <div class="col-md-6 col-xs-12 " >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-calendar input-lg"></i>
                                        <input type="text" name="dataNasc" id="dataNasc" class="form-control input-lg" placeholder="Informe sua data de nascimento" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12" >
                                     <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-list-alt input-lg"></i>
                                        <select name="sexo" id="sexo" class="form-control input-lg">
                                             <option value="" >Informe seu grau de instrução</option>
                                           	 <option value="1"  >Anos Iniciais (1º ao 5º) Completo</option>
	                                		 <option value="2"  >Analfabeto</option>
	                                		 <option value="3"  >Doutorado</option>
	                                		 <option value="4"  >Ensino Fundamental Completo</option>
	                                		 <option value="5"  >Ensino Médio Completo</option>
	                                		 <option value="6"  >Ensino Fundamental Incompleto</option>
	                                		 <option value="7"  >Ensino Médio Incompleto</option>
	                                		 <option value="8"  >Mestrado</option>
	                                		 <option value="9"  >Pós-Graduação</option>
	                                		 <option value="10"  >Superior/Graduação Completo</option>
	                                		 <option value="11" >Superior/Graduação Incompleto</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12 " >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-map-marker input-lg"></i>
                                        <input type="text" name="endereco" id="endereco" class="form-control input-lg" placeholder="Informe seu endereço" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12" >
                                     <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-folder-open input-lg"></i>
                                        <select name="area" id="area" class="form-control input-lg">
                                            <option value="">Informe a área prentendida</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12" >
                                     <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-folder-open input-lg"></i>
                                        <select name="cargo" id="cargo" class="form-control input-lg">
                                            <option value="">Informe o cargo prentendido</option>                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 " >
                                   
                                    <div class="input-group input-group-lg ">
                                       <span class="input-group-addon ">
                                            <span class="glyphicon glyphicon-open-file"></span>
                                            CURRÍCULO
                                        </span>                                        
                                        <input type="file" id="curriculo" name="curriculo" class="form-control input-lg" placeholder="Anexe seu currículo" />
                                    </div> 
                                </div>
                              

                                <div class="col-xs-12" >
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-pencil input-lg"></i>
                                        <textarea  name="mensagem" id="mensagem" placeholder="Escreva sua mensagem" class="form-control input-lg"></textarea>
                                    </div>
                                    
                                </div>

                                <div class="col-xs-12" >                                    
                                    <input type="submit" value="ENVIAR" class="pull-right" name="">
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
                
                <!--
                <div class="col-xs-12">
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
                </div>
            -->
            <br><br>
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
   
   
    <div id="enviaContato" style="display: none;">

    </div>
    



            


	<script src="../js/jquery-3.1.1.min.js"></script>    
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/js.js"></script>
    <script type="text/javascript" src="../js/jquery.form.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#area').change(function(event) {
                $.ajax({ 
                    type: 'POST', 
                    url: "https://hd.escolamontessori.com.br/webservice/vagas.php",
                    data: { 
                            opcao:'cargo',
                            id:$('#area').val()
                          }, 
                    dataType: 'json',
                    beforeSend:function(){
                        $('#cargo').html('<option>Carregando...</option>');
                    }, 
                    success: function(data) { 
                         if(data.verifica == 'true'){
                            $('#cargo').html('<option value="">Informe o cargo prentendido</option>');    
                            $.each(data.arDados,function(i,dados){
                                $('#cargo').append('<option value="'+dados.CAR_Id+'">'+dados.CAR_Descricao+'</option>');    
                            });
                        }
                    },
                    error: function()
                    {
                       console.log('Não foi possível estabelecer uma conexão!', ':(');  
                    }
                }); 
            });
            $.ajax({ 
                type: 'POST', 
                url: "https://hd.escolamontessori.com.br/webservice/vagas.php",
                data: { 
                        opcao:'vagas'
                      }, 
                dataType: 'json',
                beforeSend:function(){
                    $("#vagas-abertas").html('');
                    $("#enviaContatos").html('');
                }, 
                success: function(data) { 
                     if(data.verifica == 'true'){
                        $.each(data.arDados,function(i,dados){
                            var html = '';
                            html+= '<li class="col-xs-12 col-sm-3 " >';
                            html+= '        <a href="javascript:void(0)" class="vagas-link" onclick="abreTrabalhe('+dados.CVG_Id+')" title="'+dados.CVG_Titulo+'"><span class="glyphicon glyphicon-user"></span> <br> '+dados.CVG_Titulo+' </a>';
                            html+= '</li>';
                            $("#vagas-abertas").append(html);
                            var html2 = '';
                            html2+= '<div id="vagas-titulo-'+dados.CVG_Id+'">'+dados.CVG_Titulo+'</div>';
                            html2+= '<div id="vagas-txt-'+dados.CVG_Id+'">'+dados.CVG_Descricao.replace(/\n/g, "<br />");+'</div>';
                            $("#enviaContato").append(html2);
                        });
                    }
                },
                error: function()
                {
                   console.log('Não foi possível estabelecer uma conexão!', ':(');  
                }
            });  

            $.ajax({ 
                type: 'POST', 
                url: "https://hd.escolamontessori.com.br/webservice/vagas.php",
                data: { 
                        opcao:'area'
                      }, 
                dataType: 'json',
                beforeSend:function(){
                    $('#area').html('<option>Carregando...</option>');
                }, 
                success: function(data) { 
                     if(data.verifica == 'true'){
                        $('#area').html('<option value="">Informe a área prentendida</option>');    
                        $.each(data.arDados,function(i,dados){
                            $('#area').append('<option value="'+dados.CCA_Id+'">'+dados.CCA_Descricao+'</option>');    
                        });
                    }
                },
                error: function()
                {
                   console.log('Não foi possível estabelecer uma conexão!', ':(');  
                }
            });   
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#dataNasc').mask('00/00/0000');
        });

        function validaForm()
        {
          
            var v = grecaptcha.getResponse();
            var verifica  = true;
            var html = '';
            if($("#ome").val() == '')
            {
                html += ' - CAMPO <strong>NOME</strong> OBRIGATÓRIO <BR />'; 
                verifica = false;
            }
            if(!checkMail($("#email").val()) )
            {
                html += ' - CAMPO <strong>E-MAIL</strong> INVÁLIDO <BR />'; 
                verifica = false;
            }
           
            if($("#sexo").val() == '')
            {
                html += ' - CAMPO <strong>SEXO</strong> OBRIGATÓRIO <BR />'; 
                verifica = false;
            }
           if(!VerificaData($("#dataNasc").val()))
            {
                html += ' - CAMPO <strong>DATA DE NASCIMENTO </strong> INVÁLIDO <BR />'; 
                verifica = false;
            }
            if($("#area").val() == '')
            {
                html += ' - CAMPO <strong>ÁREA PRETENDIDA</strong> OBRIGATÓRIO <BR />'; 
                verifica = false;
            }
            if($("#cargo").val() == '')
            {
                html += ' - CAMPO <strong>CARGO PRETENDIDO</strong> OBRIGATÓRIO <BR />'; 
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
                $("#formTrabalhe").attr('onsubmit','');
                $('#formTrabalhe').ajaxForm({ 
                   target:'#enviaContato', 
                    beforeSubmit:  function(){
                        $('#exampleModal').find('.modal-title').text('Enviado...');
                        $('#exampleModal').find('.modal-body p').html('Estamos enviando seu  currículo, aguarde.<br><div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>');
                        $('#exampleModal').modal('show');
                    },  
                   success:  function() {

                        var res = $.trim($('#enviaContato').html());
                        if (res == 'OK'){
                            $('#exampleModal').find('.modal-title').text('Currículo Enviado');
                            $('#exampleModal').find('.modal-body p').html('Seu currículo foi enviado com sucesso! <br> Atenciosamente, Escola Maria Motessori');
                            $('#exampleModal').modal('show');
                            $('#exampleModal').on('hidden.bs.modal', function () { 
                                window.location='../trabalhe-conosco/';          
                            });
                        }
                        else{
                            $('#exampleModal').find('.modal-title').text('Erro!');
                            $('#exampleModal').find('.modal-body p').html(res);
                            $('#exampleModal').modal('show');                            
                        }
                       

                   } 
                }).submit();

            } 
        }

        function abreTrabalhe(id){
            $('#exampleModal').find('.modal-title').text($("#vagas-titulo-"+id).html());
            $('#exampleModal').find('.modal-body p').html($("#vagas-txt-"+id).html());
            $('#exampleModal').modal('show');
        }

    </script>

</body>
</html>