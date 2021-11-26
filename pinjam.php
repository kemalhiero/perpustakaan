<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'fungsi.php';

// ngambil data di URL
$id = $_GET["id"];

// query databuku berdasarkan id
$databukumaupinjam = query("SELECT * FROM databuku WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( pinjam($_POST) > 0 ) {
		echo "
			<script>
				alert('Buku berhasil dipinjam!!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Buku gagal dipinjam!');
			</script>
		";
	}


}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Pinjam Buku</title>
 </head>
 <body>

 	<a href="index.php"><- Kembali</a>

 	<center>
 		
<h2>Masukkan data peminjam disini!</h2>

 	<form action="" method="post" enctype="multipart/form-data">

 		<input type="hidden" name="id" value="<?= $data["id"]; ?>">
 		
 		<label for="peminjam">Nama : </label>
		<input type="text" name="peminjam" id="peminjam" required>
		<br><br>

		<label for="nim">NIM : </label>
		<input type="text" name="nim" id="nim" required>
		<br><br>

		<p>Buku yang akan dipinjam</p>

		<label for="judul">Judul : </label>
		<input type="text" name="judul" id="judul" readonly value="<?= $databukumaupinjam["judul"]; ?>"><br><br>

		<label for="pengarang">pengarang : </label>
		<input type="text" name="pengarang" id="pengarang" readonly value="<?= $databukumaupinjam["pengarang"]; ?>"><br><br>

		<label for="isbn">isbn : </label>
		<input type="text" name="isbn" id="isbn" readonly value="<?= $databukumaupinjam["isbn"]; ?>"><br><br>


		<button type="submit" name="submit">Pinjam Buku</button>

 	</center>	

 </body>
 </html>