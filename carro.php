<div class="home">
	<!-- Arquivo para montar a página carrinho na página My Beer, desenvolvido por Ronaldo Gama. versão 1.0 -->
	<?php
		/* Criação de sessão para proteger com o login. */
		include("conecta.php");
		session_start();
		if(!isset($_SESSION['nick'])) {
			header("location:?b=login");
			exit;
		} else {
			$nick = $_SESSION['nick'];
	?>
			<!-- Cabeçalho. -->
			<h3>Confrade, <?=$nick?></h3>
			<br>
			<hr>
			<br>
			<p align="right"><a href="?b=logout">SAIR?</a></p>
			<br>
			<hr>
			<!-- Montagem da tabela com a compra. -->	
			<br>
			<h3>CARRINHO</h3>
			<br>
			<table align="center" border="1">
				<tr>
					<td>PRODUTO</td>
					<td>VALOR</td>
				</tr>
				<?php
					$cartemp = mysqli_query($conexao, "SELECT PROD, SUM(VALOR) AS totalprod FROM carro WHERE NOME = '$nick' AND STAND = 'TEMP' GROUP BY PROD");
					while ($rows = mysqli_fetch_array($cartemp)) {
				?>
						<tr>
							<td><?=$rows['PROD']?></td>
							<td>R$ <?php echo number_format($rows['totalprod'],2,",",".");?></td>
						</tr>
			<?php 	}?>	
			</table>
			<br>
			<table align="center" border="1">
			<?php
				$cartot = mysqli_query($conexao, "SELECT SUM(VALOR) AS totalcar FROM carro WHERE NOME = '$nick' AND STAND = 'TEMP'");
				while ($linc = mysqli_fetch_array($cartot)) {
			?>
					<tr><td>TOTAL NO CARRINHO</td></tr>
					<tr><td>R$ <?php echo number_format($linc['totalcar'],2,",",".");?></td></tr>
					<tr>
						<td>
							<form action="?b=grava" method="post">
								<input type="hidden" name="nick" value="<?=$nick?>">
								<input type="submit" name="submit" value="COMPRAR">
							</form>
						</td>
					</tr>
			<?php } ?>	
			</table>
			<br>
			<p><a href="?b=painel">VOLTAR</a></p>
	<?php }?>	
</div>