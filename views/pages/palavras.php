		<?php
				require_once $_SERVER['DOCUMENT_ROOT'].'/models/dao/PalavraDAO.php';
				$dao = new PalavraDAO();
				$exec = $dao->listar();
		?>
		<link rel='stylesheet' href='/public/css/palavras.css' type='text/css'>

		<div class='container'>
				<?php foreach ($exec as $listar) {?>
						<a onclick='select_word("<?php echo $listar['titulo'] ?>","<?php echo $dao->formatarTitulo($listar['titulo']) ?>", "<?php echo $listar['id_palavra'] ?>")'><?php echo $listar['titulo']?></a><br>
				<?php } ?>
		</div>

		<script>slider($(".header a:eq(3)"))</script>