function salvarUsuario()
{
	salvar('usuarios', $tabelaUsuarios.getSelectedRow(), 'Alterar');
}

function excluirUsuario()
{
	salvar('usuarios', $tabelaUsuarios.getSelectedRow(), 'Excluir');
}