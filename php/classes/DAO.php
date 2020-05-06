<?php
class DAO
{
	private static $erro;
	protected static $pdo;
	
	public $dataCadastro = '';
	
	public static function conectar()
	{
		try
		{
			self::$pdo = new PDO('mysql:host=localhost;dbname=housemanager', 'root', '', array(PDO::ATTR_PERSISTENT => true));
			self::$pdo->query('SET NAMES utf8');
		}
		catch (Exception $e)
		{
			echo 'Erro ao conectar com o Banco de Dados.'.$e->getMessage();
		}
	}
	
	public function carregar($dados)
	{
		foreach ($dados as $campo => $valor)
		{
			if(isset($this->$campo))
			{
				$this->$campo = $valor;
			}
		}
	}
	
	protected static function retornarObjeto($sql)
	{
		return self::$pdo->query($sql)->fetch(PDO::FETCH_OBJ);
	}
	
	protected static function retornarLinhas($sql)
	{
		return self::$pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
	}
	
	protected function executar($sql)
	{
		$executou = self::$pdo->exec(strip_tags($sql));
		
		if(!$executou)
		{
			$erro = self::$pdo->errorInfo();
			self::setErro($erro[2]);
		}
		
		return $executou;
	}
	
	public static function getErro()
	{
		return self::$erro;
	}
	
	protected static function setErro($erro)
	{
		if(self::$erro == '')
		{
			self::$erro = $erro;
		}
	}
}
?>
