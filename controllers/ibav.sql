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
INSERT INTO palavra(id_lider, titulo, texto, data, img) VALUES(1, 'A posição cristã em meio ao caos', "<div class='bible'>
                        <p>Neemias 1</p>
                                                <p>
                            <span class='verse'>2.</span>
                            que veio Hanâni, um de meus irmãos, com alguns de Judá; e perguntei-lhes pelos judeus que tinham escapado e que restaram do cativeiro, e acerca de Jerusalém.                        </p>
                                                <p>
                            <span class='verse'>3.</span>
                            Eles me responderam: Os restantes que ficaram do cativeiro, lá na província estão em grande aflição e opróbrio; também está derribado o muro de Jerusalém, e as suas portas queimadas a fogo.                        </p>
                                                <p>
                            <span class='verse'>4.</span>
                            Tendo eu ouvido estas palavras, sentei-me e chorei, e lamentei por alguns dias; e continuei a jejuar e orar perante o Deus do céu,                        </p>
                                                <p>
                            <span class='verse'>5.</span>
                            e disse: Ó Senhor, Deus do céu, Deus grande e temível, que guardas o pacto e usas de misericórdia para com aqueles que te amam e guardam os teus mandamentos:                        </p>
                                                <p>
                            <span class='verse'>6.</span>
                            Estejam atentos os teus ouvidos e abertos os teus olhos, para ouvires a oração do teu servo, que eu hoje faço perante ti, dia e noite, pelos filhos de Israel, teus servos, confessando eu os pecados dos filhos de Israel, que temos cometido contra ti; sim, eu e a casa de meu pai pecamos;                        </p>
                                                <p>
                            <span class='verse'>7.</span>
                            na verdade temos procedido perversamente contra ti, e não temos guardado os mandamentos, nem os estatutos, nem os juízos, que ordenaste a teu servo Moisés.                        </p>
                                            </div>
                    <p>Vivemos hoje um caos, não só com a greve dos caminhoneiros, mas com diversos tipos de problemas no nosso dia-a-dia, briga entre marido e mulher, filhos, drogas, suicídios, a corrupção, e se não fizermos nada, os muros continuarão caídos, a nossa casa, sociedade, continuará em ruinas. Como cristão você precisa assumir sua posição como luz em meio ao caos, Deus abriu os nossos olhos para trabalhar nessa obra de restauração</p>
                    <h4>1 - Passe tempo orando sobre isso</h4>
                    <p>O versículo 4 diz que Neemias sentou, chorou e jejuou, esse clamor a Deus foi por 4 meses. Tire tempo para clamar a Deus, jejue pela sua casa, ore para Deus guardar sua vida e as pessoas que você ama. Ore por seus pais caso ainda não sejam convertidos, ore pelos seus amigos de escola, de trabalho. Neemias ao saber do caos, dos muros em ruinas, foi orar, pedindo uma intervenção divina; ao saber do caos que vivemos hoje, não seja indiferente, ore pra que Deus intervenha de maneira poderosa. Continue clamando, Deus já esta se movendo.</p>
                    <h4>2 - Se entristeça</h4>
                    <div class='bible'>
                        <p>Neemias 2</p>
                                                <p>
                            <span class='verse'>2.</span>
                            E o rei me disse: Por que está triste o teu rosto, visto que não estás doente? Não é isto senão tristeza de coração. Então temi sobremaneira.                        </p>
                                            </div>
                    <p>O capítulo mostra que Neemias estava triste, há momentos em que precisamos admitir que esta tudo um caos, muitos fingem que esta tudo bem, mas um dia desmoronam. Não finja que esta feliz ou tudo bem. A vida não é só tristeza, mas tem dias que precisamos nos entristecer, por causa do pecado, da corrupção em nosso país. Devemos ficar tristes por aqueles que ainda não são convertidos e estão indo a passos largos para o inferno.</p>
                    <h4>3 - Lembre-se: a mão do Senhor é conosco</h4>
                    <div class='bible'>
                        <p>Neemias 2</p>
                                                <p>
                            <span class='verse'>20.</span>
                            Então lhes respondi: O Deus do céu é que nos fará prosperar; e nós, seus servos, nos levantaremos e edificaremos: mas vós não tendes parte, nem direito, nem memorial em Jerusalém.                        </p>
                                            </div>
                    <p>Neemias se lembra que Deus estava com eles, Deus não se esquece do seu povo, Deus não nos deixou. A mão de Deus esta conosco hoje, mesmo em meio ao caos, Deus ainda tem poder de mudar totalmente a situação, se lembre disso.</p>
                    <h4>4 - Você pode fazer a diferença em sua casa</h4>
                    <p>Eles edificam o muro um ao lado dos outros, é na hora do caos que precisamos estar juntos, trabalhando para restaurar os muros, nossas diferenças não podem atrapalhar a obra. Alguns ficam brigando enquanto a sociedade, a família, estão um caos, pare com isso. Os muros foram levantados em 52 dias, mas Neemias gastou 12 anos restaurando as pessoas, porque restaurar gente é mais difícil do que restaurar muros. Investir em gente é muito mais nobre do que restaurar muros.</p>
                    <h4>Pense: Qual foi a ultima vez que você reconheceu a mão de Deus?</h4>
", '2018-05-27', 'ideas.png');