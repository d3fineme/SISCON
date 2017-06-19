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
						<center><h3>Índices de Estrutura Capital</h3></center>
						<div class="row"> <!-- 4 + 4 + 4 = 12 -->
    						<div class="4u 12u$(small)">
								<div><?php include "pct.php"; ?></div>
							</div>
							<div class="4u 12u$(small)">
								<div><?php include "end.php"; ?></div>
							</div>
							<div class="4u 12u$(small)">
								<div><?php include "ipl.php"; ?></div>
							</div>
						</div>
						<center><h3>Índices de Liquidez</h3></center>
						<div class="row"> <!-- 4 + 4 + 4 = 12 -->
    						<div class="4u 12u$(small)">
								<div><?php include "pct.php"; ?></div>
							</div>
							<div class="4u 12u$(small)">
								<div><?php include "end.php"; ?></div>
							</div>
							<div class="4u 12u$(small)">
								<div><?php include "pct.php"; ?></div>
							</div>
						</div>
                        <iframe src="../contabilidade/indices.php" style="border: 0; width: 100%; height: 100%"></iframe>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<!-- <section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section> -->

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
                                        <li><a href="home.php">Consultar últimos índices</a></li>
                                        <li><a href="historico.php">Consultar histórico de índices</a></li>
                                        <li><a href="inserirCSV.php">Inserir Dados</a></li>
                                        <li><a href="removerDados.php">Remover Dados Inseridos</a></li>
										<ul>
											<li><a href="../index.html" align="right">Sair</a></li>
										</ul>
									</ul>
								</nav>

							<!-- Section -->


							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Todos os direitos reservados || Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>