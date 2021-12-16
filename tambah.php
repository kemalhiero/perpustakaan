<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'fungsi.php';

if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Buku berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Buku gagal ditambahkan!');
			</script>
		";
	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tambah Buku</title>
	 <style>
		 body{background-color: linen}
	 </style>
 </head>
 <body>
 
<a href="index.php"><- Kembali</a>

<center>	
<h2>Silahkan tambah buku disini!</h2>

 	<form action="" method="post" enctype="multipart/form-data">
		
			<table cellpadding="5">

			<tr>
				<td><label for="judul">Judul Buku : </label></td>
				<td><input type="text" name="judul" id="judul" required></td>
			</tr>

			<tr>
				<td><label for="isbn">ISBN : </label></td>
				<td><input type="text" name="isbn" id="isbn" required></td>
			</tr>

			<tr>
				<td><label for="pengarang">Pengarang :</label></td>
				<td><input type="text" name="pengarang" id="pengarang" required></td>
			</tr>

			<tr>
				<td><label for="penerbit">Penerbit :</label></td>
				<td><input type="text" name="penerbit" id="penerbit" required></td>
			</tr>

			<tr>
				<td><label for="jumlah">Jumlah :</label></td>
				<td><input type="number" name="jumlah" id="jumlah" required></td>
			</tr>

			<tr>
				<td><p style="display: inline;">Kategori  : </p></td>
				<td>
					<input type="radio" id="kategori" name="kategori" value="fiksi" >
					<label for="kategori">Fiksi</label>
					<input type="radio" id="kategori" name="kategori" value="nonfiksi" required="">
					<label for="kategori">Non-Fiksi</label>
				</td>
			</tr>

			</table>
						

				<!-- <label for="kategori">Kategori :</label>
				<input type="text" name="kategori" id="kategori" required>
				<br><br> -->

				
				<br>
												
				<button type="submit" name="submit">Tambah Buku</button>
			
		
	</form>
</center>

 	

 </body>
 </html>