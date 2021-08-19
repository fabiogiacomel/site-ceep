<?php
class Curso{
    //declaracao de variaveis publicas e privadas

  private $id;
  private $nome; 
	private $logo;
	private $objetivo;
	private $perfil;
	private $image_url;// nome da imagem após upload
	private $modalidae;
	private $duracao;
	 
	public static $instance;

	public function __construct(){
		require_once ('../conexao.class.php');
		require_once ('../log.php');
	}
  
  	public static function getInstance(){ 
  		if (!isset(self::$instance))
  		{
  			self::$instance = new Curso();	
  		}  
  		return self::$instance; 
 	 }
    
    //Estamos gerando aqui os Gets e Sets para a sua devida utilizaÄ‚Â§Ä‚Â£o no DAO
    public function set($var, $val){
        $this->$var = $val;
    }
	
	public function get($var){
        return $this->$var;
    }

	public function gravar(){
		try{
			$tmp  = $this->logo["tmp_name"];
			$name = $this->logo["name"];
			$type = $this->logo["type"];
			$ext  = strrchr($name, '.');

			$this->image_url = "curso/images/" . md5($name . date("dmYHis")) . $ext;
			
			if(!empty($name)){	
				//echo "movendo o arquivo ".$tmp . "  para a pasta ". $dir;
				if(move_uploaded_file($tmp, $this->image_url)){
					//echo "<br/>ArquivoEnviado com sucesso!";	
				}else{
					return "<div id='erro' class='MSG_ERRO'>Erro: Não foi possível mover arquivo! $this->image_url</div>";
				}	
			}else{
					return "<div id='erro' class='MSG_ERRO'>Erro: Nenhuma imagem selecionada!</div>";
			}
			
			$sql = "insert into curso(nome,logo,objetivo,perfil,idusuario)values(:p1,:p2,:p3,:p4,:p5)";
			//$sql = "insert into curso(nome,logo,objetivo,perfil,idusuario)values('".$this->nome."','".$this->image_url."','".$this->objetivo."','".$this->perfil."','".$_SESSION['idusuario']."')";
			//echo $sql;

			$con = Conexao::getInstance()->prepare($sql);
			
			$con->bindValue(":p1", $this->nome); 
			$con->bindValue(":p2", $this->image_url); 
			$con->bindValue(":p3", $this->objetivo); 
			$con->bindValue(":p4", $this->perfil); 
			$con->bindValue(":p5", $_SESSION['idusuario']); 

			$result = $con->execute();
			
			
			if($result){
				$resposta="Banner inserido com sucesso";
				//header("Location:?pagina=banner/crop_editor.php");
			}else{
				$resposta="Erro ao inserir o banner";
			}
			return $resposta;
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage()); 
		}
	}  

	public function alterar(){
		try{
			$tmp  = $this->logo["tmp_name"];
			$name = $this->logo["name"];
			$type = $this->logo["type"];
			$ext  = strrchr($name, '.');

			if(!empty($name)){
				$this->image_url = "curso/images/" . md5($name . date("dmYHis")) . $ext;
			
				//echo "movendo o arquivo ".$tmp . "  para a pasta ". $dir;
				if(move_uploaded_file($tmp, $this->image_url)){
					//echo "<br/>ArquivoEnviado com sucesso!";	
				}else{
					return "<div id='msg' class='MSG_ERRO'>Erro: Não foi possível mover arquivo! $this->image_url</div>";
				}	
			}else{
					//echo "<div id='msg' class='MSG_ERRO'>Erro: Nenhuma imagem selecionada!</div>";
			}
			
			$sql = "update curso set nome=:p1";

			if(!empty($name)){
				$sql .= ",logo=:p2";
			}

			$sql .= ",objetivo=:p3,	perfil=:p4,idusuario=:p5 where idcurso=:p0";
			//echo $sql;

			//echo "update curso set nome=$this->nome,logo=$this->image_url,objetivo=$this->objetivo,perfil=$this->perfil,idusuario=cookie where idcurso=$this->id";

			$con = Conexao::getInstance()->prepare($sql);
			$con->bindValue(":p1", $this->nome); 
			if(!empty($name)){
				$con->bindValue(":p2", $this->image_url); 
			}
			$con->bindValue(":p3", $this->objetivo); 
			$con->bindValue(":p4", $this->perfil); 
			$con->bindValue(":p5", $_SESSION['idusuario']);
			$con->bindValue(":p0", $this->id);

			$result = $con->execute();
			
			return $result;
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage()); 
		}
	}  

	public function getMenuCursos(){
		try{
			$sql = "select * from curso where celem=0 order by nome";
			//echo $sql;	
			
			$con = Conexao::getInstance()->prepare($sql);

			$con->execute();
	
				     	   
			echo "<ul class='hide_phone'>";
		
     		while($linha = $con->fetch(PDO::FETCH_ASSOC)){
			
				echo "<li><a class='link' href='?pagina=curso&codigo=".$linha['idcurso']."' title='".$linha['nome']."'>".$linha['nome']."</a></li>";


				/*SUBMENU PARA OS CURSOS DO CELEM*/

				if($linha['nome']=='CELEM'){
					//echo 'celem';
					// $sql2 = "select * from curso where celem=1 order by nome";
					// //echo $sql;	
				
					// $con2 = Conexao::getInstance()->prepare($sql2);

					// $con2->execute();
					
					// //echo "achoy=".$con->rowCount();
					// //echo "<ul style='display:none;'>";
			
	    //  			while($linha2 = $con2->fetch(PDO::FETCH_ASSOC)){
				
					// 	echo "<li><a class='link' href='?pagina=curso&codigo=".$linha2['idcurso']."' title='".$linha2['nome']."'>".$linha2['nome']."</a></li>";
					// }
					// echo "</ul>";
				}



				/**/


			}
			echo "</ul>";

		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
		}
	}
	
	public function getInfoCurso($idcurso){
		try{
			$sql = "select * from curso where idcurso='$idcurso'";
			//echo $sql;	
			$con = Conexao::getInstance()->prepare($sql);

			$result = $con->execute();

			if ($con->rowCount()==0){
       		 	echo "<tr aling='center'><td>NENHUMA INFORMAÇÃO</td></tr>";
			}
			$count = 0;
		     	   
		   	while($linha = $con->fetch(PDO::FETCH_ASSOC)){
				echo "<h1>Curso Técnico em ".$linha['nome']."</h1>";
				echo "<h2>Objetivo do curso</h2>";
				echo "<p>".$linha['objetivo']."</p>";
				echo "<h2>Perfil profissional</h2>";
				echo "<p>".$linha['perfil']."</p>";
			}
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
		}	
	}
	
	public function getLogoCurso($idcurso){
		try{
			$sql = "select logo from curso where idcurso='$idcurso'";
			//echo $sql;	
			$con = Conexao::getInstance()->prepare($sql);

			$result = $con->execute();

			if ($con->rowCount()==0){
	       		echo "<img src='curso/images/no-image.jpg' width='250px' height='250px'/>";
			}
			$count = 0;
			     	   
			while($linha = $con->fetch(PDO::FETCH_ASSOC)){	
				echo "<img src='".$linha['logo']."' width='250px' height='250px' />";
				//echo "buscando as disciplinas";
				//$this->getDisciplinasTurma($linha['idturma'],$idcurso);
			}
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
		}	
	}

	public function getTurmasCurso($idcurso){
		try{
			$sql = "select * from turma where idcurso='$idcurso' order by idturma" ;
			//echo $sql;	
			$con = Conexao::getInstance()->prepare($sql);

			$result = $con->execute();

			if ($con->rowCount()==0){
	       		echo "<div class='accordionButton'>NENHUMA TURMA CADASTRADA</div>";
			}
			$count = 0;
			     	   
			while($linha = $con->fetch(PDO::FETCH_ASSOC)){		
				echo "<div class='accordionButton'>".$linha['nome']."</div>";
				//echo "buscando as disciplinas";
				$this->getDisciplinasTurma($linha['idturma'],$idcurso);
			}
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
		}
	}

	//Método consultar 
	public function consultar(){
		$sql = "select * from curso";
		$con = Conexao::getInstance()->prepare($sql);
		$con->execute();
		return $con;
	}  

	//Método carregar 
	public function carregar(){
		$sql = "select * from curso where idcurso=:p1";
		$con = new Conexao();
		$stm = $con->prepare($sql);
		
		$stm->bindValue(":p1", $this->id);
		
		$stm->execute();
		
		$result = $stm->fetchAll(PDO::FETCH_OBJ);
		foreach ($result as $obj) {
			$this->id = $obj->idcurso;
  		$this->nome = $obj->nome;
			$this->logo = $obj->logo;
			$this->objetivo = $obj->objetivo;
			$this->perfil = $obj->perfil;
			$this->idusuario = $obj->idusuario;
			// $this->modalidae = $obj->idusuario;
			// $this->duracao = $obj->idusuario;
		}
	}

	public function getSelectCursos($idcurso){
		try{
			//echo "o cóigo é ".$idcurso;
			$sql = "select * from curso order by nome";
			//echo $sql;																			  carregaTurmas
			echo "<select id='idcurso' name='idcurso' onchange='carregaTurmas(this.value)' class='form-control' required='true'>";
				
			$con = new Conexao();
			$stm = $con->prepare($sql);

			$result = $stm->execute();

			if ($stm->rowCount()==0){
	        	echo "<option value=''>NENHUMA INFORMAÃ‡ÃƒO</option>";
			}
			echo "<option value=''>Selecione um curso</option>";
			$count = 0;
			 	
	  		while($linha = $stm->fetch(PDO::FETCH_ASSOC)){	
				echo "<option value='".$linha['idcurso']."'";
				if($linha['idcurso']==$idcurso){echo "selected";}
				echo ">".$linha['nome']."</option>";
			}
			echo "</select>";
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
		}	
	}
