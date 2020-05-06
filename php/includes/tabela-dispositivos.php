<table id="tabelaDispositivos" class="JSafo DataGrid">
	<thead>
		<tr>
			<th scope="col" width="30">ID</th>
			<th scope="col">Comodo</th>
			<th scope="col">Dispositivo</th>
			<th scope="col">Pino</th>
			<th scope="col">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach (Dispositivo::listar() as $dispositivo): ?>
		<tr>
			<td headers="idDispositivo"><?= $dispositivo->idDispositivo ?></td>
			<td headers="comodo"><?= $dispositivo->comodo ?></td>
			<td headers="nome" contenteditable="true" onblur="salvarDispositivo()"><?= $dispositivo->nome ?></td>
			<td headers="idPino"><?= $dispositivo->idPino ?></td>
			<td style="color:<?= $dispositivo->ligado? '#070':'#999' ?>"><?= $dispositivo->ligado? 'Ligado' : 'Desligado' ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>