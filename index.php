<?php
require_once 'connections/conn.php';
require_once 'functions.php';
session_start();
hashverify();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wortas</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<body>
	<!-- Cabeçalho Transversal da Pagina -->
	<header>
		<div id="brand">
			<a href="index.php">
			<div id="logotipo">WORTAS</div>
			</a>
			<div id="pesquisa">
				<form method="post">
					<input type="text" placeholder="O que está à procura?" name="pesquisar">
					<input type="submit" name="vaipesquisar" value="Pesquisar">
				</form>
			</div>
			<div id="carrinho">
				<a href="?n=14">
				<span class="entypo-basket"> 
				 <?php contaitens(); ?>
				</span>
				</a>
			</div>
		</div>
		<div id="menus">
			<div id="menu">
				<ul>
					<li><a href="?n=1">PRODUTOS</a></li>
					<li>|</li>
					<li><a href="?n=2">PROMOÇÕES</a></li>
					<li>|</li>
					<li><a href="?n=3">NOVIDADES</a></li>
					<li>|</li>
					<li><a href="?n=4">SERVIÇOS</a></li>
					<li>|</li>
					<li><a href="?n=5">REPARAÇÕES</a></li>
					<li>|</li>
					<li><a href="?n=6">LOJAS</a></li>
				</ul>
			</div>
			<div id="conta">
				<?php
				if(@!$_SESSION["id_login"]){
					//Nao ha login efetuado
					echo '<ul>
							<li><a href="?n=7">Iniciar Sessão</a></li>
							<li><a href="?n=8">Criar Conta</a></li>
						</ul>';
				}else{
					//Ha login Menu de Utilizador
					echo '<table>
							<tr>
							<td><a href="?n=9">A Minha Conta</a></td>
							<td><a href="?n=15">Histórico</a></td>
							<td><form method="post">
								<input type="submit" name="sair" value="Sair">
								</form>
							</td>
							</tr>
						  </table>
						';
				}
				if(isset($_POST["sair"])){
					logout();
				}
				?>
				</div>
		</div>
	</header>
	<!-- Fim Cabecalho -->


	<?php include 'main.php'; ?>


<div id="rodawortas">
	wortas
</div>
<div id="contentor">
	<footer>
		<div class="rodape_topo">
			<div class="col_rodape">
				<h5>apoio ao cliente</h5>
				<ul>
					<li>Lojas</li>
					<li>Contactos</li>
					<li>Ajuda</li>
					<li>Informações de entregas</li>
					<li>Política de devoluções</li>
					<li>Política de qualidade</li>
					<li>Preço Mínimo Garantido</li>
				</ul>
			</div>
			<div class="col_rodape">
				<h5>sobre a wortas</h5>
				<ul>
					<li>Sobre Wortas</li>
					<li>Sobre o Marketplace</li>
					<li>Wortas Serviços</li>
					<li>Financiamento Universo</li>
					<li>Responsabilidade Social</li>
					<li>Passatempos e Eventos</li>
					<li>Black Friday</li>
				</ul>
			</div>
			<div class="col_rodape">
				<h5>outros sites</h5>
				<ul>
					<li>Wortas Empresas</li>
					<li>Sonaes</li>
					<li>Trabalhar na Sonaes</li>
					<li>Sports Zones</li>
					<li>Zippys</li>
					<li>Continentes</li>
					<li>MOS</li>
				</ul>
			</div>
			<div class="col_rodape">
				<h5>siga-nos nas redes sociais</h5>
				<div class="social_rodape">
				<span class="entypo-facebook-circled">Facebook</span>
				<span class="entypo-twitter-circled">Twitter</span>
				<span class="entypo-instagrem">Instagram</span>
				<span class="entypo-vimeo-circled">Youtube</span>
				<span class="entypo-pinterest-circled">Pinterest</span>
				</div>
				
			</div>
			<div class="col_rodape">
				<h5>opinião</h5>
				<ul>
					<li>Envie-nos a sua Opinião <span class="entypo-right"></span></li>
					<li>Na Wortas Elogia <span class="entypo-right"></span></li>
					<li>Livro Reclamações <span class="entypo-right"></span></li>
				</ul>
			</div>
		</div>
	<hr>
		<div class="rodape_baixo">
			<div class="rodape_baixo_esq">
				<table>
					<tr>
						<td>
						<li>Termos e condições da conta online</li>
						<li>|</li> 
						<li>Política de Privacidade</li>
						<li>|</li>
						<li>Exercício de direitos de dados pessoais</li>
						</td>
						<td><li>Métodos de Pagamento</li></td>
					</tr>
					<tr>
						<td>
						© 2019 Wortas - EQUIPAMENTOS, S.A., com sede Rua da Tanga n.º 505, Sesimbra, pessoa coletiva n° 513 620 210, que é também o seu número de matrícula na Conservatória do Registo Comercial de Setubal, com o capital social de 18.650.000,00 €.</td>
						<td><img src="img/pagamentos_rodape.PNG"></td>
					</tr>
				</table>
			</div>
			<div class="rodape_baixo_dta">
				<img src="img/premios_rodape.PNG">
			</div>
		</div>
	</footer>
</div>
<script>
	var slideIndex = 0;
	carrossel();
	function carrossel(){
	var i;
	var x = document.getElementsByClassName("slideit");
		for(i = 0; i < x.length; i++){
			x[i].style.display = "none";
		}
		slideIndex++;
		if(slideIndex > x.length){ slideIndex = 1}
		x[slideIndex-1].style.display = "block";
		setTimeout(carrossel, 3000); //Alterar imagem
	}
</script>
</body>
</html>