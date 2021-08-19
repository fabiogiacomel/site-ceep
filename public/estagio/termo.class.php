<?php

//Nome da classe é o nome da tabela no banco de dados
class Termo{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idestagio;
  private $idconvenio;
  private $idestagiario;
  private $idresponsavel;
  private $idsupervisor;
  private $aluno_idaluno;

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
    $sql = "insert into $Termo (idestagio,idconvenio,idestagiario,idresponsavel,idsupervisor,aluno_idaluno) values (:p1,:p2,:p3,:p4,:p5,:p6)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idestagio); 
    $stm->bindValue(":p2", $this->idconvenio); 
    $stm->bindValue(":p3", $this->idestagiario); 
    $stm->bindValue(":p4", $this->idresponsavel); 
    $stm->bindValue(":p5", $this->idsupervisor); 
    $stm->bindValue(":p6", $this->aluno_idaluno); 
    $stm->execute();
  }

  function alterar(){
    $sql = "update Termo set idconvenio=:p2,idestagiario=:p3,idresponsavel=:p4,idsupervisor=:p5,aluno_idaluno=:p6 where idestagio=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idestagio); 
    $stm->bindValue(":p2", $this->idconvenio); 
    $stm->bindValue(":p3", $this->idestagiario); 
    $stm->bindValue(":p4", $this->idresponsavel); 
    $stm->bindValue(":p5", $this->idsupervisor); 
    $stm->bindValue(":p6", $this->aluno_idaluno); 
    $stm->execute();
  }

  function excluir(){
    $sql = "delete from Termo where  idestagio=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idestagio); 
    $stm->execute();
  }

  function consultar(){
    $sql = "select * from Termo where  idestagio=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idestagio); 
    $stm->execute();
    return $stm;
  }

}