<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Últimos Índices</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" href="../images/icon.png">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
				<div id="main">
				<button class="btn btn-mini btn-primary" type="button" action="../home/home.php"><a href="../home/home.php">Voltar ao Início</a></button>
			<br><br>
					<center><h1>Índices de Estrutura Capital</h1></center>
						<div><?php include "ipl.php"; ?></div>
				</div>
				<div><br></div>
				<div id="main">
			<br><br>
					<center><h1>Índices de Liquidez</h1></center>
						<div><?php include "liquidez.php"; ?></div>
				</div>
				<div><br></div>
				<div id="main">
			<br><br>
					<center><h1>Índices de Rentabilidade</h1></center>
						<div><?php include "rentabilidade.php"; ?></div>
				</div>

				<footer id="footer">
					<p class="copyright">&copy; Todos os direitos reservados || Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
				</footer>
			</div>
							<!-- Footer -->
				


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>