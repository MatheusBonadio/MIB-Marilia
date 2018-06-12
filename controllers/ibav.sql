create database ibav;

use ibav;

Create table usuario (
	id_usuario Int NOT NULL AUTO_INCREMENT,
	login Varchar(20) NOT NULL,
	senha Varchar(32) NOT NULL,
	nome Varchar(80) NOT NULL,
	email Varchar(70) NOT NULL,
	cpf Varchar(14) NOT NULL,
	genero Char(1) NOT NULL,
	telefone Varchar(15) NOT NULL,
	foto Varchar(32) DEFAULT 'default.png',
	ativo Bit(1) DEFAULT 0,
	cep Varchar(8),
	estado Varchar(2),
	cidade Varchar(50),
	bairro Varchar(80),
	rua Varchar(80),
	numero Int,
 	Primary Key (id_usuario)
);

Create table inscricao (
	id_inscricao Int NOT NULL AUTO_INCREMENT,
	id_usuario Int NOT NULL,
	id_evento Int NOT NULL,
	id_lider Int NOT NULL,
	celula Int NOT NULL,
	data_pago Date NOT NULL,
 	Primary Key (id_inscricao)
);

Create table evento (
	id_evento Int NOT NULL AUTO_INCREMENT,
	nome Varchar(80) NOT NULL,
	data_inicio Date NOT NULL,
	data_termino Date NOT NULL,
	hora_inicio Varchar(15) NOT NULL,
	local Varchar(80) NOT NULL,
	coordernadas Varchar(30),
	img Varchar(20) NOT NULL,
 	Primary Key (id_evento)
);

Create table lider (
	id_lider Int NOT NULL AUTO_INCREMENT,
	id_usuario Int,
	id_encargo Int NOT NULL,
	nome Varchar(80) NOT NULL,
	rede Varchar(20),
 	Primary Key (id_lider)
);

Create table preletor (
	id_lider Int NOT NULL,
	id_evento Int NOT NULL
);

Create table encargo (
	id_encargo Int NOT NULL AUTO_INCREMENT,
	nome Varchar(30) NOT NULL,
	sigla Varchar(10) NOT NULL,
 	Primary Key (id_encargo)
);

Create table palavra (
	id_palavra Int NOT NULL AUTO_INCREMENT,
	id_lider Int NOT NULL,
	titulo Varchar(150) NOT NULL,
	titulo_dividido Varchar(200) NOT NULL,
	texto Text NOT NULL,
	data Date NOT NULL,
	img Varchar(20) NOT NULL,
 	Primary Key (id_palavra)
);

Create table selecionar_encargo (
	id_usuario Int NOT NULL,
	id_encargo Int NOT NULL
);

-- Table Encargo
INSERT INTO encargo(nome, sigla) VALUES('Pastor', 'Pr.');
INSERT INTO encargo(nome, sigla) VALUES('Discipulador', 'Dis.');

-- Table Líder
INSERT INTO lider(id_encargo, nome) VALUES(1, 'Darcio Gonçalves');
INSERT INTO lider(id_encargo, nome) VALUES(2, 'Victor Paio');

