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

// Periksa apakah ada data yang dikirimkan dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $subjek = $_POST['subject'];
    $pesan = $_POST['message'];

    // Query SQL untuk menyimpan data ke dalam database
    $sql = "INSERT INTO kontak (nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subjek', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        // Jika penyimpanan data berhasil, tampilkan pesan sukses dengan JavaScript
        echo '<script>alert("Pesan Anda berhasil terkirim!"); window.location.href = "index.php";</script>';
    } else {
        // Jika terjadi kesalahan saat menyimpan data, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
