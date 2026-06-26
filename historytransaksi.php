<?php
include 'koneksi.php';

// Cek apakah tabel transaksi sudah ada
$check_table = "SHOW TABLES LIKE 'transaksi'";
$table_exists = $conn->query($check_table);

$result = null;

if ($table_exists && $table_exists->num_rows > 0) {
    // Tabel sudah ada, ambil data
    $sql = "SELECT * FROM transaksi ORDER BY tanggal_pembelian DESC";
    $result = $conn->query($sql);
} else {
    // Tabel belum ada, buat tabel dan data contoh
    echo "<script>console.log('Membuat tabel transaksi...');</script>";
    
    // Buat tabel transaksi
    $create_table = "CREATE TABLE IF NOT EXISTS `transaksi` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nama_paket` varchar(100) NOT NULL,
        `tanggal_pembelian` date NOT NULL,
        `tanggal_expired` date NOT NULL,
        `status_pembayaran` varchar(20) NOT NULL,
        `nama_user` varchar(100) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    
    if ($conn->query($create_table) === TRUE) {
        // Tambah data contoh
        $insert_data = "INSERT INTO `transaksi` (`nama_paket`, `tanggal_pembelian`, `tanggal_expired`, `status_pembayaran`, `nama_user`) VALUES
        ('Tryout SKD Kedinasan', '2025-04-12', '2025-07-12', 'Terkonfirmasi', 'M. Taufiequrohim R'),
        ('Simulasi CPNS', '2025-03-05', '2025-06-05', 'Menunggu', 'M. Taufiequrohim R'),
        ('Tryout CPNS', '2025-01-10', '2025-04-10', 'Ditolak', 'M. Taufiequrohim R')";
        
        $conn->query($insert_data);
        
        // Ambil data setelah membuat tabel
        $sql = "SELECT * FROM transaksi ORDER BY tanggal_pembelian DESC";
        $result = $conn->query($sql);
    } else {
        echo "<script>console.log('Gagal membuat tabel: " . $conn->error . "');</script>";
    }
}

// Fungsi untuk mendapatkan badge class berdasarkan status
function getStatusBadge($status) {
    switch ($status) {
        case 'Terkonfirmasi':
            return 'bg-success';
        case 'Menunggu':
            return 'bg-warning';
        case 'Ditolak':
            return 'bg-danger';
        default:
            return 'bg-secondary';
    }
}
?>
<!doctype html>
<html lang="id">

<head>
  <title>History Transaksi | PrajaEdu</title>
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

    .header-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: #222;
    }

    .search-row {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .search-box {
      display: flex;
      align-items: center;
      background: #fff;
      border: 2px solid #222;
      border-radius: 24px;
      padding: 8px 18px;
      flex: 1;
      max-width: 300px;
    }

    .search-box input {
      border: none;
      outline: none;
      font-size: 1rem;
      background: none;
      width: 100%;
    }

    .btn-print {
      background: #252D79;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 8px 18px;
      font-size: 1rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 7px;
      cursor: pointer;
      transition: background 0.18s;
    }

    .btn-print:hover {
      background: #1a2157;
    }

    .table-wrap {
      overflow-x: auto;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 1rem;
    }

    th,
    td {
      border: 1px solid #e0e0e0;
      padding: 12px;
      text-align: left;
    }

    th {
      background: #f8f8f8;
      font-weight: 600;
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

    .footer-distributed {
      background-color: #252D79;
      color: white;
      padding: 40px 0;
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin-top: auto;
    }

    .footer-left {
      flex: 1;
      padding: 0 40px;
    }

    .footer-center {
      flex: 1;
    }

    .footer-right {
      flex: 1;
      padding: 0 40px;
    }

    .footer-company-about {
      color: #fff;
      font-size: 14px;
      margin-top: 20px;
    }

    .footer-company-about span {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 20px;
      display: block;
    }

    .footer-icons {
      margin-top: 25px;
    }

    .footer-icons a {
      display: inline-block;
      width: 35px;
      height: 35px;
      background-color: #33383b;
      border-radius: 50%;
      font-size: 20px;
      color: #ffffff;
      text-align: center;
      line-height: 35px;
      margin-right: 10px;
      margin-bottom: 5px;
    }

    @media (max-width: 880px) {
      .footer-distributed {
        flex-direction: column;
        padding: 20px;
      }

      .footer-left,
      .footer-center,
      .footer-right {
        padding: 0;
        margin-bottom: 20px;
      }
    }

    /* ini */
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

      <!-- Main Content -->
      <div class="main-content">
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

        <div class="content-box">
          <div class="search-row">
            <div class="search-box">
              <input type="text" placeholder="Cari transaksi..." />
            </div>
            <button class="btn-print" id="btnPrintPDF"><i class="fa fa-print"></i> Cetak PDF</button>
            <a href="paket.php" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Kembali ke paket
              ujian</a>
          </div>

          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA PAKET</th>
                  <th>TANGGAL PEMBELIAN</th>
                  <th>TANGGAL EXPIRED</th>
                  <th>STATUS PEMBAYARAN</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($result && $result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_paket']) . "</td>";
                        echo "<td>" . date('Y-m-d', strtotime($row['tanggal_pembelian'])) . "</td>";
                        echo "<td>" . date('Y-m-d', strtotime($row['tanggal_expired'])) . "</td>";
                        echo "<td><span class='badge " . getStatusBadge($row['status_pembayaran']) . "'>" . htmlspecialchars($row['status_pembayaran']) . "</span></td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data transaksi</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Footer -->
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
            Untuk informasi seputar program bimbel, jadwal try out online, atau ingin jadi bagian dari komunitas
            belajar
            kami, silakan hubungi atau ikuti kami lewat media sosial di bawah ini :
          </p>
          <div class="footer-icons">
            <a href="#" target="_blank"><i class="fa fa-phone"></i></a>
            <a href="#" target="_blank"><i class="fa fa-envelope"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram-square"></i></a>
          </div>
        </div>
      </footer>


      <!-- Tambahkan CDN jsPDF dan html2canvas sebelum </body> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
      <script>
        document.getElementById('btnPrintPDF').addEventListener('click', function () {
          var table = document.querySelector('table');
          html2canvas(table).then(function (canvas) {
            var imgData = canvas.toDataURL('image/png');
            var pdf = new jspdf.jsPDF({ orientation: 'landscape', unit: 'pt', format: 'a4' });
            var pageWidth = pdf.internal.pageSize.getWidth();
            var pageHeight = pdf.internal.pageSize.getHeight();
            var imgWidth = pageWidth - 40;
            var imgHeight = canvas.height * imgWidth / canvas.width;
            pdf.addImage(imgData, 'PNG', 20, 20, imgWidth, imgHeight);
            pdf.save('history-transaksi.pdf');
          });
        });
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

</html>