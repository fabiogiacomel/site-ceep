<?php

class Cidade{

	//campos da tabela no banco de dados
  private $idcidade;
  private $nome;
	private $uf;


	//O método construtor é padrão, não altere!
  public function __construct(){
    require_once ('../conexao.class.php');
    require_once ('erro.class.php');
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
    try{
	    $sql = "insert into estado (uf, nome) values (:p1,:p2)";

			$con = new Conexao();
	    $stm = $con->prepare($sql);
	    
	    $stm->bindValue(":p1", $this->uf); 
	    $stm->bindValue(":p2", $this->nome); 
			
			if($stm->execute()){
				return "<h2 class='sucess'>Registro incluído com sucesso!</h2>";
			} else {
				return "<h2 class='error'>Erro ao incluir</h2>";
			} 
		}catch(PDOException $e){
      return Erro::traduzErro($e);
		}
  }

  public function alterar(){
    try{
      $sql = "update estado set nome=:p2 where uf=:p1";

  		$con = new Conexao();
      $stm = $con->prepare($sql);
      
      $stm->bindValue(":p1", $this->uf); 
      $stm->bindValue(":p2", $this->nome); 

      if($stm->execute()){
        return "<h2 class='sucess'>Registro alterado com sucesso!</h2>";
      } else {
        return "<h2 class='error'>Erro ao incluir</h2>";
      } 
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  public function excluir(){
    try{
      $sql = "delete from estado where uf    =    :p1";

  		$con = new Conexao();
      
      $stm = $con->prepare($sql);
      
      $stm->bindValue(":p1", $this->uf); 

      if($stm->execute()){
        return "<h2 class='sucess'>Registro excluído com sucesso!</h2>";
      } else {
        return "<h2 class='error'>Erro ao incluir</h2>";
      } 
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  public function listar(){
    try{
      $sql = "select * from estado";

  		$con = new Conexao();
      
      $stm = $con->prepare($sql);

      $stm->execute();
     
      return $stm;
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }
}