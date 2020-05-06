<?php
class Pino extends DAO
{
	public static function listar()
	{
		return self::retornarLinhas('SELECT * FROM pinos ORDER BY idPino');
	}
}
?>