<?php 
// Halaman materi Pancasila dengan forum diskusi (dummy)
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VidPemb & Forum Diskusi Pancasila</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body { background: #f5f5f5; }
    .header-materi {
      background: #252D79;
      color: #fff;
      padding: 18px 0 18px 0;
      border-radius: 0 0 8px 8px;
      margin-bottom: 18px;
    }
    .header-materi img { height: 38px; margin-right: 10px; }
    .judul-materi { font-size: 1.1rem; color: #222; margin: 10px 0 0 10px; }
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
    .forum-body { padding: 16px; min-height: 200px; }
    .forum-footer { border-top: 1px solid #d2d2d2; padding: 10px 16px; }
    .forum-input { width: 85%; border: none; background: #eaeaea; border-radius: 4px; padding: 7px 10px; }
    .forum-btn { border: none; background: #252D79; color: #fff; border-radius: 4px; padding: 7px 16px; margin-left: 6px; }
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
      box-shadow: 0 2px 8px rgba(0,0,0,0.07);
      margin-bottom: 12px;
    }
    @media (max-width: 991px) {
      .forum-box { margin-top: 18px; }
    }
  </style>
</head>
<body>
  <div class="header-materi d-flex justify-content-between align-items-center px-4">
    <div class="d-flex align-items-center">
      <img src="img/logo/PrajaEdu.png" alt="PrajaEdu">
      <span class="fw-bold fs-5">PrajaEdu</span>
    </div>
    <div>
      <a href="#" class="text-white fw-bold mx-3">Home</a>
      <a href="#" class="text-white fw-bold mx-3">About</a>
      <a href="#" class="text-white fw-bold mx-3">Kelas</a>
      <a href="#" class="text-white fw-bold mx-3">Paket</a>
      <a href="#" class="text-white fw-bold mx-3">Refund Policy</a>
    </div>
    <div class="text-end text-white">
      <i class="fa fa-user"></i> M. Taufiequrohim R
    </div>
  </div>
  <div class="container mt-3">
    <div class="judul-materi">Kreativitas dan Inovasi</div>
    <div class="row mt-2">
      <div class="col-lg-8">
        <div class="bg-white p-3 rounded shadow-sm mb-3"> 
          <div class="row g-3">
            <div class="col-md-6">
              <img src="img/content/tkp2.jpg" class="yt-thumb" alt="Pancasila Video Thumbnail">
              <!-- Simulasi video, ganti dengan embed jika ada -->
            </div>
            <div class="col-md-6 d-flex align-items-center">
            </div>
          </div>
        </div>
        <div class="desc-box">
          <div class="fw-bold mb-2">Deskripsi Materi</div>
          <div>Kreativitas dan Inovasi adalah kemampuan untuk menghasilkan ide-ide baru yang orisinal, bermanfaat, dan relevan,
            serta kemampuan untuk menciptakan solusi yang efektif terhadap berbagai permasalahan. Dalam Tes Wawasan Kebangsaan (TWK)
            pada Seleksi Kompetensi Dasar (SKD), materi ini penting karena calon ASN diharapkan mampu berpikir kreatif dan inovatif
            dalam menghadapi tantangan serta memberikan kontribusi positif bagi bangsa dan negara.
          <br><br>
            Materi Kreativitas Diri dalam TWK mencakup:
            <ul>
            <li>Pengertian kreativitas dan inovasi</li>
            <li>Perbedaan antara kreativitas dan inovasi</li>
            <li>CCiri-ciri individu yang kreatif dan inovatif</li>
            <li>Contoh penerapan kreativitas dan inovasi dalam kehidupan sehari-hari dan pekerjaan</li>
          </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="forum-box">
          <div class="forum-header">Forum Diskusi</div>
          <div class="forum-body" id="forumBody">
            <!-- Komentar dummy -->
          </div>
          <div class="forum-footer d-flex align-items-center">
            <input type="text" class="forum-input" placeholder="Masukkan Komentar" disabled>
            <button class="forum-btn" disabled><i class="fa fa-paper-plane"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>