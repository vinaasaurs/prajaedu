<?php
include 'koneksi.php';

// Ambil data paket user dari database
$nama_user = "M. Taufiequrohim R"; // Ganti dengan nama user yang login
$sql = "SELECT * FROM transaksi WHERE nama_user = ? AND status_pembayaran = 'Terkonfirmasi' ORDER BY tanggal_pembelian DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nama_user);
$stmt->execute();
$result = $stmt->get_result();

// Hitung jumlah paket aktif
$total_paket = $result->num_rows;

// Fungsi untuk menghitung sisa hari
function hitungSisaHari($tanggal_expired) {
    $today = new DateTime();
    $expired = new DateTime($tanggal_expired);
    $interval = $today->diff($expired);
    
    if ($expired < $today) {
        return "Expired";
    } else {
        return $interval->days . " hari lagi";
    }
}

// Fungsi untuk mendapatkan status paket
function getStatusPaket($tanggal_expired) {
    $today = new DateTime();
    $expired = new DateTime($tanggal_expired);
    
    if ($expired < $today) {
        return "expired";
    } else {
        return "active";
    }
}
?>
<!doctype html>
<html lang="id">

<head>
  <title>Paket | PrajaEdu</title>
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

    .content-box {
      background: #fff;
      border-radius: 10px;
      padding: 24px;
      min-height: 400px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
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

    .paketku-header-user {
      font-size: 1.05rem;
      color: #222;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 7px;
    }

    .paketku-box {
      background: #5667e7;
      border-radius: 10px;
      padding: 32px;
      margin-top: 20px;
      color: #fff;
    }

    .paketku-title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 22px;
      margin-top: 0;
      letter-spacing: 0.5px;
    }

    .paketku-warning {
      background: #ffe600;
      color: #222;
      border-radius: 8px;
      padding: 16px 20px;
      font-size: 1.13rem;
      font-weight: 500;
      margin: 0;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.03);
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .paketku-warning b {
      font-weight: bold;
      margin-right: 4px;
    }

    .paketku-warning .highlight {
      color: #ff9800;
      font-weight: bold;
    }

    .paket-card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 16px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      border-left: 4px solid #28a745;
    }

    .paket-card.expired {
      border-left-color: #dc3545;
      opacity: 0.7;
    }

    .paket-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 12px;
    }

    .paket-nama {
      font-size: 1.2rem;
      font-weight: 600;
      color: #222;
    }

    .paket-status {
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .paket-status.active {
      background: #d4edda;
      color: #155724;
    }

    .paket-status.expired {
      background: #f8d7da;
      color: #721c24;
    }

    .paket-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 12px;
      margin-top: 12px;
    }

    .paket-detail {
      display: flex;
      flex-direction: column;
    }

    .paket-detail-label {
      font-size: 0.85rem;
      color: #666;
      margin-bottom: 4px;
    }

    .paket-detail-value {
      font-size: 1rem;
      font-weight: 500;
      color: #222;
    }

    .user-top {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin-right: 32px;
      margin-top: 18px;
      font-size: 1.05rem;
      color: #222;
      font-weight: 500;
    }

    .user-top i {
      margin-right: 7px;
      font-size: 1.2rem;
    }

    .footer-distributed {
      width: 100%;
      position: relative;
      z-index: 1;
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
    }

    @media (max-width: 600px) {
      .sidebar {
        display: none;
      }

      .main-content {
        margin-left: 0;
      }

      .footer-distributed {
        margin-left: 0;
      }
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

      <!-- Main Content -->
      <div class="main-content">
        <div class="paketku-header-bar">
          <div class="paketku-header-title">Paketku</div>
          <div class="profile-dropdown" id="profileDropdown">
            <div class="profile-header" onclick="toggleProfileDropdown()">
              <i class="fa fa-user"></i>
              <span class="profile-name"><?php echo htmlspecialchars($nama_user); ?></span>
              <span class="profile-arrow" id="profileArrow">&#9660;</span>
            </div>
            <div class="profile-menu" id="profileMenu">
              <a href="editprofile.php" class="profile-menu-item">Edit Profile <span>&#8250;</span></a>
              <a href="gantipassword.php" class="profile-menu-item">Ganti Password <span>&#8250;</span></a>
              <a href="#" class="profile-menu-item" onclick="return confirmDeleteAccount(event);">Hapus Akun
                <span>&#8250;</span></a>
              <a href="#" class="profile-menu-item">Keluar <span>&#8250;</span></a>
            </div>
          </div>
        </div>

        <div class="content-box">
          <div class="paketku-header">Paketku</div>
          
          <?php if ($total_paket > 0): ?>
            <!-- Tampilkan paket yang dimiliki -->
            <div class="paketku-box">
              <div class="paketku-title">Paket Langganan (<?php echo $total_paket; ?> paket)</div>
              
              <?php while($row = $result->fetch_assoc()): ?>
                <?php 
                $status_paket = getStatusPaket($row['tanggal_expired']);
                $sisa_hari = hitungSisaHari($row['tanggal_expired']);
                ?>
                <div class="paket-card <?php echo $status_paket; ?>">
                  <div class="paket-header">
                    <div class="paket-nama"><?php echo htmlspecialchars($row['nama_paket']); ?></div>
                    <div class="paket-status <?php echo $status_paket; ?>">
                      <?php echo $status_paket == 'active' ? 'Aktif' : 'Expired'; ?>
                    </div>
                  </div>
                  <div class="paket-details">
                    <div class="paket-detail">
                      <div class="paket-detail-label">Tanggal Pembelian</div>
                      <div class="paket-detail-value"><?php echo date('d/m/Y', strtotime($row['tanggal_pembelian'])); ?></div>
                    </div>
                    <div class="paket-detail">
                      <div class="paket-detail-label">Tanggal Expired</div>
                      <div class="paket-detail-value"><?php echo date('d/m/Y', strtotime($row['tanggal_expired'])); ?></div>
                    </div>
                    <div class="paket-detail">
                      <div class="paket-detail-label">Status</div>
                      <div class="paket-detail-value"><?php echo $sisa_hari; ?></div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php else: ?>
            <!-- Tampilkan pesan jika tidak ada paket -->
            <div class="paketku-box">
              <div class="paketku-title">Paket Langganan</div>
              <div class="paketku-warning">
                <b>Tidak ada paket</b> Silahkan <span class="highlight">beli paket</span> baru sekarang juga!
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!--footer-->
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
              menuju masa depan yang gemilang. <br>
              <br>
            </span>
          </p>
        </div>
        <div class="footer-center">
          <div>

          </div>
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
      <!-- Optional JavaScript; choose one of the two! -->
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
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
            // Arahkan ke aksi hapus akun di sini, misal:
            // window.location.href = 'hapusakun.php';
          }
          return false;
        }
      </script>
</body>