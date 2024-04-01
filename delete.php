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

// Tangkap ID artikel yang akan dihapus
$id = $_GET['id'];

// Hapus artikel berdasarkan ID
$sql = "DELETE FROM artikel WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // Tampilkan pesan berhasil menggunakan JavaScript
    echo "<script>alert('Artikel berhasil dihapus'); window.location.href = 'admin.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
