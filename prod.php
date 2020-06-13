<div class="home">
	<!-- Arquivo para montar a página de produtos na página My Beer, desenvolvida por Ronaldo Gama. versão 1.0 -->
	<?php
		/* Criação de sessão para proteger com o login. */
		include("conecta.php");
		session_start();
		if(!isset($_SESSION['nick'])) {
			header("location:?b=login");
			exit;
		} else {
			/* Recebendo variáveis. */
			$nick = $_SESSION['nick'];
			$prod = $_POST['prod'];
			$valor = $_POST['valor'];
			$foto = $_POST['foto'];
			$text = $_POST['text'];
	?>
			<!-- Cabeçalho --> 
			<h3>Confrade, <?=$nick?></h3>
			<br>
			<hr>
			<br>
			<p align="right"><a href="?b=logout">SAIR?</a></p>
			<br>
			<hr>
			<!-- Descrição do produto -->
			<br>
			<h3><?=$prod?></h3>
			<br>
			<p><?php echo $text;?></p>
			<br>
			<p><?php echo "<img src='$foto' border='0' width='500px'>"?></p>
			<br>
			<!-- Quadro com o status do produto. -->
			<?php
				$resul = mysqli_query($conexao, "SELECT SUM(VALOR) AS totalres FROM carro WHERE STAND = 'CARH' AND PROD = '$prod'");
				while ($linhas = mysqli_fetch_array($resul)) {?>
					<br>
					<table align="center" border="1">
						<tr><td><b>VALOR TOTAL DO PRODUTO:</b></td></tr>
						<tr><td><b>R$ <?php echo number_format($valor,2,",",".");?></b></td></tr>
						<tr><td><b>FALTANDO PARA A COMPRA:</b></td></tr>
						<tr><td><b>R$ <?php echo number_format($valor-$linhas['totalres'],2,",",".");?></b></td></tr>
					</table>
			<?php	}?>
			<!-- Quadro para a colaboração da compra. -->
			<br>
			<h4>INFORME ABAIXO QUANTO GOSTARIA DE COLABORAR:</h4>
			<br>
			<table align="center" border="1">
				<tr><td><b>VALOR EM R$ (utilizar ".")</b></td></tr>
				<tr>
					<td>
						<form enctype="multipart/form-data" action="?b=envia" method="post">
							<input type="text" name="vlrcv" placeholder="R$">
					</td>
				</tr>			
				<tr>
					<td>
							<input type="hidden" name="foto" value="<?=$foto?>">
							<input type="hidden" name="prod" value="<?=$prod?>">
							<input type="hidden" name="user" value="<?=$nick?>">
							<input type="submit" name="submit" value="COLABORAR">
						</form>
					</td>
				</tr>				
			</table>
			<!-- Quandro para mostrar como está o andamento da compra -->
			<br>
			<p><b>CONFRADES QUE JÁ CONTRIBUÍRAM PARA A COMPRA</b></p>
			<br>
			<table align="center" border="1">
				<tr>
					<td><b>CONFRADE</b></td>
					<td><b>(%)</b></td>
				</tr>
				<?php
					$selec = mysqli_query($conexao, "SELECT NOME, SUM(VALOR) AS total FROM carro WHERE STAND = 'CARH' AND PROD = '$prod' GROUP BY NOME");
					while($line = mysqli_fetch_array($selec)) {?>
						<tr>
							<td><?=$line['NOME']?></td>
							<td><?php echo number_format(($line['total']/$valor)*100,2,",",".");?></td>
						</tr>
				<?php	}
				?>	
			</table>
			<br>
			<p><a href="?b=painel">VOLTAR</a>
	<?php	}?>
</div>