<form method="post">
	<?php foreach (Comodo::listar() as $comodo): ?>
	<fieldset>
		<legend><?= $comodo->nome ?></legend>
		<?php foreach (Dispositivo::listarPorComodo($comodo->idComodo) as $dispositivo): ?>
		<input type="button" class="<?= $dispositivo->ligado? 'ligado' : 'desligado' ?>" value="<?= $dispositivo->nome ?>"
		onclick="acionar(<?= $dispositivo->idDispositivo ?>, this)" />
		<?php endforeach; ?>
	</fieldset>
	<?php endforeach; ?>
</form>