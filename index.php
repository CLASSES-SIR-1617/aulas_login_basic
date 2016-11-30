<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
session_write_close();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> Olá <?php echo $_SESSION['nome'].' '.$_SESSION['apelido'] ?> </h1>
<a href="logout.php">Ir daqui embora</a>
</body>
</html>