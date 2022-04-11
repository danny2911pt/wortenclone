<?php
//Declaracao de funcao em php

function registo($email, $senha, $senha2, $nome, $morada, $cp,$localidade, $db, $nif){
	//Acao da funcao
	include 'connections/conn.php';
	//Sanar sql injection prevencao
	$email = mysqli_real_escape_string($conn,$email);
	$senha = mysqli_real_escape_string($conn,$senha);
	$senha2 = mysqli_real_escape_string($conn,$senha2);
	$nome = mysqli_real_escape_string($conn,$nome);
	$morada = mysqli_real_escape_string($conn,$morada);
	$cp = mysqli_real_escape_string($conn,$cp);
	$localidade = mysqli_real_escape_string($conn,$localidade);
	$db = mysqli_real_escape_string($conn,$db);
	$nif = mysqli_real_escape_string($conn,$nif);
	
	//Ver se o email já existe
	$leremails = mysqli_query($conn,"SELECT log_email FROM login WHERE log_email = '$email'");
	//Passar resposta da query para array
	$respostaemails = mysqli_fetch_array($leremails);
	if(!$respostaemails){
		//Email não existe
		//Validar Senhas
		if($senha != $senha2){
			echo 'As senhas não são idênticas. Repita Sff';
		}else{
			//Tudo OK - Escrever para a BD
			mysqli_query($conn,"INSERT INTO login (log_email, log_senha, log_tipo) VALUES ('$email','$senha','1')");
			//Ler id automatico gerado
			$id_login = mysqli_insert_id($conn);
			mysqli_query($conn,"INSERT INTO utilizadores (id_login, u_nome, u_morada, u_cp, u_localidade, u_datanas, u_nif) VALUES ('$id_login','$nome','$morada','$cp','$localidade','$db','$nif')");
			echo '<script language="javascript">';
			echo 'alert("Obrigado. Registo Criado com sucesso.")';
			echo '</script>';
			//Encaminhar user 
			echo '<meta http-equiv="refresh" content="0;url=index.php">';
		}
	}else{
		//Email existe
		echo 'O email indicado já se encotra registado.';
	}
	//fechar ligacao a bd
	include 'connections/deconn.php';
}
/* ---- Validar Login ------ */
function login($loginemail, $loginsenha){
	include 'connections/conn.php';
	$loginemail = mysqli_real_escape_string($conn,$loginemail);
	$loginsenha = mysqli_real_escape_string($conn,$loginsenha);
	$leremails = mysqli_query($conn,"SELECT log_email, id_login FROM login WHERE log_email = '$loginemail' AND log_senha = '$loginsenha'");
	$respostaemails = mysqli_fetch_array($leremails);
	if(!$respostaemails){
		//Os dados enviados não existem
		echo '<script language="javascript">';
		echo 'alert("Dados Inválidos. Ainda não está registado?")';
		echo '</script>';
		//Encaminhar user para posição 8 do switch (Formulario de Registo)
		echo '<meta http-equiv="refresh" content="0;url=index.php?n=8">';
		}else{
			//Iniciar Sessão
			//session_start();
			//Criar variavel de sessao
			$_SESSION["email"] = $respostaemails["log_email"];
			$_SESSION["id_login"] = $respostaemails["id_login"];
			echo '<meta http-equiv="refresh" content="0;url=index.php">';
		}
	
	include 'connections/deconn.php';
}
function logout(){
	//session_destroy();
	unset ($_SESSION["email"]);
	unset ($_SESSION["id_login"]);
	unset ($_SESSION["hash"]);
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
}

