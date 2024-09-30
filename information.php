<?php
$link = mysqli_connect('db', 'root', '111');
if (!$link) {
	die('Error'.mysqli_error());
}
echo 'Good!';
mysqli_close($link);
?>
