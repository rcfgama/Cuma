<div class="home">
	<!-- Arquivo para gravar a compra do usuário na página My Beer desenvolvido por Ronaldo Gama. versão 1.0 -->
	<?php
		/* Conexão com o banco de dados.. */
		include("conecta.php");
		/* Update no banco de dados. */
		$nick = $_POST['nick'];
		mysqli_query($conexao, "UPDATE carro SET STAND = 'CARH' WHERE NOME ='$nick'");
	?>
	<!-- Mensagem de agradecimento -->
	<h3>Obrigado por colaborar com a nossa compra!</h3>
	<!-- Atalhos para continuar a navegação. -->
	<br>
	<p><a href="?b=perfil">IR PARA O MEU PERFIL</a></p>
	<br>	
	<p><a href="?b=painel">VOLTAR</a></p>
</div>