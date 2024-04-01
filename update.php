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
$selectedColumn = $_POST['selectColumn'];
$updatedValue = $_POST['updatedValue'];

// id
$id = isset($_POST['id']) ? $_POST['id'] : null;

if ($id === null) {
  echo "ID tidak ditemukan";
  exit;
}


// Persiapkan query untuk memperbarui data artikel berdasarkan kolom yang dipilih
$sql = "UPDATE artikel SET $selectedColumn='$updatedValue' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Artikel berhasil diperbarui $id');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
