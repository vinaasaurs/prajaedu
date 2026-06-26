<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz | PrajaEdu</title>
  <link rel="icon" type="image/png" href="img/logo/favicon.png">

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

    .tab-menu {
      display: flex;
      gap: 32px;
      border-bottom: 1.5px solid #eee;
      margin-bottom: 18px;
      justify-content: flex-start;
    }

    .tab-menu button {
      background: none;
      border: none;
      color: #222;
      font-size: 1.08rem;
      font-weight: 500;
      padding: 10px 0 12px 0;
      margin-bottom: -2px;
      cursor: pointer;
      border-bottom: 2.5px solid transparent;
      transition: border 0.18s, color 0.18s;
      display: flex;
      align-items: center;
      gap: 7px;
    }

    .tab-menu .tab-link {
      background: none;
      border: none;
      color: #222;
      font-size: 1.08rem;
      font-weight: 500;
      padding: 10px 0 12px 0;
      margin-bottom: -2px;
      cursor: pointer;
      border-bottom: 2.5px solid transparent;
      transition: border 0.18s, color 0.18s;
      display: flex;
      align-items: center;
      gap: 7px;
      text-decoration: none;
    }

    .tab-menu button.active,
    .tab-menu button:hover {
      color: #252D79;
      border-bottom: 2.5px solid #252D79;
    }

    @media (max-width: 900px) {
      .sidebar {
        width: 60px;
      }

      .main-content {
        margin-left: 60px;
      }

      .footer-distributed {
        margin-left: 60px;
      }

      .sidebar .nav-link span {
        display: none;
      }

      .sidebar .nav-link i {
        margin-right: 0;
      }
    }

    @media (max-width: 600px) {
      .sidebar {
        display: none;
      }

      .main-content {
        margin-left: 0;
        padding: 15px;
      }

      .footer-distributed {
        margin-left: 0;
      }

      .content-box {
        padding: 15px;
      }

      .filter-row {
        flex-direction: column;
      }

      .filter-row select {
        width: 100%;
      }
    }

    .main-content {
      width: 100%;
      padding: 20px;
      min-height: calc(100vh - 60px);
      background: #f8f8f8;
      flex: 1;
    }

    .page-title {
      color: #bdbdbd;
      font-size: 1.25rem;
      font-weight: 500;
      margin: 32px 0 0 32px;
      letter-spacing: 0.2px;
    }

    .content-box {
      background: #fff;
      border-radius: 12px;
      padding: 24px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
      min-height: 400px;
      margin-left: 0;
    }

    .content-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 18px;
    }

    .content-header .user {
      font-weight: 600;
      color: #222;
      font-size: 1.05rem;
    }

    .kelas-status {
      display: inline-block;
      background: #ffe600;
      color: #222;
      font-weight: 600;
      border-radius: 6px;
      padding: 6px 18px;
      font-size: 1rem;
      margin: 18px 0 24px 0;
      border: none;
    }

    .tab-menu {
      display: flex;
      gap: 32px;
      border-bottom: 1.5px solid #eee;
      margin-bottom: 18px;
      justify-content: flex-start;
    }

    .tab-menu button {
      background: none;
      border: none;
      color: #222;
      font-size: 1.08rem;
      font-weight: 500;
      padding: 10px 0 12px 0;
      margin-bottom: -2px;
      cursor: pointer;
      border-bottom: 2.5px solid transparent;
      transition: border 0.18s, color 0.18s;
      display: flex;
      align-items: center;
      gap: 7px;
    }

    .tab-menu .tab-link {
      background: none;
      border: none;
      color: #222;
      font-size: 1.08rem;
      font-weight: 500;
      padding: 10px 0 12px 0;
      margin-bottom: -2px;
      cursor: pointer;
      border-bottom: 2.5px solid transparent;
      transition: border 0.18s, color 0.18s;
      display: flex;
      align-items: center;
      gap: 7px;
      text-decoration: none;
    }

    .tab-menu button.active,
    .tab-menu button:hover {
      color: #252D79;
      border-bottom: 2.5px solid #252D79;
    }

    .filter-row {
      display: flex;
      gap: 12px;
      margin-bottom: 18px;
      align-items: center;
    }

    .filter-row select {
      padding: 7px 14px;
      border-radius: 7px;
      border: 1.2px solid #ccc;
      font-size: 1rem;
      background: #fafbfc;
      color: #222;
    }

    .tryout-box {
      background: #ffe600;
      border-radius: 8px;
      padding: 18px 18px 18px 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 18px;
      font-weight: 600;
      font-size: 1.08rem;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.03);
    }

    .tryout-btn {
      background: #2196f3;
      color: #fff;
      border: none;
      border-radius: 6px;
      padding: 8px 22px;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.18s;
    }

    .tryout-btn:hover {
      background: #1565c0;
    }

    @media (max-width: 900px) {
      .sidebar {
        width: 60px;
      }

      .main-content {
        margin-left: 60px;
      }

      .sidebar-menu a span {
        display: none;
      }

      .sidebar-menu a .icon {
        width: 100%;
      }

      .content-box,
      .page-title {
        margin-left: 12px;
        margin-right: 12px;
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
  <!-- Gunakan fontawesome CDN untuk icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
          <li class="nav-item"><a class="nav-link text-white" href="kelas.php">Kelas</a></li>
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

      <div class="main-content">
        <div class="paketku-header-bar">
          <div class="paketku-header-title">Quiz</div>
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

        <div class="content-box">
          <div class="content-header">
          </div>
          <div style="display: flex; justify-content: center; margin-bottom: 18px;">
            <span class="kelas-status">Kelas Belum Dimulai</span>
          </div>
          <div class="tab-menu">
            <a href="pencapaian.php" class="tab-link"><i class="fa fa-trophy"></i> Pencapaian</a><br>
            <a href="tryout.php" class="tab-link"><i class="fa fa-clipboard-list"></i> TryOut</a><br>
            <a href="quiz.php" class="tab-link active"><i class="fa fa-question-circle"></i> Quis</a><br>
            <a href="history.php" class="tab-link"><i class="fa fa-clock"></i> History</a><br>
            <a href="file.php" class="tab-link"><i class="fa fa-file"></i> File</a>
          </div>
          <div class="filter-row" style="flex-direction:column; align-items:flex-start; gap:7px; margin-bottom:18px;">
            <span style="margin-bottom:2px; font-weight:500;">Pencapaian Topik</span>
          </div>
          <div class="tryout-box">
            <span>Quiz 1</span>
            <button class="tryout-btn" onclick="window.location.href='https://quizizz.com/join?gc=22840780'"> MASUK </button>
          </div>
          <div class="tryout-box">
            <span>Quiz 2</span>
            <button class="tryout-btn" onclick="window.location.href='https://quizizz.com/join?gc=22840780'"> MASUK </button>
          </div>
        </div>
      </div>
      <br>
      <footer class="footer-distributed" style="width: 100%; background-color: #252D79;">
        <div class="footer-left">
          <div class="logo">
            <img src="img/logo/PrajaEdu.png" alt="" style="width: 125px;">
          </div>
          <br>
          <p class="footer-company-about">
            <span>Praja Edu adalah platform belajar online yang berfokus pada persiapan sekolah kedinasan, pendidikan
              akademik, dan pengembangan potensi siswa secara maksimal. Kami hadir untuk mendampingi perjalanan
              belajarmu
              menuju masa depan yang gemilang.<br>
              <br>
            </span>
          </p>
        </div>
        <div class="footer-center">
        </div>
        <div class="footer-right">
          <p class="footer-company-about">
            <span>Hubungi Kami</span>
            Untuk informasi seputar program bimbel, jadwal try out online, atau ingin jadi bagian dari komunitas belajar
            kami, silakan hubungi atau ikuti kami lewat media sosial di bawah ini :
          </p>
          <div class="footer-icons">
            <a href="#"><i class="fa fa-phone"></i></a>
            <a href="#"><i class="fa fa-envelope"></i></a>
            <a href="#"><i class="fab fa-instagram-square"></i></a>
          </div>
        </div>
      </footer>
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

</html>