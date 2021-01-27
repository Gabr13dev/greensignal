<?php
/*
 *
 * @author Gabriel de Almeida
 */
class ListCtl extends Controller
{
	public $data = [];
    private $model,$controller, $components;

	function __construct()
	{
		$this->model = new ListModel();
		$this->ctl = new parent();
		$this->components = new Components();
		$this->routes = new Routes();
	}

	public function Home(){
		$data['emp'] = $this->model->getEmpreendimentos();
		$data['msg'] = $this->getMessageHome();
		$data['to'] = $this;
		$data['ctl'] = $this->ctl;
		return $data;
	}


	public function notFoundPage(){
		$data['null'] = null;
		return $data;
	}

	//Obtem a quantidade de undiades de um Empreendimento
	public function getQtdeUnity($id)
	{
		return $this->model->getUnidadesForBuild($id);
	}

	//Verifica mensagens na pagina Home
	public function getMessageHome()
	{
		switch ($this->routes->getParameter(2)) {
			case 'SuccessNew':
				return $this->ctl->getTemplateMessage("Empreendimento cadastrado!","success");
				break;
			case 'ErrorInsert':
				return $this->ctl->getTemplateMessage("Não foi possivel realizar o cadastro.","fail");
				break;
			default:
				return "";
				break;
		}
	}


}