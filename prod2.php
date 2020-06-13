<div class="home">
	<!-- Arquivo para montar a página do produto 2 na página My Beer, desenvolvido por Ronaldo Gama. versão 1.0 -->
	<?php
		include("conecta.php");
		session_start();
		if(!isset($_SESSION['nick'])) {
			header("location:?b=login");
			exit;
		} else {
			$prod = 'KIT CARVÃO';
			$valor = '130,00';
			$nick = $SESSION['nick'];?>
			<h3>Confrade, <?=$nick?></h3>
			<br>
			<hr>
			<br>
			<p align="right"><a href="?b=logout">SAIR?</a></p>
			<br>
			<hr>
			<br>
			<h3><?=$prod?></h3>
		}
</div>