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
		return $data;
	}

	public function Empreendimento(){
		//Verifica se o empreendimento existe
		$data['ctl'] = $this->ctl;
		$select = $this->model->getEmpreendimentoById($this->routes->getParameter(2));
		if(!$select){
			//Redireciona caso não encontre
			echo "<script>window.location.href = '" . URL . "/Home/empNotFound';</script>";
		}
		$data['emp'] = $select[0];
		$data['resp'] = $this->model->getNameRespTec($data['emp']['id_responsaveltecnico_empreendimento']);
		$data['unity'] = $this->model->getAllUnidadesForBuild($this->routes->getParameter(2));
		$data['numberUnity'] = $this->getQtdeUnity($this->routes->getParameter(2));
		$data['mapslink'] = $this->ctl->getMapsLink($data['emp']['endereco_empreendimento'] .", ". $data['emp']['numero_empreendimento']." - ".$data['emp']['bairro_empreendimento'].", ".$data['emp']['cidade_empreendimento']. " - ".  $data['emp']['estado_empreendimento']);
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
			case 'empNotFound':
				return $this->ctl->getTemplateMessage("Empreendimento não encontrado!","fail");
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