<?php
//require 'vendor/autoload.php';
require 'aws/aws-autoloader.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//Nome da classe é o nome da tabela no banco de dados
class Planejamento
{
    //O nome dos atributos abaixo são os nomes dos campos na tebela do banco de dados
    private $idplanejamento;
    private $curso;
    private $serie;
    private $turma;
    private $disciplina;
    private $idusuario;
    private $arquivo;

    //retorno
    private $observacao;
    private $situacao;

    //O método construtor é padrão, não altere!
    function __construct()
    {
        require_once '../conexao.class.php';
    }

    //Método enviar  (set), não altere!
    function __set($var, $val)
    {
        $this->$var = $val;
    }

    //Método receber (get), não altere!
    function __get($var)
    {
        return $this->$var;
    }

    function gravar()
    {
        //echo "<script>alert('gravando mais um planejamento');</script>";

        $cursos = array("18" => 'Adm',
                        "25" => 'Alem',
                        "32" => 'CELEM',
                        "20" => 'Edif',
                        "23" => 'Eletrom',
                        "19" => 'Eletron',
                        "17" => 'Enferm',
                        "30" => 'Espan',
                        "24" => 'EspEnfer',
                        "15" => 'Inform',
                        "27" => 'Ingl',
                        "28" => 'Ital',
                        "31" => 'Mand',
                        "22" => 'MeioAmb',
                        "21" => 'SegurTrab'
                    );

        if (!$this->arquivo) {
            echo 'Nenhum arquivo enviado!';
        } else {
            $tmp = $this->arquivo['tmp_name'];
            $name = $this->arquivo['name'];
            $type = $this->arquivo['type'];
            $size = $this->arquivo['size'];
            $ext = strrchr($name, '.');
            $error = $this->arquivo['error'];
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
            $pasta = "planos/";

            $this->serie < 5 ? $serie = $this->serie : $serie = $this->serie -4 . 'SEM';
            $dir = $pasta . $cursos[$this->curso].'_' . $serie .'_'. $this->turma. '_' . $this->disciplina .'_'. substr(md5(date("dmYHis")),0,5) . $ext;
            //$dir = $pasta.$name;

            //dd($dir);
            if (!empty($name)) {


                $ACCESS_KEY = "AKIAXZ5DWGH2F44DSESB";
                $SECRET_KEY = "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";

                //session_start();
                /**
                 * S3 upload
                 */
                try {

                    // dispara exceção caso não tenha dados enviados
                    /*if (!isset($_FILES['file'])) {
                        throw new Exception("File not uploaded", 1);
                    }*/

                    // cria o objeto do cliente, necessita passar as credenciais da AWS
                    $clientS3 = S3Client::factory(array(
                        'key'    => $ACCESS_KEY,
                        'secret' => $SECRET_KEY
                    ));

                    // método putObject envia os dados pro bucket selecionado (no caso, teste-marcelo
                    $response = $clientS3->putObject(array(
                        'Bucket' => "westsoftware",
                        'Key'    => $dir,
                        'SourceFile' => $tmp,
                    ));

                    //$_SESSION['msg'] = "Objeto postado com sucesso, endereco <a href='{$response['ObjectURL']}'>{$response['ObjectURL']}</a>";

                    //header("location: index.php");
                } catch (Exception $e) {
                    echo "Erro > {$e->getMessage()}";
                }




                //echo "movendo o arquivo ".$tmp . "  para a pasta ". $dir;
                /*if (move_uploaded_file($tmp, $dir)) {
                    //vai para o crop
                    //setcookie("image",$dir);
                    //carrega aqui a página que faz o crop
                } else {
                    return "Não foi possível mover $tmp para $dir";
                }*/
            } else {
                return "Erro: Nenhuma imagem selecionada!";
            }
        }

        $sql =
            "insert into planejamento (idplanejamento,curso,serie,turma,disciplina,idusuario,arquivo) values (:p1,:p2,:p3,:p4,:p5,:p6,:p7)";

        $sql =
            "insert into planejamento (curso,serie,turma,disciplina,idusuario,arquivo) values ('" .
            $this->curso .
            "','" .
            $this->serie .
            "','" .
            $this->turma .
            "','" .
            $this->disciplina .
            "'," .
            $_SESSION['idusuario'] .
            ",'" .
            $dir .
            "')";

        // echo $sql;

        $con = new Conexao();
        $stm = $con->prepare($sql);

        $stm->bindValue(":p2", $this->curso);
        $stm->bindValue(":p3", $this->serie);
        $stm->bindValue(":p4", $this->turma);
        $stm->bindValue(":p5", $this->disciplina);
        $stm->bindValue(":p6", $this->idusuario); //cookie usuario
        $stm->bindValue(":p7", $response['ObjectURL']);
        return $stm->execute();
    }

    function gravar_retorno()
    {
        if ($this->arquivo['error'] == 4) {
            //echo 'Nenhum arquivo enviado!';
            $dir = "";
        } else {
            $tmp = $this->arquivo['tmp_name'];
            $name = $this->arquivo['name'];
            $type = $this->arquivo['type'];
            $size = $this->arquivo['size'];
            $ext = strrchr($name, '.');
            $error = $this->arquivo['error'];

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
                $pasta = "planos/";
                $dir = $pasta . md5($name . date("dmYHis")) . $ext;
                // $dir = $pasta.md5($name.date("dmYHis")).$ext;
                //$dir = $pasta.$name;
                if (!empty($name)) {
                    //echo "movendo o arquivo ".$tmp . "  para a pasta ". $dir;
                    if (move_uploaded_file($tmp, $dir)) {
                        //vai para o crop
                        //setcookie("image",$dir);
                        //carrega aqui a página que faz o crop
                    } else {
                        return "Não foi possível mover $tmp para $dir";
                    }
                } else {
                    return "Erro: Nenhuma imagem selecionada!";
                }
            }
        }

