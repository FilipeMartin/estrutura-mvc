Conteúdo

    <div class="loginFundo"></div>
    <div class="containerLogin">
    	<form class="form" id="form" method="POST">
    		<label for="login">Login</label><br/>
    		<input class="campoForm" type="text" name="login" id="login" placeholder="Digite seu login"><br/>
    		<div class="txtAvisoCampo" id="avisoLogin"></div>

    		<div style="margin-top:7px;"><label for="senha">Senha</label></div>
    		<input class="campoForm" type="password" name="senha" id="senha" placeholder="Digite sua senha"><br/>
    		<div class="txtAvisoCampo" id="avisoSenha"></div>

    		<input type="hidden" name="token" id="token" value="<?= $token ?>">

    		<input type="submit" class="btnEntrar" id="btnEntrar" name="entrar" value="Entrar">
            <div class="txtAvisoCampo" id="txtAviso"></div>
    	</form>
	</div>