<?php

//Nome da classe é o nome da tabela no banco de dados
class Estagio{ 

  //Grava os dados do termo de estagio (compromisso) 
  private $idestagio; //numero do termo de estagio
  private $ano; //Ano do termo de estagio

  private $idconvenio;//NUmero do convenio
  private $convenioano;//Ano do convenio
  private $idestagiario;
  private $idresponsavel;
  private $idsupervisor;
  private $aluno_idaluno;

  //Adicionado em 08/09
  private $curso;
  private $setor;
  private $rg_professor;
  private $data_inicio;
  private $data_fim;
  private $carga_horaria;

  private $apolice;


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
    $sql = "insert into estagio_estagio (idestagio,ano,idconvenio,convenioano,idestagiario,idresponsavel,idsupervisor,curso,setor,rg_professor,data_inicio,data_fim,carga_horaria,apolice) values (:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p9,:p10,:p11,:p12,:p13,:p14,:p15)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idestagio); 
    $stm->bindValue(":p2", $this->ano); 
    $stm->bindValue(":p3", $this->idconvenio); 
    $stm->bindValue(":p4", $this->convenioano); 
    $stm->bindValue(":p5", $this->idestagiario); 
    $stm->bindValue(":p6", $this->idresponsavel); 
    $stm->bindValue(":p7", $this->idsupervisor); 
    //$stm->bindValue(":p7", $this->aluno_idaluno); 

