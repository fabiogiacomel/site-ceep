<?php

//Nome da classe é o nome da tabela no banco de dados
class Empresa{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idempresa;
  private $nome;
  private $rua;
  private $numero;
  private $bairro;
  private $idcidade;
  private $nome_cidade;
  private $estado;
  private $cep;
  private $telefone;
  private $email;
  private $cnpj;

  private $representante_nome;
  private $representante_cpf;


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
      $sql = "insert into estagio_empresa (rua,numero,bairro,idcidade,estado,cep,telefone,email,cnpj,nome,representante_nome, representante_cpf) values (:p2,:numero,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12)";
     
      $con = new Conexao();
      $stm = $con->prepare($sql);

      $stm->bindValue(":p2", $this->rua); 
      $stm->bindValue(":numero", $this->numero); 
      $stm->bindValue(":p3", $this->bairro); 
      $stm->bindValue(":p4", $this->idcidade); 
      $stm->bindValue(":p5", $this->estado); 
      $stm->bindValue(":p6", $this->cep); 
      $stm->bindValue(":p7", $this->telefone); 
      $stm->bindValue(":p8", $this->email); 
      $stm->bindValue(":p9", $this->cnpj); 
      $stm->bindValue(":p10", $this->nome); 
      $stm->bindValue(":p11", $this->representante_nome); 
      $stm->bindValue(":p12", $this->representante_cpf); 
      if($stm->execute()){
        return "Registro incluído com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  function alterar(){
    try{
      $sql = "update estagio_empresa set nome=:p1, rua=:p2, numero=:numero,bairro=:p3,idcidade=:p4,estado=:p5,cep=:p6,telefone=:p7,email=:p8,cnpj=:p9,representante_nome=:p11,representante_cpf=:p12 where idempresa=:p10";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->nome); 
      $stm->bindValue(":p2", $this->rua); 
      $stm->bindValue(":numero", $this->numero); 
      $stm->bindValue(":p3", $this->bairro); 
      $stm->bindValue(":p4", $this->idcidade); 
      $stm->bindValue(":p5", $this->estado); 
      $stm->bindValue(":p6", $this->cep); 
      $stm->bindValue(":p7", $this->telefone); 
      $stm->bindValue(":p8", $this->email); 
      $stm->bindValue(":p9", $this->cnpj); 
      $stm->bindValue(":p10", $this->idempresa); 
      $stm->bindValue(":p11", $this->representante_nome); 
      $stm->bindValue(":p12", $this->representante_cpf); 
      if($stm->execute()){
        return "Registro alterado com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  function excluir(){
    try{
      $sql = "delete from estagio_empresa where  idempresa=:p1";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idempresa); 
      if($stm->execute()){
        return "Registro excluído com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }


  function carregar(){
    try{
      $sql = "select e.*,c.nome as nome_cidade from estagio_empresa e left join cidade c on c.idcidade=e.idcidade where idempresa=:p1";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idempresa); 
      $stm->execute();
      foreach ($stm as $linha) {
        $this->idempresa   = $linha['idempresa'];
        $this->nome        = $linha['nome'];
        $this->rua         = $linha['rua'];
        $this->numero      = $linha['numero'];
        $this->bairro      = $linha['bairro'];
        $this->idcidade    = $linha['idcidade'];
        $this->nome_cidade = $linha['nome_cidade'];
        $this->estado      = $linha['estado'];
        $this->cep         = $linha['cep'];
        $this->telefone    = $linha['telefone'];
        $this->email       = $linha['email'];
        $this->cnpj        = $linha['cnpj'];
        $this->representante_nome = $linha['representante_nome'];
        $this->representante_cpf  = $linha['representante_cpf'];
      }
      return true;

    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }


  function consultar(){
    try{
      $sql = "select * from estagio_empresa where  idempresa=:p1 order by nome";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idempresa); 
      $stm->execute();
      return $stm;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }

  function find($nome){
    $sql = "select upper(e.nome) as nome_upper,e.*,c.nome as cidade from estagio_empresa e left join cidade c on c.idcidade=e.idcidade where upper(e.nome) like :p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", strtoupper($nome.'%')); 
    $stm->execute();
    return $stm;
  }

  function findByCnpj($cnpj){
    $sql = "select upper(e.nome) as nome_upper,e.*,c.nome as cidade from estagio_empresa e left join cidade c on c.idcidade=e.idcidade where cnpj=:p1 order by nome_upper";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $cnpj); 
    $stm->execute();
    return $stm;
  }  

  function listar(){
    try{
      $sql = "select upper(e.nome) as nome_upper,e.*,c.nome as cidade from estagio_empresa e left join cidade c on c.idcidade=e.idcidade order by nome_upper";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }


}