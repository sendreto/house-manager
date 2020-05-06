function salvarComodo()
{
	salvar('comodos', $tabelaComodos.getSelectedRow(), 'Alterar');
}

function excluirComodo()
{
	salvar('comodos', $tabelaComodos.getSelectedRow(), 'Excluir');
}