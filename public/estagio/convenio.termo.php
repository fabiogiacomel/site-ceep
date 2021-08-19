<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Termo de convênio</title>

	<style>

	body {
font: 12pt Arial, Georgia, "Times New Roman", Times, serif;
color: #000;
  width: 21cm;
  height: 29.7cm; 
  margin:0 auto;
  padding: 0cm 1.5cm 1.5cm 2cm;
}
 
h1 {
font-size: 24pt;
}
 
h2 {
font-size: 14pt; text-align: center;
}
 
h3 {
font-size: 12pt;
}
p{text-align: justify;}
.centralizado{text-align: center;}
</style>
</head>
<body onload="window.print();">
	

<?php

	function inverteData($data){
    	//if(count(explode("/",$data)) > 1){
      //  return implode("-",array_reverse(explode("/",$data)));
    	//}else
      if(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    	}
		}
  	session_start();
  	include("convenio.class.php");
  	include("empresa.class.php");
	 	
  	$c = new Convenio();
  	$e = new Empresa();

  	$c->__set("idconvenio",$_GET["codigo"]);
  	$c->__set("ano",$_GET["ano"]);
  	$c->carregar();	 	


  	$e->__set("idempresa", $c->__get("idempresa"));
  	$e->carregar();
?>

 <img src="img/topo_termo.png" alt="" width="100%">
<h2>TERMO DE CONVÊNIO PARA CONCESSÃO DE ESTÁGIO OBRIGATÓRIO Nº <?php echo $c->__get("idconvenio")."/".$c->__get("ano"); ?></h2> 

<p><b>O CEEP – CENTRO ESTADUAL DE EDUCAÇÃO PROFISSIONAL PEDRO BOARETTO NETO</b>, localizado na Rua Natal, nº 2800, Bairro Jardim Tropical – Cascavel - Paraná, inscrito no CNPJ sob n° 76.416.965/0001-21, neste ato representado (a) por seu Diretor Geral <b><?php echo $c->__get("nome_diretor") ?></b>, CPF/MF n° <?php echo $c->__get("cpf_diretor") ?>, doravante denominada INSTITUIÇÃO DE ENSINO e a(o) <b> <?php echo $e->__get('nome') ?></b>, localizada na Rua <?php echo $e->__get('rua') ?>, <?php echo $e->__get('numero') . " - ". $e->__get('bairro')?> - Cidade de <?php echo $e->__get('idcidade')?>,  Estado do Paraná, inscrita no CNPJ sob n° <?php echo $e->__get('cnpj') ?>, neste ato representada por <b><?php echo $e->__get('representante_nome')?></b>, CPF n° <?php echo $e->__get('representante_cpf') ?>,  doravante denominada INSTITUIÇÃO CONCEDENTE, resolvem celebrar o presente <b>TERMO DE CONVÊNIO PARA CONCESSÃO DE ESTÁGIO OBRIGATÓRIO</b>, regido pela Lei n° 8.666/93, pela LDB n° 9394/96, pela Lei 15.608/07, pela Lei n° 11.788/08 de 25.09.08, pela Lei n.o 8.069/90, pela Deliberação n° 02/09 do CEE - PR, e na forma das cláusulas e condições a seguir estabelecidas.</p>

<h3>CLÁUSULA PRIMEIRA - DO OBJETO</h3>
<p>O presente convênio tem por objetivo estabelecer as condições indispensáveis à concessão de estágio obrigatório pela <b>INSTITUIÇÃO CONCEDENTE</b> a estudantes regularmente matriculados e com efetiva frequência no Curso de técnico em: <b>Cuidados de Idosos, Edificações, Eletromecânica, Eletrônica, Enfermagem, Meio Ambiente ou Segurança do Trabalho</b> ofertado pelo(a) CEEP – Centro Estadual de Educação profissional Pedro Boaretto Neto, a seguir denominado <b>INSTITUIÇÃO DE ENSINO.</b></p>


<h3>PARÁGRAFO ÚNICO</h3>
<p>
	Os estágios previstos neste convênio objetivam o atendimento às exigências pedagógicas e legais do curso, devendo ser planejado, executado e avaliado de acordo com o perfil profissional exigido para conclusão do curso e em consonância com o Plano de Estágio da Instituição.
</p>


<h3>CLÁUSULA SEGUNDA – DO TERMO DE COMPROMISSO DE ESTÁGIO</h3>

<p>
	A realização dos estágios dependerá de formalização, em cada caso, do competente TERMO DE COMPROMISSO DE ESTÁGIO entre o estudante, a Instituição CONCEDENTE e a INSTITUIÇÃO DE ENSINO, representada em cada termo pelo seu Diretor.
</p>
<h3>PARÁGRAFO ÚNICO – DO TERMO DE COMPROMISSO</h3>
<p>
Os Termos de Compromisso de que trata esta Cláusula deverão fazer referência expressa ao presente Convênio, ao qual se vinculam para todos os efeitos legais.
</p>

<h3>CLÁUSULA TERCEIRA – DAS OBRIGAÇÕES</h3>

