<?php

include('sql.php');

$return_arr = array();

if ($conn)
{
	$fetch = mysql_query("SELECT DISTINCT id, nombrev, rut FROM control where nombrev like '%" . mysql_real_escape_string($_GET['term']) . "%' GROUP BY nombrev");

	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
		$row_array['id'] = $row['id'];
         $row_array['value'] = $row['nombrev'];
		$row_array['abbrev'] = $row['rut'];
		array_push($return_arr,$row_array);
	}
}
mysql_close($conn);

echo json_encode($return_arr);

?>