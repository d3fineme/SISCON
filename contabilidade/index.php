<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Identity by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
                            <form action="importCSV.php" method="post" enctype="multipart/form-data">
                                <div class="field">
                                    <h1>Inserir novos dados</h1>
                                    <h3>Selecione o arquivo csv:</h3>
                                    <input type = 'file' name = 'file' accept=".csv" required />
                                </div>
                                <ul class="actions">
                                    <li><button type="submit">Enviar</button></li>
                                </ul>
                            </form>
                            <br>
                            <a href="Modelo%20BP%20e%20DRE%20com%20pasta%20para%20envio%20para%20o%20site.xlsx">Arquivo Modelo para ser submetido</a>
						</header>
						<!--
						<hr />
						<h2>Extra Stuff!</h2>
						<hr />
						-->
						<footer>
							<ul class="icons">
							</ul>
						</footer>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>