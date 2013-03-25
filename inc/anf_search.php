<?php

include('sql.php');

$return_arr = array();

if ($conn)
{
	$fetch = mysql_query("SELECT * FROM control where nombrea like '%" . mysql_real_escape_string($_GET['term']) . "%'");

	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
		$row_array['id'] = $row['id'];
		$row_array['value'] = $row['nombrea'];
		$row_array['abbrev'] = $row['nombrea'];
		array_push($return_arr,$row_array);
	}
}
mysql_close($conn);

echo json_encode($return_arr);

?>