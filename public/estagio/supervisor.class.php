<?php

//Nome da classe é o nome da tabela no banco de dados
class Supervisor{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $id;
  private $nome;
  private $rg;
  private $curso;

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
      $sql = "insert into estagio_supervisor (nome, rg, curso) values (:p1, :p2, :p3)";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->nome); 
      $stm->bindValue(":p2", $this->rg); 
      $stm->bindValue(":p3", $this->curso); 
      $stm->execute();
    }catch(Exception $e){
      return Erro::traduzErro($e);
    }  
  }

  function alterar(){
    // $sql = "update estagio_aluno set nome=:p2,telefone=:p3,cpf=:p4,rg=:p5,email=:p6,supervisor_nome=:p7,curso=:p8 where idaluno=:p1";
    // $con = new Conexao();
    // $stm = $con->prepare($sql);
    // $stm->bindValue(":p1", $this->idaluno); 
    // $stm->bindValue(":p2", $this->nome); 
    // $stm->bindValue(":p3", $this->telefone); 
    // $stm->bindValue(":p4", $this->cpf); 
    // $stm->bindValue(":p5", $this->rg); 
    // $stm->bindValue(":p6", $this->email); 
    // $stm->bindValue(":p7", $this->supervisor_nome); 
    // $stm->bindValue(":p8", $this->curso); 
    // $stm->execute();
  }

  function excluir(){
    $sql = "delete from estagio_supervisor where  id=:p1";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->id); 
    $stm->execute();
  }

  function consultar(){
    $sql = "select upper(nome) as nome_upper,s.* from estagio_supervisor s where  id=:p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->id); 
    $stm->execute();
    return $stm;
  }

  function find($nome){
    $sql = "select upper(nome) as nome_upper,s.* from estagio_supervisor s where upper(nome) like :p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", strtoupper($nome.'%')); 
    $stm->execute();
    return $stm;
  }


    function carregar(){
      $sql = "select * from estagio_supervisor where  id=:p1";
      $con = new Conexao();
//    echo "Idaluno".$this->idaluno;
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->id); 
      $stm->execute();
      foreach ($stm as $linha) {
       $this->id  = $linha["id"];
        $this->nome= $linha["nome"];
        $this->rg  = $linha["rg"];
        $this->curso= $linha["curso"];
      } 
    }

    function listar(){
    $sql = "select upper(nome) as nome_upper,s.* from estagio_supervisor s order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

}