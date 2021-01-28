<?php

/**
 * @author Gabriel de Almeida
 */
class FormModel extends Model
{
	private $Model;
	
	function __construct()
	{
		$this->Model = new parent();
	}

	//Obtem todos responsaveis tecnicos cadastrados
	public function getAllRespTec(){
		$sql = "SELECT * FROM responsavel_tecnico;";
		return $this->Model->getData($sql);
	}

	//Obtem todos empreendimentos cadastrados
	public function getAllEmp(){
		$sql = "SELECT * FROM empreendimento;";
		return $this->Model->getData($sql);
	}

	//Obtem todos clientes cadastrados
	public function getAllClients(){
		$sql = "SELECT * FROM cliente;";
		return $this->Model->getData($sql);
	}

	//Obtem todos os vendedores
	public function getAllSalesMan(){
		$sql = "SELECT * FROM vendedor";
		return $this->Model->getData($sql);
	}
	

}