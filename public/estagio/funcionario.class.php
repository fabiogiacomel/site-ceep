<?php

//Nome da classe é o nome da tabela no banco de dados
class Funcionario{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idfuncionario;
  private $nome;
  private $telefone;
  private $cpf;
  private $rg;
  private $email;
  private $tipo;
  private $idempresa;

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
    $sql = "insert into $Funcionario (idfuncionario,nome,telefone,cpf,rg,email,tipo,idempresa) values (:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idfuncionario); 
    $stm->bindValue(":p2", $this->nome); 
    $stm->bindValue(":p3", $this->telefone); 
    $stm->bindValue(":p4", $this->cpf); 
    $stm->bindValue(":p5", $this->rg); 
    $stm->bindValue(":p6", $this->email); 
    $stm->bindValue(":p7", $this->tipo); 
    $stm->bindValue(":p8", $this->idempresa); 
    $stm->execute();
  }

  function alterar(){
    $sql = "update Funcionario set nome=:p2,telefone=:p3,cpf=:p4,rg=:p5,email=:p6,tipo=:p7,idempresa=:p8 where idfuncionario=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idfuncionario); 
    $stm->bindValue(":p2", $this->nome); 
    $stm->bindValue(":p3", $this->telefone); 
    $stm->bindValue(":p4", $this->cpf); 
    $stm->bindValue(":p5", $this->rg); 
    $stm->bindValue(":p6", $this->email); 
    $stm->bindValue(":p7", $this->tipo); 
    $stm->bindValue(":p8", $this->idempresa); 
    $stm->execute();
  }

  function excluir(){
    $sql = "delete from Funcionario where  idfuncionario=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idfuncionario); 
    $stm->execute();
  }

  function consultar(){
    $sql = "select * from Funcionario where  idfuncionario=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idfuncionario); 
    $stm->execute();
    return $stm;
  }

}