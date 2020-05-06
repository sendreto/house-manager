<table id="tabelaComodos" class="JSafo DataGrid">
	<thead>
		<tr>
			<th scope="col" width="22">ID</th>
			<th scope="col">Comodo</th>
			<th scope="col">Data cadastro</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach (Comodo::listar() as $comodo): $id = $comodo->idComodo ?>
		<tr>
			<td headers="idComodo"><?= $id ?></td>
			<td headers="nome" contenteditable="true" onblur="salvarComodo()"><?= $comodo->nome ?></td>
			<td headers="dataCadastro"><?= $comodo->dataCadastro ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>