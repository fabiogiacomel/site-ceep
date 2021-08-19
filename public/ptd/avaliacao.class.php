<?php

//Nome da classe é o nome da tabela no banco de dados
class Avaliacao{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $criterio;
  private $instrumento;
  private $valor;
  private $recuperacao_conteudos;

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
    try{
    $sql = "insert into $Avaliacao (criterio,instrumento,valor,recuperacao_conteudos) values (:p1,:p2,:p3,:p4)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->criterio); 
    $stm->bindValue(":p2", $this->instrumento); 
    $stm->bindValue(":p3", $this->valor); 
    $stm->bindValue(":p4", $this->recuperacao_conteudos); 
    return $stm->execute();
}catch(Exception $e){
  echo "Erro".$e->getMessage();
}
  }

  function alterar(){
    $sql = "update Avaliacao set instrumento=:p2,valor=:p3,recuperacao_conteudos=:p4 where criterio=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->criterio); 
    $stm->bindValue(":p2", $this->instrumento); 
    $stm->bindValue(":p3", $this->valor); 
    $stm->bindValue(":p4", $this->recuperacao_conteudos); 
    $stm->execute();
  }

  function excluir(){
    $sql = "delete from Avaliacao where  criterio=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->criterio); 
    $stm->execute();
  }

  function consultar(){
    $sql = "select * from Avaliacao where  criterio=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->criterio); 
    $stm->execute();
    return $stm;
  }

}