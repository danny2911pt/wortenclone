	<!-- Conteudos de produtos -->
	<div id="contentor">
		<?php
		editarconta();
		?>
		<?php 
		//enviar dados para a funcao
		if(isset($_POST["atualizarconta"])){
		atualizarconta($_POST["loginemail"],$_POST["nome"],$_POST["morada"],$_POST["cp"],$_POST["localidade"],$_POST["db"],$_POST["nif"]);
		}
			?>
		</div>
		
		<!-- Newsletter Bar -->
		<div class="newsletter">
			<div class="news_icon">
				<span class="entypo-mail"></span>
			</div>
			<div class="news_text">
				<h3>Subscreva a nossa Newsletter</h3>
				<p>Descontos exclusivos no seu email</p>
			</div>
			<div class="news_subscricao">
				<form method="post">
					<input type="email" name="emailnews" placeholder="Email:" required>
					<input type="submit" name="subscrevernews" value="Subscrever">
					<label><a href="#">Leia e aceite o tratamento de dados pessoais</a></label>
				</form>
			</div>
		</div>
		<!-- Conditions Bar -->
		<div class="condicoes">
			<div class="condicao_icon">
				<span class="fontawesome-truck"></span>
			</div>
			<div class="condicao_text">
				<a href="#">
					Entregas Gratuitas <span class="entypo-right"></span>
					<br>
					em artigos assinalados
				</a>
			</div>
			<div class="condicao_icon">
				<span class="entypo-basket"></span>
			</div>
			<div class="condicao_text">
				<a href="#">
					Click & Collect <span class="entypo-right"></span>
					<br>
					em artigos assinalados
				</a>
			</div>
			<div class="condicao_icon">
				<span class="entypo-basket"></span>
			</div>
			<div class="condicao_text">
				<a href="#">
					Devoluções <span class="entypo-right"></span>
					<br>
					em artigos assinalados
				</a>
			</div>
			<div class="condicao_icon">
				<span class="fontawesome-wrench"></span>
			</div>
			<div class="condicao_text">
				<a href="#">
					Reparações <span class="entypo-right"></span>
					<br>
					em artigos assinalados
				</a>
			</div>
		</div>
	</div>