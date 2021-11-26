<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}


require 'fungsi.php';
$databuku = query("SELECT * FROM databuku");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$databuku = cari($_POST["keyword"]);
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Beranda</title>
 </head>
 <body>
 	<a href="logout.php">Logout</a>
 
 	<h1>Sistem Informasi Perpustakaan</h1>

 	<span><a style="text-align: left;" href="tambah.php">Tambah Buku</a></span>
 	<span>                </span>
 	<span><a style="text-align: right;" href="peminjaman.php">Riwayat Peminjaman Buku</a></span>
 	 
 	 	<br>

 	 <h3>Data Buku</h3>

 	 <!-- cari -->
 	 <form action="" method="post">

		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan kata kunci" autocomplete="off">
		<button type="submit" name="cari">Cari</button>		
	</form>

	<br>

 	<table border="1" cellpadding="10" cellspacing="0">
 		<tr>
 			<th>No.</th>
 			<th>Judul</th>	
 			<th>ISBN</th>
 			<th>Pengarang</th>
 			<th>Penerbit</th>
 			<th>Kategori</th>
 			<th>Tersedia</th>
 			<th>Aksi</th>
 		</tr>

 		<?php $nomor=1; ?>

 		<?php foreach ($databuku as $data) : ?>

 		<tr>
 			<td><?= $nomor; ?></td>
 			<td><?= $data["judul"]; ?></td>
 			<td><?= $data["isbn"]; ?></td>
 			<td><?= $data["pengarang"]; ?></td>
 			<td><?= $data["penerbit"]; ?></td>
 			<td><?= $data["kategori"]; ?></td>
 			<td><?= $data["tersedia"]; ?></td>
 			<td>
				<a href="ubah.php?id=<?= $data["id"]; ?>">ubah</a> |
				<a href="hapus.php?id=<?= $data["id"]; ?>" onclick="return confirm('yakin?');">hapus</a> |
				<?php if($data["tersedia"]=="Ya") : ?>	<a href="pinjam.php?id=<?= $data["id"]; ?>">pinjam</a> 
				<?php else: ?> <a href="kembali.php?isbn=<?= $data["isbn"]; ?>">kembalikan</a>
				<?php endif; ?>
			</td>
 		</tr>

 		<?php $nomor++; ?>
 		<?php endforeach; ?>

 	</table>

 </body>
 </html>