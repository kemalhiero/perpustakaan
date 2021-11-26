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
 </head>
 <body>
 
<a href="index.php"><- Kembali</a>

<center>	
<h2>Silahkan tambah buku disini!</h2>

 	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			
				<label for="judul">Judul Buku : </label>
				<input type="text" name="judul" id="judul" required>
				<br><br>
			
				<label for="isbn">ISBN : </label>
				<input type="text" name="isbn" id="isbn" required>
				<br><br>
			
				<label for="pengarang">Pengarang :</label>
				<input type="text" name="pengarang" id="pengarang" required>
				<br><br>
			
				<label for="penerbit">Penerbit :</label>
				<input type="text" name="penerbit" id="penerbit" required>
				<br><br>

				<label for="jumlah">Jumlah :</label>
				<input type="number" name="jumlah" id="jumlah" required>
				<br><br>

				<!-- <label for="kategori">Kategori :</label>
				<input type="text" name="kategori" id="kategori" required>
				<br><br> -->

				<p style="display: inline;">Kategori : </p>
				<input type="radio" id="kategori" name="kategori" value="fiksi" >
				<label for="kategori">Fiksi</label>
				<input type="radio" id="kategori" name="kategori" value="nonfiksi" required="">
				<label for="kategori">Non-Fiksi</label><br>
				<br><br>
												
				<button type="submit" name="submit">Tambah Buku</button>
			
		</ul>
	</form>
</center>

 	

 </body>
 </html>