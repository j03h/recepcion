<?php

include('sql.php');

session_start();

if (isset($_GET['keyword']) && isset($_GET['tabla'])) {
    $keyword = trim($_GET['keyword']) ;
    $keyword = mysql_real_escape_string($keyword);
    $tabla = trim($_GET['tabla']) ;
    $tabla = mysql_real_escape_string($tabla);
    $query = "SELECT * FROM control where " . $tabla . " like '%" . $keyword . "%'";
    $result = mysql_query($query);
    if ($result) {
        while ($row = mysql_fetch_array($result)) {
            if ($row['sale'] == "SALE") {
                $exit = "<img name=\"sale\" id=\"sale\" src=\"img/exit.png\" width=\"16px\" onclick=\"updateSale2('" . $row['id'] . "', '" . $_SESSION['username'] . "')\" />";
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
    } else {
        echo 'No Results for :"' . $_GET['keyword'] . '"';
    }
}

?>