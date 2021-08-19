<?php

class Cidade{

	//campos da tabela no banco de dados
	private $idcidade;
  private $nome;
	private $uf;


	//O método construtor é padrão, não altere!
  function __construct(){
    require_once ('../conexao.class.php');
    require_once ('erro.class.php');
  }

  //Método enviar  (set), não altere!
  function __set($var, $val){
    $this->$var = $val;
  }

  //Método receber (get), não altere!
  function __get($var){
    return $this->$var;
  }


  function gravar(){
    try{
	    $sql = "insert into cidade (nome, uf) values (:p1,:p2)";

			$con = new Conexao();
	    $stm = $con->prepare($sql);
	    
	    $stm->bindValue(":p1", $this->nome); 
	    $stm->bindValue(":p2", $this->uf); 
			
			if($stm->execute()){
				return "Registro incluído com sucesso!";
			} else {
				return "Erro ao incluir";
			} 
		}catch(PDOException $e){
      return Erro::traduzErro($e);
		}
  }

  function alterar(){
    try{
      $sql = "update cidade set nome=:p2, uf=:p3 where idcidade=:p1";

  		$con = new Conexao();
      $stm = $con->prepare($sql);
      
      $stm->bindValue(":p1", $this->idcidade); 
      $stm->bindValue(":p2", $this->nome); 
      $stm->bindValue(":p3", $this->uf); 

      if($stm->execute()){
          return "Registro alterado com sucesso!";
        } else {
          return "Erro ao alterar";
        } 
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  function excluir(){
    try{
      $sql = "delete from cidade where idcidade=:p1";

  		$con = new Conexao();
      
      $stm = $con->prepare($sql);
      
      $stm->bindValue(":p1", $this->idcidade); 

        if($stm->execute()){
          return "Registro excluído com sucesso!";
        } else {
          return "Erro ao excluir";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    } 
  }

  function listar(){
    try{
      $sql = "select * from cidade";

  		$con = new Conexao();
      
      $stm = $con->prepare($sql);

      $stm->execute();
     
      return $stm;
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }




}