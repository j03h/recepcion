<?php

include('sql.php');

if (!empty($_GET) && isset($_GET)) {
	if (isset($_GET['updateSale']) && isset($_GET['id'])) {
		$hora = date("H:i:s");
		$id = mysql_real_escape_string($_GET['id']);
		$userr = mysql_real_escape_string($_GET['user']);
		$sql = "UPDATE control
		SET sale='$hora',
		user_sale='$userr'
		WHERE id='$id'
		";
		$result = mysql_query($sql);

		if (!$result) {
			echo "ERROR";
		}else {
		}
	}

	if (isset($_GET['undoHour']) && isset($_GET['id'])) {
		$id = mysql_real_escape_string($_GET['id']);
		$sql = "UPDATE control
		SET sale='SALE',
		user_sale=''
		WHERE id='$id'
		";
		$result = mysql_query($sql);

		if (!$result) {
			echo "ERROR";
		}else {
		}
	}
}

?>
<script src="inc/jquery-latest.js"></script>
<script src="inc/jquery.watermark.js"></script>
<script type="text/javascript">
			$(document).ready(function() {
				$("#search-fecha").keyup(function()
				{
					var faq_search_input = $(this).val();
					var dataString = 'keyword='+ faq_search_input + '&tabla=fecha';
					if(faq_search_input.length>2)
					{
						$.ajax({
							type: "GET",
							url: "inc/tabla_search.php",
							data: dataString,
							beforeSend:  function() {},	success: function(server_response)
							{
								$('#body').html(server_response).show();

							}
						});
					}return false;
				});
				$("#search-hora").keyup(function()
				{
					var faq_search_input = $(this).val();
					var dataString = 'keyword='+ faq_search_input + '&tabla=hora';
					if(faq_search_input.length>2)
					{
						$.ajax({
							type: "GET",
							url: "inc/tabla_search.php",
							data: dataString,
							beforeSend:  function() {},	success: function(server_response)
							{
								$('#body').html(server_response).show();

							}
						});
					}return false;
				});
				$("#search-usuario").keyup(function()
				{
					var faq_search_input = $(this).val();
					var dataString = 'keyword='+ faq_search_input + '&tabla=usuario';
					if(faq_search_input.length>2)
					{
						$.ajax({
							type: "GET",
							url: "inc/tabla_search.php",
							data: dataString,
							beforeSend:  function() {},	success: function(server_response)
							{
								$('#body').html(server_response).show();

							}
						});
					}return false;
				});
				$("#search-rut").keyup(function()
				{
					var faq_search_input = $(this).val();
					var dataString = 'keyword='+ faq_search_input + '&tabla=rut';
					if(faq_search_input.length>2)
					{
						$.ajax({
							type: "GET",
							url: "inc/tabla_search.php",
							data: dataString,
							beforeSend:  function() {},	success: function(server_response)
							{
								$('#body').html(server_response).show();

							}
						});
					}return false;
				});
				$("#search-nvisita").keyup(function()
				{
					var faq_search_input = $(this).val();
					var dataString = 'keyword='+ faq_search_input + '&tabla=nombrev';
					if(faq_search_input.length>2)
					{
						$.ajax({
							type: "GET",
							url: "inc/tabla_search.php",
							data: dataString,
							beforeSend:  function() {},	success: function(server_response)
							{
								$('#body').html(server_response).show();

							}
						});
					}return false;
				});
				$("#search-nanfi").keyup(function()
				{
					var faq_search_input = $(this).val();
					var dataString = 'keyword='+ faq_search_input + '&tabla=nombrea';
					if(faq_search_input.length>2)
					{
						$.ajax({
							type: "GET",
							url: "inc/tabla_search.php",
							data: dataString,
							beforeSend:  function() {},	success: function(server_response)
							{
								$('#body').html(server_response).show();

							}
						});
					}return false;
				});
				$("#search-mvisita").keyup(function()
				{
					var faq_search_input = $(this).val();
					var dataString = 'keyword='+ faq_search_input + '&tabla=motivo';
					if(faq_search_input.length>2)
					{
						$.ajax({
							type: "GET",
							url: "inc/tabla_search.php",
							data: dataString,
							beforeSend:  function() {},	success: function(server_response)
							{
								$('#body').html(server_response).show();

							}
						});
					}return false;
				});
				$("#search-sale").keyup(function()
				{
					var faq_search_input = $(this).val();
					var dataString = 'keyword='+ faq_search_input + '&tabla=sale';
					if(faq_search_input.length>2)
					{
						$.ajax({
							type: "GET",
							url: "inc/tabla_search.php",
							data: dataString,
							beforeSend:  function() {},	success: function(server_response)
							{
								$('#body').html(server_response).show();

							}
						});
					}return false;
				});
			});
		</script>
