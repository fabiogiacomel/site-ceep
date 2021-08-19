<?php

//Nome da classe é o nome da tabela no banco de dados
class Conteudo{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $conteudo_estruturante;
  private $conteudo_basico;
  private $objetivo;
  private $encaminhamento;

  //O método construtor é padrão, não altere!
  function __construct(){
    require_once ('../conexao.class.php');
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
    
    $sql = "insert into conteudo (conteudo_estruturante,conteudo_basico,objetivo,encaminhamento) values (:p1,:p2,:p3,:p4)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->conteudo_estruturante); 
    $stm->bindValue(":p2", $this->conteudo_basico); 
    $stm->bindValue(":p3", $this->objetivo); 
    $stm->bindValue(":p4", $this->encaminhamento); 
    $stm->execute();
  }

  function alterar(){
    $sql = "update Conteudo set conteudo_basico=:p2,objetivo=:p3,encaminhamento=:p4 where conteudo_estruturante=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->conteudo_estruturante); 
    $stm->bindValue(":p2", $this->conteudo_basico); 
    $stm->bindValue(":p3", $this->objetivo); 
    $stm->bindValue(":p4", $this->encaminhamento); 
    $stm->execute();
  }

  function excluir(){
    $sql = "delete from Conteudo where  conteudo_estruturante=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->conteudo_estruturante); 
    $stm->execute();
  }

  function consultar(){
    $sql = "select * from Conteudo where  conteudo_estruturante=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->conteudo_estruturante); 
    $stm->execute();
    return $stm;
  }

}