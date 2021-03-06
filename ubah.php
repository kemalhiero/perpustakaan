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
$data = query("SELECT * FROM databuku WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal diubah!');
			</script>
		";
	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ubah Data Buku</title>
	 <style>
		 body{background-color: linen}

	 </style>
 </head>
 <body>

 	<a href="index.php"><- Kembali</a>

 	<center>
 		
	<h2>Silahkan Ubah Data Buku di Sini</h2>

	<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $data["id"]; ?>">

		<table border="0" cellpadding="5" cellspacing="0">
				
				<tr>
					<td><label for="judul">Judul : </label></td>
					<td><input type="text" name="judul" id="judul" required value="<?= $data["judul"]; ?>"></td>
				</tr>

				<tr>
					<td><label for="isbn">ISBN : </label></td>
					<td><input type="text" name="isbn" id="isbn" required value="<?= $data["isbn"]; ?>"></td>
				</tr>

				<tr>
					<td><label for="pengarang">Pengarang : </label></td>
					<td><input type="text" name="pengarang" id="pengarang" required value="<?= $data["pengarang"]; ?>"></td>
				</tr>

				<tr>
					<td><label for="penerbit">Penerbit : </label></td>
					<td><input type="text" name="penerbit" id="penerbit" required value="<?= $data["penerbit"]; ?>"></td>
				</tr>

				<tr>
					<td><label for="jumlah">Jumlah :</label></td>
					<td><input type="number" name="jumlah" id="jumlah" required value="<?= $data["tersedia"]; ?>"></td>
				</tr>

				<tr>
					<td><p>Kategori : </p></td>
					<td>
						<input type="radio" id="kategori" name="kategori" value="fiksi" >
						<label for="kategori">Fiksi</label>
						<input type="radio" id="kategori" name="kategori" value="nonfiksi" required>
						<label for="kategori">Non-Fiksi</label>
					</td>
				</tr>

		</table>
			
			<button type="submit" name="submit">Ubah Data Buku</button>

	</form>

 	</center>

 </body>
 </html>