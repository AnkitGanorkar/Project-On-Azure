

<?php

$sname = "targetlifter.mysql.database.azure.com";
$uname = "newankit";
$password = "xN]3PxKgeT9,^NuxN]3PxKgeT9,^Nu";

$db_name = "targetlifter000";

$conn = new mysqli($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}

?>
