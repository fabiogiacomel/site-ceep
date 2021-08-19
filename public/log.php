<?php 

class GeraLog{ 

public static $instance; 

private function __construct() { 
// 
	define("CAMINHO_RAIZ", "http://localhost/site/");
} 

public static function getInstance(){ 
if (!isset(self::$instance)) 
self::$instance = new GeraLog(); 

return self::$instance; 
} 

public function inserirLog($msg){ 
	$msg = "[".date("d-m-Y, H:i:s")."] ".$msg."\n\n"; 
	//$fp = fopen(CAMINHO_RAIZ."admin/logs/error_log_".date("d-m-Y").".txt",'a'); 
	$arquivo="logs/error.log";

	if(file_exists($arquivo))
	{
		$fp = fopen($arquivo,'a'); 
		fwrite($fp,$msg); 
		fclose($fp); 
	}else{
		echo "Arquivo não existe " . $arquivo;
	}
} 

} 
?> 

