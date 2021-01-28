<?php
/*
 *
 * @author Gabriel de Almeida
 */
class FormCtl extends Controller
{
	public $data = [];
	private $model, $controller, $components;

	function __construct()
	{
		$this->model = new FormModel();
		$this->ctl = new parent();
		$this->components = new Components();
		$this->routes = new Routes();
	}

	public function NovoEmpreendimento()
	{
		$data['respTec'] = $this->model->getAllRespTec();
		$data['msg'] = $this->getMessageNovoEmpreendimento();
		return $data;
	}

	public function NovaUnidade()
	{
		$data['emp'] = $this->model->getAllEmp();
		$data['msg'] = $this->getMessageNovaUnidade();
		return $data;
	}

	public function Cliente()
	{
		$data['client'] = $this->model->getAllClients();
		$data['msg'] = $this->getMessageDefault();
		return $data;
	}

	public function Responsavel()
	{
		$data['resp'] = $this->model->getAllRespTec();
		$data['msg'] = $this->getMessageDefault();
		return $data;
	}

	public function Vendedores()
	{
		$data['sells'] = $this->model->getAllSalesMan();
		$data['msg'] = $this->getMessageDefault();
		return $data;
	}

	public function getMessageNovoEmpreendimento()
	{
		switch ($this->routes->getParameter(2)) {
			case 'ErrorNew':
				return $this->ctl->getTemplateMessage("Não foi possivel cadastrar o empreendimento.", "fail");
				break;
			default:
				return "";
				break;
		}
	}

	public function getMessageNovaUnidade()
	{
		switch ($this->routes->getParameter(2)) {
			case 'ErrorNew':
				return $this->ctl->getTemplateMessage("Não foi possivel cadastrar a unidade.", "fail");
				break;
			default:
				return "";
				break;
		}
	}

	public function getMessageDefault()
	{
		switch ($this->routes->getParameter(2)) {
			case 'SuccessNew':
				return $this->ctl->getTemplateMessage("Cadastro realizado com sucesso!", "success");
				break;
			case 'ErrorNew':
				return $this->ctl->getTemplateMessage("Não foi possivel realizar o cadastro.", "fail");
				break;
			case 'ErrorInsert':
				return $this->ctl->getTemplateMessage("Houve um erro a receber os parametros corretamente.", "fail");
				break;
			case 'SuccessDelete':
				return $this->ctl->getTemplateMessage("Deletado com sucesso!", "success");
				break;
			case 'ErrorDelete':
				return $this->ctl->getTemplateMessage("Não foi possivel deletar.", "fail");
				break;
			case 'Error':
				return $this->ctl->getTemplateMessage("Houve um erro a receber os parametros corretamente.", "fail");
				break;
			default:
				return "";
				break;
		}
	}
}
