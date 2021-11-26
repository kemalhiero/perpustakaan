<?php 

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "perpustakaan");

function query($kueri) { //query data buku
	global $konek;
	$result = mysqli_query($konek, $kueri);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {	
		$rows[] = $row;
	}
	return $rows;
}




function tambah($data) { //tambah buku
	global $konek;

	$judul = htmlspecialchars($data["judul"]);
	$isbn = htmlspecialchars($data["isbn"]);
	$pengarang = htmlspecialchars($data["pengarang"]);
	$penerbit = htmlspecialchars($data["penerbit"]);	
	$jumlah = $data["jumlah"];
	$kategori = $data["kategori"];
	//$sedia = "Ya";

	$result = mysqli_query($konek, "SELECT * FROM databuku WHERE judul = '$judul' OR isbn = '$isbn'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('Buku sudah ada!')
		      </script>";
		return false;
	}

	$query = "INSERT INTO databuku	VALUES ('', '$judul', '$isbn', '$pengarang', '$penerbit', '$kategori', '$jumlah') ";
	
	mysqli_query($konek, $query);

	return mysqli_affected_rows($konek);
}




function ubah($data) { //ubah data buku
	global $konek;

	$id = $data["id"];
	$judul = htmlspecialchars($data["judul"]);
	$isbn = htmlspecialchars($data["isbn"]);
	$pengarang = htmlspecialchars($data["pengarang"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$jumlah = $data["jumlah"];	
	$kategori = $data["kategori"];


	$query = "UPDATE databuku SET 
				judul = '$judul',
				isbn = '$isbn',
				pengarang = '$pengarang',
				penerbit = '$penerbit',
				kategori = '$kategori',
				tersedia = '$jumlah'
				WHERE id = $id ";
	
	mysqli_query($konek, $query);

	// $querypeminjaman = "UPDATE peminjaman SET 
	// 			judulbuku = '$judul',
	// 			penulisbuku = '$pengarang',
	// 			isbnbuku = '$isbn',	
	// 			WHERE id = $id ";
	
	// mysqli_query($konek, $querypeminjaman);

	return mysqli_affected_rows($konek);
}


function hapus($id) {
	global $konek;
	mysqli_query($konek, "DELETE FROM databuku WHERE id = $id");
	return mysqli_affected_rows($konek);
}




function pinjam($data) {
global $konek;

$nama = htmlspecialchars($data["peminjam"]);
$nim = htmlspecialchars($data["nim"]);
$judul = htmlspecialchars($data["judul"]);
$isbn = htmlspecialchars($data["isbn"]);
$penulisbuku = htmlspecialchars($data["pengarang"]);
$jumlah =  $data["jumlah"];

$status = "Dipinjam";

$query = "INSERT INTO peminjaman VALUES ('', '$nama', '$nim', '$judul', '$penulisbuku', '$isbn', '$status') ";

mysqli_query($konek, $query);

$jumlah=$jumlah-1;

$querydatabuku = "UPDATE databuku SET 
				tersedia = '$jumlah'
				WHERE isbn = $isbn ";
mysqli_query($konek, $querydatabuku);

return mysqli_affected_rows($konek);
}




function kembali($data) {
global $konek;

//$isbn = htmlspecialchars($data["isbn"]);
$statuspeminjaman = "Sudah dikembalikan";
// $sedia = "Ya";
$jumlah =  $data["jumlah"];
$jumlah=$jumlah+1;

$querypeminjaman = "UPDATE peminjaman SET statuss = '$statuspeminjaman' WHERE isbnbuku = $data ";
mysqli_query($konek, $querypeminjaman);

$querypeminjaman = "UPDATE databuku SET tersedia = '$jumlah' WHERE isbn = $data ";
mysqli_query($konek, $querypeminjaman);

return mysqli_affected_rows($konek);
}



function cari($keyword) {
	$query = "SELECT * FROM databuku
				WHERE
			  judul LIKE '%$keyword%' OR
			  isbn LIKE '%$keyword%' OR
			  pengarang LIKE '%$keyword%' OR
			  penerbit LIKE '%$keyword%' OR
			  kategori LIKE '%$keyword%'
			";
	return query($query);
}

?>