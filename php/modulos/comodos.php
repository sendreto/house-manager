<?php
include '../classes/Usuario.php';
include '../classes/Comodo.php';

DAO::conectar();

$usuario = new Usuario();

if($usuario->administra)
{
	$acao = isset($_POST['acao'])? addslashes($_POST['acao']) : '';
	
	switch ($acao)
	{
		case 'Adicionar':
			$comodo = new Comodo();
			$comodo->nome = addslashes($_POST['nome']);
			$comodo->adicionar();
			break;
		
		case 'Alterar':
			$comodo = new Comodo();
			$comodo->idComodo = $_POST['idComodo'];
			$comodo->nome = $_POST['nome'];
			$comodo->alterar();
			break;
		
		case 'Excluir':
			$comodo = new Comodo();
			$comodo->idComodo = $_POST['idComodo'];
			$comodo->excluir();
			break;
	}
	
	include '../includes/alerta-erro.php';
	include '../includes/tabela-comodos.php';
}
else
{
	echo 'Permissão negada!';
}
?>
