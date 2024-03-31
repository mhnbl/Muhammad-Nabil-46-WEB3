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