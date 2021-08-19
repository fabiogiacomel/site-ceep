<?php
class Erro{
	

	public static function traduzErro($erro){
		switch ($erro->getCode()) {
			case '23000':
				return '<h2 class="erro">Me parece que este cadastro já foi incluído uma vez</h2>';
				break;
			case '42S02':
				return 'O tabela informada não existe';
				break;
			case '42S22':
				return 'O campo não existe:';
				break;		
			
			default:
				return '<br>Erro catastrófico :'.$erro->getCode(). " - " .$erro->getMessage();
				;
				break;
		}
	} 

}
?>