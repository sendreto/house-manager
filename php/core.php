<?php
include 'classes/DAO.php';
include 'classes/Usuario.php';
include 'classes/Comodo.php';
include 'classes/Dispositivo.php';
include 'classes/Pino.php';

$login	= isset($_POST['login'])? addslashes($_POST['login']) : '';
$senha	= isset($_POST['senha'])? addslashes($_POST['senha']) : '';
$acao	= isset($_POST['acao'])? addslashes($_POST['acao']) : '';

DAO::conectar();

$usuario = new Usuario();

switch ($acao)
{
	case 'Entrar':
		$usuario->fazerLogin($login, $senha);
		break;
		
	case 'Sair':
		$usuario->fazerLogout();
		break;
}

include 'layout.php';
?>