<html>
	<head>
		<title>Control de Ingreso * Graneles del Sur</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
		<script src="inc/jquery-latest.js"></script>
		<script src="inc/functions.js"></script>
	</head>
	<body onload="reloj()">
		<div class="content" align="center">
			<div class="content2" align="center">
				<div class="header" align="center">
					<div class="logo" align="center"><img src="img/lgdelsur.jpg" height="75px"/></div>
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
						<p class="clock" id="clock"></p>
				</div>
				<div class="form" align="center">
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<input type="hidden" name="oform" value="1">
						<table width="400px">
							<tr>
								<td><input type="text" id="userr" class="userr" name="userr" /></td>
							</tr>
							<tr align="center" >
								<td id="tr_cap">usuario</td>
							</tr>
							<tr>
								<td><input type="password" id="passs" class="passs" name="passs" autocomplete="off"/></td>
							</tr>
							<tr align="center" >
								<td id="tr_cap">password</td>
							</tr>
							<tr>
								<td align="center"><span style="color:Red;" id="error"></span></td>
							</tr>
							<tr>
								<td><input type="submit" id="lbut" name="submit" value="INGRESAR" /></td>
							</tr>
						</table>
						<?php if ($logout=="yes") { echo ("<br>Sistema cerrado exitosamente..."); } ?>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php

$logout = $_GET['logout'];
if ($logout == "yes") { //destroy the session
	session_start();
	$_SESSION = array();
	session_destroy();
	$redir = "Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/";
	header($redir);
}

if ($_POST["oform"]) {
	$username = strtoupper($_POST["userr"]);
	$password = $_POST["passs"];
	if ($username != NULL && $password != NULL) {
		include("inc/adLDAP/src/adLDAP.php");
		try {
			$adldap = new adLDAP();
		}
		catch (adLDAPException $e) {
			echo $e;
			exit();
		}

		if ($adldap->authenticate($username, $password)){
			$uinfo = $adldap->user()->info($username);
			$group = ($uinfo['0']['memberof']);

			foreach($group as $grp){
				if (preg_match("/Auditoria Interna/i", $grp) || preg_match("/Secretaría/i", $grp)) {
					session_start();
					$_SESSION['start'] = time();
					$_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ; // 30 minutos...
					$_SESSION["username"] = $username;
					$_SESSION["userinfo"] = $adldap->user()->info($username);
					$redir = "Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/recepcion.php";
					header($redir);
					exit;
				}
			}
			echo "<script>document.getElementById('error').innerHTML = 'No estas autorizado a utiizar esta aplicacion...';</script>";
		}
		else {
			echo "<script>document.getElementById('error').innerHTML = 'Nombre de usuario o password incorrectos...';</script>";
		}
	}
	else {
		echo "<script>document.getElementById('error').innerHTML = 'Debe ingresar nombre de usuario y password...';</script>";
	}
}

?>