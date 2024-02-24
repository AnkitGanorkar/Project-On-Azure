

<?php

$sname = "targetlifter-server.database.windows.net";
$uname = "targetlifter-server";
$password = "xN]3PxKgeT9,^NuxN]3PxKgeT9,^Nu";

$db_name = "targetlifter000";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}

?>
