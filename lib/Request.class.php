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
            $arrData[5] = $this->local['cobertura-und'] == "true" ? 1 : 0;
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

    //Adiciona um novo Vendedor
    private function addNewSells(){
        if (!empty($this->local)){
            $arrData[0] = $this->local['nome-vend'];
            $insert = $this->Mod->insertDataEncapsule("INSERT INTO `vendedor`(`id_vendedor`, `nome_vendedor`) VALUES (NULL,?)", $arrData);
            if ($insert) {
                $this->redirectTo("Vendedores/SuccessNew");
            } else {
                $this->redirectTo("Vendedores/ErrorNew");
            }
        } else {
            $this->redirectTo("Vendedores/ErrorInsert");
        }
    }

    //Adiciona um novo Cliente
    private function addNewClient(){
        if (!empty($this->local)){
            $arrData[0] = $this->local['nome-cliente'];
            $insert = $this->Mod->insertDataEncapsule("INSERT INTO `cliente`(`id_cliente`, `nome_cliente`) VALUES (NULL,?)", $arrData);
            if ($insert) {
                $this->redirectTo("Cliente/SuccessNew");
            } else {
                $this->redirectTo("Cliente/ErrorNew");
            }
        } else {
            $this->redirectTo("Cliente/ErrorInsert");
        }
    }

    //Adiciona um novo Responsavel Tecnico
    private function addNewResp(){
        if (!empty($this->local)){
            $arrData[0] = $this->local['nome-resp'];
            $insert = $this->Mod->insertDataEncapsule("INSERT INTO `responsavel_tecnico`(`id_responsaveltecnico`, `nome_responsaveltecnico`) VALUES (NULL,?)", $arrData);
            if ($insert) {
                $this->redirectTo("Responsavel/SuccessNew");
            } else {
                $this->redirectTo("Responsavel/ErrorNew");
            }
        } else {
            $this->redirectTo("Responsavel/ErrorInsert");
        }
    }

      //Deleta o Responsavel Tecnico
      private function deleteResp(){
        if (!empty($this->local)){
            $arrData[0] = $this->local['id-input'];
            $insert = $this->Mod->insertDataEncapsule("DELETE FROM responsavel_tecnico WHERE id_responsaveltecnico = ?;", $arrData);
            if ($insert) {
                $this->redirectTo("Responsavel/SuccessDelete");
            } else {
                $this->redirectTo("Responsavel/ErrorDelete");
            }
        } else {
            $this->redirectTo("Responsavel/Error");
        }
    }

     //Deleta o Responsavel Tecnico
     private function deleteClient(){
        if (!empty($this->local)){
            $arrData[0] = $this->local['id-input'];
            $insert = $this->Mod->insertDataEncapsule("DELETE FROM cliente WHERE id_cliente = ?", $arrData);
            if ($insert) {
                $this->redirectTo("Cliente/SuccessDelete");
            } else {
                $this->redirectTo("Cliente/ErrorDelete");
            }
        } else {
            $this->redirectTo("Cliente/Error");
        }
    }

     //Deleta o Responsavel Tecnico
     private function deleteSells(){
        if (!empty($this->local)){
            $arrData[0] = $this->local['id-input'];
            $insert = $this->Mod->insertDataEncapsule("DELETE FROM vendedor WHERE id_vendedor = ?", $arrData);
            if ($insert) {
                $this->redirectTo("Vendedores/SuccessDelete");
            } else {
                $this->redirectTo("Vendedores/ErrorDelete");
            }
        } else {
            $this->redirectTo("Vendedores/Error");
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
