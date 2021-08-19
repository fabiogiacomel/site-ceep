<?php
class Nome_da_classe{ //O nome deve comecar por letra maiúscula

	//campos da tabela no banco de dados
	private $nome_do_campo; //Repita esta linha para cada campo da Tabela


	//O método construtor é padrão, não altere!
  public function __construct(){
    require_once ('../conexao.class.php');
    require_once ('erro.class.php');
  }

  //Método enviar  (set), não altere!
  public function __set($var, $val){
    $this->$var = $val;
  }

  //Método receber (get), não altere!
  public function __get($var){
    return $this->$var;
  }


  public function gravar(){

	    //Códigos aqui

  }

  public function alterar(){
    
      //Códigos aqui

  }

  public function excluir(){

      //Códigos aqui

  }

  public function listar(){

      //Códigos aqui

  }
}