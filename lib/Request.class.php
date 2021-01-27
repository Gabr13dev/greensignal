<?php
/*  Classe de requisições, aqui é feito todas as ações do sistema
*   (CREATE,READ,UPDATE,DELETE)
*   (CONSULTA DE APIS)
*   ()
*/

class Request
{

    public $routes, $Mod, $local, $dataurl;

    //Construtor verifica se a função existe e executa ela
    function __construct($actionRequest)
    {
        if (method_exists($this, $actionRequest)) {
            $this->routes = new Routes();
            include_once "model/Model.class.php";
            include_once "controller/Controller.class.php";
            $this->Mod = new Model();
            $this->local = $_POST;
            $this->dataurl = $_GET;
            $this->ctl = new Controller();
            $this->$actionRequest();
            die();
        } else {
            throw new error('Action request not found: ' . $actionRequest);
        }
    }

    //Cadastra um novo empreendimento
    private function addNewBuild()
    {
        if (!empty($this->local)){
            $arrData[0] = $this->local['nome-emp'];
            $arrData[1] = $this->local['cep-emp'];
            $arrData[2] = $this->local['rua-emp'];
            $arrData[3] = $this->local['numero-emp'];
            $arrData[4] = $this->local['uf-emp'];
            $arrData[5] = $this->local['bairro-emp'];
            $arrData[6] = $this->local['cidade-emp'];
            $arrData[7] = $this->formatDouble($this->local['valototalobra-emp']);
            $arrData[8] = $this->local['datainicio-emp'];
            $arrData[9] = $this->local['datafim-emp'];
            $arrData[10] = $this->local['resptec-emp'];
            $insert = $this->Mod->insertDataEncapsule("INSERT INTO `empreendimento`(`id_empempreendimento`, `nome_empreendimento`, `cep_empreendimento`, `endereco_empreendimento`, `numero_empreendimento`, `estado_empreendimento`, `bairro_empreendimento`, `cidade_empreendimento`, `valortotalobra_empreendimento`, `datainicioobra_empreendimento`, `datafimobra_empreendimento`, `id_responsaveltecnico_empreendimento`) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?);", $arrData);
            if ($insert) {
                $this->redirectTo("Home/SuccessNew");
            } else {
                $this->redirectTo("NovoEmpreendimento/ErrorNew");
            }
        } else {
            $this->redirectTo("Home/ErrorInsert");
        }
    }

    //Cadastra uma nova unidade á um empreendimento ja existente
    private function addNewUnity(){
        if (!empty($this->local)){
            $arrData[0] = $this->local['empreendimento-und'];
            $arrData[1] = $this->local['numero-und'];
            $arrData[2] = $this->local['areatotal-und'];
            $arrData[3] = $this->local['areapriv-und'];
            $arrData[4] = $this->local['areacob-und'];
            $arrData[5] = $this->local['cobertura-und'] == "on" ? 1 : 0;
            $arrData[6] = $this->formatDouble($this->local['valorvenda-und']);
            $arrData[7] = $this->formatDouble($this->local['valoravalia-und']);
            $insert = $this->Mod->insertDataEncapsule("INSERT INTO `unidade`(`id_unidade`, `id_empreendimento_unidade`, `numero_unidade`, `areatotal_unidade`, `areaprivativa_unidade`, `areacoberta_unidade`, `cobertura_unidade`, `valorvenda_unidade`, `valoravaliacaobanco_unidade`) VALUES (NULL,?,?,?,?,?,?,?,?);", $arrData);
            if ($insert) {
                $this->redirectTo("Empreendimento/".$arrData[0]."/SuccessNewUnity");
            } else {
                $this->redirectTo("NovaUnidade/ErrorNew");
            }
        } else {
            $this->redirectTo("Home/ErrorInsert");
        }
    }

    //Formata valor decimal para o Mysql
    private function formatDouble($value){
        return number_format(str_replace(",",".",str_replace(".","",$value)), 2, '.', '');
    }

    //REDIRECIONA PARA UMA ROTA ESPECIFICA
    private function redirectTo($route)
    {
        echo "<script>window.location.href = '" . URL . "/" . $route . "';</script>";
    }
}
