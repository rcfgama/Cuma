<?php

/*
Arquivo PHP para tornar o site My Beer do C.U.M.A. dinâmico
Autor: Ronaldo Gama:
*/

$pag = 'home';

if (isset($_GET['b'])) {
	$pag = addslashes($_GET['b']);
}

include 'header.php';

switch ($pag) {
	case 'home':
		include 'home.php';
		break;

	case 'login':
		include 'login.php';
		break;

	case 'cadastro':
		include 'cadastro.php';
		break;
	
	case 'somos':
		include 'somos.php';
		break;

	case 'banco':
		include 'banco.php';
		break;

	case 'processa':
		include 'processa.php';
		break;

	case 'painel':
		include 'painel.php';
		break;

	case 'prod':
		include 'prod.php';
		break;

	case 'prod1':
		include 'prod1.php';
		break;

	case 'prod2':
		include 'prod2.php';
		break;

	case 'envia':
		include 'envia.php';
		break;

	case 'carro':
		include 'carro.php';
		break;

	case 'grava':
		include 'grava.php';
		break;

	case 'obrigado':
		include 'obrigado.php';
		break;

	case 'logout':
		include 'logout.php';
		break;


	default:
		include 'home.php';
		break;
}

include 'footer.php';