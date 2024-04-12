<?php
if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $judul = $_POST['updatedJudul'];
  $deskripsi = $_POST['updatedDeskripsi'];
  $topik = $_POST['updatedTopik'];
  $penulis = $_POST['updatedPenulis'];
  $tanggal = $_POST['updatedTanggal'];
  $link = $_POST['updatedLink'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "artikel";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  // Persiapkan array untuk menyimpan kueri SQL yang akan dieksekusi
  $updateQueries = array();

  // Periksa setiap input, jika tidak kosong, tambahkan ke array kueri update
  if (!empty($judul)) {
    $updateQueries[] = "judul='$judul'";
  }
  if (!empty($deskripsi)) {
    $updateQueries[] = "deskripsi='$deskripsi'";
  }
  if (!empty($topik)) {
    $updateQueries[] = "topik='$topik'";
  }
  if (!empty($penulis)) {
    $updateQueries[] = "penulis='$penulis'";
  }
  if (!empty($tanggal)) {
    $updateQueries[] = "tanggal='$tanggal'";
  }
  if (!empty($link)) {
    $updateQueries[] = "link='$link'";
  }

  // Jika ada setidaknya satu kueri update yang akan dieksekusi
  if (!empty($updateQueries)) {
    // Gabungkan semua kueri menjadi satu kueri update utuh
    $updateQuery = "UPDATE artikel SET " . implode(", ", $updateQueries) . " WHERE id='$id'";

    // Jalankan kueri update
    if ($conn->query($updateQuery) === TRUE) {
      echo "<script>alert('Artikel berhasil diperbarui');</script>";
      header("Location: admin.php");
      exit();
    } else {
      echo "Error: " . $updateQuery . "<br>" . $conn->error;
    }
  } else {
    echo "<script>alert('Tidak ada perubahan yang dimasukkan');</script>";
    header("Location: admin.php");
    exit();
  }

  $conn->close();
} else {
  echo "ID tidak valid";
}
?>