function editarconta(){
	include 'connections/conn.php';
	$dadosconta = mysqli_fetch_array(mysqli_query($conn, "SELECT utilizadores.*, login.* FROM login JOIN utilizadores ON utilizadores.id_login = login.id_login WHERE login.id_login = '$_SESSION[id_login]'"));
	include 'connections/deconn.php';
	echo'
		<div class="loginwortas"><!-- Reutilização em registo -->
			<form method="post">
				<h2>Editar Conta</h2>
				<input type="email" name="loginemail" placeholder="Email:" readonly value="'.$dadosconta["log_email"].'">
				<hr><br>
				<input type="text" name="nome" placeholder="Nome:" value="'.$dadosconta["u_nome"].'">
				<input type="text" name="morada" placeholder="Morada:" value="'.$dadosconta["u_morada"].'">
				<input type="text" name="cp" placeholder="Codigo Postal" value="'.$dadosconta["u_cp"].'">
				<input type="text" name="localidade" placeholder="Localidade:" value="'.$dadosconta["u_localidade"].'">
				<input type="datetime-local" name="db" placeholder="Data Nascimento:" value="'.$dadosconta["u_datanas"].'">
				<input type="number" name="nif" placeholder="Nif:" maxlength="9" value="'.$dadosconta["u_nif"].'">
				<input type="submit" name="atualizarconta" value="Atualizar" >
			</form>';
}

function atualizarconta($loginemail,$nome,$morada,$cp,$localidade,$db,$nif){
	include 'connections/conn.php';
	$loginemail = mysqli_real_escape_string($conn,$loginemail);
	$nome = mysqli_real_escape_string($conn,$nome);
	$morada = mysqli_real_escape_string($conn,$morada);
	$cp = mysqli_real_escape_string($conn,$cp);
	$localidade = mysqli_real_escape_string($conn,$localidade);
	$db = mysqli_real_escape_string($conn,$db);
	$nif = mysqli_real_escape_string($conn,$nif);
	//Atualizar os dados da conta
	mysqli_query($conn,"UPDATE utilizadores SET u_nome = '$nome', u_morada = '$morada', u_cp = '$cp', u_localidade = '$localidade', u_datanas = '$db', u_nif = '$nif' WHERE id_login = '$_SESSION[id_login]'");
	echo '<script language="javascript">';
	echo 'alert("Dados Atualizados.")';
	echo '</script>';
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
	include 'connections/deconn.php';
}
function artigospromocao($posicao){
	include 'connections/conn.php';
	if($posicao == '1'){
		$promocoes = mysqli_query($conn,"SELECT * FROM artigos WHERE art_promo = '1' LIMIT 4");
	}else{
		$promocoes = mysqli_query($conn,"SELECT * FROM artigos WHERE art_promo = '1'");
	}
	
	while( $promo = mysqli_fetch_array($promocoes)){
		echo '
		<a href="?n=10&art_id='.$promo["art_id"].'">
		<div class="promocao">
				<img src="img/'.$promo["art_img"].'">
				<div class="descricao">
				<h3>'.$promo["art_promoline"].'</h3>
				<p>'.$promo["art_descricao"].'</p>
				<h5>'.$promo["art_infoadicional"].'</h5>
				</div>
			</div>
			</a>';
	}
	include 'connections/deconn.php';
}
function artigosdestaque($posicao){
	include 'connections/conn.php';
	if($posicao == '1'){
		$artdestaques = mysqli_query($conn,"SELECT * FROM artigos WHERE art_destaque = '1' LIMIT 4");
	}else{
		$artdestaques = mysqli_query($conn,"SELECT * FROM artigos WHERE art_destaque = '1'");
	}
	
	while($artdestaque = mysqli_fetch_array($artdestaques))
    {
		echo '<a href="?n=10&art_id='.$artdestaque["art_id"].'">
			<div class="destaque">
				<img src="img/'.$artdestaque["art_img"].'">
				<div class="descricao">
				<p>'.$artdestaque["art_descricao"].'</p>
				<h5>'.$artdestaque["art_infoadicional"].'</h5>
				<div class="precosdestaque">
		';
            if($artdestaque["art_promo"] == 1)
            {
                echo '
                    <div class="precoatual">'.$artdestaque["art_precopromo"].'€</div>
					<div class="precoanterior">'.$artdestaque["art_preco"].'€</div>
                ';
            }
            else
            {
                echo '<div class="precoatual">'.$artdestaque["art_preco"].'€</div>';
            }
        echo '
				</div>
				</div>
			</div></a>
	    ';
    }
	include 'connections/deconn.php';
}

