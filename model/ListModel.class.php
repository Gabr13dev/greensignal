<?php

/**
 * @author Gabriel de Almeida
 */
class ListModel extends Model
{
	private $Model;
	
	function __construct()
	{
		$this->Model = new parent();
	}

	//Obtem os empreedimentos cadastrados
	public function getEmpreendimentos()
	{
		$sql = "SELECT * FROM empreendimento;";
		return $this->Model->getData($sql);
	}

	//Obtem as unidades cadastradas de um empreendimento especifico
	public function getUnidadesForBuild($id)
	{
		$arrData[0] = $id;
		$sql = "SELECT count(*) as qtd FROM `unidade` WHERE id_empreendimento_unidade = ?";
		return $this->Model->getDataEncapsule($sql,$arrData);
	}
	

}