<?php
require_once 'DAO.php';

class Comodo extends DAO
{
	public $idComodo = 0;
	public $nome = '';
	
	public function adicionar()
	{
		if($this->nome)
		{
			return $this->executar("INSERT INTO comodos (nome) VALUES ('$this->nome')");
		}
		else
		{
			self::setErro('Informe o nome do novo cômodo!');
			return false;
		}
	}
	
	public function alterar()
	{
		return self::$pdo->exec("UPDATE comodos SET nome='$this->nome' WHERE idComodo=$this->idComodo");
	}
	
	public function excluir()
	{
		return self::$pdo->exec('DELETE FROM comodos WHERE idComodo='.$this->idComodo);
	}
	
	public static function listar()
	{
		return self::retornarLinhas('SELECT * FROM comodos');
	}
}
?>