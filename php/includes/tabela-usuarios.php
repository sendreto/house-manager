<table id="tabelaUsuarios" class="JSafo DataGrid">
	<thead>
		<tr>
			<th scope="col" width="22">ID</th>
			<th scope="col">Login</th>
			<th scope="col">Nome</th>
			<th scope="col">Data cadastro</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach (Usuario::listar() as $usuario): $id = $usuario->idUsuario ?>
		<tr>
			<td headers="idUsuario"><?= $id ?></td>
			<td headers="login" contenteditable="true" onblur="salvarUsuario()"><?= $usuario->login ?></td>
			<td headers="nome" contenteditable="true" onblur="salvarUsuario()"><?= $usuario->nome ?></td>
			<td headers="dataCadastro"><?= $usuario->dataCadastro ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>