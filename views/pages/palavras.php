		<?php
	      $jsonUrl = $_SERVER['DOCUMENT_ROOT'].'/public/json/bible/neemias.json';
	      $jsonData = file_get_contents($jsonUrl, true);
	      $obj = json_decode($jsonData, true);
	  ?>
		<link rel='stylesheet' href='/public/css/palavras.css' type='text/css'>

		<div class='container'>
				<div class='word_header' style='background-image: linear-gradient(to bottom, rgba(20,20,20,.45) 0%,rgba(20,20,20,.45) 50%), url(/public/img/culto/ideas.png);'>
						<img style='display: none' src='/public/img/culto/ideas.png'></img>
						<div class='title'>A posição cristã em meio ao caos</div>
				</div>
				<div class='word_body'>
						<div class='word_content'>
								<div class='author'>
										<div class='img' style='background-image: url(/public/img/culto/photo.jpg);'></div>
										<div class='name'>Pr. Darcio Gonçalves</div>
										<div class='date'>27 de Maio de 2018</div>
								</div>
								<div class='word_text'>
										<div class='bible'>
												<p>Neemias 1</p>
												<?php for($chapter=1,$i=2;$i<=7;$i++) { ?>
												<p>
														<span class='verse'><?php echo $i."." ?></span>
														<?php echo $obj[$chapter-1][$chapter][$i] ?>
												</p>
												<?php } ?>
										</div>
										<p>Vivemos hoje um caos, não só com a greve dos caminhoneiros, mas com diversos tipos de problemas no nosso dia-a-dia, briga entre marido e mulher, filhos, drogas, suicídios, a corrupção, e se não fizermos nada, os muros continuarão caídos, a nossa casa, sociedade, continuará em ruinas. Como cristão você precisa assumir sua posição como luz em meio ao caos, Deus abriu os nossos olhos para trabalhar nessa obra de restauração</p>
										<h4>1 - Passe tempo orando sobre isso</h4>
										<p>O versículo 4 diz que Neemias sentou, chorou e jejuou, esse clamor a Deus foi por 4 meses. Tire tempo para clamar a Deus, jejue pela sua casa, ore para Deus guardar sua vida e as pessoas que você ama. Ore por seus pais caso ainda não sejam convertidos, ore pelos seus amigos de escola, de trabalho. Neemias ao saber do caos, dos muros em ruinas, foi orar, pedindo uma intervenção divina; ao saber do caos que vivemos hoje, não seja indiferente, ore pra que Deus intervenha de maneira poderosa. Continue clamando, Deus já esta se movendo.</p>
										<h4>2 - Se entristeça</h4>
										<div class='bible'>
												<p>Neemias 2</p>
												<?php for($chapter=2,$i=2;$i<=2;$i++) { ?>
												<p>
														<span class='verse'><?php echo $i."." ?></span>
														<?php echo $obj[$chapter-1][$chapter][$i] ?>
												</p>
												<?php } ?>
										</div>
										<p>O capítulo mostra que Neemias estava triste, há momentos em que precisamos admitir que esta tudo um caos, muitos fingem que esta tudo bem, mas um dia desmoronam. Não finja que esta feliz ou tudo bem. A vida não é só tristeza, mas tem dias que precisamos nos entristecer, por causa do pecado, da corrupção em nosso país. Devemos ficar tristes por aqueles que ainda não são convertidos e estão indo a passos largos para o inferno.</p>
										<h4>3 - Lembre-se: a mão do Senhor é conosco</h4>
										<div class='bible'>
												<p>Neemias 2</p>
												<?php for($chapter=2,$i=20;$i<=20;$i++) { ?>
												<p>
														<span class='verse'><?php echo $i."." ?></span>
														<?php echo $obj[$chapter-1][$chapter][$i] ?>
												</p>
												<?php } ?>
										</div>
										<p>Neemias se lembra que Deus estava com eles, Deus não se esquece do seu povo, Deus não nos deixou. A mão de Deus esta conosco hoje, mesmo em meio ao caos, Deus ainda tem poder de mudar totalmente a situação, se lembre disso.</p>
										<h4>4 - Você pode fazer a diferença em sua casa</h4>
										<p>Eles edificam o muro um ao lado dos outros, é na hora do caos que precisamos estar juntos, trabalhando para restaurar os muros, nossas diferenças não podem atrapalhar a obra. Alguns ficam brigando enquanto a sociedade, a família, estão um caos, pare com isso. Os muros foram levantados em 52 dias, mas Neemias gastou 12 anos restaurando as pessoas, porque restaurar gente é mais difícil do que restaurar muros. Investir em gente é muito mais nobre do que restaurar muros.</p>
										<h4>Pense: Qual foi a ultima vez que você reconheceu a mão de Deus?</h4>
								</div>
								<div class='line'></div>
								<div class='share'>
										<span>Compartilhe: </span>
										<a class='socicon socicon-facebook' target='_blank' onclick="window.open('https://www.facebook.com/sharer.php?s=100&p[url]=https://ibavmarilia.com/palavras','','height=612,width=580,toolbar=0,status=0,')"></a>
										<a class='socicon socicon-twitter' target='_blank' onclick='window.open("https://twitter.com/intent/tweet?text=<?php echo "A posição cristã em meio ao caos - https://ibavmarilia.com/palavras"; ?>","","height=612,width=700,toolbar=0,status=0,")'></a>
										<a class='socicon socicon-whatsapp' target='_blank' onclick='window.open("https://api.whatsapp.com/send?text=<?php echo "A posição cristã em meio ao caos - https://ibavmarilia.com/palavras"; ?>","","height=612,width=700,toolbar=0,status=0,")'></a>
								</div>
						</div>
						<div class='content_side'>
								<div class='title'>Mídia</div>
								<div class='button'>
										<div class='material-icons flex'>headset</div>
										<div class='vertical flex'>
												<span>OUVIR</span>
												<span>(57:20)</span>
										</div>
								</div>
								<div class='button'>
										<div class='material-icons flex'>save_alt</div>
										<div class='vertical flex'>
												<span>BAIXAR</span>
												<span>(39.8 MB)</span>
										</div>
								</div>
								<div class='button' id='print'>
										<div class='material-icons flex'>print</div>
										<div class='vertical flex'>
												<span>IMPRIMIR</span>
												<span>(Formato PDF)</span>
										</div>
								</div>
								<div class='title'>Mais lidas</div>
						</div>
				</div>
		</div>

		<script>
				var url = "/public/js/palavras.js";
				$.getScript(url);
				slider($(".header a:eq(3)"))
		</script>