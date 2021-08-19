<?php
class Ficha2{
	private $idlancamentos;
	private $professor;
	private $idcurso;
	private $disciplina;
 	private $idserie;
	private $idturma;
	private $idaluno;
	private $idinformacao;

  public function __construct(){
    include("../conexao.class.php");
  }

	public function __get($var){
		return $this->$var;
	}

	public function __set($var, $valor){
		$this->$var = $valor;
	}

	public function gravar(){
		try{
			$sql = "insert into ficha_lancamentos (professor,idcurso,disciplina, idserie, idturma, idaluno, idinformacao) values (?,?,?,?,?,?,?)";
			
			$stm = Conexao::prepare($sql);

			$stm->bindParam(1, $this->professor);
			$stm->bindParam(2, $this->idcurso);
			$stm->bindParam(3, $this->disciplina);
			$stm->bindParam(4, $this->idserie);
			$stm->bindParam(5, $this->idturma);
			$stm->bindParam(6, $this->idinformacao);
			$stm->bindParam(7, $this->idaluno);

			if($stm->execute()){
				return '<div class="alert alert-success"><strong>Parabéns!</strong> Registro realizado com sucesso.</div>';
			}else{
				return "<div class='alert alert-danger'>Falha ao incluír registro!</div>";
			}
    }catch (PDOException $e){
			return "<div class='alert alert-danger'>Erro ao gravar:".$e->getMessage()."</div>";
			GeraLog::getInstance()->inserirLog("Erro ao gravar lancamento: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage()); 
    }
	}



	public function listarCurso(){
		try{
			$sql = "select distinct(curso) from ficha_lancamentos_base order by curso";
			
			$stm = Conexao::prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarSerie(){
		try{
			$sql = "select distinct(serie) from ficha_lancamentos_base order by serie";
			$stm = Conexao::prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarTurma(){
		try{
			$sql = "select distinct(turma) from ficha_lancamentos_base order by turma";
			$stm = Conexao::prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarAluno(){
		try{
			$sql = "select * from ficha_aluno order by idaluno";
			$stm = Conexao::prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarInformacao(){
		try{
			$sql = "select * from ficha_informacao";
			$stm = Conexao::prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarDadosBase(){
		try{
			$sql = "select * from ficha_lancamentos_base l
			
			where  curso=? and serie=? and turma=?";
			$stm = Conexao::prepare($sql);
			$stm->bindParam(1, $this->idcurso);
			$stm->bindParam(2, $this->idserie);
			$stm->bindParam(3, $this->idturma);

			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}
	

	public function carregar(){
    // try{
    //   $sql = "select * from usuario where id=?";
    //   $con = new Conexao();
    //   $stm = $con->prepare($sql);
    //   $stm->bindParam(1, $this->id); 
    //   $stm->execute();
    //   foreach ($stm as $linha) {
    //     $this->id   = $linha['id'];
    //     $this->nome      = $linha['nome'];
    //     $this->senha     = $linha['senha'];
    //     $this->tipo      = $linha['tipo'];
    //     $this->email     = $linha['email'];
    //   }
    //   return true;
    // }catch(PDOException $e){
    //   echo Erro::traduzErro($e);
    // }
  }

}
?>