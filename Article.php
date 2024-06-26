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

  <title>MMHNBLab.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <style>
    .overlay-content {
    width: 400px; 
    }
  </style>


<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">MHNBLab.</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a href="Article.php" class="nav-link scrollto">Articles</a></li>
          <li><a href="#" class="nav-link scrollto" id="loginBtn">Admin</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Articles</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

<!-- ======= Articles Section ======= -->
<section id="artikel" class="artikel">
  <?php
  // Ambil nilai topik dari query string
  $topik = isset($_GET['topik']) ? $_GET['topik'] : 'Semua';
  ?>
  <div class="container">
    <div class="section-title">
      <h2>Artikel</h2>
      <p>Temukan rahasia kebugaran, nutrisi, dan kesehatan mental dalam koleksi artikel pilihan kami, dirancang untuk membantu Anda mencapai potensi terbaik Anda.</p>
    </div>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Pilih Topik
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#" onclick="ubahTopik('Semua')">Semua</a></li>
        <li><a class="dropdown-item" href="#" onclick="ubahTopik('Gaya Hidup')">Gaya Hidup</a></li>
        <li><a class="dropdown-item" href="#" onclick="ubahTopik('Makan')">Makan</a></li>
        <li><a class="dropdown-item" href="#" onclick="ubahTopik('Obat')">Obat</a></li>
      </ul>
    </div>

    <div class="row gy-4">
      <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
          <?php
          if ($topik == "Semua") {
            $sql = "SELECT * FROM artikel";
          }
          if ($topik == "Gaya Hidup") {
            $sql = "SELECT * FROM artikel WHERE topik='Gaya Hidup'";
          }
          if ($topik == "Makan") {
            $sql = "SELECT * FROM artikel WHERE topik='Makan'";
          }
          if ($topik == "Obat") {
            $sql = "SELECT * FROM artikel WHERE topik='Obat'";
          }
          $result = $conn->query($sql);
          $counter = 1;
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<li class='nav-item px-1'>";
              echo "<a class='nav-link";
              if ($counter == 1) echo " active show"; 
              echo "' data-bs-toggle='tab' href='#tab-" . $counter . "'>" . $row["judul"] . "</a>";
              echo "</li>";
              $counter++;
            }
          }
          ?>
        </ul>
      </div>

      <div class="col-lg-9">
        <div class="tab-content">
          <?php
          // Reset kursor hasil query
          $result->data_seek(0);
          $counter = 1;
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              // Tampilkan konten artikel
              echo "<div class='tab-pane";
              if ($counter == 1) echo " active show"; // Tampilkan konten pertama
              echo "' id='tab-" . $counter . "'>";
              echo "<div class='row gy-4'>";
              echo "<div class='col-lg-8 details order-2 order-lg-1'>";
              echo "<h3>" . $row["judul"] . "</h3>";
              echo "<p class='fst-italic'>" . $row["deskripsi"] . "</p>";
              echo "<p>Penulis: " . $row["penulis"] . "</p>";
              echo "<p>Tanggal: " . $row["tanggal"] . "</p>";
              echo "<p><a href='" . $row["link"] . "' target='_blank'>Baca Selengkapnya</a></p>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              $counter++;
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- End article Section -->

<!-- Overlay Login -->
<div class="overlay" id="overlay">
    <div class="overlay-content">
      <!-- Tombol X untuk keluar -->
      <button class="close-btn" id="closeBtn">&times;</button>
      <!-- Form login -->
      <h2>Login</h2>
      <form id="loginForm" action="login.php" method="post">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <input type="submit" value="Login">
      </form>
      <!-- Akhir form login -->
  </div>
</div>


  </main><!-- End #main -->
    
  <div class="breadcrumbs container-expand-lg my-5">
  </div>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>
      <div class="container">
        <div class="row mt-5">

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

          <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="kontak.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="error-message"></div>
                <div class="loading">loading</div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="main.js"></script>
  <script>
    function ubahTopik(topikBaru) {
      window.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>?topik=' + topikBaru;
    }
  </script>

</body>

</html>
