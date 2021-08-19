<?php
class Conexao2 extends PDO {
  //linha que define tipo banco nome maquina e nome banco
  //private $host = "mysql:host=localhost;dbname=ceepcvel_site";
private  $host     = "mysql:host=mysql.westsoftware.com.br;dbname=ceep"; //String de conexão
//private static $host     = "mysql:host=187.19.96.13;dbname=ceepcvel_site"; //String de conexão
private  $user     = "ceep"; //usuário do banco de dados (root por padrão)
//private static $user     = "ceepcvel_root"; //usuário do banco de dados (root por padrão)
private  $pass = "UmhNWJ3AvJ4+H]Kr";     //senha   do banco de dados (nula por padrão)    

  public function __construct() {
      try {
          //require_once("erro.class.php");
          parent::__construct($this->host, $this->user, $this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //parent::setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES UTF8');
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
  }
}
?>