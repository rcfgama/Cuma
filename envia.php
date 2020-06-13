<div class="home">
	<!--Arquivo para enviar dados para o banco de dados na página My Beer, desenvolvido por Ronaldo Gama - versão 1.0 -->
	<?php
		/* Conexão com o banco de dados. */
		include("conecta.php");
		/* Inserção no banco de dados. */
		$FOTO = $_POST['foto'];
		$PROD = $_POST['prod'];
		$VALOR = $_POST['vlrcv'];
		$USER = $_POST['user'];
		mysqli_query($conexao, "INSERT INTO carro (NOME, PROD, VALOR, STAND, FOTO) VALUES ('$USER', '$PROD', '$VALOR', 'TEMP', '$FOTO')");
	?>
	<!-- Mensagem informativa. -->
	<h3><?=$PROD?></h3>
	<br>
	<p><?php echo "<img src='$FOTO' border='0' width='500px'>"?></p>
	<br>
	<h3>Produto adicionado ao carrinho com sucesso!</h3>
	<!-- Atalhos para continuar a navegação. -->
	<br>
	<p><a href="?b=painel">CONTINUAR COMPRANDO?</a></p>
	<br>
	<p><a href="?b=carro">IR PARA O CARRINHO</a></p>
</div>