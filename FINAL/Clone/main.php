
<?php
@$n = $_REQUEST["n"];//Variavel local em main que carrega com o valor transmitido em url "n"
switch ($n) {
	case '1':
		include "tudo.php";
		break;
	case '2':
		include "promo.php";
		break;
	case '3':
		include "novidades.php";
		break;
	case '4':
		echo 'Serviços';
		break;
	case '5':
		echo 'Reparações';
		break;
	case '6':
		echo 'lojas';
		break;
	case '7':
		include 'login.php';
		break;
	case '8':
		include 'registo.php';
		break;
	case '9':
		include 'aminhaconta.php';
		break;
	/* Abrir ficha de produto */
	case '10':
		include 'fichaproduto.php';
		break;
	/*filtros*/
	case '11':
		include 'filtra_promo.php';
		break;
	case '12':
		include 'filtra_destaques.php';
		break;
	case '13':
		include 'filtra_cat_destaque.php';
		break;
	case '14':
		include 'carrinho.php';
		break;
	case '15':
		include 'historico.php';
		break;
	default:
		include 'homepage.php';
		break;
}
?>










	