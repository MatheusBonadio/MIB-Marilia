<?php
	$con = mysqli_connect("localhost", "root", "");
	//$con = mysqli_connect("localhost", "id4649026_root", "root1");
	mysqli_set_charset($con, "utf8");
	$data = '2018-04-29 19:00:00';
	$sql = "SELECT
		(select UNIX_TIMESTAMP('$data') - UNIX_TIMESTAMP(now())) as seconds";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <meta name='theme-color' content='#141414'>
    <meta charset='UTF-8'>
    <title>Line UP | IBAV Marília</title>
    <meta content='width=device-width, initial-scale=0.8, maximum-scale=0.8, user-scalable=0' name='viewport' />
    <link rel='shortcut icon' href='/public/img/sistema/icon.png' type='image/x-icon'>
    <link rel='stylesheet' href='/public/css/index.css' type='text/css'>
    <link rel='stylesheet' href='/public/css/evento.css' type='text/css'>
    <script src='/public/js/evento.js'></script>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6BVXJiYoaqxXa2TCBknaf7xq7tuxbt-Y"></script>
</head>

<script>
	var seconds = parseInt("<?php echo $row['seconds'] ?>");
	var countDownDate = new Date(seconds).getTime();
	var countDownDate = parseInt(countDownDate);
	$(function(){
		countDown();
	})
	setInterval(countDown, 1000);
</script>
<body>
	<div class='menu'>

		<div class='block' style='background-color: #2d2d2d' onclick='choose_menu("lecturer", 0, this)'>
			<div class='link'>
				<div class='text'>
					<span class='material-icons'>group</span>
					<div class='icon material-icons'>group</div>
				</div>
				<div class='text'>Preletores</div>
			</div>
		</div>
		<div class='block' style='background-color: #393939' onclick='choose_menu("local", 1, this)'>
			<div class='link'>
				<div class='text'>
					<span class='material-icons'>place</span>
					<div class='icon material-icons'>place</div>
				</div>
				<div class='text'>Local</div>
			</div>
		</div>
		<div class='block' style='background-color: #454545'></div>
		<div class='block' style='background-color: #454545' onclick='choose_menu("home", 3, this)' id='active'>
			<div class='link'>
				<div class='text'>
					<span class='material-icons'>home</span>
					<div class='icon material-icons'>home</div>
				</div>
				<div class='text'>Home</div>
			</div>
		</div>

	</div>

	<div class='content' id='home'>
		<div class='container'>
			<div class='countdown flex'>
				<div class='num'>
					<span id='dia'>00</span>
					<label>DIAS</label>
				</div>
				<div class='num'>
					<span id='hor'>00</span>
					<label>HRS</label>
				</div>
				<div class='num'>
					<span id='min'>00</span>
					<label>MIN</label>
				</div>
				<div class='num'>
					<span id='seg'>00</span>
					<label>SEG</label>
				</div>
			</div>
			<div class='login'>Login</div>
		</div>
	</div>

	<div class='content' id='lecturer'>
		<div class='container'>

		</div>
	</div>

	<div class='content' id='local'>
		<div class='container' id='map'></div>
		<div class='card'>Rua ninfa pietraroia, 628 – Palmital</div>
	</div>
</body>