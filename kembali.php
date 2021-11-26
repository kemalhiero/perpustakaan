<?php 
require 'fungsi.php';

$isbn = $_GET["isbn"];

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