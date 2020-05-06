<?php
session_start();
require_once 'DAO.php';

class Usuario extends DAO
{
	public $idUsuario = 0;
	public $nome = '';
	public $login = '';
	public $senha = '';
	public $administra = 0;
	
	function __construct()
	{
		$this->carregarLogado();
	}
	
	public function adicionar()
	{
		$sql = "INSERT INTO usuarios (nome, login, senha) VALUES ('$this->nome', '$this->login', '".md5($this->senha)."')";
		return self::$pdo->exec($sql);
	}
	
	public function alterar()
	{
		return self::$pdo->exec("UPDATE usuarios SET nome='$this->nome', login='$this->login' WHERE idUsuario=$this->idUsuario");
	}
	
	public function excluir()
	{
		return self::$pdo->exec("DELETE FROM usuarios WHERE idUsuario=$this->idUsuario");
	}
	
	public static function buscar($login)
	{
		return self::retornarObjeto("SELECT * FROM usuarios WHERE login='$login'");
	}
	
	public static function listar()
	{
		return self::retornarLinhas('SELECT * FROM usuarios ORDER BY idUsuario');
	}
	
	protected function carregarLogado()
	{
		$sessao = isset($_SESSION['admin'])? $_SESSION['admin'] : '';
		$dados = self::buscar($sessao);
		
		if($dados)
		{
			$this->carregar($dados);
		}
	}
	
	public function fazerLogin($login, $senha)
	{
		$dados = self::buscar($login);
		
		if(!$dados)
		{
			self::setErro('Usuário não cadastrado!');
		}
		else if($dados->senha != md5($senha))
		{
			self::setErro('Senha incorreta!');
		}
		else
		{
			$_SESSION['admin'] = $login;
			header('Location:index.php');
		}
	}
	
	public function fazerLogout()
	{
		unset($_SESSION['admin']);
		header('Location:index.php');
	}
}
?>