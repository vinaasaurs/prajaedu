<?php
session_start();
include 'koneksi.php';
$default_user = isset($_SESSION['namaUser']) ? $_SESSION['namaUser'] : 'M. Taufiequrohim R';

$success = $error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $renewpass = $_POST['renewpass'];
  $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
  if ($newpass !== $renewpass) {
    $error = "Password baru dan konfirmasi tidak sama!";
  } else {
    // Cek password lama
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND passwordUser = ?");
    $stmt->bind_param("ss", $username, $oldpass);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      // Update password
      $stmt2 = $conn->prepare("UPDATE users SET passwordUser = ? WHERE username = ?");
      $stmt2->bind_param("ss", $newpass, $username);
      $stmt2->execute();
      $success = "Password berhasil diubah!";
    } else {
      $error = "Password lama salah!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ganti Password</title>
  <link rel="icon" type="image/png" href="img/logo/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="css/manual/style.css">
  <link rel="stylesheet" type="text/css" href="css/style-enfold.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,500,600,300,700' rel='stylesheet' type='text/css'>
  <style>
    body {
      margin: 0;
      background: #f7f7f7;
      font-family: 'Segoe UI', sans-serif;
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

    .page-title {
      color: #bdbdbd;
      font-size: 1.25rem;
      font-weight: 500;
      margin: 32px 0 0 32px;
      letter-spacing: 0.2px;
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

    .content-box {
      background: #fff;
      border-radius: 12px;
      padding: 24px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
      min-height: 400px;
      margin-left: 0;
    }

    .content-inner {
      padding: 32px 32px 32px 32px;
    }

    .content-title {
      font-size: 2.1rem;
      font-weight: bold;
      margin-bottom: 18px;
      margin-top: 0;
      letter-spacing: 0.5px;
      color: #111;
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

    .edit-form label {
      font-size: 1.08rem;
      font-weight: 500;
      color: #222;
      margin-bottom: 6px;
      display: block;
    }

    .edit-form input {
      width: 100%;
      padding: 12px 14px;
      border-radius: 12px;
      border: 1.5px solid #ccc;
      font-size: 1rem;
      margin-bottom: 18px;
      outline: none;
      background: #fff;
      transition: border 0.2s;
      box-sizing: border-box;
      color: #222;
    }

    .edit-form input:focus {
      border: 1.5px solid #252D79;
      background: #f7f3e8;
    }

    .btn-save-password {
      background: #2196f3;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 10px 28px;
      font-size: 1.1rem;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: background 0.18s;
      margin-top: 10px;
      margin-left: auto;
    }

    .btn-save-password:hover {
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

      .content-inner {
        padding: 18px 8px 18px 8px;
      }
    }

    .content-box,
    .page-title {
      margin-left: 0;
      margin-right: 0;
    }

    .content-inner {
      padding: 10px 2px 10px 2px;
    }

    .user-top {
      margin-right: 8px;
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
          <div class="paketku-header-title">Ganti Password</div>
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
          <div class="content-inner">
            <div class="content-title">Ganti Password</div>
            <?php if(!empty($success)): ?>
              <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <?php if(!empty($error)): ?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form class="edit-form" method="post" action="">
              <label for="oldpass">Password Lama</label>
              <input type="password" id="oldpass" name="oldpass" required>
              <label for="newpass">Password Baru</label>
              <input type="password" id="newpass" name="newpass" required>
              <label for="renewpass">Ulangi Password Baru</label>
              <input type="password" id="renewpass" name="renewpass" required>
              <div style="display: flex;">
                <button type="submit" class="btn-save-password"><i class="fa fa-save"></i> Simpan Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Footer -->
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