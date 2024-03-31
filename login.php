<?php
session_start();

// Koneksi ke database
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Escape input pengguna untuk mencegah SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query untuk memeriksa apakah kredensial yang dimasukkan sesuai dengan yang ada di database
    $sql = "SELECT * FROM akun WHERE usrnm='$username' AND pass='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Jika kredensial benar, set session dan redirect ke halaman yang sesuai
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: admin.php"); // Ubah ke halaman yang sesuai setelah login
    } else {
        // Jika kredensial salah, tampilkan pesan error menggunakan JavaScript alert
        echo '<script>alert("Username atau password salah."); window.history.back();</script>';
        
    }
}
?>
