<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelas - Praja Edu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    .materi-dropdown-container {
      width: 100%;
      max-width: 1000px;
      margin: 0 auto 40px auto;
    }

    .materi-item {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
      padding: 0;
    }

    .materi-question {
      font-size: 1.3rem;
      font-weight: 500;
      text-align: left;
      padding: 18px 32px 18px 32px;
      cursor: pointer;
      border-radius: 16px 16px 0 0;
      background: #fff;
    }

    .materi-arrow {
      transition: transform 0.3s;
    }

    .materi-answer {
      background: #252D79;
      border-radius: 0 0 16px 16px;
      padding: 30px 0 30px 0;
    }

    .materi-list {
      width: 100%;
    }

    .materi-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: #fff;
      font-size: 1.1rem;
      margin: 18px 60px;
    }

    .materi-btn {
      background: #4B56C0;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 8px 22px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.2s;
    }

    .materi-btn:hover {
      background: #252D79;
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

    .footer-distributed {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding: 40px 40px;
      color: white;
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
            <div class="paketku-header-title">Materi</div>
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
            <h3 class="fw-bold mt-2">Pilih Materi</h3>
            <p>Silahkan Pilih Materi Anda</p>
          </div>

          <!-- Materi Dropdowns -->
          <div class="materi-dropdown-container container mt-4 mb-4">
            <!-- TWK -->
            <div class="materi-item mb-4">
              <div class="materi-question d-flex justify-content-between align-items-center"
                onclick="toggleMateriDropdown(this)">
                <span class="fw-bold" style="font-size:1.3rem;">Tes Wawasan Kebangsaan (TWK)</span>
                <span class="materi-arrow" style="font-size:2rem;">&#9660;</span>
              </div>
              <div class="materi-answer" style="display:none;">
                <div class="materi-list">
                  <div class="materi-row">
                    <span>Pancasila</span>
                    <button class="materi-btn" onclick="window.location.href='pancasila.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>NKRI dan sejarahnya</span>
                    <button class="materi-btn" onclick="window.location.href='nkri_dan_sejarahnya.php'">Masuk
                      Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Sistem pemerintahan Indonesia</span>
                    <button class="materi-btn" onclick="window.location.href='sistem_pemerindo.php'">Masuk
                      Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Nasionalisme dan bela negara</span>
                    <button class="materi-btn" onclick="window.location.href='nasionalisme.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Rangkuman Materi Wawasan Kebangsaan</span>
                    <button class="materi-btn">Download Materi</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- TIU -->
            <div class="materi-item mb-4">
              <div class="materi-question d-flex justify-content-between align-items-center"
                onclick="toggleMateriDropdown(this)">
                <span class="fw-bold" style="font-size:1.3rem;">Tes Intelegensi Umum (TIU)</span>
                <span class="materi-arrow" style="font-size:2rem;">&#9660;</span>
              </div>
              <div class="materi-answer" style="display:none;">
                <div class="materi-list">
                  <div class="materi-row">
                    <span>Deret Angka</span>
                    <button class="materi-btn" onclick="window.location.href='deretangka.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Aritmetika Dasar</span>
                    <button class="materi-btn" onclick="window.location.href='aritmetikadasar.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Deret Angka dan Huruf</span>
                    <button class="materi-btn" onclick="window.location.href='deretangka.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Pemahaman Bacaan</span>
                    <button class="materi-btn" onclick="window.location.href='pemahamanbacaan.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Rangkuman Materi Intelegensi Umum</span>
                    <button class="materi-btn">Download Materi</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- TKP -->
            <div class="materi-item mb-4">
              <div class="materi-question d-flex justify-content-between align-items-center"
                onclick="toggleMateriDropdown(this)">
                <span class="fw-bold" style="font-size:1.3rem;">Tes Karakteristik Pribadi (TKP)</span>
                <span class="materi-arrow" style="font-size:2rem;">&#9660;</span>
              </div>
              <div class="materi-answer" style="display:none;">
                <div class="materi-list">
                  <div class="materi-row">
                    <span>Pelayanan Publik</span>
                    <button class="materi-btn" onclick="window.location.href='pelayananpublik.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Jejaring Kerja</span>
                    <button class="materi-btn" onclick="window.location.href='jejaringkerja.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Sosial Budaya</span>
                    <button class="materi-btn" onclick="window.location.href='sosialbudaya.php'">Masuk Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Teknologi Informasi</span>
                    <button class="materi-btn" onclick="window.location.href='teknologiinformasi.php'">Masuk
                      Kelas</button>
                  </div>
                  <div class="materi-row">
                    <span>Rangkuman Materi Karakteristik pribadi</span>
                    <button class="materi-btn">Download Materi</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Materi Dropdowns -->

          <!-- Modal Pop Up Download Materi -->
          <div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="downloadModalLabel">Informasi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                  Materi sudah di download
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
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
            <span>Praja Edu adalah platform belajar online yang berfokus pada persiapan sekolah kedinasan,
              pendidikan
              akademik, dan pengembangan potensi siswa secara maksimal. Kami hadir untuk mendampingi perjalanan
              belajarmu
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

      <script>
        function toggleMateriDropdown(element) {
          const answer = element.nextElementSibling;
          const arrow = element.querySelector('.materi-arrow');

          if (answer.style.display === 'none' || answer.style.display === '') {
            answer.style.display = 'block';
            arrow.style.transform = 'rotate(180deg)';
          } else {
            answer.style.display = 'none';
            arrow.style.transform = 'rotate(0deg)';
          }
        }

        document.addEventListener('DOMContentLoaded', function () {
          document.querySelectorAll('.materi-btn').forEach(function (btn) {
            if (btn.textContent.trim() === 'Download Materi') {
              btn.addEventListener('click', function (e) {
                e.preventDefault();
                var modal = new bootstrap.Modal(document.getElementById('downloadModal'));
                modal.show();
              });
            }
          });
        });
      </script>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>