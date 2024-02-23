

<?php

$sname = "targetlifter-server.database.windows.net";
$uname = "targetlifter-server-admin";
$password = "xN]3PxKgeT9,^NuxN]3PxKgeT9,^Nu";

$db_name = "target-lifter";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}

?>