-- Table Palavra
INSERT INTO palavra(id_lider, titulo, titulo_dividido, texto, data, img) VALUES(1, 'A posição cristã em meio ao caos', "<p>A posição cristã em</p><strong>meio ao caos</strong>","<div class='bible'><p>Neemias 1</p><p><span class='verse'>2.</span> veio Hanani, um de meus irmãos, com alguns de Judá; então, lhes perguntei pelos judeus que escaparam e que não foram levados para o exílio e acerca de Jerusalém.</p><p><span class='verse'>3.</span> Disseram-me: Os restantes, que não foram levados para o exílio e se acham lá na província, estão em grande miséria e desprezo; os muros de Jerusalém estão derribados, e as suas portas, queimadas.</p><p><span class='verse'>4.</span> Tendo eu ouvido estas palavras, assentei-me, e chorei, e lamentei por alguns dias; e estive jejuando e orando perante o Deus dos céus.</p><p><span class='verse'>5.</span> E disse: ah! Senhor, Deus dos céus, Deus grande e temível, que guardas a aliança e a misericórdia para com aqueles que te amam e guardam os teus mandamentos!</p><p><span class='verse'>6.</span> Estejam, pois, atentos os teus ouvidos, e os teus olhos, abertos, para acudires à oração do teu servo, que hoje faço à tua presença, dia e noite, pelos filhos de Israel, teus servos; e faço confissão pelos pecados dos filhos de Israel, os quais temos cometido contra ti; pois eu e a casa de meu pai temos pecado.</p><p><span class='verse'>7.</span> Temos procedido de todo corruptamente contra ti, não temos guardado os mandamentos, nem os estatutos, nem os juízos que ordenaste a Moisés, teu servo.</p></div>                    <p>Vivemos hoje um caos, não só com a greve dos caminhoneiros, mas com diversos tipos de problemas no nosso dia-a-dia, briga entre marido e mulher, filhos, drogas, suicídios, a corrupção, e se não fizermos nada, os muros continuarão caídos, a nossa casa, sociedade, continuará em ruinas. Como cristão você precisa assumir sua posição como luz em meio ao caos, Deus abriu os nossos olhos para trabalhar nessa obra de restauração</p>
                    <h4>1 - Passe tempo orando sobre isso</h4>
                    <p>O versículo 4 diz que Neemias sentou, chorou e jejuou, esse clamor a Deus foi por 4 meses. Tire tempo para clamar a Deus, jejue pela sua casa, ore para Deus guardar sua vida e as pessoas que você ama. Ore por seus pais caso ainda não sejam convertidos, ore pelos seus amigos de escola, de trabalho. Neemias ao saber do caos, dos muros em ruinas, foi orar, pedindo uma intervenção divina; ao saber do caos que vivemos hoje, não seja indiferente, ore pra que Deus intervenha de maneira poderosa. Continue clamando, Deus já esta se movendo.</p>
                    <h4>2 - Se entristeça</h4>
                    <div class='bible'><p>Neemias 2</p><p><span class='verse'>2.</span> O rei me disse: Por que está triste o teu rosto, se não estás doente? Tem de ser tristeza do coração. Então, temi sobremaneira</p></div>                    <p>O capítulo mostra que Neemias estava triste, há momentos em que precisamos admitir que esta tudo um caos, muitos fingem que esta tudo bem, mas um dia desmoronam. Não finja que esta feliz ou tudo bem. A vida não é só tristeza, mas tem dias que precisamos nos entristecer, por causa do pecado, da corrupção em nosso país. Devemos ficar tristes por aqueles que ainda não são convertidos e estão indo a passos largos para o inferno.</p>
                    <h4>3 - Lembre-se: a mão do Senhor é conosco</h4>
                    <div class='bible'><p>Neemias 2</p><p><span class='verse'>20.</span> Então, lhes respondi: o Deus dos céus é quem nos dará bom êxito; nós, seus servos, nos disporemos e reedificaremos; vós, todavia, não tendes parte, nem direito, nem memorial em Jerusalém.</p></div>                    <p>Neemias se lembra que Deus estava com eles, Deus não se esquece do seu povo, Deus não nos deixou. A mão de Deus esta conosco hoje, mesmo em meio ao caos, Deus ainda tem poder de mudar totalmente a situação, se lembre disso.</p>
                    <h4>4 - Você pode fazer a diferença em sua casa</h4>
                    <p>Eles edificam o muro um ao lado dos outros, é na hora do caos que precisamos estar juntos, trabalhando para restaurar os muros, nossas diferenças não podem atrapalhar a obra. Alguns ficam brigando enquanto a sociedade, a família, estão um caos, pare com isso. Os muros foram levantados em 52 dias, mas Neemias gastou 12 anos restaurando as pessoas, porque restaurar gente é mais difícil do que restaurar muros. Investir em gente é muito mais nobre do que restaurar muros.</p>
                    <h4>Pense: Qual foi a ultima vez que você reconheceu a mão de Deus?</h4>
", '2018-05-27', 'ideas.png');

INSERT INTO palavra(id_lider, titulo, titulo_dividido, texto, data, img) VALUES(1, 'Em Deus faremos grandes proezas', "<p>Em Deus faremos</p><strong>grandes proezas</strong>", "<div class='bible'><p>Salmos 60</p><p><span class='verse'>9.</span> Quem me conduzirá à cidade fortificada? Quem me guiará até Edom?</p><p><span class='verse'>10.</span> Não nos rejeitaste, ó Deus? Tu não sais, ó Deus, com os nossos exércitos!</p><p><span class='verse'>11.</span> Presta-nos auxílio na angústia, pois vão é o socorro do homem.</p><p><span class='verse'>12.</span> Em Deus faremos proezas, porque ele mesmo calca aos pés os nossos adversários.</p></div>
    <p>Você entender que foi chamado por Deus a fazer proezas é essencial para sua vida cristã. Muitos na bíblia foram chamados a proeza: Davi, Israel e tantos outros. Mas nós também fomos chamados. Proeza significa força, habilidade e eficiência e em Deus, como diz o versículo, faremos tudo isso. Deus nos capacitará. Ser chamado a grandeza não é ter dinheiro, carro, roupas ou muitos bens, mas usar o seu potencial para ir além, usar os dons e talentos em nossas vidas, isso é grandeza e assim faremos proezas. Somos chamados a fazer grandes proezas em Deus.</p>

    <h4>1 - Ele nos conduz e nos auxilia (verso 9)</h4>

    <p>Davi sabia que seus recursos eram limitados, e sabia que por ele não conseguiria chegar até lá. Apesar de tantas vitórias, Davi não ficou autoconfiante, mas sua confiança em Deus aumentou, Davi sabia que em Deus ele poderia ser conduzido até a vitória. Muitas vezes você olha para sua vida, muitos problemas e se depara com uma dificuldade que só diminui você. Nesse momento Deus quer nos levar a parar de olhar para nós, e dizer: em Deus vencerei.</p>

    <div class='bible'><p>Marcos 5</p><p><span class='verse'>25.</span> Aconteceu que certa mulher, que, havia doze anos, vinha sofrendo de uma hemorragia</p><p><span class='verse'>26.</span> e muito padecera à mão de vários médicos, tendo despendido tudo quanto possuía, sem, contudo, nada aproveitar, antes, pelo contrário, indo a pior,</p><p><span class='verse'>27.</span> tendo ouvido a fama de Jesus, vindo por trás dele, por entre a multidão, tocou-lhe a veste.</p><p><span class='verse'>28.</span> Porque, dizia: Se eu apenas lhe tocar as vestes, ficarei curada.</p><p><span class='verse'>29.</span> E logo se lhe estancou a hemorragia, e sentiu no corpo estar curada do seu flagelo.</p><p><span class='verse'>30.</span> Jesus, reconhecendo imediatamente que dele saíra poder, virando-se no meio da multidão, perguntou: Quem me tocou nas vestes?</p><p><span class='verse'>31.</span> Responderam-lhe seus discípulos: Vês que a multidão te aperta e dizes: Quem me tocou?</p><p><span class='verse'>32.</span> Ele, porém, olhava ao redor para ver quem fizera isto.</p><p><span class='verse'>33.</span> Então, a mulher, atemorizada e tremendo, cônscia do que nela se operara, veio, prostrou-se diante dele e declarou-lhe toda a verdade.</p><p><span class='verse'>34.</span> E ele lhe disse: Filha, a tua fé te salvou; vai-te em paz e fica livre do teu mal.</p></div>
    <p>A mulher do fluxo de sangue utilizou todos os seus recursos, quando ela percebeu que era o fim, foi ai que Jesus curou e ela viveu proezas. Você precisa ter em seu coração que viverá grandes proezas, então não se limite, não tenha mente de escravo, não se limite pelos seus recursos ou capacidade. Creia em Deus e você viverá grandes proezas.</p>

    <h4>2 - Não é o socorro dos homens (verso 11)</h4>

    <p>Davi sabia que o socorro dele vinha de Deus e não dos homens. Davi não colocou sua confiança nos seus braços ou nos braços de outro homem, pois sabia que tudo isso seria vão. O povo que conhece e confia em Deus se tornará forte e fará proezas.</p>

    <div class='bible'><p>Daniel 11</p><p><span class='verse'>32.</span> Aos violadores da aliança, ele, com lisonjas, perverterá, mas o povo que conhece ao seu Deus se tornará forte e ativo.</p></div>
    <p>A auto confiança era algo que Davi não tinha nesse momento, ele não pedia auxilio de homens, nem mais recursos, mas ele sabia que quem prestaria auxílio e socorreria seria o Senhor. Deus coloca as pessoas para nos abençoar, creia nisso, mas nos momentos de precisão, de angustia, dor e luta não necessitamos somente de intervenção humana, mas sim de intervenção divina. Pessoas nos abençoam e também podemos abençoar, mas a única saída é confiar em Deus e fazer grandes proezas.</p>

    <h4>3 - Nele faremos proezas (verso 12)</h4>

    <p>O que é proeza para você? Enfrentar as dificuldades com família, trabalho ou ministério. Você precisa de força ou habilidade em qual área da sua vida? O que te faz parar, o que te fez parar e o que você ainda está parado? Para cada um é diferente, é preciso encarar cada situação em nossa vida, sabendo que Deus nos conduzirá a vitória e a conquista. Você precisa se arriscar em Deus, sair da zona de conforto e ir além daquilo que você já conquistou e conquistar ainda mais coisas e muitas proezas em Deus. Proeza é realizar e enfrentar situações que não podemos resolver sabendo que o Senhor vai nos capacitar, mas para viver coisas grandes você precisa deixar para trás sua frustrações, e encarar os problemas, saber lidar com as situações crendo que em Deus você passará por tudo isso. Creia em Deus e realize grandes proezas.</p>

    <h4>O que tem parado você?</h4>
    <h4>Você tem confiado em Deus ou tem colocado a confiança nos homens?</h4>
    <h4>Você crê que Deus vai te conduzir a realizar grandes proezas?</h4>
", '2018-05-20', 'proeza.jpeg');