<div class="home">
	<p>
	<?php

	include("conecta.php");

		if (isset($_POST['submit'])) {

		$First = $_POST['first'];
		$Last = $_POST['last'];
		$Phone = $_POST['phone'];
		$Nick = $_POST['nickname'];
		$CrPass = $_POST['createpass'];
		$CoPass = $_POST['confirmpass'];

			if ($First == '') {
				echo "Por favor, insira seu primeiro nome!";
			} elseif ($Last == '') {
				echo "Por favor, insira seu último nome!";
			} elseif ($Phone == '') {
				echo "Por favor, insira o número do seu celular (com o DDD)!";
			} elseif ($Nick == '') {
				echo "Por favor, insira um Nickname (Apelido)!";
			} elseif ($CrPass == '') {
				echo "Por favor, insira um senha!";
			} elseif ($CrPass != $CoPass) {
				echo 'As senhas estão diferentes. Por favor, revise!';
			} else {
				mysqli_query($conexao, "insert into CERVEJEIROS (FIRST, LAST, PHONE, NICK, PASS) values ('$First', '$Last', '$Phone', '$Nick', '$CrPass')");
			?>
			<p>Seu cadastro foi realizado com sucesso!</p>
			<br>
			<p><a href="?b=login">Ir para o Login</a></p>
			<?php
			}
		}
	?>
	</p>
	<br>
		<p><a href="?b=cadastro">VOLTAR</a></p>
</div>
