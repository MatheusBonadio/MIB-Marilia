		<?php
				require_once $_SERVER['DOCUMENT_ROOT'].'/models/dao/PalavraDAO.php';
				$dao = new PalavraDAO();
				$exec = $dao->listarFormatado();
		?>
		<link rel='stylesheet' href='/public/css/palavra.css' type='text/css'>
		<link rel='stylesheet' href='/public/css/palavras.css' type='text/css'>

		<div class='container'>
			<img style='display: none' src='/public/img/system/palavra.jpg'></img>
			<div class='title_head'>
					<div>Palavras</div>
					<p>A fé vem pela pregação, e a pregação, <br /> pela palavra de Cristo. <strong>Romanos 10:17</strong></p>
			</div>
				<div class='word_body'>
						<div class='word_content'>
								<div class='word_text'>
										<div class='title'>recentes</div>
										<?php foreach ($exec as $listar) {?>
												<div class='block' onclick='select_word("<?php echo $listar['titulo'] ?>","<?php echo $dao->formatarTitulo($listar['titulo']) ?>", "<?php echo $listar['id_palavra'] ?>")'>
														<div class='img' style='background-image: linear-gradient(to left, rgba(20, 20, 20, .6) 0%, transparent 40%), url(/public/img/culto/<?php echo $listar['img'] ?>)'>
																<div class='date flex'>
																		<div class='month'><?php echo $listar['mes'] ?></div>
																		<div class='day'><?php echo $listar['dia'] ?></div>
																		<div class='year'><?php echo $listar['ano'] ?></div>
																</div>
														</div>
														<div class='text'>
																<div><?php echo $listar['titulo'] ?></div>
																<div><?php echo $listar['texto'] ?></div>
														</div>
												</div>
										<?php } ?>
								</div>
						</div>
				</div>
		</div>

		<script>slider($(".header a:eq(3)"))</script>