<?php
include 'koneksi.php';

// Ambil data user dari database (contoh dengan ID user tertentu)
// Dalam implementasi nyata, ini akan menggunakan session atau ID user yang login
$idUser = 1; // Ganti dengan ID user yang sedang login

// Proses form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $jk = $_POST['jk'];
    $asal = $_POST['asal'];
    
    // Update data user
    $sql = "UPDATE users SET namaUser = ?, emailUser = ?, alamatUser = ?, teleponUser = ?, jenisKelaminUser = ?, asalSekolahUser = ? WHERE idUser = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nama, $email, $alamat, $telepon, $jk, $asal, $idUser);
    
    if ($stmt->execute()) {
        $success_message = "Profile berhasil diperbarui!";
    } else {
        $error_message = "Gagal memperbarui profile: " . $conn->error;
    }
    $stmt->close();
}

// Ambil data user untuk ditampilkan di form
$sql = "SELECT * FROM users WHERE idUser = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUser);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile | PrajaEdu</title>
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
      padding: 0;
      min-height: 100vh;
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
      margin: 24px 32px 0 32px;
      padding: 0;
      min-height: 400px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
      border: 2px solid #e0e0e0;
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

    .edit-form label {
      font-size: 1.08rem;
      font-weight: 500;
      color: #222;
      margin-bottom: 6px;
      display: block;
    }

    .edit-form input,
    .edit-form select {
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

    .edit-form input:focus,
    .edit-form select:focus {
      border: 1.5px solid #252D79;
      background: #f7f3e8;
    }

    .edit-form .btn-save {
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

    .edit-form .btn-save:hover {
      background: #1565c0;
    }

    .alert {
      padding: 12px 16px;
      border-radius: 8px;
      margin-bottom: 18px;
      font-size: 1rem;
    }

    .alert-success {
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      color: #155724;
    }

    .alert-danger {
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      color: #721c24;
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

    @media (max-width: 600px) {
      .navbar {
        flex-direction: column;
        height: auto;
      }

      .navbar .logo {
        margin-left: 10px;
      }

      .navbar-menu {
        margin-right: 10px;
        gap: 12px;
      }

      .sidebar {
        display: none;
      }

      .main-content {
        margin-left: 0;
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
      <div class="col-md-2 sidebar"
        style="background: #f9f6ef; min-height: 100vh; padding-top: 40px; border-right: 1px solid #e0e0e0;">
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
            <div class="paketku-header-title">Edit Profile</div>
            <div class="profile-dropdown" id="profileDropdown">
              <div class="profile-header" onclick="toggleProfileDropdown()">
                <i class="fa fa-user"></i>
                <span class="profile-name"><?php echo htmlspecialchars($user['namaUser'] ?? 'M. Taufiequrohim R'); ?></span>
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
          
          <!-- Konten Edit Profile lama mulai di sini -->
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text-end">
            </div>
          </div>
          <div class="content-box">
            <div class="content-inner">
              <div class="content-title">Edit Profile</div>
              
              <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
              <?php endif; ?>
              
              <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
              <?php endif; ?>
              
              <form class="edit-form" method="post" action="">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($user['namaUser'] ?? ''); ?>" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['emailUser'] ?? ''); ?>" required>
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($user['alamatUser'] ?? ''); ?>">
                <label for="telepon">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon" value="<?php echo htmlspecialchars($user['teleponUser'] ?? ''); ?>">
                <label for="jk">Jenis Kelamin</label>
                <select id="jk" name="jk">
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="Laki-laki" <?php echo ($user['jenisKelaminUser'] ?? '') == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                  <option value="Perempuan" <?php echo ($user['jenisKelaminUser'] ?? '') == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                </select>
                <label for="asal">Asal Sekolah</label>
                <input type="text" id="asal" name="asal" value="<?php echo htmlspecialchars($user['asalSekolahUser'] ?? ''); ?>">
                <div style="display: flex;">
                  <button type="submit" class="btn-save"><i class="fa fa-save"></i> Simpan</button>
                </div>
              </form>
            </div>
          </div>
          <!-- Konten Edit Profile lama selesai di sini -->
        </div>
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
          belajarmu menuju masa depan yang gemilang.<br>
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
</body>

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