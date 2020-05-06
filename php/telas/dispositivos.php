<form class="JSafo Form row" action="php/modulos/dispositivos.php" onsubmit="inserirConteudo('dispositivos', response)">
	<div class="col-md-4 row">
		<h2>Cadastrar dispositivo</h2>
		<div class="form-group col-md-9">
			<label>Cômodo</label>
			<select class="form-control" name="idComodo">
				<?php foreach (Comodo::listar() as $comodo): ?>
				<option value="<?= $comodo->idComodo ?>"><?= $comodo->nome ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group col-md-3">
			<label>Pino</label>
			<select class="form-control" name="idPino">
				<?php foreach (Pino::listar() as $pino): ?>
				<option value="<?= $pino->idPino ?>"><?= $pino->idPino ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group col-md-12">
			<label>Nome</label>
			<input class="form-control" type="text" name="nome" />
		</div>
		<input class="btn" type="button" name="acao" value="Adicionar" onclick="this.form.ask('Cadastrar dispositivo?')" />
		<input type="button" value="Excluir selecionado" class="btn" onclick="excluirDispositivo()" />
	</div>
	<div class="col-md-8" id="dispositivos">
		Carregando dispositivos...
	</div>
</form>
