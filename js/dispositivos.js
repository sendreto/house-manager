function acionar(idDispositivo, btn)
{
	var dados = new Object();
		dados.idDispositivo = idDispositivo;
		dados.acao = "Acionar";
	
	switch(btn.className)
	{
		case "ligado":
			btn.className = "desligado";
			dados.estado = 0;
			break;
			
		case "desligado":
			btn.className = "ligado";
			dados.estado = 1;
			break;
	}
	
	setDispositivo(dados);
}

function setDispositivo(dados)
{
	JSafo.Ajax("php/modulos/dispositivos.php", null, dados);
}

function salvarDispositivo()
{
	salvar('dispositivos', $tabelaDispositivos.getSelectedRow(), 'Alterar');
}

function excluirDispositivo()
{
	salvar('dispositivos', $tabelaDispositivos.getSelectedRow(), 'Excluir');
}