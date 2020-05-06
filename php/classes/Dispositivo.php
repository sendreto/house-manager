<?php
require_once 'DAO.php';

class Dispositivo extends DAO
{
	protected $ligado = 0;
	
	public $idDispositivo = 0;
	public $idComodo = 0;
	public $nome = '';
	public $idPino = 0;
	
	public function adicionar()
	{
		if($this->idComodo == 0)
		{
			self::setErro('Selecione o cômodo da residência!');
		}
		else if($this->nome == '')
		{
			self::setErro('Informe o nome do dispositivo!');
		}
		else
		{
			return self::executar("INSERT INTO dispositivos (idComodo, nome, idPino) VALUES ($this->idComodo, '$this->nome', $this->idPino)");
		}
	}
	
	public function alterar()
	{
		return self::$pdo->exec("UPDATE dispositivos SET nome='$this->nome' WHERE idDispositivo=$this->idDispositivo");
	}
	
	public function excluir()
	{
		return self::$pdo->exec('DELETE FROM dispositivos WHERE idDispositivo='.$this->idDispositivo);
	}
	
	private static function select()
	{
		return 'SELECT d.idDispositivo, c.idComodo, d.nome nome, c.nome comodo, ligado, idPino
				FROM dispositivos d
				INNER JOIN comodos c ON c.idComodo = d.idComodo ';
	}
	
	public function buscar($idDispositivo)
	{
		$dados = self::retornarObjeto(self::select() . "WHERE d.idDispositivo=$idDispositivo");
		
		if ($dados)
		{
			$this->carregar($dados);
		}
	}
	
	public static function listar()
	{
		return self::retornarLinhas(self::select());
	}
	
	public static function listarPorComodo($idComodo)
	{
		return self::retornarLinhas(self::select() . 'WHERE d.idComodo='.$idComodo);
	}
	
	public function acionar($ligado)
	{
		if($this->idDispositivo)
		{
			$this->ligado = $ligado? 1 : 0;
			
			$sql = "UPDATE dispositivos SET ligado=$this->ligado WHERE idDispositivo=$this->idDispositivo";
			
			if(self::executar($sql))
			{
				echo 'Dispositivo '.($this->ligado? 'ligado': 'desligado');
				exec("sudo python /var/www/python/verifica.py");
								
			}
			else
			{
				echo 'ERRO: Falha ao acionar o dispositivo! ('.$sql.')';
			}
		}
		else
		{
			self::setErro('Informe o ID do dispositivo!');
		}
	}
}
?>
