<form class="JSafo Form row" action="php/modulos/comodos.php" onsubmit="inserirConteudo('comodos', response)">
	<div class="col-md-4">
		<h2>Cadastrar cômodo</h2>
		<div class="form-group">
			<label>Nome</label>
			<input class="form-control" type="text" name="nome" />
		</div>
		<input type="button" name="acao" class="btn" value="Adicionar" onclick="this.form.ask('Cadastrar cômodo?')" />
		<input type="button" value="Excluir selecionado" class="btn" onclick="excluirComodo()" />
	</div>
	<div class="col-md-8" id="comodos">
		Carregando cômodos...
	</div>
</form>
