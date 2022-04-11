<div id="banners">

	</div>
	<div id="compromissos">
		<div class="compromisso">
			Compromissos Wortas
		</div>
		<div class="compromisso">
			<span class="fontawesome-truck"></span>
			<a href="#">Produtos com entregas gratuitas</a>
		</div>
		<div class="compromisso">
			<span class="fontawesome-map-marker"></span>
			<a href="#">Compre Online e levante em Loja (Gratuito)</a>
		</div>
		<div class="compromisso">
			<span class="fontawesome-refresh"></span>
			<a href="#">Devoluções gratuitas até 30 dias</a>
		</div>
	</div>
	<!-- Conteudos de produtos -->
	<div id="contentor">
		<div class="titulos_seccoes">
			<div class="titulo_seccao">
				Promoções
			</div>
			<div class="link_seccao">
				<a href="?n=11">Ver Todas<span class="entypo-right"></span></a>
			</div>
		</div>
		<div class="promocoes">
			<?php
			$posicao = '1';
			artigospromocao($posicao);
			?>	
			<div style="clear:both;"></div>
		</div>
		<div class="titulos_seccoes">
			<div class="titulo_seccao">
				Artigos em Destaque
			</div>
			<div class="link_seccao">
				<a href="?n=12">Ver Todas<span class="entypo-right"></span></a>
			</div>
		</div>
		<div class="destaques">
			<?php
			$posicao = '1';
			artigosdestaque($posicao);
			?>
			
			<div style="clear:both;"></div>
		</div>
		<div class="titulos_seccoes">
			<div class="titulo_seccao">
				Categoria em Destaque
			</div>
			<div class="link_seccao">
				<a href="?n=13">Ver Todas<span class="entypo-right"></span></a>
			</div>
		</div>
		<div class="destaques">
			<?php
			$posicao = '1';
			categoriadestaque($posicao);
			?>
			
			<div style="clear:both;"></div>
		</div>
		<div class="titulos_seccoes">
			<div class="titulo_seccao">
				Tendencias
			</div>
			<div class="link_seccao">
				
			</div>
		</div>
		<div class="tendencias">
			<?php
			tendencias();
			?>
			<div style="clear:both;"></div>
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
				<?php
				if(isset($_POST["subscrevernews"])){
					subescrevernewsletter($_POST["emailnews"]);
				}
				?>
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