<?php

//Nome da classe é o nome da tabela no banco de dados
class Aluno{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idaluno;
  private $nome;
  private $telefone;
  private $cpf;
  private $rg;
  private $email;
  // private $supervisor_nome;
  private $idprofessor_supervisor;
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
      $sql = "insert into estagio_aluno (nome,telefone,cpf,rg,email,idprofessor_supervisor, curso) values (:p2,:p3,:p4,:p5,:p6,:p7,:p8)";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p2", $this->nome); 
      $stm->bindValue(":p3", $this->telefone); 
      $stm->bindValue(":p4", $this->cpf); 
      $stm->bindValue(":p5", $this->rg); 
      $stm->bindValue(":p6", $this->email); 
      $stm->bindValue(":p7", $this->idprofessor_supervisor); 
      $stm->bindValue(":p8", $this->curso); 
      $stm->execute();
    }catch(Exception $e){
      return Erro::traduzErro($e);
    }  
  }

  function alterar(){
    $sql = "update estagio_aluno set nome=:p2,telefone=:p3,cpf=:p4,rg=:p5,email=:p6,idprofessor_supervisor=:p7,curso=:p8 where idaluno=:p1";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idaluno); 
    $stm->bindValue(":p2", $this->nome); 
    $stm->bindValue(":p3", $this->telefone); 
    $stm->bindValue(":p4", $this->cpf); 
    $stm->bindValue(":p5", $this->rg); 
    $stm->bindValue(":p6", $this->email); 
    $stm->bindValue(":p7", $this->idprofessor_supervisor); 
    $stm->bindValue(":p8", $this->curso); 
    $stm->execute();
  }

  function excluir(){
    $sql = "delete from estagio_aluno where  idaluno=:p1";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idaluno); 
    $stm->execute();
  }

  function consultar(){
    $sql = "select upper(nome) as nome_upper,a.* from estagio_aluno a where  idaluno=:p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idaluno); 
    $stm->execute();
    return $stm;
  }

  function find($nome){
    $sql = "select upper(a.nome) as nome_upper,a.*,p.nome as professor from estagio_aluno a left join estagio_professor p on a.idprofessor_supervisor=p.idprofessor where  upper(a.nome) like :p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", strtoupper($nome.'%')); 
    $stm->execute();
    return $stm;
  }

  function findByCpf($cpf){
    $sql = "select upper(a.nome) as nome_upper,a.*,p.nome as professor from estagio_aluno a left join estagio_professor p on a.idprofessor_supervisor=p.idprofessor where  cpf=:p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $cpf); 
    $stm->execute();
    return $stm;
  }


    function carregar(){
    $sql = "select * from estagio_aluno where  idaluno=:p1";
    $con = new Conexao();
//    echo "Idaluno".$this->idaluno;
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idaluno); 
    $stm->execute();
    foreach ($stm as $linha) {
  $this->idaluno= $linha["idaluno"];
  $this->nome= $linha["nome"];
  $this->telefone= $linha["telefone"];
  $this->cpf= $linha["cpf"];
  $this->rg= $linha["rg"];
  $this->email= $linha["email"];
  $this->idprofessor_supervisor= $linha["idprofessor_supervisor"];
  $this->curso= $linha["curso"];
     } 
  }

    function listar(){
    $sql = "select upper(a.nome) as nome_upper,a.*,p.nome as professor from estagio_aluno a left join estagio_professor p on a.idprofessor_supervisor=p.idprofessor order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

  function listarAlunosComProfessor(){
    $sql = "select upper(a.nome) as nome_upper,a.*,p.nome as professor from estagio_aluno a inner join estagio_professor p on a.idprofessor_supervisor=p.idprofessor order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

}