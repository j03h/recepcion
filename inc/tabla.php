<?php

include("sql.php");
//session_start();
if (!empty($_GET) && isset($_GET)) {
    if (isset($_GET['updateSale']) && isset($_GET['id'])) {
        $hora = date("H:i:s");
        $id = mysql_real_escape_string($_GET['id']);
        $user = mysql_real_escape_string($_GET['user']);
        $sql = "UPDATE control
		SET sale='$hora',
		user_sale='$user'
		WHERE id='$id'
		";
        $result = mysql_query($sql);

        if (!$result) {
            echo "ERROR";
        }else {
        }
    }
}

if (!empty($_POST) && isset($_POST)) {

    $fecha = date("d-m-Y");
    $hora = date("H:i:s");
    $user = $_COOKIE["username"];
    $rut = mysql_real_escape_string($_POST['rut']);
    $nvis = mysql_real_escape_string($_POST['nvis']);
    $nanf = mysql_real_escape_string($_POST['nanf']);
    $mvis = mysql_real_escape_string($_POST['mvis']);
    $vobs = mysql_real_escape_string($_POST['vobs']);
    $sale = "SALE";

    if ($rut == "RUT VISITA") {
        $rut = "[SIN RUT]";
    }

    if ($nvis == "NOMBRE VISITA") {
        $nvis = "[SIN NOMBRE VISITA]";
    }

    if ($nanf == "NOMBRE ANFITRION") {
        echo "<script>alert('" . $user . ", debes ingresar el nombre de un anfitrion')</script>";
        die("Ingrese un nombre de Anfitrion...");
    }

    if ($mvis == "MOTIVO VISITA") {
        echo "<script>alert('" . $user . ", debes ingresar un motivo de visita')</script>";
        die("Ingrese un motivo de visita...");
    }

    if ($vobs == "OBSERVACIONES") {
        $vobs = "[SIN OBSERVACIONES]";
    }

    $sql = "
		INSERT INTO control
		SET
		fecha = '$fecha',
		hora = '$hora',
		usuario = '$user',
		rut = '$rut',
		nombrev = '$nvis',
		nombrea = '$nanf',
		motivo = '$mvis',
		obs = '$vobs',
		sale = '$sale'";
    $result = mysql_query($sql);

    if (!$result) {
        echo "ERROR AL INSERTAR REGISTRO";
    }else {
    }
}

?>


<div class="tabla22">
	<table class="tabla2" border="0" width="100%">
		<tr class="tr1">
			<td width="10%">FECHA</td>
			<td width="6%">HORA</td>
			<td width="8%">USUARIO</td>
			<td width="10%">RUT VISITA</td>
			<td width="18%">NOMBRE VISITA</td>
			<td width="18%">NOMBRE ANFITRION</td>
			<td width="19%">MOTIVO VISITA</td>
			<td width="6%">SALE</td>
		</tr>
<?php
$exit = "";
$exit2 = "";
$sql = "SELECT * FROM control ORDER BY id DESC LIMIT 10";
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {
    if ($row['sale'] == "SALE") {
        $exit = "<img name=\"sale\" id=\"sale\" src=\"img/exit.png\" width=\"16px\" onclick=\"updateSale('" . $row['id'] . "', '" . $_COOKIE["username"] . "')\" />";
        $exit2 = "SIN SALIDA";
        $euser = "SIN SALIDA";
    }else {
        $exit = $row['sale'];
        $exit2 = $row['sale'];
        $euser = $row['user_sale'];
    }

    ?>
	<tr title="<?php echo "ID\t\t\t\t: " . $row['id'] . "\nFECHA\t\t\t: " . $row['fecha'] . "\nHORA\t\t\t: " . $row['hora'] . "\nUSUARIO\t\t: " . $row['usuario'] . "\nRUT V\t\t\t: " . $row['rut'] . "\nNOMBRE V \t\t: " . $row['nombrev'] . "\nNOMBRE A\t\t: " . $row['nombrea'] . "\nMOTIVO\t\t\t: " . $row['motivo'] . "\nOBSERVACION\t: " . $row['obs'] . "\nSALIDA\t\t\t: " . $exit2 . "\nUSUARIO SALIDA\t: " . $euser; ?>">
		<td width="10%"><?php echo $row['fecha']; ?></td>
		<td width="6%"><?php echo $row['hora']; ?></td>
		<td width="8%"><?php echo $row['usuario']; ?></td>
		<td width="10%"><?php echo $row['rut']; ?></td>
		<td width="18%"><?php echo $row['nombrev']; ?></td>
		<td width="18%"><?php echo $row['nombrea']; ?></td>
		<td width="19%"><?php echo $row['motivo']; ?></td>
		<td width="6%"><?php echo $exit; ?></td>
	</tr>
<?php
}

?>
	</table>
</div>