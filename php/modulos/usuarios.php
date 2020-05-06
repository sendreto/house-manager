<?php
include '../classes/Usuario.php';

DAO::conectar();

$usuario = new Usuario();

if($usuario->administra)
{
	$acao = isset($_POST['acao'])? addslashes($_POST['acao']) : '';
	
	switch ($acao)
	{
		case 'Adicionar':
			$novoUsuario = new Usuario();
			$novoUsuario->nome = $_POST['nome'];
			$novoUsuario->login = $_POST['login'];
			$novoUsuario->senha = $_POST['senha'];
			$novoUsuario->adicionar();
			break;
		
		case 'Alterar':
			$novoUsuario = new Usuario();
			$novoUsuario->idUsuario = $_POST['idUsuario'];
			$novoUsuario->nome = $_POST['nome'];
			$novoUsuario->login = $_POST['login'];
			$novoUsuario->alterar();
			break;
		
		case 'Excluir':
			$novoUsuario = new Usuario();
			$novoUsuario->idUsuario = $_POST['idUsuario'];
			$novoUsuario->excluir();
			break;
	}
	
	include '../includes/alerta-erro.php';
	include '../includes/tabela-usuarios.php';
}
else
{
	echo 'Permissão negada!';
}
?>