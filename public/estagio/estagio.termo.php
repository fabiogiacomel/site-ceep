<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Termo de compromisso</title>
  
	<style>

body {
font: 12pt Arial, Georgia, "Times New Roman", Times, serif;
color: #000;
  width: 16cm;
  height: 24.7cm; 
  margin:0 auto;
  padding: 0cm 2cm 2cm 3cm;
}
 
h1 {
font-size: 24pt;
}
 
h2 {
font-size: 12pt; text-align: center;
}
 
h3 {
font-size: 12pt;
}
p{text-align: justify;}
.centralizado{text-align: center;}
li{list-style: none; text-align: justify;}
ul{padding: 0;}
</style>
</head>
<body onload="window.print();">
	
<?php
  	session_start();
    include("convenio.class.php");
  	include("empresa.class.php");
    include("aluno.class.php");
  	include("estagio.class.php");
	 	
	 	function inverteData($data){
    	//if(count(explode("/",$data)) > 1){
      //  return implode("-",array_reverse(explode("/",$data)));
    	//}else
      if(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    	}
		}

  	$a = new Aluno();
    $c = new Convenio();
    $e = new Empresa();
  	$es = new Estagio();

  	// $curso = "Curso não informado";
  	// $setor = "Setor não informado";
  	// $supervisor   ="Supervisor não informado";
  	// $professor    ="Professor não informado";
  	// $rg_professor ="RG Professor não informado";
  	// $data_inicio = "00/00/0000";
  	// $data_fim    = "00/00/0000";

	 	
	  $es->__set("idestagio",$_GET["codigo"]);
    $es->__set("ano",$_GET["ano"]);
    $es->carregar();   

    $c->__set("idconvenio", $es->__get("idconvenio"));
    $c->__set("ano", $es->__get("convenioano"));
    $c->carregar();

    $e->__set("idempresa", $c->__get("idempresa"));

    $e->carregar();

    $a->__set("idaluno", $es->__get("idestagiario"));
    $a->carregar();
?>

<img src="img/topo_termo.png" alt="" width="100%">
<h2>TERMO DE COMPROMISSO DE ESTÁGIO Nº <?php echo $es->__get("idestagio")."/".$es->__get("ano"); ?></h2> 
<p>Celebram este Termo de Compromisso de Estágio, estipulando entre si as cláusulas e
condições seguintes, com vistas ao ESTÁGIO OBRIGATÓRIO:
</p>
<p><b>CLÁUSULA PRIMEIRA</b> - O Termo de Compromisso de Estágio tem por objetivo formalizar
as condições básicas para a realização do estágio do ESTUDANTE: <b> <?php echo $a->__get('nome') ?></b> brasileiro(a), R.G. nº <?php echo $a->__get('rg') ?>
 e CPF n° <?php echo $a->__get('cpf') ?>, estudante matriculado no curso de Técnico em <?php echo $es->__get("curso"); ?> do CEEP –
CENTRO ESTADUAL DE EDUCAÇÃO PROFISSIONAL PEDRO BOARETTO NETO,
reconhecido pela Resolução nº. 2.764/02, inscrito no CNPJ sob o nº. 76. 416.965/0001-21,
sediada na Rua Natal, 2800, Jd. Cristal, em Cascavel - PR doravante denominado CEEP,
mantida pela Secretaria Estadual de Educação do Paraná – SEED/PR, inscrita com sede
em Curitiba - PR, pelo presente Termo de Compromisso junto à empresa <b> <?php echo $e->__get('nome') ?></b>, inscrito no CNPJ sob o nº <b> <?php echo $e->__get('cnpj') ?></b>, sediada na Rua <b> <?php echo $e->__get('rua') ?></b>, <b> <?php echo $e->__get('numero') ?></b> - <b> <?php echo $e->__get('bairro') ?></b><b> <?php echo $e->__get('idcidade') ?></b> - <b> <?php echo $e->__get('estado') ?></b>, doravante denominado CONCEDENTE.</p>


<p><b>CLÁUSULA SEGUNDA</b> - O Termo de Compromisso de Estágio entre a INSTITUIÇÃO
CONCEDENTE, a ESTUDANTE e INSTITUIÇÃO DE ENSINO, nos termos do Art.3º da Lei
11.788/2008, tem por finalidade particularizar a relação jurídica especial, caracterizando a não vinculação empregatícia.</p>


<p><b>CLÁUSULA TERCEIRA</b> - À CONCEDENTE
<ul>
<li>a) proporcionar ao ESTAGIÁRIO atividades de aprendizagem social, profissional e cultural,compatíveis com o Curso a que se refere (art.9º,II);</li>
<li>b) proporcionar à INSTITUIÇÃO DE ENSINO, sempre que necessário, subsídios que
possibilitem o acompanhamento, a supervisão e a avaliação do Estágio (art.9º,VII);</li>
<li>c) Fornecimento de equipamento de proteção, toda vez que as circunstâncias o exigirem.</li>
<li>d) Encaminhar à instituição de ensino o relatório sobre a avaliação dos riscos do local de estágio.</li>
</ul>
</p>

<p><b>PARÁGRAFO ÚNICO</b>. O estágio será desenvolvido junto à <b> <?php echo $es->__get("setor") ?></b>, sob a supervisão técnica de <b> <?php echo $es->__get("idsupervisor"); ?></b>.
</p>

