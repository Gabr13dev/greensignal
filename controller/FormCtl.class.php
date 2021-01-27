<?php
/*
 *
 * @author Gabriel de Almeida
 */
class FormCtl extends Controller
{
	public $data = [];
    private $model,$controller, $components;

	function __construct()
	{
		$this->model = new FormModel();
		$this->ctl = new parent();
		$this->components = new Components();
		$this->routes = new Routes();
	}

	public function NovoEmpreendimento(){
		$data['respTec'] = $this->model->getAllRespTec();
		$data['msg'] = $this->getMessageNovoEmpreendimento();
		return $data;
	}

	public function NovaUnidade(){
		$data['emp'] = $this->model->getAllEmp();
		$data['msg'] = $this->getMessageNovaUnidade();
		return $data;
	}

	public function getMessageNovoEmpreendimento()
	{
		switch ($this->routes->getParameter(2)) {
			case 'ErrorNew':
				return $this->ctl->getTemplateMessage("Não foi possivel cadastrar o empreendimento.","fail");
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
				return $this->ctl->getTemplateMessage("Não foi possivel cadastrar a unidade.","fail");
				break;
			default:
				return "";
				break;
		}
	}


}