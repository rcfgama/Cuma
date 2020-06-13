<div class="home">
	<?php

	include("conecta.php");

	if (isset($_POST['submit'])) {

		$Nick = $_POST['nickname'];
		$Pass = $_POST['password'];
		
		$dados = mysqli_query($conexao, "SELECT * from cervejeiros WHERE NICK = '$Nick' and PASS = '$Pass'");
		$rows = mysqli_num_rows($dados);
		if ($rows > 0) {
			session_start();
			$_SESSION['nick']= $_POST['nickname'];
			header("location:?b=painel");
		} else {?>
			<p><?php echo "Nome de usuário ou senha inválidos! Por favor revise as informações ou realize o seu cadastro!";?></p>
			<br>
			<p><a href="?b=login">VOLTAR</a></p>
	<?php	}
	}?>
</div>