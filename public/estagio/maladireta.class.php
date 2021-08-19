<?php

//Nome da classe é o nome da tabela no banco de dados
class Maladireta{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idmaladireta;
  private $titulo;
  private $mensagem;
  private $lista_empresas;//array com os códigos das empresas

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
      $sql = "insert into estagio_maladireta (titulo,mensagem) values (:p1,:p2)";
     
      $con = new Conexao();
      $stm = $con->prepare($sql);

      $stm->bindValue(":p1", $this->titulo); 
      $stm->bindValue(":p2", $this->mensagem); 
      if($stm->execute()){
        return "Registro incluído com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  function alterar(){
    try{
      $sql = "update estagio_maladireta set titulo=:p1, mensagem=:p2 where idmaladireta=:p3";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->titulo); 
      $stm->bindValue(":p2", $this->mensagem); 
      $stm->bindValue(":p3", $this->idmaladireta); 
      if($stm->execute()){
        return "Registro alterado com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  function excluir(){
    try{
      $sql = "delete from estagio_maladireta where  idmaladireta=:p1";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idmaladireta); 
      if($stm->execute()){
        return "Registro excluído com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }


  function carregar(){
    try{
      $sql = "select * from maladireta where idmaladireta=:p1";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idmaladireta); 
      $stm->execute();
      foreach ($stm as $linha) {
        $this->idmaladireta= $linha['idmaladireta'];
        $this->titulo = $linha['titulo'];
        $this->mensagem = $linha['mensagem'];
      }
      return true;

    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }


  function consultar(){
    try{
      $sql = "select * from estagio_maladireta where  idmaladireta=:p1 order by titulo";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idmaladireta); 
      $stm->execute();
      return $stm;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }

  function listarEmpresas($codigos){
    try{
      $sql = "select * from estagio_empresa where idempresa in ($codigos)order by nome";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }


}