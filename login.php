<?php 

session_start();

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

// 	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

// 	// cek username
	if( $username == "user" ) {

		// cek password
// 		$row = mysqli_fetch_assoc($result);
		if( $password == "pass") {
			// set session
			$_SESSION["login"] = true;
			header("Location: index.php");
			exit;
		}
	}

	$error = true;
	echo "<script>	alert('Username atau password salah!');	</script>";

}	

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
	 <style>
		 body{background-color: linen;}
	 </style>
 </head>
 <body>
<center>
	
 <h1>Sistem Informasi Perpustakaan</h1>
 
<p>Masukkan username dan password</p>

<form action="" method="post">
	
	<label for="username">Username : </label>
	<input type="text" name="username" id="username" required><br><br>

	<label for="password">Password : </label>
	<input type="password" name="password" id="password" required><br><br>

	<button type="submit" name="login">Masuk</button>	
	
</form>

</center>

 </body>
 </html>