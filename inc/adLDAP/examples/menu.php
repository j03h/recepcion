<?php
session_start();
?>
<html>
<head>
<title>adLDAP authentication</title>
</head>

<body>

<p>If you called authenticate.php and you are redirected to this page, you successfully authenticated against Active Directory with your credentials.</p>

User Details for <?php $_SESSION['username']; ?><br />
<pre>
<?php
echo $adldap->user()->info("jescobar");
$group = ($_SESSION['userinfo']['0']['memberof']);


foreach($group as $grp){
	if (preg_match("/Auditoria Interna/i", $grp)) {
		echo "Se encontro una coincidencia.\n". $grp;
	}
}


print_r($_SESSION['userinfo']);
?>
</pre>

</body>
</html>