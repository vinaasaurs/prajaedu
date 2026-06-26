<!doctype html>
<html lang="id">

<head>
  <title>Kelas | PrajaEdu</title>
  <link rel="icon" type="image/png" href="img/logo/favicon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="css/manual/style.css">
  <link rel="stylesheet" type="text/css" href="css/style-enfold.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,500,600,300,700' rel='stylesheet' type='text/css'>
  <style>
    body {
      background-color: #f8f8f8;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .sidebar {
      background: #f9f6ef;
      min-height: 100vh;
      padding-top: 40px;
      border-right: 1px solid #e0e0e0;
    }

    .sidebar .nav-link {
      color: #222;
      font-weight: 600;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      font-size: 1.1rem;
    }

    .sidebar .nav-link i {
      margin-right: 12px;
      font-size: 1.3rem;
    }

    .main-content {
      width: 100%;
      padding: 20px;
      min-height: calc(100vh - 60px);
      background: #f8f8f8;
      flex: 1;
    }

    .class-row {
      border-bottom: 1px solid #e0e0e0;
      padding: 16px 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .class-row:last-child {
      border-bottom: none;
    }

    .btn-masuk {
      background: #252D79;
      color: #fff;
      font-weight: 600;
      border-radius: 6px;
      padding: 6px 18px;
      font-size: 1rem;
      border: none;
    }

    /* Custom Modal Token */
    .custom-modal-overlay {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.18);
      justify-content: center;
      align-items: center;
    }

    .custom-modal-overlay.active {
      display: flex;
    }

    .custom-modal-token {
      background: #fff;
      border-radius: 10px;
      min-width: 380px;
      max-width: 95vw;
      min-height: 220px;
      position: relative;
      box-shadow: 0 6px 32px rgba(0, 0, 0, 0.18);
      padding-bottom: 18px;
    }

    .custom-modal-token-header {
      background: #252D79;
      border-radius: 10px 10px 0 0;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 16px;
      position: relative;
    }

    .custom-modal-token-close {
      background: #ff2d2d;
      color: #fff;
      border: none;
      border-radius: 50%;
      width: 28px;
      height: 28px;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: 0;
      margin-top: 0;
      margin-right: 0;
      box-shadow: none;
      transition: background 0.18s;
      position: absolute;
      right: 16px;
      top: 8px;
    }

    .custom-modal-token-close:hover {
      background: #b80000;
    }

    .custom-modal-token-body {
      padding: 32px 24px 0 24px;
      text-align: center;
    }

    .token-title {
      font-size: 1.25rem;
      font-weight: bold;
      margin-bottom: 24px;
    }

    .token-input {
      font-size: 1rem;
      padding: 12px 14px;
      margin-bottom: 28px;
    }

    .token-footer-row-fixed {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      margin-top: 12px;
      padding: 0 12px 0 12px;
    }

    .token-footer-left {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 8px;
    }

    .token-footer-right {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
    }

    .token-label {
      font-size: 0.95rem;
    }

    .token-btn {
      flex: 1 1 0;
      max-width: 170px;
      text-align: center;
      border-radius: 16px;
      font-size: 1rem;
      min-width: 80px;
      padding: 10px 0;
      font-weight: 500;
      border: none;
      transition: background 0.18s, color 0.18s;
    }

    .token-btn-primary {
      background: #5a5ae6;
      color: #fff;
    }

    .token-btn-primary:hover {
      background: #252D79;
    }

    .token-btn-secondary {
      background: #5a5ae6;
      color: #fff;
    }

    .token-btn-secondary:hover {
      background: #252D79;
      color: #fff;
    }

    @media (max-width: 600px) {
      .custom-modal-token {
        min-width: 0;
        width: 95vw;
        padding: 0;
      }

      .custom-modal-token-body {
        padding: 18px 4px 0 4px;
      }

      .token-input {
        width: 95%;
        font-size: 1rem;
      }

      .token-footer-row-fixed {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
      }

      .token-footer-left,
      .token-footer-right {
        align-items: stretch;
      }
    }

    .token-footer-label {
      text-align: left;
      font-size: 0.95rem;
      color: #222;
      margin-bottom: 6px;
      margin-left: 2px;
    }

    .token-footer-btn-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 48px;
      margin-top: 0;
      margin-bottom: 0;
      width: 100%;
      max-width: 400px;
      margin-left: auto;
      margin-right: auto;
    }

    @media (max-width: 600px) {
      .token-footer-btn-row {
        flex-direction: column;
        gap: 12px;
        max-width: 100%;
      }

      .token-btn {
        max-width: 100%;
      }
    }

    /* Custom Modal Informasi */
    .custom-modal-info-title {
      color: #fff;
      font-size: 1.1rem;
      font-weight: bold;
      margin: 0 auto;
      width: 100%;
      text-align: center;
    }

    .custom-modal-info-body {
      padding: 32px 18px 32px 18px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
    }

    .custom-modal-info-text {
      font-size: 1.15rem;
      font-weight: bold;
      color: #222;
      line-height: 1.4;
      text-align: center;
      margin-left: auto;
      margin-right: auto;
      display: block;
      width: 100%;
    }

    @media (max-width: 600px) {
      .custom-modal-info-body {
        padding: 18px 2px 18px 2px;
      }

      .custom-modal-info-text {
        font-size: 1rem;
      }
    }

    .profile-dropdown.open .profile-menu {
      display: flex;
      flex-direction: column;
    }

    .profile-dropdown {
      min-width: 220px;
      max-width: 260px;
      margin-left: auto;
      border-radius: 0;
      background: transparent;
      box-shadow: none;
      font-family: 'Segoe UI', sans-serif;
      position: relative;
      display: inline-block;
    }

    .profile-header {
      display: flex;
      align-items: center;
      font-size: 1.05rem;
      font-weight: 600;
      padding: 12px 18px 8px 18px;
      cursor: pointer;
      border-radius: 0;
      width: 100%;
      box-sizing: border-box;
      background: transparent;
      color: #888;
    }

    .profile-header i {
      color: #888;
    }

    .profile-name {
      flex: 1;
      white-space: nowrap;
    }

    .profile-arrow {
      color: #888;
    }

    .profile-dropdown.open .profile-arrow {
      transform: rotate(180deg);
    }

    .profile-menu {
      background: #252D79;
      border-radius: 0 0 16px 16px;
      display: none;
      flex-direction: column;
      padding: 0 0 8px 0;
      width: 100%;
      min-width: 180px;
      box-sizing: border-box;
      z-index: 100;
    }

    .profile-dropdown.open .profile-menu {
      display: flex;
    }

    .profile-menu-item {
      color: #fff;
      font-size: 1.05rem;
      padding: 12px 24px;
      text-decoration: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      transition: background 0.15s;
    }

    .profile-menu-item:last-child {
      border-bottom: none;
    }

    .profile-menu-item:hover {
      background: #1a2157;
    }

    .paketku-header-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding: 0;
    }

    .paketku-header-title {
      font-size: 1.2rem;
      font-weight: 600;
      color: #222;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #252D79;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="img/logo/PrajaEdu.png" alt="PrajaEdu"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto fw-bold">
          <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="about us.php">About</a></li>
          <li class="nav-item"><a class="nav-link active text-white" href="kelas.php">Kelas</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="paket.php">Paket</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="refund-policy.php">Refund Policy</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid px-0">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <ul class="nav flex-column">
          <li><a href="pencapaian.php" class="nav-link"><i class="fas fa-bookmark"></i> Daftar Kelas</a></li>
          <li><a href="paket.php" class="nav-link"><i class="fas fa-shopping-bag"></i> Beli Paket Ujian</a></li>
          <li><a href="historytransaksi.php" class="nav-link"><i class="fas fa-credit-card"></i> History Transaksi</a>
          </li>
          <li><a href="paketlangganan.php" class="nav-link"><i class="fas fa-id-badge"></i> Paketku</a></li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-10">
        <div class="main-content mx-auto">
          <div class="paketku-header-bar">
            <div class="paketku-header-title">History</div>
            <div class="profile-dropdown" id="profileDropdown">
              <div class="profile-header" onclick="toggleProfileDropdown()">
                <i class="fa fa-user"></i>
                <span class="profile-name">M. Taufiequrohim R</span>
                <span class="profile-arrow" id="profileArrow">&#9660;</span>
              </div>
              <div class="profile-menu" id="profileMenu">
                <a href="editprofile.php" class="profile-menu-item">Edit Profile <span>&#8250;</span></a>
                <a href="gantipassword.php" class="profile-menu-item">Ganti Password <span>&#8250;</span></a>
                <a href="index.php" class="profile-menu-item" onclick="return confirmDeleteAccount(event);">Hapus Akun
                  <span>&#8250;</span></a>
                <a href="index.php" class="profile-menu-item">Keluar <span>&#8250;</span></a>
              </div>
            </div>
          </div>

          <div class="d-flex flex-column align-items-center text-center mb-3">
            <h3 class="fw-bold mt-2">Pilih Kelas</h3>
            <p>Silahkan Pilih Akses Kelas</p>
          </div>

          <div class="mb-2 fw-bold">Daftar Kelas</div>
          <div class="class-row">
            <span>TRYOUT SKD KEDINASAN PREMIUM (Berbayar)</span>
            <button class="btn btn-masuk"><i class="fa fa-lock me-2"></i>Masuk Kelas</button>
          </div>
          <div class="class-row">
            <span>Try Out CPNS Premium (Berbayar)</span>
            <button class="btn btn-masuk"><i class="fa fa-lock me-2"></i>Masuk Kelas</button>
          </div>
          <div class="class-row">
            <span>RANTO PRIME INTENSIVE 2025</span>
            <button class="btn btn-masuk"><i class="fa fa-lock me-2"></i>Masuk Kelas</button>
          </div>
          <div class="class-row">
            <span>PKU PRIME I 2025</span>
            <button class="btn btn-masuk"><i class="fa fa-lock me-2"></i>Masuk Kelas</button>
          </div>
          <div class="class-row">
            <span>BTR - Prime Intensive</span>
            <button class="btn btn-masuk"><i class="fa fa-lock me-2"></i>Masuk Kelas</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--footer-->
  <footer class="footer-distributed" style="width: 100%; background-color: #252D79;">
    <div class="footer-left">
      <div class="logo">
        <img src="img/logo/PrajaEdu.png" alt="" style="width: 125px;">
      </div>
      <br>
      <p class="footer-company-about">
        <span>Praja Edu adalah platform belajar online yang berfokus pada persiapan sekolah kedinasan, pendidikan
          akademik, dan pengembangan potensi siswa secara maksimal. Kami hadir untuk mendampingi perjalanan belajarmu
          menuju masa depan yang gemilang. <br>
          <br>
        </span>
      </p>
    </div>
    <div class="footer-center">
      <div></div>
    </div>
    <div class="footer-right">
      <p class="footer-company-about">
        <span>Hubungi Kami</span>
        Untuk informasi seputar program bimbel, jadwal try out online, atau ingin jadi bagian dari komunitas belajar
        kami, silakan hubungi atau ikuti kami lewat media sosial di bawah ini :
      </p>
      <div class="footer-icons">
        <a href="#" target="_blank"><i class="fa fa-phone"></i></a>
        <a href="#" target="_blank"><i class="fa fa-envelope"></i></a>
        <a href="#" target="_blank"><i class="fab fa-instagram-square"></i></a>
      </div>
    </div>
  </footer>

  <!-- Custom Modal Token -->
  <div class="custom-modal-overlay" id="customTokenModal">
    <div class="custom-modal-token">
      <div class="custom-modal-token-header">
        <button class="custom-modal-token-close" onclick="closeTokenModal()">&times;</button>
      </div>
      <div class="custom-modal-token-body">
        <div class="token-title">Masukkan Token Anda</div>
        <input type="text" class="token-input" id="inputTokenCustom" placeholder="" required>
        <div class="token-footer-label">Punya Token?</div>
        <div class="token-footer-btn-row">
          <button class="token-btn token-btn-secondary" onclick="handleTidakClick(event)">Tidak</button>
          <button class="token-btn token-btn-primary" onclick="submitTokenCustom(event)">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast Notification -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="tokenToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notifikasi</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Token berhasil diverifikasi! Mengalihkan ke kelas...
      </div>
    </div>
  </div>

  <!-- Custom Modal Informasi -->
  <div class="custom-modal-overlay" id="customInfoModal">
    <div class="custom-modal-token">
      <div class="custom-modal-token-header">
        <span class="custom-modal-info-title">Informasi</span>
        <button class="custom-modal-token-close" onclick="closeInfoModal()">&times;</button>
      </div>
      <div class="custom-modal-info-body">
        <div class="custom-modal-info-text">
          Anda harus membeli paket berlangganan<br>untuk mendapatkan token!
        </div>
      </div>
    </div>
  </div>

  <script>
    // Show modal on button click
    function showTokenModal() {
      document.getElementById('customTokenModal').classList.add('active');
    }
    function closeTokenModal() {
      document.getElementById('customTokenModal').classList.remove('active');
    }
    function submitTokenCustom(e) {
      e.preventDefault();
      var token = document.getElementById('inputTokenCustom').value.trim();
      if (token !== "") {
        window.location.href = 'pilih_kelas.php';
      }
      // Jika ingin validasi token, tambahkan else di sini
      closeTokenModal();
    }
    function handleTidakClick(e) {
      e.preventDefault();
      closeTokenModal();
      setTimeout(showInfoModal, 200); // beri jeda agar animasi modal tidak tabrakan
    }
    // Attach event to all .btn-masuk
    window.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.btn-masuk').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          showTokenModal();
        });
      });
    });
    function showInfoModal() {
      document.getElementById('customInfoModal').classList.add('active');
    }
    function closeInfoModal() {
      document.getElementById('customInfoModal').classList.remove('active');
    }
  </script>
  <script>
    function toggleProfileDropdown() {
      var dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('open');
    }

    document.addEventListener('click', function (e) {
      var dropdown = document.getElementById('profileDropdown');
      if (!dropdown.contains(e.target)) {
        dropdown.classList.remove('open');
      }
    });

    function confirmDeleteAccount(e) {
      e.preventDefault();
      if (confirm('Apakah anda ingin menghapus akun anda?')) {
        // window.location.href = 'hapusakun.php';
      }
      return false;
    }
  </script>
</body>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>