        $sql =
            "insert into planejamento_retorno (idplanejamento,observacao,arquivo,idusuario, situacao) values (:p1,:p2,:p3,:p4,:p5)";

        // $sql = "insert into planejamento (curso,serie,turma,disciplina,idusuario,arquivo) values ('".$this->curso."','".$this->serie."','".$this->turma."','". $this->disciplina."',".$_SESSION['idusuario'].",'".$name."')";

        // echo $sql;

        $con = new Conexao();
        $stm = $con->prepare($sql);

        $stm->bindValue(":p1", $this->idplanejamento);
        $stm->bindValue(":p2", $this->observacao);
        $stm->bindValue(":p3", $dir);
        $stm->bindValue(":p4", $_SESSION['idusuario']);
        $stm->bindValue(":p5", $this->situacao);
        return $stm->execute();
    }

    function alterar()
    {
        $sql =
            "update planejamento set curso=:p2,serie=:p3,turma=:p4,disciplina=:p5,idusuario=:p6,arquivo=:p7 where idplanejamento=:p1)";
        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->bindValue(":p1", $this->idplanejamento);
        $stm->bindValue(":p2", $this->curso);
        $stm->bindValue(":p3", $this->serie);
        $stm->bindValue(":p4", $this->turma);
        $stm->bindValue(":p5", $this->disciplina);
        $stm->bindValue(":p6", $_SESSION['idusuario']);
        $stm->bindValue(":p7", $dir);
        $stm->execute();
    }

    function excluir()
    {
        //$sql = "delete from planejamento where  idplanejamento=:p1";
        $sql =
            "update planejamento set situacao='0' where  idplanejamento=:p1";
        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->bindValue(":p1", $this->idplanejamento);
        $stm->execute();
    }

    function consultar()
    {
        $sql = "select * from planejamento where  idplanejamento=:p1)";
        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->bindValue(":p1", $this->idplanejamento);
        $stm->execute();
        return $stm;
    }

    function listar()
    {
        //$sql = "select p.*, pr.situacao from planejamento p left join planejamento_retorno pr on p.idplanejamento=pr.idplanejamento where p.idusuario=:p1";
        // $sql = "select p.*, pr.situacao, pr.data from planejamento p left join planejamento_retorno pr on p.idplanejamento=pr.idplanejamento where p.idusuario=:p1 group by p.idplanejamento order by pr.data desc";

        /* $sql = "select t.*, p.* from( select idplanejamento,MAX(data) AS max_data
FROM planejamento_retorno
GROUP BY idplanejamento) as x
JOIN planejamento_retorno t ON x.idplanejamento =t.idplanejamento inner join planejamento p on p.idplanejamento=t.idplanejamento
AND x.max_data =t.data where p.idusuario=:p1 ";*/

        /* $sql = "select t.*, p.*, pr.situacao FROM planejamento p
left join (SELECT idplanejamento,MAX(data) AS max_data
FROM planejamento_retorno pr
GROUP BY idplanejamento) as x on p.idplanejamento=x.idplanejamento
left JOIN planejamento_retorno t ON x.idplanejamento =t.idplanejamento
AND x.max_data =t.data where p.situacao='1' and p.idusuario=:p1";*/

        $sql = "select t.idplanejamento_retorno,t.idusuario as retorno_usuario, t.data as data_retorno, t.observacao, t.arquivo, t.situacao as situacao_retorno , p.*
FROM planejamento p
LEFT JOIN (SELECT idplanejamento, MAX( data ) AS max_data FROM planejamento_retorno GROUP BY idplanejamento
) AS x ON p.idplanejamento = x.idplanejamento LEFT JOIN planejamento_retorno t ON x.idplanejamento = t.idplanejamento
AND x.max_data = t.data WHERE p.data > '2019-01-01' and p.situacao =  '1' AND p.idusuario =:p1";

        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->bindValue(":p1", $this->idusuario);
        $stm->execute();
        if ($stm->rowCount() == 0) {
            //echo "Nenhum registro!";
        }

        return $stm;
    }

    function listar_professor()
    {
        //$sql = "select p.*, pr.situacao from planejamento p left join planejamento_retorno pr on p.idplanejamento=pr.idplanejamento where p.idusuario=:p1";
        $sql =
            "select p.*, pr.situacao, pr.data from planejamento p left join planejamento_retorno pr on p.idplanejamento=pr.idplanejamento where p.idusuario=:p1 group by p.idplanejamento and p.situacao =  '1'  order by pr.data desc";

        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->bindValue(":p1", $this->idusuario);
        $stm->execute();
        return $stm;
    }

    function listar_observacoes($idplanejamento)
    {
        $sql =
            "select * from planejamento_retorno pr where pr.idplanejamento=:p1 order by data";
        // echo $sql;
        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->bindValue(":p1", $idplanejamento);
        $stm->execute();
        return $stm;
    }

    function listarProfessores()
    {
        $sql =
            "select u.idusuario, u.nome, count(p.idplanejamento) as total from usuario u left join planejamento p on u.idusuario=p.idusuario where u.situacao='ativo' and p.data > '2019-07-20' and p.situacao = '1' group by u.idusuario order by u.nome";
        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->execute();
        return $stm;
    }


    function listarProfessoresNaoEntregaram()
    {
        $sql = "select u.idusuario, u.nome from usuario u where u.idusuario not in (select p.idusuario  from  planejamento p where p.data > '2019-07-20' and p.situacao = '1')";
        $con = new Conexao();
        $stm = $con->prepare($sql);
        $stm->execute();
        return $stm;
    }
}
?>
