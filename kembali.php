<?php 
require 'fungsi.php';

$isbn = $_GET["isbnbuku"];

$databukumaupinjam = query("SELECT tersedia FROM databuku WHERE isbn = $isbn");

echo'<form action="" method="POST">
  <input type="hidden" name="jumlah" value="<?= $databukumaupinjam; ?>">
  </form>';

if( kembali($isbn) > 0 ) {
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
