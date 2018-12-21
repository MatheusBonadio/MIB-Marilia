		<?php
				require_once $_SERVER['DOCUMENT_ROOT'].'/models/dao/PalavraDAO.php';
				$dao = new PalavraDAO();
				$exec = $dao->listarFormatado();
		?>
		<link rel='stylesheet' href='/public/css/palavra.css' type='text/css'>
		<link rel='stylesheet' href='/public/css/palavras.css' type='text/css'>

		<div class='container'>
				<div class='title_head' style='background-image: linear-gradient(to bottom, rgba(20, 20, 20, .2) 0%, rgba(20, 20, 20, .2) 50%), url(/public/img/system/palavra.jpg);'>
						<div>Palavras</div>
						<p>A fé vem pela pregação, e a pregação, <br /> pela palavra de Cristo. <strong>Romanos 10:17</strong></p>
				</div>
				<div class='word_body'>
						<div class='word_content'>
								<div class='word_text'>
										<div class='title'>
												<span>Recentes</span>
										</div>
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
																<div>
																		<span>
																				<div class='lider' style='background-image: url(/public/img/lider/<?php echo $listar['img_lider'] ?>)'></div>
																				<?php echo $listar['encargo'].' '.$listar['lider'] ?>
																		</span>
																		<span>
																				<?php
																				if(file_exists($_SERVER['DOCUMENT_ROOT'].'/public/audio/'.$dao->formatarTitulo($listar['titulo']).'.mp3')) {?>
																					<i class='material-icons audio flex'>headset</i>
																				<?php } else {?>
																					<i class='material-icons audio flex'>file_copy</i>
																				<?php } ?>
																				<?php echo $listar['categoria'] ?>
																		</span>
																</div>
																<div><?php echo $listar['texto'] ?></div>
														</div>
												</div>
										<?php } ?>
								</div>
						</div>
						<!-- <div class='content_side'>
								<div class='title'>
										<span>Categorias</span>
								</div>
						</div> -->
				</div>
		</div>

		<script>slider($(".header a:eq(3)"))</script>