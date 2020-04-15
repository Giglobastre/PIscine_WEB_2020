<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
unset($_SESSION['ID']);
unset($_SESSION['type']);
unset($_SESSION['admin']);
header('location: ../Pages/index.php')
?>
</body>
</html>