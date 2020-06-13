<div class="home">
	<!-- Arquivo para fazer o logout da página My Beer, desenvolvido por Ronaldo Gama - versão 1.0 -->
	<?php
		session_start();
		session_destroy();
		header("location:?b=home");
	?>
</div>