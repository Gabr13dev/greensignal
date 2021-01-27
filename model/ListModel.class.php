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

	//Obtem um empreendimento especifico pelo ID
	public function getEmpreendimentoById($id)
	{
		$arrData[0] = $id;
		$sql = "SELECT * FROM empreendimento WHERE id_empempreendimento = ?;";
		return $this->Model->getDataEncapsule($sql,$arrData);
	}

	//Obtem unidades de um emprreendimento
	public function getUnityForBuild($id)
	{
		$arrData[0] = $id;
		$sql = "SELECT * FROM `unidade` WHERE id_empreendimento_unidade = ?;";
		return $this->Model->getDataEncapsule($sql,$arrData);
	}

	//Obtem as unidades cadastradas de um empreendimento especifico
	public function getUnidadesForBuild($id)
	{
		$arrData[0] = $id;
		$sql = "SELECT count(*) as qtd FROM `unidade` WHERE id_empreendimento_unidade = ?;";
		return $this->Model->getDataEncapsule($sql,$arrData);
	}

	public function getAllUnidadesForBuild($id)
	{
		$arrData[0] = $id;
		$sql = "SELECT * FROM `unidade` WHERE id_empreendimento_unidade = ?;";
		return $this->Model->getDataEncapsule($sql,$arrData);
	}


	public function getNameRespTec($id)
	{
		$arrData[0] = $id;
		$sql = "SELECT nome_responsaveltecnico FROM `responsavel_tecnico` WHERE id_responsaveltecnico = ?;";
		return $this->Model->getDataEncapsule($sql,$arrData)[0]['nome_responsaveltecnico'];
	}
	

}