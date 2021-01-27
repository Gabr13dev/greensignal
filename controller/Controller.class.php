<?php
/*  Controller principal
 *  Funções utilizadas em todas as paginas
 */
class Controller
{

	function __construct()
	{
		
	}

	//Transofrma data americana para Pt-br
	public function transformDataBr($data){
		$newData = explode('-', $data);
		return $newData[2].'/'.$newData[1].'/'.$newData[0];
	}

	//Obtem o dia de uma data americana
	public function getDayOnDate($data){
		$result = explode('-', $data);
		return $result[2];
	}

	public function formatName($name){
		return ucwords(mb_strtolower($name, 'UTF-8'));
	}

	public function limitName($name,$limit){
		$arrName = explode(" ",$name);
		$out = "";
		foreach($arrName as $key => $word){
			if($key == $limit){
				break;
			}
			$out .= $word." ";
		}
		return $out;
	}
	
	public function removeAccents($string){
    	$string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    	return strtolower($string);
	}

	public function getOptions($option,$idName,$display,$selected = ""){
		$html = "";
		foreach($option as $line){
			$select = $line[$idName] == $selected ? 'selected':'';
			$html .= "<option value='".$line[$idName]."' ".$select.">".$line[$display]."</option>";
		}
		echo $html;
	}

	public function formatMoneyBR($value){
		return  'R$' . number_format($value,2,",",".");
	}

	public function formatMoneyUSD($value){
		$rtr = str_replace(",",".",number_format($value, 2));
		return substr($rtr,0,-3);	
	}

	public function getMonthName($numberMonth){
		$mes[1] = 'Janeiro';
		$mes[2] = 'Fevereiro';
		$mes[3] = 'Março';
		$mes[4] = 'Abril';
		$mes[5] = 'Maio';
		$mes[6] = 'Junho';
		$mes[7] = 'Julho';
		$mes[8] = 'Agosto';
		$mes[9] = 'Setembro';
		$mes[10] = 'Outubro';
		$mes[11] = 'Novembro';
		$mes[12] = 'Dezembro';
		return $mes[$numberMonth];
	}

	//Verifica se um registro está atrasado (está no passado)
	public function isLate($dateBase){
		$dt_atual = date("Y-m-d"); // data atual
		$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
		$dt_expira = $dateBase; // data de expiração
		$timestamp_dt_expira = strtotime($dt_expira); // converte para timestamp Unix
		// data atual é maior que a data de expiração
		if ($timestamp_dt_atual > $timestamp_dt_expira)
  			return true; // atrasado
				else
			return false; //não atrasado
	}

	//Obtem o modelo da mensagem em HTML e codigo JS para esconder
	public function getTemplateMessage($message,$type){
		$html = "";
		if($type == "fail"){
			$html .= '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger animated fadeInDown" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 10312;">×</button><span data-notify="icon" class="fa fa-times"></span> <span data-notify="title">Falha </span> <span data-notify="message">'.$message.'</span></div>';
		}
		if($type == "success"){
			$html .= '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success animated fadeInDown" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 10312;">×</button><span data-notify="icon" class="fa fa-check"></span> <span data-notify="title">Sucesso </span> <span data-notify="message">'.$message.'</span></div>';
		}
	  $html .= '<script>  $(".alert").delay(4000).fadeOut(3000);</script>';
	  return $html;
	}

}