<p><b>CLÁUSULA QUARTA:</b> O CEEP compromete-se a:
<ul>
<li>a) Encaminhar e orientar ao Supervisor Técnico o Plano de Trabalho e Avaliação do
estágio se necessário acrescidas das sugestões do Supervisor Técnico na vigência do
presente Termo de Compromisso, assegurar através do Governo do Estado do Paraná,
mantenedor do CEEP, qualquer prejuízo em razão de acidentes sofridos pelo estagiário até que tal situação seja regularizada pelo mesmo, conforme convenio celebrado.</li>
<li>b) Realizar avaliações que indiquem se as condições para a realização do estágio estão de acordo com as firmadas no Plano de Estágio, no Termo de Compromisso e no relatório sobre a avaliação dos riscos.</li>
<li>c) Solicitar ao responsável pela supervisão de estágio na parte concedente, sempre que necessário subsídio que permitam o acompanhamento e a avaliação das atividades desenvolvidas pelo estagiário.</li>
<li>d) Solicitar à parte concedente o Relatório de Avaliação de Riscos.</li>
<li>e) Comunicar à parte concedente quando o estudante interromper o curso.</li>
<li>f) Contratar em favor do estagiário, seguro contra acidentes pessoais, cuja apólice seja compatível com a cumprida pelos valores de mercado.</li> 
<li>g) Na vigência do presente termo e na forma da legislação, o estagiário estará coberto pela apólice número <b><?php echo $es->__get("apolice"); ?></b>.</li></ul></p>


<p><b>PARÁGRAFO ÚNICO:</b> O estagiário será acompanhado pelo professor supervisor: <?php echo $es->__get("idresponsavel") ?>, RG: <?php echo $es->__get("rg_professor") ?></p>
<p><b>CLÁUSULA QUINTA</b>- O(S) DISCENTES(S) comprometem(m)-se a:
<ul>
<li>a) elaborar e entregar à INSTITUIÇÃO DE ENSINO, relatórios sobre seu estágio, conforme plano de estágio;</li>
<li>b) observar e obedecer às normas internas da PARTE CONCEDENTE e da INSTITUIÇÃO
DE ENSINO, bem como outras eventuais recomendações emanadas pela chefia imediata
e/ou pelo supervisor e ajustadas entre as partes.</li>
<li>c) responder por perdas e danos decorrentes da inobservância das normas internas ou das
constantes no presente Termo.</li>
<li>d) respeitar as normas internas referentes à segurança</li>
<li>e) cumprir fielmente o plano de atividades discentes para estágio, comunicando ao CEEP/ e
a Concedente em tempo hábil sua impossibilidade de desenvolvê-lo, quer quanto aos
aspectos técnicos relacionados ao estágio propriamente dito, quer quanto os períodos
fixados no presente Termo de Compromisso</li>
<li>f) cumprir o estabelecido na legislação vigente submeter-se ao Regimento Geral da
Concedente, inclusive normas internas de conduta sob pena de desligamento do estágio,
bem como ao Código de Ética e Disciplinar da respectiva profissão, no que for aplicável;</li>
<li>g) responsabilizar-se pelas perdas e danos que venham a serem causadas, em
conseqüência da inobservância das Normas Internas da Concedente e/ou condições
constantes do presente Termo;</li>
<li>h) apresentar, na forma e segundo os padrões estabelecidos, relatório sobre as atividades
de estágio ao CEEP.</li></ul>
</p>
<p><b>PARÁGRAFO ÚNICO</b>. Comprometo-me, ainda, a não pleitear quaisquer reivindicações futuras relacionadas com o Estágio.</p>

<p><b>CLÁUSULA SEXTA</b> - A Instituição de Ensino poderá dar publicidade a este Termo, em consonância com preceitos legais vigentes.
E por estarem de acordo, as partes assinam o presente instrumento em 03 (três) vias de
igual teor.
</p>

<p>Cascavel, <?php echo date("d/m/Y"); ?></p>

<p>Data de Início de Estágio: <?php echo inverteData($es->__get("data_inicio"));?> Data de Término de Estágio: <?php echo inverteData($es->__get("data_fim"));?> Total:<?php echo $es->__get("carga_horaria");?> horas
</p>


<br>

<table>
  <tr>
    <td>_________________________________</td><td>_________________________________</td>
  </tr>
  <tr>
    <td><b><?php echo $a->__get('nome') ?></b></td><td><b><?php echo $e->__get('nome') ?></b></td>
  </tr>  
  <tr>
    <td>RG:<?php echo $a->__get('rg') ?></td><td><?php echo $e->__get('cnpj') ?></td>
  </tr>  
  <tr>
    <td>DISCENTE</td><td>CONCEDENTE</td>
  </tr>

<tr><td><br></td></tr>
<tr><td><br></td></tr>
<tr><td><br></td></tr>

<tr>
    <td>__________________________________</td></tr>
 <tr><td><b><?php echo $es->__get("idresponsavel"); ?></b></td></tr>
 <tr><td>RG:<?php echo $es->__get("rg_professor"); ?></td></tr>
 <tr><td>SUPERVISOR DE ESTÁGIOS DO CEEP</td></tr>


</body>


</html>