<div class="tabla22">
<table class="tabla5" id="tabla5" border="0" width="100%">
<tr class="tr0" id="tr0">
							<td width="8%"><input style="width:98%" id="search-fecha" type="text"/></td>
							<td width="6%"><input style="width:98%" id="search-hora" type="text"/></td>
							<td width="8%"><input style="width:98%" id="search-usuario" type="text"/></td>
							<td width="10%"><input style="width:98%" id="search-rut" type="text"/></td>
							<td width="18%"><input style="width:98%" id="search-nvisita" type="text"/></td>
							<td width="18%"><input style="width:98%" id="search-nanfi" type="text"/></td>
							<td width="19%"><input style="width:98%" id="search-mvisita" type="text"/></td>
							<td width="8%"><input style="width:98%" id="search-sale" type="text"/></td>
						</tr>
						</table>
<table class="tabla2" id="tabla2" border="0" width="100%">
						<tr class="tr1" id="tr1">
							<td width="8%">FECHA</td>
							<td width="6%">HORA</td>
							<td width="8%">USUARIO</td>
							<td width="10%">RUT VISITA</td>
							<td width="18%">NOMBRE VISITA</td>
							<td width="18%">NOMBRE ANFITRION</td>
							<td width="19%">MOTIVO VISITA</td>
							<td width="8%">SALE</td>
						</tr>
						<tbody id="body">


						<?php
						session_start();
$exit = "";
$delete = "";
$sql = "SELECT * FROM control ORDER BY id DESC";
$result = mysql_query($sql);


while ($row = mysql_fetch_array($result)) {
	if ($row['sale'] == "SALE") {
		$exit = "<img name=\"sale\" id=\"sale\" src=\"img/exit.png\" width=\"16px\" onclick=\"updateSale2('" . $row['id'] . "', '" . $_SESSION['username'] . "')\" />";
		$exit2 = "SIN SALIDA";
		$euser = "SIN SALIDA";
		$delete = "";
	}else {
		if($_SESSION['usertype'] == 1) {
			$delete = " | <img name=\"undo\" id=\"undo\" src=\"img/undo.png\" width=\"16px\" onclick=\"undoHour('" . $row['id'] . "')\" />";
		}
		$exit = $row['sale'];
		$exit2 = $row['sale'];
		$euser = $row['user_sale'];
	}

	?>
	<tr title="<?php echo "ID\t\t\t\t: " . $row['id'] . "\nFECHA\t\t\t: " . $row['fecha'] . "\nHORA\t\t\t: " . $row['hora'] . "\nUSUARIO\t\t: " . $row['usuario'] . "\nRUT V\t\t\t: " . $row['rut'] . "\nNOMBRE V \t\t: " . $row['nombrev'] . "\nNOMBRE A\t\t: " . $row['nombrea'] . "\nMOTIVO\t\t\t: " . $row['motivo'] . "\nOBSERVACION\t: " . $row['obs'] . "\nSALIDA\t\t\t: " . $exit2 . "\nUSUARIO SALIDA\t: " . $euser; ?>">
		<td width="8%"><?php echo $row['fecha']; ?></td>
		<td width="6%"><?php echo $row['hora']; ?></td>
		<td width="8%"><?php echo $row['usuario']; ?></td>
		<td width="10%"><?php echo $row['rut']; ?></td>
		<td width="18%"><?php echo $row['nombrev']; ?></td>
		<td width="18%"><?php echo $row['nombrea']; ?></td>
		<td width="19%"><?php echo $row['motivo']; ?></td>
		<td width="8%"><?php echo $exit."".$delete; ?></td>
	</tr>
						<?php
}

?>
</tbody>
					</table>
					</div>