public function getSelectCursoNovo($idcurso){
		try{
			//echo "o cóigo é ".$idcurso;
			$sql = "select * from curso";
			//echo $sql;																			  carregaTurmas
			echo "<select id='idcursoNovo' name='idcursoNovo' onchange='carregaTurmaNova(this.value)'>";
				
			$con = Conexao::getInstance()->prepare($sql);

			$result = $con->execute();

			if ($con->rowCount()==0){
	        	echo "<option value='0'>NENHUMA INFORMAÃ‡ÃƒO</option>";
			}
			echo "<option value='0'>Selecione um curso</option>";
			$count = 0;
			 	
	  		while($linha = $con->fetch(PDO::FETCH_ASSOC)){	
				echo "<option value='".$linha['idcurso']."'";
				if($linha['idcurso']==$idcurso){echo "selected";}
				echo ">".$linha['nome']."</option>";
			}
			echo "</select>";
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
		}	
	}
	public function getUltimoID(){
		try{
			$sql = "select max(idcurso) as max from curso";
			//echo $sql;	

			$ultimo_id = 1;
			$con = Conexao::getInstance()->prepare($sql);

			$result = $con->execute();

			if ($con->rowCount()==0){
	        	return $ultimo_id;
			}
			
			while($linha = $con->fetch(PDO::FETCH_ASSOC)){	
				$ultimo_id = $linha['max'];
			}
			return $ultimo_id;
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
		}	
	}
	
	public function getDisciplinasTurma($idturma, $idcurso){
		try{
			//$sql = "select * from disciplina where idturma='$idturma' order by nome";
			$sql = "select d.iddisciplina, d.nome, count(d.nome)as total from disciplina d
   					inner join postagem p on p.iddisciplina=d.iddisciplina 
   					where idturma=:p1 group by d.nome order by nome";

			//echo $sql;	
				
			$con = Conexao::getInstance()->prepare($sql);
			
			$con->bindValue(":p1", $idturma); 

			$result = $con->execute();

			if ($con->rowCount()==0){
	        	echo "<div class='accordionContent'><ul><li><a href='#'>Nenhuma postagem cadastrada</a></li></ul></div>";
			}
			$count = 0;
			     	   
			echo "<div class='accordionContent'>";
	        
	    echo "<ul>";
	            
			
	    while($linha = $con->fetch(PDO::FETCH_ASSOC)){				
				echo "<li><a href='?pagina=curso&codigo=".$idcurso."&disciplina=".
				$linha['iddisciplina']."'>".$linha['nome']."(".$linha['total'].")</a></li>";
			}
			echo "</ul></div>";
		} catch (Exception $e) { 
			print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
			GeraLog::getInstance()->inserirLog("Erro: Código: " . $e-> getCode() . " Mensagem: " . $e->getMessage()); 
		}
	}
}
?> 