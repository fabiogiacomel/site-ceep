<?php
class Ficha2{
	private $idlancamentos;
	private $usuario;
	private $professor;
	private $idcurso;
	private $disciplina;
 	private $idserie;
	private $idturma;
	private $idaluno;
	private $idinformacao;
	private $observacao;

	public function __construct(){
		require_once("../conexao.class.php");
	}

	public function __get($var){
		return $this->$var;
	}

	public function __set($var, $valor){
		$this->$var = $valor;
	}

	public function gravar(){
		try{
			$sql = "insert into ficha_lancamentos (professor,idcurso,disciplina, idserie, idturma, idaluno, idinformacao,usuario,observacao) values (?,?,?,?,?,?,?,?,?)";
			$con = new Conexao();
			$stm = $con->prepare($sql);

			$stm->bindParam(1, $this->professor);
			$stm->bindParam(2, $this->idcurso);
			$stm->bindParam(3, $this->disciplina);
			$stm->bindParam(4, $this->idserie);
			$stm->bindParam(5, $this->idturma);
			$stm->bindParam(6, $this->idaluno);
			$stm->bindParam(7, $this->idinformacao);
			$stm->bindParam(8, $this->usuario);
			$stm->bindParam(9, $this->observacao);

			if($stm->execute()){
				return '<div class="alert alert-success"><strong>Parabéns!</strong> Registro realizado com sucesso.</div>';
			}else{
				return "<div class='alert alert-danger'>Falha ao incluír registro!</div>";
			}
    }catch (Exception $e){
			return "<div class='alert alert-danger'>Erro ao gravar:".$e->getMessage()."</div>";
			// GeraLog::getInstance()->inserirLog("Erro ao gravar lancamento: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage()); 
    }
	}



	public function listarCurso(){
		try{
			$sql = "select * from ficha_curso order by nome";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarSerie(){
		try{
			$sql = "select * from ficha_serie order by nome";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarTurma(){
		try{
			$sql = "select * from ficha_turma order by nome";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarAluno(){
		try{
			$sql = "select * from ficha_aluno order by nome";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarByAluno(){
		try{
			$sql = "select l.*, c.nome as curso, t.nome as turma, s.nome as serie, i.nome as informacao  from ficha_lancamentos l 
inner join ficha_curso c on l.idcurso=c.idcurso
inner join ficha_serie s on l.idserie=s.idserie
inner join ficha_turma t on l.idturma=t.idturma
inner join ficha_informacao i on l.idinformacao=i.idinformacao
where l.idcurso=? and l.idserie=? and l.idturma=? order by idaluno, disciplina";

			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->bindParam(1, $this->idcurso);
			$stm->bindParam(2, $this->idserie);
			$stm->bindParam(3, $this->idturma);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
  }

	public function listarByData($data_ini, $data_fim){
		try{
			$sql = "select l.*, c.nome as curso, t.nome as turma, s.nome as serie, i.nome as informacao from 
			ficha_lancamentos l inner join 
			ficha_curso c on l.idcurso=c.idcurso inner join 
			ficha_serie s on l.idserie=s.idserie inner join 
			ficha_turma t on l.idturma=t.idturma inner join 
			ficha_informacao i on l.idinformacao=i.idinformacao 
			where DATE(data) BETWEEN ? and ? order by idcurso, idserie, idturma, idaluno, disciplina";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->bindParam(1, $data_ini);
			$stm->bindParam(2, $data_fim);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
  }


	public function listarByUsuario(){
		try{
			$sql = "select l.*, c.nome as curso, t.nome as turma, s.nome as serie, i.nome as informacao from 
			ficha_lancamentos l inner join 
			ficha_curso c on l.idcurso=c.idcurso inner join 
			ficha_serie s on l.idserie=s.idserie inner join 
			ficha_turma t on l.idturma=t.idturma inner join 
			ficha_informacao i on l.idinformacao=i.idinformacao 
			where l.data >= DATE_ADD(NOW(), INTERVAL -1 DAY) and l.usuario=? order by l.idcurso, l.idaluno, l.idinformacao";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->bindParam(1, $_SESSION['usuario']);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
  }  

public function listarAll(){
		try{
			$sql = "select l.*, c.nome as curso, t.nome as turma, s.nome as serie, i.nome as informacao  from 
			ficha_lancamentos l				inner join 
			ficha_curso c on l.idcurso=c.idcurso	inner join 
			ficha_serie s on l.idserie=s.idserie	inner join 
			ficha_turma t on l.idturma=t.idturma	inner join 
			ficha_informacao i on l.idinformacao=i.idinformacao 
			order by		idcurso, idserie, idturma, idaluno, disciplina";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->bindParam(1, $this->idcurso);
			$stm->bindParam(2, $this->idserie);
			$stm->bindParam(3, $this->idturma);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
  }
	public function listarInformacao(){
		try{
			$sql = "select * from ficha_informacao";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}

	public function listarDadosBase(){
		try{
			$sql = "select * from ficha_lancamentos_base l
			inner join ficha_curso c on l.curso=c.nome
			inner join ficha_serie s on l.serie=s.nome
			inner join ficha_turma t on l.turma=t.nome
			where  c.idcurso=? and s.idserie=? and t.idturma=?";
			$con = new Conexao();
			$stm = $con->prepare($sql);
			$stm->bindParam(1, $this->idcurso);
			$stm->bindParam(1, $this->idserie);
			$stm->bindParam(1, $this->idturma);

			$stm->execute();
			return $stm;
		}catch (PDOException $e){
			return "<div class='erro'>".$e->getMessage()."</div>";
    }
	}
	function excluir()
    {
        $sql = "delete from ficha_lancamentos where  idlancamentos=:p1";
        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->bindValue(":p1", $this->idlancamentos);
        $stm->execute();
    }

	public function carregar(){
    // try{
    //   $sql = "select * from usuario where id=?";
    //   			$con = new Conexao();
	//		$stm = $con->prepare($sql);
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