<?php 
class Usuario{
	
	private $idusuario;
	private $nome;
	private $usuario;
	private $senha;
	private $tipo; //1-Adm/2-funcionario/3-cliente/
	
	//O método construtor é padrão, não altere!
  public function __construct(){
    include("../conexao.class.php");
  }

  //Método enviar  (set), não altere!
  public function __set($var, $val){
    $this->$var = $val;
  }

  //Método receber (get), não altere!
  public function __get($var){
    return $this->$var;
  }


  public function gravar(){

  }

  public function alterar(){
  
  }

  public function excluir(){
  
  }

  public function listar(){
  }

  public function validar(){
 		try{
      $sql = "select * from usuario where usuario=:p1 and senha=:p2";
     // echo $sql . "  u ". $this->usuario . "s  " . $this->senha;
  		
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->usuario);
      $stm->bindValue(":p2", $this->senha);
      $stm->execute();


      if($stm != null)
      foreach ($stm as $linha) {
        $_SESSION["tipo"] =['tipo'];
        $_SESSION["usuario"] = $linha['nome'];
      }
      return $stm->rowCount() > 0;
    }catch(PDOException $e){
      return false;
    }
  }

}
