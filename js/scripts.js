jQuery(document).ready(function() {
	jQuery(".galeria-imagem a, .fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none',
		helpers	: {
			title	: {
				type: 'inside'
			}
		}
	});

	// código da tela de abertura
	if (localStorage.getItem('jaViuAbertura') === 'true') {

	} else{
		var corpo = jQuery('body');
		var abertura = jQuery('#area-abertura');
		corpo.addClass('body-abertura');
		abertura.removeClass('dn');

		var fecharAbertura = function(){
			localStorage.setItem('jaViuAbertura', 'true');
			abertura
			.animate(
				{'opacity': '0'},
				500, function() {
					corpo.removeClass('body-abertura');
					abertura.remove();
			});
		}

		var tempoFechar = 7000;
		var timeOutFechar = setTimeout(function(){
			fecharAbertura();
		}, tempoFechar);

		abertura.on('click', function(event) {
			fecharAbertura();
			clearInterval(timeOutFechar);
		});
	}



    if ( !(jQuery(".col-aside").length > 0) ) {
        jQuery(".col-conteudo").addClass("full");
    }
  
	jQuery('.respostas').find('.pergunta').click(function(){
	  jQuery(this).toggleClass('ativo');
	  jQuery('.respostas').find('.pergunta').not(jQuery(this) ).removeClass('ativo');
	  jQuery(this).next().slideToggle('fast');
	  jQuery(".resposta").not(jQuery(this).next()).slideUp('fast');
	}); 

  jQuery( "main" ).prepend( "<div class='canvas-overlay'></div>" );
    function escondeSidebar() {
    jQuery('.canvas, .canvas-overlay').removeClass('visivel');
    setTimeout(function(){
      jQuery('.canvas, .canvas-overlay').removeClass('db');
    },330)
    jQuery('main').off('mousedown', escondeSidebar);
    jQuery('.canvas').off('swipeleft', escondeSidebar);
    jQuery('.canvas-overlay').removeClass('visivel');
  
  }

  function mostraSidebar() {
    jQuery('.canvas, .canvas-overlay').addClass('db');
    setTimeout(function(){
      jQuery('.canvas, .canvas-overlay').addClass('visivel');
    },20)
    jQuery('main').on('mousedown', escondeSidebar);
    jQuery('.canvas').on('swipeleft', escondeSidebar);
  }

  jQuery('div.menu-busca > nav > span').on('click', function(){
    mostraSidebar();

  });



	var galerias = jQuery('.galeria');

	galerias.each(function(index, el) {
		var itensGal = jQuery(el).find('.galeria-item');
		var linhasGal = jQuery(el).find('.linha');

		var nColunas = parseInt(jQuery(el).attr('data-colunas') );

		if (linhasGal.eq(linhasGal.length-1).contents().length == 0) {
			linhasGal.eq(linhasGal.length-1).remove();
			linhasGal = jQuery(el).find('.linha');
		}

		if (linhasGal.length > 1) {

			if (nColunas > 2 && itensGal.length % nColunas == 1) {
				var ultimaLinha = linhasGal.eq(linhasGal.length-1);
				var penultimaLinha = linhasGal.eq(linhasGal.length-2);
				var itemMovido = penultimaLinha.find('.galeria-item').eq(penultimaLinha.find('.galeria-item').length-1);
				ultimaLinha.prepend(itemMovido);
				// linhasGal = jQuery(el).find('.linha');
			}

			linhasGal.each(function(index2, el2) {
				if (jQuery(el2).find('.galeria-item').length < nColunas){
					jQuery(el2).addClass('grid-'+jQuery(el2).find('.galeria-item').length);
				}
			});
		}
	}); 
});