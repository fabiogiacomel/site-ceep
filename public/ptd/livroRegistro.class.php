<?php

//Nome da classe é o nome da tabela no banco de dados
class LivroRegistro{ 

  //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
  private $idregistro;
  private $data;
  private $idusuario;
  private $descricao;
  private $arquivo;
  private $modalidade;//1-Integrado 2-Subsequente


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

    if (!$this->arquivo) {
          echo 'Nenhum arquivo enviado!';
        } else {
          $tmp  = $this->arquivo['tmp_name'];
          $name = $this->arquivo['name'];
          $type = $this->arquivo['type'];
          $size = $this->arquivo['size'];
          $ext  = strrchr($name, '.');
          $error= $this->arquivo['error'];
      }

      switch ($error) {
         case 0:
          break;
         case 1:
          echo 'Tamanho do arquivo ultrapassou o limite';
          break;
         case 2:
          echo 'O tamanho do arquivo é maior do que o permitido!';
          break;
          case 3:
          echo 'O upload não foi concluí­do!';
          break;
          case 4:
          echo 'O upload não foi feito!';
          break;
        }
      
        if ($error == 0) {
        $pasta = "ptd/lrc/";
        // $dir = $pasta.md5($name.date("dmYHis")).$ext;
        $dir = $pasta.$name;
        if(!empty($name)){  
          //echo "movendo o arquivo ".$tmp . "  para a pasta ". $dir;
          if(move_uploaded_file($tmp, $dir)){
                //vai para o crop
            //setcookie("image",$dir);
                  //carrega aqui a página que faz o crop
            }else{
            return "Não foi possível mover $tmp para $dir";
          } 
        }else{
          return "Erro: Nenhuma imagem selecionada!";
        }     
    }
    $sql = "insert into livro_registro (idusuario,descricao,arquivo,modalidade) values (:p3,:p4,:p5,:p6)";

// $sql2="insert into livro_registro (idusuario,descricao,arquivo,modalidade) values (".$_SESSION['idusuario'].",$this->descricao,$name,$this->modalidade)";
// return $sql2;

    $con = new Conexao();
    $stm = $con->prepare($sql);

    $stm->bindValue(":p3", $_SESSION['idusuario']); 
    $stm->bindValue(":p4", $this->descricao); 
    $stm->bindValue(":p5", $name); 
    $stm->bindValue(":p6", $this->modalidade); 
    if($stm->execute()){
      return "Resgistro incluído com sucesso";
    }else{
      return "Falha ao incluir orientação do LRC";
    }
  }

  function alterar(){
    $sql = "update livro_registro set data=:p2,idusuario=:p3,descricao=:p4,arquivo=:p5, modalidade=:p6 where idregistro=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idregistro); 
    $stm->bindValue(":p2", $this->data); 
    $stm->bindValue(":p3", $this->idusuario); 
    $stm->bindValue(":p4", $this->descricao); 
    $stm->bindValue(":p5", $this->arquivo); 
    $stm->bindValue(":p6", $this->modalidade); 
    $stm->execute();
  }

  function excluir(){
    $sql = "delete from livro_registro where  idregistro=:p1)";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->bindValue(":p1", $this->idregistro); 
    $stm->execute();
  }

  function listar(){
    $sql = "select * from livro_registro order by data";
    $con = new Conexao();
    $stm = $con->prepare($sql);
    $stm->execute();
    return $stm;
  }

}