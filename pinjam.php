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
	 <style>
		 body{background-color: linen}
	 </style>
 </head>
 <body>

 	<a href="index.php"><- Kembali</a>

 	<center>
 		
	<h2>Masukkan data peminjam disini!</h2>

 	<form action="" method="post" enctype="multipart/form-data">

 		<input type="hidden" name="id" value="<?= $databukumaupinjam["id"]; ?>">
		<input type="hidden" name="jumlah" value="<?= $databukumaupinjam["tersedia"]; ?>">
 		
 		<label for="peminjam">Nama : </label>
		<input type="text" name="peminjam" id="peminjam" required>
		<br><br>

		<label for="nim">NIM : </label>
		<input type="text" name="nim" id="nim" required>
		<br><br>

		<h4>Buku yang akan dipinjam</h4>

		<table cellpadding="5">

			<tr>
				<td><label for="judul">Judul : </label></td>
				<td><input type="text" name="judul" id="judul" readonly value="<?= $databukumaupinjam["judul"]; ?>"></td>
			</tr>

			<tr>
				<td><label for="pengarang">Pengarang : </label></td>
				<td><input type="text" name="pengarang" id="pengarang" readonly value="<?= $databukumaupinjam["pengarang"]; ?>"></td>
			</tr>

			<tr>
				<td><label for="isbn">ISBN : </label></td>
				<td><input type="text" name="isbn" id="isbn" readonly value="<?= $databukumaupinjam["isbn"]; ?>"></td>
			</tr>

		</table>

		<br>

		<button type="submit" name="submit">Pinjam Buku</button>

 	</center>	

 </body>
 </html>