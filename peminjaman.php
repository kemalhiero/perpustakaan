<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'fungsi.php';
$datapeminjam = query("SELECT * FROM peminjaman");
//$databuku = query("SELECT * FROM databuku")

?>

<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman</title>
</head>
<body>
	<a href="index.php"><- Kembali</a>

	<center>	

<h1>Peminjaman</h1>


	<h3>Riwayat Peminjaman</h3>

	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Nama Peminjam</th>
			<th>NIM</th>
			<th>Judul Buku</th>
			<th>Penulis</th>
			<th>ISBN</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>

		<?php $nomor=1; ?>

		<?php foreach ($datapeminjam as $data) : ?>

		<tr>
			<td><?= $nomor; ?></td>
			<td><?= $data["namapeminjam"]; ?></td>
			<td><?= $data["nim"]; ?></td>
			<td><?= $data["judulbuku"]; ?></td>
			<td><?= $data["penulisbuku"]; ?></td>
			<td><?= $data["isbnbuku"]; ?></td>
			<td><?= $data["status"]; ?></td>
			<td>
				<a href="kembali.php?isbnbuku=<?= $data["isbnbuku"]; ?>">kembalikan</a>
			</td>

		</tr>

		<?php $nomor++; ?>
		<?php endforeach; ?>

	</table>

	</center>

</body>
</html>