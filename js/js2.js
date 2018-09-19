// JavaScript Document
$(document).ready(function(e) {
    var width = $( window ).width();
    mesmoTamnho('item-profissional');
    mesmoTamnho('item-tv');
    mesmoTamnho('item-galeria');

    
	trataTamanho(width);
	$(window).resize(function() {
		width = $( window ).width();
		mesmoTamnho('item-tv');
		mesmoTamnho('item-profissional');
		mesmoTamnho('item-galeria');
		trataTamanho(width);	 
	});
	
	$("#banner-1").css('display','block').addClass('animated fadeInDown');
	setTimeout(function(){ $("#banner-2").css('display','block').addClass('animated fadeInDown'); },1000);
	setTimeout(function(){ $("#banner-3").css('display','block').addClass('animated fadeInDown'); },2000);
	setTimeout(function(){ $("#banner-4").css('display','block').addClass('animated fadeInUp'); },3000);
	if($('.infos-ensino').lenght != 0){
		setTimeout(function(){ $(".infos-ensino").css('display','block').addClass('animated fadeInUp'); },4000);	
	}
	if($('.menu-a-escola').lenght != 0){
		setTimeout(function(){ $(".menu-a-escola").css('display','block').addClass('animated fadeInUp'); },4000);	
	}



	$(".banner-1").css('display','block').addClass('animated fadeInDown');
	setTimeout(function(){ $(".banner-2").css('display','block').addClass('animated fadeInDown'); },1000);
	setTimeout(function(){ $(".banner-3").css('display','block').addClass('animated fadeInDown'); },2000);
	setTimeout(function(){ $(".banner-4").css('display','block').addClass('animated fadeInUp'); },3000);

	var contBanner = 0;

	setInterval(function(){ 
		$(".banner-1,.banner-2,.banner-3,.banner-4").fadeOut(0);
		if(contBanner == 0){
			$('#bannerh-1').fadeOut(500);
			$('#bannerh-3').fadeOut(0);
			$('#bannerh-2').fadeIn(300);
			contBanner = 1;
		}

		if(contBanner == 1){
			$('#bannerh-2').fadeOut(500);
			$('#bannerh-1').fadeOut(0);
			$('#bannerh-3').fadeIn(300);
			contBanner = 2;
		}

		if(contBanner == 2){
			$('#bannerh-3').fadeOut(500);
			$('#bannerh-2').fadeOut(0);
			$('#bannerh-1').fadeIn(300);
			contBanner = 0;
		}


		
		
		$(".banner-1").css('display','block').addClass('animated fadeInDown');
		setTimeout(function(){ $(".banner-2").css('display','block').addClass('animated fadeInDown'); },1000);
		setTimeout(function(){ $(".banner-3").css('display','block').addClass('animated fadeInDown'); },2000);
		setTimeout(function(){ $(".banner-4").css('display','block').addClass('animated fadeInUp'); },3000);
		
	 }, 8000);


	mainmenu();

	$('.noticia-dentro-textos img').addClass('img-responsive');

	$("#bannerh-1-4,#btn-home-banner").click(function (){$('html, body').animate({scrollTop: ($("#ensino-home").offset().top)}, 1000); });

});

function trataTamanho(size){	
	if(parseInt(size) > 980)
	{
		$("#logo-topo").removeClass();	
	}
	else
	{
		$("#logo-topo").addClass('img-responsive');		
	}
}


function mainmenu(){
$(".menu-topo ul li ul li ul ").css({display: "none"}); // Opera Fix
$(".menu-topo li.menu-drop").hover(function(){			
			$(this).find("ul").css({visibility: "visible",display: "none"}).fadeIn(200);
		},function(){
			$(this).find('ul').css({visibility: "hidden"});
			
		});

		
	$(".menu-contatos").hover(function(){
		$('#menu-contatos').attr('id', 'menu-contatos-select');
		},function(){
			$('#menu-contatos-select').attr('id', 'menu-contatos');
	});

	$(".menu-ensino").hover(function(){
		$('#menu-ensino').attr('id', 'menu-ensino-select');
		},function(){
			$('#menu-ensino-select').attr('id', 'menu-ensino');
	});


	$(".menu-escola").hover(function(){
		$('#menu-escola').attr('id', 'menu-escola-select');
		},function(){
			$('#menu-escola-select').attr('id', 'menu-escola');
	});
}

function mesmoTamnho(classe)
{

	var height = '';
	height = $("."+classe).first().css('height');	
	$("."+classe+":not(:first)").css('height',height);	 
}

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var titulo = button.data('titulo')
  var texto = button.data('texto')
  var modal = $(this)
  modal.find('.modal-title').text(titulo)
  modal.find('.modal-body p').html(texto)
});

$('#exampleModal').on('hidden.bs.modal', function (event) {
 
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var titulo = button.data('titulo')
	  var texto = button.data('texto')
	  var modal = $(this)
	  modal.find('.modal-title').text('')
	  modal.find('.modal-body p').html('');
});


$('#exampleModalCont').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var titulo = button.data('titulo')
  var pagina = button.data('pagina')
  var pre = button.data('pre')
  var modal = $(this)
  modal.find('.modal-title').text(titulo)
  modal.find('.modal-body p').load(pre+'includes/conteudos.php?pagina='+pagina+'&pre='+pre)
});



function checkMail(mail){
	var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
	if(typeof(mail) == "string"){
		if(er.test(mail)){ return true; }
	}else if(typeof(mail) == "object"){
		if(er.test(mail.value)){ 
					return true; 
				}
	}else{ 
		return false;
		}
}



function VerificaData(digData) 
{
	var bissexto = 0;
	var data = digData; 
	var tam = data.length;
	if (tam == 10) 
	{
		var dia = data.substr(0,2)
		var mes = data.substr(3,2)
		var ano = data.substr(6,4)
		if ((ano > 1850) && (ano < 2200))
		{
			switch (mes) 
			{
				case '01':
				case '03':
				case '05':
				case '07':
				case '08':
				case '10':
				case '12':
				if  (dia <= 31) 
				{
						return true;
				}
				break
				
				case '04':              
				case '06':
				case '09':
				case '11':
				if  (dia <= 30) 
				{
						return true;
				}
				break
				case '02':
				/* Validando ano Bissexto / fevereiro / dia */ 
				if ((ano % 4 == 0) || (ano % 100 == 0) || (ano % 400 == 0)) 
				{ 
						bissexto = 1; 
				} 
				if ((bissexto == 1) && (dia <= 29)) 
				{ 
						return true;                             
				} 
				if ((bissexto != 1) && (dia <= 28)) 
				{ 
						return true; 
				}                       
				break                                           
			}
		}
	}
	return false;
}