      $stm->bindValue(":p9",$this->curso);
      $stm->bindValue(":p10",$this->setor);
      $stm->bindValue(":p11",$this->rg_professor);
      $stm->bindValue(":p12",$this->data_inicio);
      $stm->bindValue(":p13",$this->data_fim);
      $stm->bindValue(":p14",$this->carga_horaria);
      $stm->bindValue(":p15",$this->apolice);
    $stm->execute();
  }catch(Exception $e){
    return $e->getMessage();
  }
  }

  function alterar(){
    $sql = "update estagio_estagio set idconvenio=:p3,convenioano=:p15,idestagiario=:p4,idresponsavel=:p5,idsupervisor=:p6,curso=:p8,setor=:p9,rg_professor=:p10,data_inicio=:p11,data_fim=:p12,carga_horaria=:p13,apolice=:p14 where idestagio=:p1 and ano=:p2";

    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idestagio); 
    $stm->bindValue(":p2", $this->ano); 
    $stm->bindValue(":p3", $this->idconvenio); 
    $stm->bindValue(":p15", $this->convenioano); 
    $stm->bindValue(":p4", $this->idestagiario); 
    $stm->bindValue(":p5", $this->idresponsavel); 
    $stm->bindValue(":p6", $this->idsupervisor); 
    //$stm->bindValue(":p7", $this->aluno_idaluno); 

      $stm->bindValue(":p8",$this->curso);
      $stm->bindValue(":p9",$this->setor);
      $stm->bindValue(":p10",$this->rg_professor);
      $stm->bindValue(":p11",$this->data_inicio);
      $stm->bindValue(":p12",$this->data_fim);
      $stm->bindValue(":p13",$this->carga_horaria);
      $stm->bindValue(":p14",$this->apolice);
    $stm->execute();
  }

  function excluir(){
       try{
        $sql = "delete from estagio_estagio where idestagio=:p1 and ano=:p2";
     $con = new Conexao();
     $stm = $con->prepare($sql);
     $stm->bindValue(":p1", $this->idestagio); 
     $stm->bindValue(":p2", $this->ano); 
     if($stm->execute()){
      return "Ok Excluído: ".$this->idestagio."/".$this->ano;
     }
      }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }



  function carregar(){  
    try{
      $sql = "select * from estagio_estagio where idestagio=:p1 and ano=:p2";
      $con = new Conexao();
      $stm = $con->prepare($sql);
      $stm->bindValue(":p1", $this->idestagio); 
      $stm->bindValue(":p2", $this->ano); 
      $stm->execute();

      //echo "Achou ".$stm->rowCount()." registros";
      if ($stm->rowCount()==0){
        $this->idestagio = 0; 
        $this->ano = 0; 
        $this->idconvenio = 0; 
        $this->convenioano = 0; 
        $this->idestagiario = ""; 
        $this->idresponsavel = ""; 
        $this->idsupervisor = ""; 

        $this->curso = 0;
        $this->setor = "";
        $this->rg_professor = "";
        $this->data_inicio = "";
        $this->data_fim = "";
        $this->carga_horaria = "";
        $this->apolice = "";
      }

      foreach ($stm as $linha) {
        $this->idestagio = $linha['idestagio']; 
        $this->ano = $linha['ano']; 
        $this->idconvenio = $linha['idconvenio']; 
        $this->convenioano = $linha['convenioano']; 
        $this->idestagiario = $linha['idestagiario']; 
        $this->idresponsavel = $linha['idresponsavel']; 
        $this->idsupervisor = $linha['idsupervisor']; 

        $this->curso = $linha['curso'];
        $this->setor = $linha['setor'];
        $this->rg_professor = $linha['rg_professor'];
        $this->data_inicio = $linha['data_inicio'];
        $this->data_fim = $linha['data_fim'];
        $this->carga_horaria = $linha['carga_horaria'];
        $this->apolice = $linha['apolice'];
      }
      return true;
    }catch(PDOException $e){
      echo Erro::traduzErro($e);
    }
  }


  function consultar(){
    $sql = "select * from Termo where  idestagio=:p1";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idestagio); 
    $stm->execute();
    return $stm;
  }

  function findByKey(){
    //Procura por id e ano
    $sql = "select * from estagio_estagio where idestagio=:p1 and ano=:p2";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idestagio); 
    $stm->bindValue(":p2", $this->ano); 
    $stm->execute();
    return $stm->rowCount() > 0;
  }

  function listar(){
    $sql = "select es.*, upper(e.nome) as nome_empresa, a.nome as nome_aluno from estagio_estagio es inner join estagio_convenio c on es.idconvenio=c.idconvenio and es.convenioano=c.ano inner join estagio_empresa e on c.idempresa=e.idempresa inner join estagio_aluno a on a.idaluno=es.idestagiario order by es.ano desc, es.idestagio desc";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

  function listarAntigo(){
    // $sql = "select es.*, upper(e.nome) as nome_empresa, a.nome as nome_aluno from estagio_estagio es inner join estagio_convenio c on es.idconvenio=c.idconvenio inner join estagio_empresa e on c.idempresa=e.idempresa inner join estagio_aluno a on a.idaluno=es.idestagiario where data_fim >= now() order by es.idestagio desc, es.ano"; --> tracado em 22/08/17


    $sql = "select es.*, upper(e.nome) as nome_empresa, a.nome as nome_aluno from estagio_estagio es inner join estagio_convenio c on es.idconvenio=c.idconvenio  inner join estagio_empresa e on c.idempresa=e.idempresa inner join estagio_aluno a on a.idaluno=es.idestagiario order by es.idestagio desc, es.ano";

    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

  function listarVencidos(){ 
    $sql = "select es.*, upper(e.nome) as nome_empresa, a.nome as nome_aluno from estagio_estagio es inner join estagio_convenio c on es.idconvenio=c.idconvenio and es.convenioano=c.ano inner join estagio_empresa e on c.idempresa=e.idempresa inner join estagio_aluno a on a.idaluno=es.idestagiario where data_fim < now() order by es.idestagio desc, es.ano";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

    function consultarEstagiosAtivos($idempresa=0){
    //Usado para gerar o relatorio de alunos em estagio por empresa
    //aluno.empresa.report.php
     if($idempresa>0){
    $sql = "select c.idconvenio, emp.*, count(idestagiario) as total FROM `estagio_convenio` c 
inner join estagio_estagio e on c.idconvenio=e.idconvenio and e.convenioano=c.ano
inner join estagio_empresa emp on emp.idempresa=c.idempresa
WHERE data_validade > now() and e.data_fim > now() and emp.idempresa='". $idempresa ."' group by idconvenio order by emp.nome;"; 
     } else{
    $sql = "select c.idconvenio, emp.*, count(idestagiario) as total FROM `estagio_convenio` c 
inner join estagio_estagio e on c.idconvenio=e.idconvenio
inner join estagio_empresa emp on emp.idempresa=c.idempresa
WHERE data_validade > now() and e.data_fim > now() group by idconvenio order by emp.nome;"; 
    }
    $con = new Conexao();
    $stm = $con->prepare($sql);

    $stm->execute();
    return $stm;
  }


    function consultarEstagiosAll($idempresa=0){
    //Usado para gerar o relatorio de alunos em estagio por empresa
    //aluno.empresa.report2.php
     if($idempresa>0){
      $sql = "select c.idconvenio, emp.*, count(idestagiario) as total FROM `estagio_convenio` c 
inner join estagio_estagio e on c.idconvenio=e.idconvenio and e.convenioano=c.ano
inner join estagio_empresa emp on emp.idempresa=c.idempresa
WHERE emp.idempresa='". $idempresa ."' group by idconvenio order by emp.nome;"; 
     
      $con = new Conexao();
      $stm = $con->prepare($sql);

      $stm->execute();
      return $stm;
    }
  }  


  function consultarEstagiosPorConvenio($idconvenio){
    //Usado para gerar o relatorio de alunos em estagio por empresa
    //aluno.empresa.report.php

    $sql = "select e.curso, e.setor, a.nome, a.telefone,a.email, e.data_inicio,e.data_fim FROM estagio_estagio e inner join estagio_aluno a on e.idestagiario=a.idaluno WHERE e.idconvenio=:p1 and e.data_fim > now() order by a.nome"; 
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $idconvenio); 
    $stm->execute();
    return $stm;
  }  

function consultarEstagiosPorConvenioAll($idconvenio,$data_ini,$data_fim){
    //Usado para gerar o relatorio de alunos em estagio por empresa
    //aluno.empresa.report2.php

    $sql = "select e.curso, e.setor, a.nome, a.telefone,a.email, e.data_inicio,e.data_fim FROM estagio_estagio e inner join estagio_aluno a on e.idestagiario=a.idaluno WHERE e.idconvenio=:p1 and data_inicio > :p2 and data_fim < :p3 order by a.nome"; 
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $idconvenio); 
    $stm->bindValue(":p2", $data_ini); 
    $stm->bindValue(":p3", $data_fim); 
    $stm->execute();
    return $stm;
  }  

  function getMaxId(){
    $sql = "select MAX(idestagio) AS max, ano
FROM estagio_estagio where ano = year(now())";//pegar o maio do ano
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