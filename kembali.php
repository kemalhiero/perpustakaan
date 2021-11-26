<?php 
require 'fungsi.php';

$isbn = $_GET["isbnbuku"];
$nim = $_GET["nim"];

$jumlah = query("SELECT * FROM databuku WHERE isbn = $isbn")[0];

$jumlaa = $jumlah["tersedia"];

	if( kembali($isbn, $nim, $jumlaa) > 0 ) {
		echo "
			<script>
				alert('Buku berhasil dikembalikan!!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Buku gagal dikembalikan!');
				document.location.href = 'index.php';
			</script>
		";
	}

 ?>