<p>
3.1 Caberá á INSTITUIÇÃO DE ENSINO:
<p>
3.1.1 Indicar coordenador ou supervisor responsável pelo acompanhamento e avaliação das atividades de estágio;
</p><p>
3.1.2 realizar avaliações que indiquem se as condições para a realização do estágio estão de acordo com as firmadas no Plano de Estágio, no Termo de Compromisso e no relatório sobre a avaliação dos riscos;
</p><p>
3.1.3 solicitar ao responsável pela supervisão de estágio na parte CONCEDENTE, sempre que necessário, subsídios que permitam o acompanhamento e a avaliação das atividades desenvolvidos pelo estagiário;
</p><p>
3.1.4 solicitar à parte CONCEDENTE o relatório sobre avaliação dos riscos do local de estágio;
</p><p>
3.1.5 comunicar à parte CONCEDENTE quando o estudante interromper o curso.
</p><p>
3.1.6 Contratar em favor do estagiário, seguro contra acidentes pessoais, cuja apólice seja compatível com a executada pelos valores de mercado
</p><p>
3.2 Caberá á INSTITUIÇÃO CONCEDENTE:
</p><p>
3.2.1 Indicar funcionário do seu quadro de pessoal com formação ou experiência profissional na área de conhecimento desenvolvida no curso do estagiário para orientar e supervisionar o estágio;
</p><p>
3.2.2 proporcionar ao ESTAGIÁRIO atividades de aprendizagem social, profissional e cultural, compatíveis com o contexto básico do Curso a que se refere;
</p><p>
3.2.3 proporcionar à INSTITUIÇÃO DE ENSINO, sempre que necessário, subsídios que
 possibilitem o acompanhamento, a supervisão e a avaliação do Estágio;
</p><p>
3.2.4 entregar termo de realização do estágio com indicação resumida das atividades desenvolvidas e especificação dos períodos e da avaliação de desempenho;
</p><p>
3.2.5. fornecer equipamento de proteção, toda vez que as circunstâncias o exigirem;
</p><p>
3.2.6 encaminhar à Instituição de Ensino o relatório sobre a avaliação dos riscos do local de estágio;
</p><p>


3.3 Caberá ao NÚCLEO REGIONAL DE EDUCAÇÃO:
</p><p>
3.3.1 O acompanhamento da execução do presente convênio é de responsabilidade do NRE ao qual a Instituição de Ensino estiver jurisdicionada.
</p>

<h3>CLÁUSULA QUATRO - DO VÍNCULO EMPREGATÍCIO</h3>

<p>
	O estágio objeto do presente convênio não cria vínculo empregatício de qualquer natureza entre o estagiário e a instituição CONCEDENTE.
</p>


<h3>CLÁUSULA QUINTA – DA RESPONSABILIZAÇÃO POR DANOS CAUSADOS</h3>

<p>
	A INSTITUIÇÃO DE ENSINO não terá qualquer responsabilidade pelo ressarcimento de danos causados por ato doloso ou culposo do estagiário a qualquer equipamento instalado nas dependências da Instituição CONCEDENTE durante o  cumprimento do estágio.
</p>

<h3>CLÁUSULA SEXTA - DA VIGÊNCIA E ALTERAÇÕES</h3>

<p>
	O presente Termo de Convênio terá vigência de sessenta meses a partir da data de assinatura, podendo ser alterado e/ou prorrogado mediante acordo entre os partícipes, constituindo-se alterações ajustadas em objeto de Termos Aditivos, que daquele serão parte integrante para todos os efeitos e direitos.
</p>




<h3>CLÁUSULA SÉTIMA - DA DENÚNCIA OU RESCISÃO</h3>

<p>
	O presente Termo do Convênio poderá ser denunciado a qualquer tempo, unilateralmente, mediante comunicação por escrito, com antecedência mínima de 30 (trinta) dias, ou rescindindo por acordo entre os partícipes, ou ainda, por descumprimento das cláusulas e condições estabelecidas ou por superveniência de legislação que o torne inexequível, respondendo os mesmos pelas obrigações assumidas até esse momento.</p>


<h3>CLÁUSULA OITAVA - DO FORO</h3>

<p>

	Os participantes elegem o foro da Comarca de Cascavel/Pr, para dirimir quaisquer dúvidas ou litígios oriundos, que porventura possam surgir da execução do presente Termo de Convênio, com expressa e bilateral renúncia de qualquer outro, por mais privilegiado que seja.


	E, por assim estarem devidamente justos e acordados, os partícipes, inicialmente nomeados, firmam o presente Termo de Convênio, em 02 (duas) vias, de igual teor e forma, na presença de 02 (duas) testemunhas abaixo assinadas.</p>

<p>Cascavel, <?php echo date("d/m/Y"); ?></p>
<br>
<br>
<table>
	<tr>
		<td width="50%"><p><b style="text-transform: uppercase;"><?php echo $c->__get('nome_diretor'); ?></b></p></td>
		<td width="50%"><p><b style="text-transform: uppercase;"><?php echo $e->__get('representante_nome'); ?></b></p></td>
	</tr>
	<tr>
		<td><p>  ________________________________________</p> </td>
		<td><p>  ________________________________________</p> </td>
	</tr>
	<tr>
		<td><p class="centralizado">Diretor Geral do Centro Estadual de Educação Profissional Pedro Boaretto Neto  - CEEP</p></td>
		<td class="centralizado">Concedente</td>
	</tr>
	<tr>
		<td><p></p></td>
		<td></td>
	</tr>





<tr>
		<td><p>  ________________________________________</p> </td>
		<td><p>  ________________________________________</p> </td>
	</tr>
<tr>
<td>Testemunhas:</td><td>Testemunhas:</td>
</tr><tr>
<td>Nome:</td><td>Nome: </td>     
</tr><tr>                       
<td>CPF:</td><td>CPF:</td>
</tr><tr>
<td>Assinatura:</td><td>Assinatura:</td>
</tr>
</table>
<br>
<br>

<!-- <input type="button" name="imprimir" value="Imprimir" onclick="window.print();"> -->
</body>
</html>