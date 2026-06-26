<?php
include 'koneksi.php';
if(isset($_POST['register'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $gender = $_POST['gender'];
    $sekolah = $_POST['sekolah'];
    $username = $email; // gunakan email sebagai username
    $password = $telepon; // gunakan telepon sebagai password default (atau bisa diganti)
    // Generate idUser otomatis (USRxxx)
    $result = $conn->query("SELECT idUser FROM users ORDER BY idUser DESC LIMIT 1");
    $lastId = $result->fetch_assoc();
    if($lastId) {
        $num = (int)substr($lastId['idUser'], 3) + 1;
        $idUser = 'USR' . str_pad($num, 3, '0', STR_PAD_LEFT);
    } else {
        $idUser = 'USR001';
    }
    // Insert ke database
    $stmt = $conn->prepare("INSERT INTO users (idUser, namaUser, gambar, nik, alamat, telepon, username, passwordUser, jmlSetoran, jmlPenarikan, saldo) VALUES (?, ?, '', '', ?, ?, ?, ?, 0, 0, 0)");
    $stmt->bind_param("sssssss", $idUser, $nama, $alamat, $telepon, $username, $password, $sekolah);
    $stmt->execute();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>PrajaEdu | Register</title>
  <link rel="icon" type="image/png" href="img/logo/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ffffff;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-container {
      background-color: #fbf6e8;
      padding: 40px 30px;
      border-radius: 12px;
      max-width: 400px;
      margin: 5% auto;
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.2);
    }
    .form-container input {
      border-radius: 10px;
    }
    hr {
      height: 2px;
      background-color: black;
      border: none;
      width: 100%;
      margin: 25px 0 10px 0;
    }
    .btn-danger {
      width: 100px;
    }
    .btn-primary {
      width: 100px;
    }
    footer {
      text-align: center;
      font-size: 12px;
      color: #333;
      margin-top: 15px;
    }
  </style>
</head>
<body>

<div class="form-container text-center">
  <h3><b>Register PrajaEdu</b></h3>

  <form action="" method="post">
    <div class="text-start mt-3">
      <label>Nama Lengkap</label>
      <input type="text" name="nama" class="form-control mt-1" required>

      <label class="mt-2">Email</label>
      <input type="email" name="email" class="form-control mt-1" required>

      <label class="mt-2">Alamat</label>
      <input type="text" name="alamat" class="form-control mt-1" required>

      <label class="mt-2">Nomor Telepon</label>
      <input type="text" name="telepon" class="form-control mt-1" required>

      <label class="mt-2">Jenis Kelamin</label>
      <select name="gender" class="form-control mt-1" required>
        <option value="">Pilih Jenis Kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>

      <label class="mt-2">Asal Sekolah</label>
      <input type="text" name="sekolah" class="form-control mt-1" required>

      <div class="d-flex gap-2 mt-4">
        <button type="submit" name="register" class="btn btn-danger">Register</button>
        <a href="login.php" class="btn btn-primary">Login</a>
      </div>
    </div>
  </form>

  <hr>
  <footer>&copy; 2025 PrajaEdu Learning</footer>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>