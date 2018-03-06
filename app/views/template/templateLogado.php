<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login MVC</title>
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/estilo.css">
</head>
<body>
	<div class="containerTopo">
		<div class="menuTopo">
			<div class="logo">Sistema MVC - <?= $nome ?></div>
			<div class="opcoesMenu">
				<ul>
					<li><a href="#" alt="Home" title="Home">Home</a></li>
					<li><a href="#" alt="Filmes" title="Filmes">Filmes</a></li>
					<li><a href="#" alt="Séries" title="Séries">Séries</a></li>
					<li><a href="#" alt="Social" title="Social">Social</a></li>
					<li><a href="#" alt="Contato" title="Contato">Contato</a></li>
					<li><a href="<?= BASE_URL ?>restrito/produtos/" alt="Produtos" title="Produtos">Produtos</a></li>
					<li><a href="<?= BASE_URL ?>restrito/sair/" id="Sair" alt="Sair" title="Sair">Sair</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="containerBanner">
		<div class="banner">
			Banner do site
	</div>
	</div>
	<div class="containerConteudo">
		<?php $this->loadTemplateLogadoInView($viewName, $viewData); ?>
	</div>
	<div class="containerRodape">
		<div class="rodape">
			Todos os direitos reservados.
		</div>
	</div>
	<div class="boxChat">
		<div class="chat">Chat Online</div>
    </div>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/js/script.js"></script>
</body>
</html>