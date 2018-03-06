$(document).ready(function() {

	$('#form').submit(function() {
		var login = $('#login');
		var senha = $('#senha');
		var controler = true;

		var avisoLogin = $('#avisoLogin');
		if(login.val() === ''){
			avisoLogin.html('Campo login obrigatório');
			controler = false;
		}else{
			avisoLogin.empty();	
		}

		var avisoSenha = $('#avisoSenha');
		if(senha.val() === ''){
			avisoSenha.html('Campo senha obrigatório');
			controler = false;
		}else{
			avisoSenha.empty();
		}

		if(controler){
			validarLogin();
		}

		return false;
	});

	function validarLogin(){
		var url = 'http://localhost/requisicao/validar_login';
		var dadosForm = $('#form').serialize();
		var btn = $('#btnEntrar');
		var txtAviso = $('#txtAviso');
		var token = $('#token');

		$.ajax({
			url: url,
			type: 'POST',
			data: dadosForm,
			dataType: 'JSON',
			cache: false,

			beforeSend: function(){
				btn.attr('disabled', 'disabled');
				btn.val('Autentificando...');
				btn.addClass('btnHover');
				txtAviso.empty();
			},

			success: function(resultado){

				if(resultado.status){
					btn.val('Redirecionando...');
					window.location.href = "http://localhost/restrito/";

				}else{
					switch(resultado.alerta){
						case 1: txtAviso.html('Login ou senha inválido'); break;
						case 2: txtAviso.html('Token inválido'); break;
						case 3: txtAviso.html('Origem da requisição inválida');
					}

					// Novo Token
					token.val(resultado.novoToken);

					// Resetar btn
					btn.removeAttr('disabled');
					btn.val('Entrar');
					btn.removeClass('btnHover');
				}
			},

			error: function(){
				// Resetar btn
				btn.removeAttr('disabled');
				btn.val('Entrar');
				btn.removeClass('btnHover');

				txtAviso.html('Erro no envio da requisição');
			}			
		});
	}

	$('#btnLogin').click(function() {
		var fundoLogin = $('.loginFundo');
		var login = $('.containerLogin');

		fundoLogin.fadeIn('fast');
		login.fadeIn('fast');

		return false;
	});

	$('.loginFundo').click(function() {

		$(this).fadeOut('fast');
		$('.containerLogin').fadeOut('fast');

	});

});