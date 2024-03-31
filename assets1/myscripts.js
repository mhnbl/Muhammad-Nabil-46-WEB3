var loginBtn = document.getElementById('loginBtn');
  var overlay = document.getElementById('overlay');

  loginBtn.addEventListener('click', function() {
    overlay.style.display = 'block';
  });

  var closeBtn = document.getElementById('closeBtn');
  var overlay = document.getElementById('overlay');

  closeBtn.addEventListener('click', function() {
    overlay.style.display = 'none';
  });
  // Fungsi untuk menyimpan username dan password ke localStorage
  function saveLoginData(username, password) {
    localStorage.setItem('username', username);
    localStorage.setItem('password', password);
  }

  // Fungsi untuk mengambil data login dari localStorage dan mengisi formulir
  function fillLoginForm() {
    var storedUsername = localStorage.getItem('username');
    var storedPassword = localStorage.getItem('password');
    if (storedUsername && storedPassword) {
      document.getElementById('username').value = storedUsername;
      document.getElementById('password').value = storedPassword;
    }
  }

  // Panggil fungsi fillLoginForm saat dokumen selesai dimuat
  document.addEventListener('DOMContentLoaded', function() {
    fillLoginForm();
  });

  // Tangani submit form
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    // Jika opsi "Remember me" dicentang, simpan username dan password
    if (document.getElementById('rememberMe').checked) {
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
      saveLoginData(username, password);
    }
  });
  
// Fungsi untuk menampilkan alert setelah pesan terkirim
function showMessageSentAlert() {
alert("Your message has been sent. Thank you!");
}

// Fungsi untuk melakukan pengecekan form sebelum submit
function validateForm() {
var name = document.getElementById('name').value.trim();
var email = document.getElementById('email').value.trim();
var subject = document.getElementById('subject').value.trim();
var message = document.getElementById('message').value.trim();

// Lakukan pengecekan form di sini
if (name === '' || email === '' || subject === '' || message === '') {
  alert('Please fill in all fields.');
  return false; // Form tidak akan disubmit jika ada field yang kosong
}

// Pengecekan lainnya bisa ditambahkan sesuai kebutuhan

// Jika pengecekan berhasil, tampilkan alert dan kirim form
showMessageSentAlert();
return true;
}
