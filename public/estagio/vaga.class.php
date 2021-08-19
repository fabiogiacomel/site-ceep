<?php

//Nome da classe é o nome da tabela no banco de dados
class Vaga{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idvaga;
  private $curso;
  private $empresa;
  private $setor;
  private $tipo_vaga;
  private $bolsa_auxilio;

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
      $sql = "insert into estagio_vaga (curso,empresa,setor,bolsa_auxilio,tipo_vaga) values (:p1,:p2,:p3,:p4,:p5)";
     
      $con = new Conexao();
      $stm = $con->prepare($sql);

      $stm->bindValue(":p1", $this->curso); 
      $stm->bindValue(":p2", $this->empresa); 
      $stm->bindValue(":p3", $this->setor); 
      $stm->bindValue(":p4", $this->bolsa_auxilio); 
      $stm->bindValue(":p5", $this->tipo_vaga); 
      
      if($stm->execute()){
        return "Registro incluído com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  function alterar(){
   try{
      $sql = "update estagio_vaga set curso=:p1, empresa=:p2, setor=:p3, bolsa_auxilio=:p4, tipo_vaga=:p5 where idvaga=:p0";
     
      $con = new Conexao();
      $stm = $con->prepare($sql);

      $stm->bindValue(":p0", $this->idvaga); 
      $stm->bindValue(":p1", $this->curso); 
      $stm->bindValue(":p2", $this->empresa); 
      $stm->bindValue(":p3", $this->setor); 
      $stm->bindValue(":p4", $this->bolsa_auxilio); 
      $stm->bindValue(":p5", $this->tipo_vaga); 
      
      if($stm->execute()){
        return "Registro alerado com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }

  function excluir(){
    try{
      $sql = "delete from estagio_vaga where idvaga=:p1";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idvaga); 
      if($stm->execute()){
        return "Registro excluído com sucesso!";
      }
    }catch(PDOException $e){
      return Erro::traduzErro($e);
    }
  }


  // function carregar(){
  //   try{
  //     $sql = "select e.*,c.nome as nome_cidade from estagio_empresa e left join cidade c on c.idcidade=e.idcidade where idempresa=:p1";
  //     $con = new Conexao();
  //     $stm = $con->prepare($sql);
  //     $stm->bindValue(":p1", $this->idempresa); 
  //     $stm->execute();
  //     foreach ($stm as $linha) {
  //       $this->nome= $linha['nome'];
  //       $this->rua = $linha['rua'];
  //       $this->numero = $linha['numero'];
  //       $this->bairro = $linha['bairro'];
  //       $this->idcidade = $linha['idcidade'];
  //       $this->nome_cidade = $linha['nome_cidade'];
  //       $this->estado = $linha['estado'];
  //       $this->cep = $linha['cep'];
  //       $this->telefone = $linha['telefone'];
  //       $this->email = $linha['email'];
  //       $this->cnpj = $linha['cnpj'];
  //       $this->representante_nome = $linha['representante_nome'];
  //       $this->representante_cpf = $linha['representante_cpf'];
  //     }
  //     return true;

  //   }catch(PDOException $e){
  //     echo Erro::traduzErro($e);
  //   }
  // }


  function consultar(){
    try{
      $sql = "select * from estagio_vaga where idvaga=:p1";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idvaga); 
      $stm->execute();
      return $stm;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }



  function listar(){
    try{
      $sql = "select v.idvaga, v.curso, v.setor,v.bolsa_auxilio,v.tipo_vaga,date(v.data) as data, e.nome as empresa from estagio_vaga v inner join estagio_empresa e on v.empresa=e.idempresa order by data";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->execute();
      return $stm;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }
}