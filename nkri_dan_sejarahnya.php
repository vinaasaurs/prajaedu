<?php
include 'koneksi.php';

// Buat tabel forum_diskusi jika belum ada dengan error handling
$create_table_sql = "CREATE TABLE IF NOT EXISTS `forum_diskusi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$conn->query($create_table_sql);

// Proses komentar baru dengan error handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['komentar'])) {
  $komentar = $_POST['komentar'];
  $nama_user = "M. Taufiequrohim R"; // Ganti dengan nama user yang login
  $materi = "NKRI dan Sejarahnya";
  $tanggal = date('Y-m-d H:i:s');

  // Cek apakah tabel dan kolom ada sebelum insert
  $check_table = "SHOW TABLES LIKE 'forum_diskusi'";
  $table_exists = $conn->query($check_table);

  if ($table_exists && $table_exists->num_rows > 0) {
    // Cek apakah kolom nama_user ada
    $check_column = "SHOW COLUMNS FROM forum_diskusi LIKE 'nama_user'";
    $column_exists = $conn->query($check_column);

    if ($column_exists && $column_exists->num_rows > 0) {
      // Insert komentar ke database
      $sql = "INSERT INTO forum_diskusi (nama_user, materi, komentar, tanggal) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssss", $nama_user, $materi, $komentar, $tanggal);

      if ($stmt->execute()) {
        // Redirect untuk menghindari resubmission
        header("Location: nkri_dan_sejarahnya.php");
        exit();
      } else {
        $error_message = "Gagal menambahkan komentar: " . $conn->error;
      }
      $stmt->close();
    } else {
      $error_message = "Struktur tabel tidak sesuai. Silakan jalankan fix_table_structure.php";
    }
  } else {
    $error_message = "Tabel forum_diskusi tidak ditemukan. Silakan jalankan fix_table_structure.php";
  }
}

