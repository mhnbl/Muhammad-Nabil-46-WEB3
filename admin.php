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

// Ambil data dari database
$sql = "SELECT * FROM artikel";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Medilab Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <style>
    .overlay-content {
      width: 50rem; /* Lebar overlay */
      }
  </style>

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">mhnbl021@gmail.com</a>
        <i class="bi bi-phone"></i> +62 8577-7435-373
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">MHNBLab.</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a href="Article.php" class="nav-link scrollto">Articles</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

<!-- ======= Articles Section ======= -->
<section id="artikel" class="artikel">
  <div class="container">
    <div class="section-title">
      <h2>Artikel</h2>
    </div>
    <div class="text-end mb-3">
      <button type="button" class="btn btn-primary" onclick="showOverlay('tambah')">Tambah Artikel</button>
    </div>
    <div class="col-lg">
      <div class="table-responsive">
        <table class="table table-bordered" id="articleTable">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Topik</th>
              <th>Penulis</th>
              <th>Tanggal</th>
              <th>Link</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result->data_seek(0);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["judul"] . "</td>";
                echo "<td>" . $row["deskripsi"] . "</td>";
                echo "<td>" . $row["topik"] . "</td>";
                echo "<td>" . $row["penulis"] . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "<td><a href='" . $row["link"] . "' target='_blank'>Baca Selengkapnya</a></td>";
                echo "<td>";
                echo "<button type='button' class='btn btn-danger mx-2' onclick='confirmDelete(" . $row["id"] . ")'>Hapus</button>";
                echo "<button type='button' class='btn btn-primary mx-2' onclick='showOverlay(\"update\", " . $row["id"] . ")'>Update</button>";
                echo "</td>";
                echo "</tr>";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section><!-- End article Section -->

<!-- Overlay untuk menambah artikel -->
<div class="overlay " id="overlayTambah">
  <div class="overlay-content">
    <button class="close-btn" id="closeBtnTambah">&times;</button>
    <div id="overlayContentTambah">
      <!-- Form untuk menambah artikel -->
      <h2>Tambah Artikel</h2>
      <form action="add.php" method="post">
        <div class="form-group">
          <label for="judul">Judul:</label>
          <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi:</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="deskripsi">Topik:</label>
          <input class="form-control" id="topik" name="topik" required></input>
        </div>
        <div class="form-group">
          <label for="penulis">Penulis:</label>
          <input type="text" class="form-control" id="penulis" name="penulis" required>
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal:</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
          <label for="link">Link:</label>
          <input type="text" class="form-control" id="link" name="link" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
  </div>
</div>


<!-- Overlay untuk memperbarui artikel -->
<div class="overlay" id="overlayUpdate">
  <div class="overlay-content">
    <button class="close-btn" id="closeBtnUpdate">&times;</button>
    <div id="overlayContentUpdate">
      <!-- Form untuk memperbarui artikel -->
      <h2>Update Artikel</h2>
      <form action="update.php" method="post">
        <!-- Input tersembunyi untuk menyimpan ID artikel yang akan diperbarui -->
        <input type="hidden" name="id" id="updateId">
        <!-- Select box untuk memilih kolom yang ingin diperbarui -->
        <div class="form-group">
          <label for="selectColumn">Pilih Kolom:</label>
          <select class="form-control" id="selectColumn" name="selectColumn" onchange="showInputField(this.value)">
            <option value="judul">Judul</option>
            <option value="deskripsi">Deskripsi</option>
            <option value="penulis">Penulis</option>
            <option value="tanggal">Tanggal</option>
            <option value="link">Link</option>
          </select>
        </div>
        <!-- Form input field sesuai dengan kolom yang dipilih -->
        <div id="inputField"></div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
    </div>
  </div>
</div>

<script>
  function showInputField(selectedColumn) {
    var inputField = document.getElementById('inputField');
    inputField.innerHTML = '';

    if (selectedColumn === 'tanggal') {
      inputField.innerHTML = '<div class="form-group"><label for="updatedValue">Tanggal:</label><input type="date" class="form-control" id="updatedValue" name="updatedValue"></div>';
    } else {
      inputField.innerHTML = '<div class="form-group"><label for="updatedValue">' + selectedColumn.charAt(0).toUpperCase() + selectedColumn.slice(1) + ':</label><input type="text" class="form-control" id="updatedValue" name="updatedValue"></div>';
    }
  }
</script>


<div class="breadcrumbs container-expand-lg my-5"></div>

<!-- ======= Comments Section ======= -->
<section id="comments" class="comments">
    <div class="container">

        <div class="section-title">
            <h2>Contact</h2>
        </div>

        <div class="row justify-content-center"> <!-- Menggunakan kelas justify-content-center di sini -->
            <?php
            // Ambil data komentar dari database
            $sql_komentar = "SELECT * FROM kontak";
            $result_komentar = $conn->query($sql_komentar);

            if ($result_komentar->num_rows > 0) {
                // Loop untuk menampilkan setiap komentar
                while ($row_komentar = $result_komentar->fetch_assoc()) {
                    ?>
                    <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row_komentar['nama']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $row_komentar['email']; ?></h6>
                                <p class="card-text"><?php echo $row_komentar['subjek']; ?></p>
                                <p class="card-text"><?php echo $row_komentar['pesan']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Belum ada komentar.";
            }
            ?>
        </div>
    </div>
</section><!-- End Comments Section -->

<div class="breadcrumbs container-expand-lg"></div>
<footer id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Contact</h2>
        </div>
      </div>
      <div class="container">
        <div class="row">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>
          </div>
        </div>
      </div>
</footer>

  </main><!-- End #main -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="main.js"></script>
  
<script>
// Fungsi untuk menampilkan overlay
    function showOverlay(action, id = null) {
      if (action === "tambah") {
        document.getElementById("overlayTambah").style.display = "block";

        document.getElementById("closeBtnTambah").addEventListener("click", function() {
          closeOverlay(); 
        });
      } else if (action === "update") {
        document.getElementById("overlayUpdate").style.display = "block";

        document.getElementById("closeBtnUpdate").addEventListener("click", function() {
          closeOverlay();
        });
      }
    }

    // Fungsi untuk menutup overlay
    function closeOverlay() {
      document.getElementById("overlayTambah").style.display = "none";
      document.getElementById("overlayUpdate").style.display = "none";
    }
    function confirmDelete(articleId) {
        if (confirm("Apakah Anda yakin ingin menghapus artikel ini?")) {
            deleteArticle(articleId);
        }
    }
    function deleteArticle(articleId) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhr.open("GET", "delete.php?id=" + articleId, true);
        xhr.send();
    }
</script>


</body>

</html>