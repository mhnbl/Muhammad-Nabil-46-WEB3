<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

    // Validasi data inputan
    if (!empty($nama) && !empty($email) && !empty($subjek) && !empty($pesan)) {
        // Gunakan prepared statement untuk mencegah SQL Injection
        $stmt = $conn->prepare("INSERT INTO kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $subjek, $pesan);

        // Eksekusi statement
        if ($stmt->execute()) {
            // Jika penyimpanan data berhasil, tampilkan pesan sukses dengan JavaScript
            echo '<script>alert("Pesan Anda berhasil terkirim!"); window.location.href = "index.php";</script>';
        } else {
            // Jika terjadi kesalahan saat menyimpan data, tampilkan pesan error
            echo "Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        // Jika ada input yang kosong, tampilkan pesan error
        echo '<script>alert("Semua field harus diisi!"); window.location.href = "index.php";</script>';
    }
}

// Tutup koneksi
$conn->close();
?>
