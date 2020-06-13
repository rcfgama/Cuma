<div class="home">
	<!-- Arquivo para montar a página do produto 1 na página My Beer, desenvolvido por Ronaldo Gama. versão 1.0 -->
	<?php
		include("conecta.php");

		session_start();
		if(!isset($_SESSION['nick'])) {
			header("location:?b=login");
			exit;
		} else {

			$prod = 'TRANSFORMAR O COOLER DA ITAIPAVA EM CHOPEIRA';
			$valor = '825.10';
			$nick = $_SESSION['nick'];?>
			<h3>Confrade, <?=$nick?></h3>
			<br>
			<hr>
			<br>
			<p align="right"><a href="?b=logout">SAIR?</a></p>
			<br>
			<hr>
			<br>
			<h3><?=$prod?></h3>
			<br>
			<!-- Desccrição do produto -->
			<p>
				Desejo antigo da nossa turma, aqui está a oportunidade de trasnformar o nosso velho e já feioso cooler da itaipava em algo mais legal. A idéia é transformá-lo em uma choperira para que a gente possa desgustar chopps artesanais durante os nossos eventos.
			</p>
			<br>
			<p>
				Se você gostou da ideia e quer colaborar pra tornar esse desejo em realidade, contribua colaborando com o valor que desejar.
			</p>
			<br>
			<p><img align="center" src="choppeira.png" width="500px"></p>
			<br>
			<!-- quadro para colaboração de compra -->
			<?php
			$resul = mysqli_query($conexao, "SELECT SUM(VALOR) AS totalres FROM carro WHERE PROD = '$prod'");
			while ($linhas = mysqli_fetch_array($resul)) {?>
			<br>
			<table align="center" border="1">
				<tr><td><b>VALOR TOTAL DO PRODUTO:</b></td></tr>
				<tr><td><b><?=$valor?></b></td></tr>
				<tr><td><b>FALTANDO PARA A COMPRA:</b></td></tr>
				<tr><td><b><?=$valor-$linhas['totalres']?></b></td></tr><?php }?>
			</table>
			<br>
			<h4>INFORME ABAIXO COM QUANTO GOSTARIA DE COLABORAR</h4>
			<br>
			<table align="center" border="1">
				<tr><td><b>VALOR EM R$ (utilizar ".")</b></td></tr>
				<tr>
					<td>
						<form action="?b=envia" method="post">
							<input type="text" name="vlrcv" placeholder="R$">
					</td>
				</tr>
				<tr>
					<td>
							<input type="hidden" name="prod" value="<?=$prod?>">
							<input type="hidden" name="user" value="<?=$nick?>">
							<input type="submit" name="submit" value="COLABORAR">
						</form>
					</td>
				</tr>
			</table>
			<br>
			<p><b>CONFRADES QUE JÀ CONTRIBUÍRAM PARA A COMPRA</b></p>
			<br>
			<table align="center" border="1">
				<tr>
					<td><b>CONFRADE</b></td>
					<td><b>(%)</b></td>
				</tr>
				<?php
				$selec = mysqli_query($conexao, "SELECT NOME, SUM(VALOR) AS total FROM carro WHERE STAND = 'CARH' GROUP BY NOME");
				while($line = mysqli_fetch_array($selec)) {?>
					<tr>
						<td><?=$line['NOME']?></td>
						<td><?=($line['total']/$valor)*100?></td>
					</tr>
			<?php	}?>
			</table>
			<br>
			<p><a href="?b=painel">VOLTAR</a>
	<?php	}?>
</div>