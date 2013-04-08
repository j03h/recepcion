<?php
//session_start();

if (!isset($_COOKIE["username"])) {
    echo "Ingrese nuevamente por favor.";
    header("Location: index.php");
}

include("inc/sql.php");
include("inc/adLDAP/src/adLDAP.php");

?>
<html>
	<head>
		<title>Control de Ingreso * Graneles del Sur</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=9" >
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>

		<script src="inc/jquery-latest.js"></script>
		<script src="inc/jquery.Rut.js"></script>
		<script src="inc/jquery.Form.js"></script>
		<script src="inc/jquery.Numeric.js"></script>
		<script src="inc/functions.js"></script>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>


		<script type="text/javascript">
		$(document).ready(function() {
			$('#rform').ajaxForm({
				target: '#tabla1',
				success: function() {
					$('#rform').resetForm();
					$('#tabla1').fadeIn('slow');
				}
			});
		});
		function updateSale(id, user) {
			$.get('inc/tabla.php?updateSale&id=' + id + '&user=' + user);
			$("#tabla1").load("inc/tabla.php")
		}
		</script>
	</head>
	<body onload="reloj()">
		<div class="content" align="center">
			<div class="content2" align="center">
				<div class="header" align="center">
					<div class="logo" align="center"><img src="img/lgdelsur.jpg" height="65px"/></div>
					<div class="uinfo" align="right"><?php echo $_COOKIE["username"]; ?></div>
					<div class="info" align="right"><a href="recepcion.php"><img title="Refrescar" src="img/refresh.png" width="30px"  /></a> <a href="reporte.php"><img title="Reporte" src="img/table.png" width="30px"  /></a> <a href="index.php?logout=yes"><img title="Salir" src="img/exit.png" width="29px"  /></a></div>
				</div>
				<div class="fecha" align="center">
					<script type="text/javascript">
							document.write(dias[ahora.getDay()])
							document.write(", ")
							document.write(ahora.getDate())
							document.write(" de ")
							document.write(mes[ahora.getMonth()])
							document.write(" de ")
							document.write(ahora.getFullYear())
						</script>
						<p class="clock" id="clock">... cargando reloj ...</p>
				</div>
				<div class="form" align="center">

					<form id="rform" name="rform" action="inc/tabla.php" method="post">
						<table width="400px">
							<tr>
								<td><input type="text" id="rut" name="rut" value="RUT VISITA" /></td>
							</tr>
							<tr>
								<td><input type="text" id="nvis" name="nvis" value="NOMBRE VISITA" /></td>
							</tr>
							<tr>
								<td><input type="text" id="nanf" name="nanf" value="NOMBRE ANFITRION" /></td>
							</tr>
							<tr>
								<td><input type="text" id="mvis" name="mvis" value="MOTIVO VISITA" /></td>
							</tr>
							<tr>
								<td><input type="text" id="vobs" name="vobs" value="OBSERVACIONES" /></td>
							</tr>
							<tr>
								<td><input type="submit" id="vbut" name="vbut" value="INGRESAR" /></td>
							</tr>
						</table>
					</form>
				</div>
				<div id="tabla1" class="tabla1" align="center">
					<?php include("inc/tabla.php");?>
				</div>
			</div>
		</div>
	</body>
</html>