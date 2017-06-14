<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Editorial by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" href="../images/icon.png">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {packages: ['corechart', 'line']});
			google.charts.setOnLoadCallback(drawBasic);

			function drawBasic() {

			      var data = new google.visualization.DataTable();
			      data.addColumn('number', 'X');
			      data.addColumn('number', 'Lucro');

			      data.addRows([
			        [1, <?php echo rand();?>],   [2, <?php echo rand();?>],  [3, <?php echo rand();?>],  [4, <?php echo rand();?>],  [5, <?php echo rand();?>],
			        [6, <?php echo rand();?>]
			      ]);

			      var options = {
			        hAxis: {
			          title: 'Mês'
			        },
			        vAxis: {
			          title: 'Lucro'
			        }
			      };

			      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

			      chart.draw(data, options);
			    }
		</script>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="home.html" class="logo"><strong>Sistema de</strong> Contabilidade</a>
									<b align="right">Felipe Jonas Samantha dos Santos</b>
								</header>

							<!-- Banner -->
								<div class="row"> <!-- 6 + 6 = 12 -->
    								<div class="6u 12u$(small)">
												<center><h3>Saldo atual</h3></center>
												<br><br>
												<p>Total de despesas - R$2.000.000,00</p>
												<p>Total de lucro - R$5.000.000,00</p>
												Caixa<h3><p>R$3.000.000,00</p></h3>
									</div>
									<div class="6u 12u$(small)">
									<h3><center>Lucro dos ultimos seis meses</center></h3>
									<center><div id="chart_div"></div></center>
									</div>
								</div>
								<br>
								<div class="row"> <!-- 6 + 6 = 12 -->
    								<div class="12u 12u$(small)">
												<center><h3>Lançamentos Futuros (30 dias)</h3></center>
												<table>
															<thead>
																<tr>
																	<th>Transação</th>
																	<th>Descrição</th>
																	<th>Valor</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Compra Mercadoria</td>
																	<td>Compra de 2.500 peças.</td>
																	<td>R$5.000,00</td>
																</tr>
																<tr>
																	<td>Duplicata a receber</td>
																	<td>Empréstimo de sócio</td>
																	<td>R$1.300,00</td>
																</tr>
																<tr>
																	<td>Item3</td>
																	<td> Morbi faucibus arcu accumsan lorem.</td>
																	<td>29.99</td>
																</tr>
																<tr>
																	<td>Item4</td>
																	<td>Vitae integer tempus condimentum.</td>
																	<td>19.99</td>
																</tr>
																<tr>
																	<td>Item5</td>
																	<td>Ante turpis integer aliquet porttitor.</td>
																	<td>29.99</td>
																</tr>
															</tbody>
															<tfoot>
																<tr>
																	<td colspan="2"></td>
																	<td>100.00</td>
																</tr>
															</tfoot>
														</table>
											</div>
								</div>
						</div>
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
										<li><a href="home.php">Início</a></li>
										<li><a href="#">Índices</a></li>
										<li><a href="#">Gerar Relatórios</a></li>
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