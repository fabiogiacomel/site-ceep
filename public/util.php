<?php
class Util{

	public static $instance; 

	private function __construct() { 
		//
	} 

	public static function getInstance(){ 
		if (!isset(self::$instance)) 
			self::$instance = new Util(); 

		return self::$instance; 
	} 


   public static function inverteData($data){
    	if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    	}elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    	}
		}

	public static function calculaDiasAberto($data_abertura){
		//echo "calculando...";
	// Define os valores a serem usados
			$datetime_abertura = strtotime($data_abertura);
	//echo $datetime_abertura;
	//echo "calculando2...";
			$datetime_atual = strtotime(date('Y-m-d'));
	//echo $datetime_atual;

	//Convert to format 2011-08-27 18:29:31
	//$converted_date = date_format('Y-m-d H:i:s',strtotime($orig_date));



	// Calcula a diferenĂ§a de segundos entre as duas datas:
	$diferenca = $datetime_atual-$datetime_abertura; // 19522800 segundos

	// Calcula a diferenĂ§a de dias
	$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias

	return $dias+1;	
	}
	/**
	 * Description
	 * @param type $timestamp 
	 * @return type
	 */
	public static function data_por_extenso($timestamp){ 
		// leitura das datas
		$dia = date('d',$timestamp);
		$mes = date('m',$timestamp);
		$ano = date('Y',$timestamp);
		$semana = date('w',$timestamp);
 
 
		// configuração do mês
		 
		switch ($mes){
		 
		case 1: $mes = "janeiro"; break;
		case 2: $mes = "fevereiro"; break;
		case 3: $mes = "março"; break;
		case 4: $mes = "abril"; break;
		case 5: $mes = "maio"; break;
		case 6: $mes = "junho"; break;
		case 7: $mes = "julho"; break;
		case 8: $mes = "agosto"; break;
		case 9: $mes = "setembro"; break;
		case 10: $mes = "outubro"; break;
		case 11: $mes = "novembro"; break;
		case 12: $mes = "dezembro"; break;
		 
		}
		 		 
		// configuração da semana
		switch ($semana) {		 
			case 0: $semana = "Domingo"; break;
			case 1: $semana = "Segunda-feira"; break;
			case 2: $semana = "Terça-feira"; break;
			case 3: $semana = "Quarta-feira"; break;
			case 4: $semana = "Quinta-feira"; break;
			case 5: $semana = "Sexta-feira"; break;
			case 6: $semana = "Sábado"; break;
		}
		//Agora basta imprimir na tela...
		return "$semana, $dia de $mes de $ano";
	}

	 
	/**
	  * Retorna um SELECT como os dados de uma consulta
	  * @param Result de uma consulta $result 
	  * @param String (nome do campo select) $nameselect 
	  * @param Int id para deixar selecionado $idativo 
	  * @param String (nome do campo id no result) $id_result 
	  * @param String (nome do campo descricao no result) $nome_result 
	  * @return String
	  */ 
	public static function montaSelect($result,  $id_result, $nome_result,$nameselect, $idativo){
		try{
			$select = "<select name='{$nameselect}' id='{$nameselect}' onchange='carregaDados(this.value)'>";
			
			foreach ($result as $linha) {
			   	$select .=  "<option value='".$linha->$id_result."'";

				if($linha->$id_result==$idativo){$select .= " selected";}	

				$select .= ">".$linha->$nome_result."</option>";
			}
			$select .= "</select>";
			return $select;
		} catch (Exception $e) { 
			print "Erro UTIL::MONTA_SELECT. Um LOG foi gerado, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage()); 
		}	
	}
}


?>