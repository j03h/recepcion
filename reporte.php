<?php
session_start();

if (!isset($_SESSION["username"])) {
    echo "Ingrese nuevamente por favor.";
    header("Location: index.php");
}

$now = time();

if ($now > $_SESSION['expire']) {
    session_destroy();
    echo "Su sesion a expirado ! <a href='index.php'>Ingrese nuevamente</a>";
    exit;
}

include("inc/sql.php");
include("inc/adLDAP/src/adLDAP.php");

?>
<html>
	<head>
		<title>Control de Ingreso * Graneles del Sur</title>
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=9" >
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
		<script src="inc/jquery-latest.js"></script>
		<script type="text/javascript">
			function updateSale2(id) {
				$.get('inc/tabla.php?updateSale&id=' + id);
				$("#tabla1").load("inc/tabla_repo.php")
			}
		</script>
	</head>
	<body>
		<div class="content" align="center">
			<div class="content2" align="center">
				<div class="header" align="center">
					<div class="logo" align="center"><img src="img/lgdelsur.jpg" height="75px"/></div>
					<div class="info" align="right"><a href="reporte.php"><img title="Refrescar" src="img/refresh.png" width="30px"  /></a> <a href="recepcion.php"><img title="Ingreso" src="img/in.png" width="30px"  /></a> <a href="index.php?logout=yes"><img title="Salir" src="img/exit.png" width="29px"  /></a></div>
				</div>
				<div id="tabla1" class="tabla1" align="center">
					<?php include("inc/tabla_repo.php");?>
				</div>
			</div>
		</div>
	</body>
</html>

?>