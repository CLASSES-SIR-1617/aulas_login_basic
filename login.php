<?php
session_start();

include_once('connect.php');

if (isset($_SESSION['username'])) {
	header('location:index.php');
} else if (isset($_POST['username']) && isset($_POST['pass'])) {

	// base de dados
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$querySQL = "SELECT * FROM users WHERE username='$username' and pass='$pass'";
	//var_dump($querySQL);
	$result = $dbconn->query($querySQL);
	//var_dump($result);

	if ($result->num_rows == 1) {
		$userdata = $result->fetch_object();
		$_SESSION['username'] = $userdata->username;
		$_SESSION['nome'] = $userdata->nome;
		$_SESSION['apelido'] = $userdata->apelido;
		header("location:index.php");
	} else {
		$erro = "username/password não existentes";
	}

}

session_write_close();


?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<?php if (isset($erro)) echo $erro;?>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
		username : <input type="text" name="username"/>
		password : <input type="password" name="pass">
		<input type="submit" value="Fazer Login">
	</form>

</body>
</html>