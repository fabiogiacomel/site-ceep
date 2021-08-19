<?php

//Nome da classe é o nome da tabela no banco de dados
class Professor{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idprofessor;
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
      $sql = "insert into estagio_professor (nome, rg, curso) values (:p1, :p2, :p3)";
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
    $sql = "update estagio_professor set nome=:p2,rg=:p3,curso=:p4 where idprofessor=:p1";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idprofessor); 
    $stm->bindValue(":p2", $this->nome); 
    $stm->bindValue(":p3", $this->rg); 
    $stm->bindValue(":p4", $this->curso); 
    $stm->execute();
  }

  function excluir(){
    $sql = "delete from estagio_professor where  idprofessor=:p1";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idprofessor); 
    $stm->execute();
  }

  function consultar(){
    $sql = "select upper(nome) as nome_upper,s.* from estagio_professor s where  idprofessor=:p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idprofessor); 
    $stm->execute();
    return $stm;
  }

  function find($nome){
    $sql = "select upper(nome) as nome_upper,s.* from estagio_professor s where upper(nome) like :p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", strtoupper($nome.'%')); 
    $stm->execute();
    return $stm;
  }


    function carregar(){
      $sql = "select * from estagio_professor where  idprofessor=:p1";
      $con = new Conexao();
//    echo "idprofessoraluno".$this->idprofessoraluno;
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idprofessor); 
      $stm->execute();
      foreach ($stm as $linha) {
       $this->idprofessor  = $linha["idprofessor"];
        $this->nome= $linha["nome"];
        $this->rg  = $linha["rg"];
        $this->curso= $linha["curso"];
      } 
    }

    function listar(){
    $sql = "select upper(nome) as nome_upper,s.* from estagio_professor s order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

}