<?php

//Nome da classe é o nome da tabela no banco de dados
class Convenio{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idconvenio;
  private $ano;
  private $data_validade;
  private $idempresa;
  private $nome_empresa;
  private $nome_diretor;
  private $cpf_diretor;

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
      $sql = "insert into estagio_convenio (idconvenio,ano,data_validade,idempresa,nome_diretor,cpf_diretor) values (:p1,:p2,:p3,:p4,:p5,:p6)";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idconvenio); 
      $stm->bindValue(":p2", $this->ano); 
      $stm->bindValue(":p3", $this->data_validade); 
      $stm->bindValue(":p4", $this->idempresa); 
      $stm->bindValue(":p5", $this->nome_diretor); 
      $stm->bindValue(":p6", $this->cpf_diretor); 
      if ($stm->execute()){
        return "Registro incluído com sucesso!";
      }else{
        return "ERRO ao gravar";
      }
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }

function carregar(){  
    try{
      $sql = "select c.*,e.nome as nome_empresa from estagio_convenio c inner join estagio_empresa e on c.idempresa=e.idempresa where idconvenio=:p1 and ano=:p2";
      // and ano=:p2"; retirado para testar pois nao carregava.

      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idconvenio); 
      $stm->bindValue(":p2", $this->ano); 
      $stm->execute();
      foreach ($stm as $linha) {
        $this->idconvenio= $linha['idconvenio'];
        $this->ano = $linha['ano'];
        $this->data_validade = $linha['data_validade'];
        $this->idempresa = $linha['idempresa'];
        $this->nome_empresa = $linha['nome_empresa'];
        $this->nome_diretor = $linha['nome_diretor'];
        $this->cpf_diretor = $linha['cpf_diretor'];
      }
      return true;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }
  function alterar(){
    try{
      $sql = "update estagio_convenio set data_validade=:p2,idempresa=:p3, nome_diretor=:p4, cpf_diretor=:p5 where idconvenio=:p1 and ano=:p0";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idconvenio); 
      $stm->bindValue(":p0", $this->ano); 
      $stm->bindValue(":p2", $this->data_validade); 
      $stm->bindValue(":p3", $this->idempresa); 
      $stm->bindValue(":p4", $this->nome_diretor); 
      $stm->bindValue(":p5", $this->cpf_diretor); 
      if ($stm->execute()){
        return "Registro alterado com sucesso!";
      }else{
        return "ERRO ao alterar";
      }
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }

  function excluir(){
    try{
      $sql = "delete from estagio_convenio where  idconvenio=:p1 and ano=:p2";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idconvenio); 
      $stm->bindValue(":p2", $this->ano); 
      if ($stm->execute()){
        return "Registro excluído com sucesso!";
      }else{
        return "ERRO ao excluir";
      }
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }

  function consultar(){
    $sql = "select * from estagio_convenio where  idconvenio=:p1";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idconvenio); 
    $stm->execute();
    return $stm;
  }

 function listarEmpresas(){
    try{
      $sql = "select upper(e.nome) as nome,c.idconvenio, c.ano from estagio_convenio c left join estagio_empresa e on e.idempresa=c.idempresa group by nome order by e.nome;";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }
  
function listar_convenios_vencendo(){
    try{
      $sql = "select c.*,upper(e.nome) as nome_empresa FROM `estagio_convenio` c inner join estagio_empresa e on e.idempresa=c.idempresa 
WHERE `data_validade` BETWEEN CURDATE() AND CURDATE() + INTERVAL 30 DAY";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }

 function listar(){
    $sql = "select c.*, upper(e.nome) as nome_empresa from estagio_convenio c inner join estagio_empresa e on e.idempresa=c.idempresa order by nome_empresa";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

  function find($idempresa){
    $sql = "select c.*, upper(e.nome) as nome_empresa from estagio_convenio c inner join estagio_empresa e on e.idempresa=c.idempresa where c.idempresa=:p1";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $idempresa); 
    $stm->execute();
    return $stm;
  }

  function getMaxId(){
    $sql = "select max(idconvenio) as max, ano
      FROM estagio_convenio where ano = year(now())";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    $max = 0;
    foreach($stm as $linha){
      $max = $linha['max'];
    }
    return $max;
  }
 
}