function categoriadestaque($posicao){
	include 'connections/conn.php';
	if($posicao == '1'){
		$catdestaques = mysqli_query($conn,"SELECT * FROM artigos WHERE art_categoria = '2' LIMIT 4");
	}else{
		$catdestaques = mysqli_query($conn,"SELECT * FROM artigos WHERE art_categoria = '2'");
	}
	
	while($catdestaque = mysqli_fetch_array($catdestaques)){
		echo '<a href="?n=10&art_id='.$catdestaque["art_id"].'">
				<div class="destaque">
				<img src="img/'.$catdestaque["art_img"].'">
				<div class="descricao">
				<p>'.$catdestaque["art_descricao"].'</p>
				<h5>'.$catdestaque["art_infoadicional"].'</h5>
				<div class="precosdestaque">
					<div class="precoatual">'.$catdestaque["art_preco"].'€</div>
					<div class="precoanterior">'.$catdestaque["art_precopromo"].'€</div>
				</div>
				</div>
			</div></a>';
	}
	include 'connections/deconn.php';
}

function fichaproduto($art_id){
	include 'connections/conn.php';

	$lerproduto = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM artigos WHERE art_id = '$art_id'"));
	echo '<div id="fichaprd">
		<div class="fichaprd_foto">
			<img src="img/'.$lerproduto["art_img"].'">
		</div>
		<div class="fichaprd_dados">
			<h3>'.$lerproduto["art_nome"].'</h3>
			<p>'.$lerproduto["art_descricao"].'</p>
			<p>'.$lerproduto["art_infoadicional"].'</p>
			<p>'.$lerproduto["art_preco"].'€</p>
			<p>'.$lerproduto["art_precopromo"].'</p>
			<p>'.$lerproduto["art_promoline"].'</p>
			<form method="post">
			<label>Quantidade: </label>
			<input type="number" min="1" step="1" value="1" name="qta">
			<input type="hidden" value="'.$art_id.'" name="art_id">
			<input type="hidden" value="'.$lerproduto["art_preco"].'" name="preco">
			<input type="submit" value="Adicionar" name="adicionar">
			</form>
		</div>
	</div>';
	$art_views = $lerproduto["art_views"] + 1;
	mysqli_query($conn,"UPDATE artigos SET art_views = '$art_views' WHERE art_id = '$art_id'");
	if(isset($_POST["adicionar"])){
		$artigos = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_cartitens WHERE cart_id = '$_SESSION[hash]' AND art_id = $_POST[art_id]"));
		$prev_qta = $artigos["qta"];
		if(!$artigos){
		mysqli_query($conn,"INSERT INTO tb_cartitens (cart_id, art_id, qta, preco) 
			VALUES ('$_SESSION[hash]','$_POST[art_id]','$_POST[qta]','$_POST[preco]')");
		echo '<script language="javascript">';
		echo 'alert("Artigo adicionado ao seu carrinho.")';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		}else{
		$nqta = $prev_qta + $_POST["qta"];
		mysqli_query($conn,"UPDATE tb_cartitens SET qta = '$nqta' WHERE cart_id = '$_SESSION[hash]' AND art_id = '$_POST[art_id]'");
		echo '<script language="javascript">';
		echo 'alert("Artigo adicionado ao seu carrinho.")';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		}
	}
	include 'connections/deconn.php';
}

/*----------------------- NEWSLETTER ------------------------------- */
function subescrevernewsletter($emailnews){
	include 'connections/conn.php';
	$emailnews = mysqli_real_escape_string($conn,$emailnews);
	$existe = mysqli_fetch_array(mysqli_query($conn,"SELECT news_email FROM newsletter WHERE news_email = '$emailnews'"));
	if($existe){
		echo '<script language="javascript">';
		echo 'alert("Email indicado já está registado.")';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
	}else{
		mysqli_query($conn,"INSERT INTO newsletter (news_email) VALUES ('$emailnews')");
		echo '<script language="javascript">';
		echo 'alert("Obrigado. Verifique o seu email.")';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
	}
	include 'connections/deconn.php';
}
/* ---------------------------- TENDENDCIAS -------------------------- */
function tendencias(){
	include 'connections/conn.php';
	$tendencias = mysqli_query($conn,"SELECT * FROM artigos ORDER BY art_views DESC LIMIT 4 ");
	while($tendencia = mysqli_fetch_array($tendencias)){
	echo '<a href="?n=10&art_id='.$tendencia["art_id"].'">
			<div class="tendencia">
				<img src="img/'.$tendencia["art_img"].'">
				<div class="titulo_tendencia">
					'.$tendencia["art_nome"].' <span class="entypo-right"></span>
				</div>
				<div class="texto_tendencia">
					'.$tendencia["art_descricao"].'
				</div>
			</div></a>';
	}
	include 'connections/deconn.php';
}

/* ----------------------------- HASH VERIFY ----------------------------- */
function hashverify(){
	include 'connections/conn.php';
	$x = openssl_random_pseudo_bytes(32);
	//Hash composta por (0-9 e a-f)
	$hash = bin2hex($x);
	if(@!$_SESSION["id_login"]){
		if(@!$_SESSION["hash"]){
			$_SESSION["hash"] = $hash;
			mysqli_query($conn,"INSERT INTO tb_cartp (cart_id) VALUES ('$_SESSION[hash]')");
			
		}
	}else{
		if(@!$_SESSION["hash"]){
		$_SESSION["hash"] = $hash;
		}else{
		$pendentes = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_cart WHERE id_login = '$_SESSION[id_login]' AND cart_status = '0'"));
		if(!$pendentes){
			mysqli_query($conn,"INSERT INTO tb_cart (cart_id, cart_status, id_login) VALUES ('$_SESSION[hash]','0','$_SESSION[id_login]')");
		
		}else{
			mysqli_query($conn,"UPDATE tb_cart SET cart_id = '$_SESSION[hash]' WHERE id_login = '$_SESSION[id_login]' AND cart_status = '0'");
			mysqli_query($conn,"UPDATE tb_cartitens SET cart_id = '$_SESSION[hash]' WHERE cart_id = '$pendentes[cart_id]'");
		
		}
		mysqli_query($conn,"DELETE FROM tb_cartp WHERE cart_id = '$_SESSION[hash]'");
	}
	}
	include 'connections/deconn.php';
}
/* ---------------------- CONTAR ITENS CARRINHO -------------------------- */
function contaitens(){
	include 'connections/conn.php';
	$contagem = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(art_id) AS artigos FROM tb_cartitens WHERE cart_id = '$_SESSION[hash]'"));
	if(!$contagem){
		echo '0';
	}else{
		echo $contagem["artigos"];
	}
	include 'connections/deconn.php';
}

/* ------------------------- LISTA COMPRAS ------------------------------------- */

function listacompras(){
	include 'connections/conn.php';
	$lercarrinho = mysqli_query($conn,"SELECT tb_cartitens.*, artigos.* FROM tb_cartitens JOIN artigos ON tb_cartitens.art_id = artigos.art_id WHERE tb_cartitens.cart_id = '$_SESSION[hash]'");
	while($items = mysqli_fetch_array($lercarrinho)){
		echo '<div class="itemlista">
				<form method="post">
				<table>
					<tr>
						<td>'.$items["art_nome"].'</td>
						<td>'.$items["art_preco"].'€</td>
						<td>
							<input type="number" value="'.$items["qta"].'" name="qtaitem">
							<input type="hidden" name="art_id" value="'.$items["art_id"].'">
						</td>
						<td style="text-align:right;"><input type="submit" name="atualizaritem" value="Atualizar"></td>
						<td style="text-align:right;"><input type="submit" name="apagaritem" value="Remover"></td>
					</tr>
				</table>
				</form>
			</div>';
	}
	include 'connections/deconn.php';
}
/* UPDATE ao carrinho */
function atualizaritem($art_id,$qtaitem){
	include 'connections/conn.php';
	if($qtaitem < '1'){
		mysqli_query($conn,"DELETE FROM tb_cartitens WHERE cart_id = '$_SESSION[hash]' AND art_id = '$art_id'");
			echo '<meta http-equiv="refresh" content="0;url=index.php?n=14">';
	}else{
		mysqli_query($conn,"UPDATE tb_cartitens SET qta = '$qtaitem' WHERE cart_id = '$_SESSION[hash]' AND art_id = '$art_id'");
		echo '<meta http-equiv="refresh" content="0;url=index.php?n=14">';
	}
	
	include 'connections/deconn.php';
}
/* APAGAR do Carrinho */
function apagaritem($art_id){
	include 'connections/conn.php';
	mysqli_query($conn,"DELETE FROM tb_cartitens WHERE cart_id = '$_SESSION[hash]' AND art_id = '$art_id'");
	echo '<meta http-equiv="refresh" content="0;url=index.php?n=14">';
	include 'connections/deconn.php';	
}

/* Construir talao compra */
function talao(){
	include 'connections/conn.php';

	echo '<form method="post">
			<div id="talao">
			<h4>A sua Encomenda:</h4>';
			$itemstalao = mysqli_query($conn,"SELECT tb_cartitens.*, artigos.* FROM tb_cartitens JOIN artigos ON tb_cartitens.art_id = artigos.art_id WHERE tb_cartitens.cart_id = '$_SESSION[hash]'");
			$total = 0;
			while($itemtalao = mysqli_fetch_array($itemstalao)){
				$valor = $itemtalao["art_preco"] * $itemtalao["qta"];
				echo '<div class="itemtalao">
						<div class="itemnome">'.$itemtalao["qta"].' x '.$itemtalao["art_nome"].'</div>
						<div class="itemvalor">'.$valor.'€</div>
					  </div>';
				$total = $total + $valor;
			}
			echo'
				<div class="totaltalao">Total: '.$total.'€</div>
				<div class="meiopagamento">
				<h5>Selecione Meio Pagamento:</h5>
				Ref. Multibanco:
				<input type="radio" name="meio" value="MB" style="width:10%;">
				Transferência IBAN:
				<input type="radio" name="meio" value="TRF" style="width:10%;">
				Bitcoin:
				<input type="radio" name="meio" value="BTC" style="width:10%;">
				</div>
				<input type="submit" name="comprar" value="ENCOMENDAR">
			</div>
			</form>';

	include 'connections/deconn.php';
}

/* ---------------------- COMPRA ---------------------------*/
function compracarrinho($meio){
	include 'connections/conn.php';
	//Não tem conta?
	if(!$_SESSION["id_login"]){
		echo 'Registe-se ou faça login para terminar a sua encomenda';
		echo '<meta http-equiv="refresh" content="0;url=index.php?n=8">';
	}else{
		$hoje = date('Y-m-d');
		mysqli_query($conn,"UPDATE tb_cart SET pendente = 1, cart_status = 1, meiopagamento = '$meio', data = '$hoje' WHERE cart_id = '$_SESSION[hash]'");
		echo 'Obrigado. O seu pedido foi registado. Verifique a sua conta.';
		unset($_SESSION["hash"]);
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
	}
	include 'connections/deconn.php';
}

function historico(){
	include 'connections/conn.php';
	$comprados = mysqli_query($conn,"SELECT tb_cart.* FROM tb_cart WHERE tb_cart.cart_status = '1' AND id_login = '$_SESSION[id_login]'");
	while($compra = mysqli_fetch_array($comprados)){
		echo '<table>
					<tr>
						<td>'.$compra["data"].'</td>
						<td>'.$compra["meiopagamento"].'</td>
						<td><table>';
		$itens = mysqli_query($conn,"SELECT tb_cartitens.*, artigos.art_nome FROM tb_cartitens JOIN artigos ON tb_cartitens.art_id = artigos.art_id WHERE tb_cartitens.cart_id = '$compra[cart_id]'");
		$totalcarro = 0;
		while($item = mysqli_fetch_array($itens)){
			$totalunitario = $item["qta"]*$item["preco"];
			echo '<tr><td>'.$item["qta"].' x '.$item["art_nome"].' - '.$totalunitario.'€</td></tr>';
			$totalcarro = $totalcarro + $totalunitario;
		}
	echo '</table>
						</td>
						<td style="text-align:right;">Total:</td>
						<td style="text-align:right;">'.$totalcarro.'€</td>
					</tr>
				</table>';
	}
	include 'connections/deconn.php';
}
?>