<div class="home">
	<!-- Arquivo para montar o painel inicial na página My Beer, desenvolvido por Ronaldo Gama. versão 1.0 -->
	<?php
		/* Criação de sessão para proteger com o login. */
		include("conecta.php");
		session_start();
		if(!isset($_SESSION['nick'])) {
			header("location:?b=login");
			exit;
		} else {
			$Nick = $_SESSION['nick'];
	?>
			<!-- Cabeçalho. -->
			<h3>Seja bem vindo, <?=$Nick?></h3>
			<br>
			<hr>
			<br>
			<p align="right">
				<a href="?b=carro">IR PARA O CARRINHO</a>
				<a href="?b=logout">SAIR?</a>
			</p>
			<br>
			<hr>
			<!-- Montagem da tabela com os produtos. -->
			<br>
			<h2>Em qual item você deseja colaborar?</h2><br>
			<br>
			<table align="center" border="1">
			 	<tr>
			 		<?php
			 			$prod1 = 'TRANSFORMAR O COOLER DA ITAIPAVA EM CHOPEIRA';
			 			$valor1 = '825.10';
			 			$foto1 = 'choppeira.png';
			 			$text1 = 'Desejo antigo da nossa turma, aqui está a oportunidade de trasnformar o nosso velho e já feioso cooler da itaipava em algo mais legal. A idéia é transformá-lo em uma choperira para que a gente possa desgustar chopps artesanais durante os nossos eventos.<br/>
							<br/>
							Se você gostou da ideia e quer colaborar pra tornar esse desejo em realidade, contribua colaborando com o valor que desejar.';
			 		?>
			 		<td><?php echo "<img src='$foto1' border='0' width='300px'>"?></td>
			 		<td>
			 			<h4><?=$prod1?></h4>
			 			<br>
			 			<h4>R$ <?php echo number_format($valor1,2,",",".");?></h4>
			 			<br>
			 			<form enctype="multipart/form-data" action="?b=prod" method="post">
							<input type="hidden" name="prod" value="<?=$prod1?>">
							<input type="hidden" name="valor" value="<?=$valor1?>">
							<input type="hidden" name="foto" value="<?=$foto1?>">
							<input type="hidden" name="text" value="<?=$text1?>">
							<input type="submit" value="COLABORAR" name="submit">							
						</form>
			 		</td>
			 	</tr>
			 	<tr>
		 			<?php
		 				$prod2 = 'COMPRAR KIT DE CARVÃO';
		 				$valor2 = '130.00';
		 				$foto2 = 'carvao.jpg';
		 				$text2 = 'Talvez vocês ainda não saibam, mas a marca ofical do nosso carvão (carioquinha) nos deixou. Posto isso, o nosso churrasqueiro mestre Tiago Dupim, sempre preocupado com a qualidade superior em nossos eventos, buscou uma nova opção.<br/>
		 					<br/>A ideia aqui é reunir esforços e já comprar uma quantidade legal que vai nos garantir uma boa relação custo benefício, sem pesar no bolso de ninguém. Assim sendo, se você deseja colaborar, basta indicar com qunato aqui embaixo.';
					?>
					<td><?php echo "<img src='$foto2' border='0' width='300px'>"?></td>
					<td>
			 			<h4><?=$prod2?></h4>
			 			<br>
			 			<h4>R$ <?php echo number_format($valor2,2,",",".");?></h4>
			 			<br>
			 			<form enctype="multipart/form-data" action="?b=prod" method="post">
							<input type="hidden" name="prod" value="<?=$prod2?>">
							<input type="hidden" name="valor" value="<?=$valor2?>">
							<input type="hidden" name="foto" value="<?=$foto2?>">
							<input type="hidden" name="text" value="<?=$text2?>">
							<input type="submit" value="COLABORAR" name="submit">							
						</form>
			 		</td>
			 	</tr>	 	
			</table>
	<?php	}?>
</div>