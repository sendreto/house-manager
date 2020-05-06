<form class="JSafo Form row" action="php/modulos/usuarios.php" onsubmit="inserirConteudo('usuarios', response)">
	<div class="col-md-4">
		<h2>Cadastrar usuários</h2>
		<div class="form-group row">
			<div class="col-md-12">
				<label>Nome completo</label>
				<input class="form-control" type="text" name="nome" />
			</div>
			<div class="col-md-6">
				<label>Login</label>
				<input class="form-control" type="text" name="login" />
			</div>
			<div class="col-md-6">
				<label>Senha</label>
				<input class="form-control" type="password" name="senha" />
			</div>
		</div>
		<input type="button" name="acao" class="btn" value="Adicionar" onclick="this.form.ask('Cadastrar usuário?')" />
		<input type="button" value="Excluir selecionado" class="btn" onclick="excluirUsuario()" />
	</div>
	<div class="col-md-8" id="usuarios">
		Carregando usuários...
	</div>
</form>
