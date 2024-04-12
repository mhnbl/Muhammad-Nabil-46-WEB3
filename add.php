<?php
// Koneksi ke database (ganti dengan informasi database Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artikel";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data yang dikirimkan melalui form
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$topik = $_POST['topik'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];
$link = $_POST['link'];

// Query untuk menambahkan data ke dalam tabel artikel
$sql = "INSERT INTO artikel (judul, deskripsi,topik ,penulis, tanggal, link) VALUES ('$judul', '$deskripsi','$topik', '$penulis', '$tanggal', '$link')";

if ($conn->query($sql) === TRUE) {
  // Tampilkan pemberitahuan berhasil menggunakan JavaScript
  echo "<script>alert('Artikel berhasil ditambahkan'); window.location.href = 'admin.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
