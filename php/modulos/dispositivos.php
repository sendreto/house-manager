<?php
include '../classes/Usuario.php';
include '../classes/Dispositivo.php';

DAO::conectar();

$acao = isset($_POST['acao'])? addslashes($_POST['acao']) : '';

$usuario = new Usuario();

if($usuario->nome && $acao == 'Acionar')
{
	$dispositivo = new Dispositivo();
	$dispositivo->buscar($_POST['idDispositivo']);
	$dispositivo->acionar($_POST['estado']);
}
else if($usuario->administra)
{
	switch ($acao)
	{
		case 'Adicionar':
			$dispositivo = new Dispositivo();
			$dispositivo->idComodo = $_POST['idComodo'];
			$dispositivo->nome = $_POST['nome'];
			$dispositivo->idPino = $_POST['idPino'];
			$dispositivo->adicionar();
			break;
			
		case 'Alterar':
			$dispositivo = new Dispositivo();
			$dispositivo->idDispositivo = $_POST['idDispositivo'];
			$dispositivo->nome = $_POST['nome'];
			$dispositivo->idPino = $_POST['idPino'];
			$dispositivo->alterar();
			break;
			
		case 'Excluir':
			$dispositivo = new Dispositivo();
			$dispositivo->idDispositivo = $_POST['idDispositivo'];
			$dispositivo->excluir();
			break;
	}
	
	include '../includes/alerta-erro.php';
	include '../includes/tabela-dispositivos.php';
}
else
{
	echo 'Permissão negada!';
}
?>