// Ambil komentar dari database dengan error handling
$result = null;
try {
  // Cek apakah tabel ada
  $check_table = "SHOW TABLES LIKE 'forum_diskusi'";
  $table_exists = $conn->query($check_table);

  if ($table_exists && $table_exists->num_rows > 0) {
    // Cek apakah kolom materi ada
    $check_column = "SHOW COLUMNS FROM forum_diskusi LIKE 'materi'";
    $column_exists = $conn->query($check_column);

    if ($column_exists && $column_exists->num_rows > 0) {
      $sql = "SELECT * FROM forum_diskusi WHERE materi = 'NKRI dan Sejarahnya' ORDER BY tanggal DESC";
      $result = $conn->query($sql);
    } else {
      $error_message = "Kolom 'materi' tidak ditemukan. Silakan jalankan fix_table_structure.php";
    }
  } else {
    $error_message = "Tabel forum_diskusi tidak ditemukan. Silakan jalankan fix_table_structure.php";
  }
} catch (Exception $e) {
  $error_message = "Error database: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VidPemb & Forum Diskusi NKRI dan Sejarahnya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background: #f5f5f5;
    }

    .header-materi {
      background: #252D79;
      color: #fff;
      padding: 18px 0 18px 0;
      border-radius: 0 0 8px 8px;
      margin-bottom: 18px;
    }

    .header-materi img {
      height: 38px;
      margin-right: 10px;
    }

    .judul-materi {
      font-size: 1.1rem;
      color: #222;
      margin: 10px 0 0 10px;
    }

    .forum-box {
      background: #f3f3f3;
      border: 1px solid #d2d2d2;
      border-radius: 6px;
      min-height: 350px;
      padding: 0;
      margin-bottom: 18px;
    }

    .forum-header {
      background: #eaeaea;
      border-bottom: 1px solid #d2d2d2;
      padding: 10px 16px;
      font-weight: 600;
      border-radius: 6px 6px 0 0;
    }

    .forum-body {
      padding: 16px;
      min-height: 200px;
      max-height: 400px;
      overflow-y: auto;
    }

    .forum-footer {
      border-top: 1px solid #d2d2d2;
      padding: 10px 16px;
    }

    .forum-input {
      width: 85%;
      border: none;
      background: #eaeaea;
      border-radius: 4px;
      padding: 7px 10px;
    }

    .forum-btn {
      border: none;
      background: #252D79;
      color: #fff;
      border-radius: 4px;
      padding: 7px 16px;
      margin-left: 6px;
    }

    .desc-box {
      background: #ededed;
      border-radius: 8px;
      padding: 18px 22px;
      margin-top: 18px;
      font-size: 1.08rem;
    }

    .yt-thumb {
      width: 100%;
      max-width: 480px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
      margin-bottom: 12px;
    }

    .komentar-item {
      background: #fff;
      border-radius: 8px;
      padding: 12px;
      margin-bottom: 12px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .komentar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
    }

    .komentar-nama {
      font-weight: 600;
      color: #252D79;
      font-size: 0.95rem;
    }

    .komentar-tanggal {
      font-size: 0.8rem;
      color: #666;
    }

    .komentar-isi {
      color: #333;
      font-size: 0.9rem;
      line-height: 1.4;
    }

    .alert {
      padding: 8px 12px;
      border-radius: 4px;
      margin-bottom: 12px;
      font-size: 0.9rem;
    }

    .alert-danger {
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      color: #721c24;
    }

    @media (max-width: 991px) {
      .forum-box {
        margin-top: 18px;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #252D79;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="img/logo/PrajaEdu.png" alt="PrajaEdu"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto fw-bold">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about us.php">About</a></li>
          <li class="nav-item"><a class="nav-link active" href="kelas.php">Kelas</a></li>
          <li class="nav-item"><a class="nav-link" href="paket.php">Paket</a></li>
          <li class="nav-item"><a class="nav-link" href="refund-policy.php">Refund Policy</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
      <div class="judul-materi">NKRI dan Sejarahnya</div>
      <div class="text-end text-dark">
        <i class="fa fa-user"></i> M. Taufiequrohim R
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-lg-8">
        <div class="bg-white p-3 rounded shadow-sm mb-3">
          <div class="fw-bold mb-2" style="font-size:1.2rem;">TES WAWASAN KEBANGSAAN</div>
          <div class="row g-3">
            <div class="col-md-6">
              <video controls class="yt-thumb"
                style="width: 100%; max-width: 480px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07); margin-bottom: 12px;">
                <source src="videos/TWK 2.mp4" type="video/mp4">
                Browser Anda tidak mendukung tag video.
              </video>

              <div class="mt-2">
                <span class="fw-bold">NKRI & Sejarahnya</span><br>
                <span style="color:#252D79; font-size:1.05rem;">Materi, contoh soal dan pembahasan sesuai FR CPNS 2023 &
                  pengalaman pribadi</span><br>
                <span style="color:#e53935;"><i class="fab fa-youtube"></i> Nadia_edu</span>
              </div>

              <!-- File Download Section -->
              <div class="mt-3">
                <h6 class="fw-bold mb-2">Materi Pendukung:</h6>
                <div class="d-flex flex-column gap-2">
                  <a href="files/TWK 2.pdf" class="btn btn-outline-primary btn-sm" download>
                    <i class="fas fa-file-pdf me-2"></i>Download Materi NKRI & Sejarahnya
                  </a>
                </div>
              </div>

            </div>
            <div class="col-md-6 d-flex align-items-center">
            </div>
          </div>
        </div>

        <div class="desc-box">
          <div class="fw-bold mb-2">Deskripsi Materi</div>
          <div>Negara Kesatuan Republik Indonesia (NKRI) adalah bentuk negara Indonesia yang bersifat kesatuan, di mana
            seluruh wilayah Indonesia merupakan satu kesatuan yang utuh dan tidak terbagi-bagi. NKRI diatur dalam UUD
            1945 Pasal 1 Ayat 1, yang menjadi dasar hukum dan pedoman dalam penyelenggaraan negara. Dalam materi Tes
            Wawasan Kebangsaan (TWK) pada Seleksi Kompetensi Dasar (SKD), pemahaman tentang NKRI menjadi salah satu
            topik penting yang sering diujikan karena berkaitan dengan identitas bangsa dan sejarah perjuangan
            mempertahankan keutuhan negara.
            <br><br>
            Materi NKRI dan Sejarahnya dalam TWK mencakup:
            <ul>
              <li>Pengertian dan dasar hukum NKRI</li>
              <li>Prinsip-prinsip NKRI dan Wawasan Nusantara</li>
              <li>Sejarah pembentukan NKRI, mulai dari Proklamasi Kemerdekaan, sidang PPKI, era Republik Indonesia
                Serikat (RIS), hingga kembali ke NKRI</li>
              <li>Perjuangan mempertahankan keutuhan NKRI</li>
              <li>Tokoh-tokoh penting dalam sejarah NKRI</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="forum-box">
          <div class="forum-header">Forum Diskusi</div>
          <div class="forum-body" id="forumBody">
            <?php if (isset($error_message)): ?>
              <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <?php if ($result && $result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <div class="komentar-item">
                  <div class="komentar-header">
                    <span class="komentar-nama"><?php echo htmlspecialchars($row['nama_user']); ?></span>
                    <span class="komentar-tanggal"><?php echo date('d/m/Y H:i', strtotime($row['tanggal'])); ?></span>
                  </div>
                  <div class="komentar-isi"><?php echo htmlspecialchars($row['komentar']); ?></div>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <div class="text-center text-muted" style="padding: 20px;">
                <i class="fas fa-comments" style="font-size: 2rem; margin-bottom: 10px;"></i><br>
                Belum ada komentar. Jadilah yang pertama berkomentar!
              </div>
            <?php endif; ?>
          </div>
          <div class="forum-footer">
            <form method="post" action="" class="d-flex align-items-center">
              <input type="text" name="komentar" class="forum-input" placeholder="Masukkan Komentar" required>
              <button type="submit" class="forum-btn"><i class="fa fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>