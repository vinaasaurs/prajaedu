<!doctype html>
<?php
session_start();
include 'koneksi.php';

$error = "";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Validasi ke database tabel users
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND passwordUser = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['namaUser'] = $user['namaUser'];
        header("Location: kelas.php");
        exit();
    } else {
        $error = "Username dan password salah!";
    }
}
?>
<html lang="en">

<head>
  <title>Login PrajaEdu</title>
  <link rel="icon" type="image/png" href="img/logo/favicon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ffffff;
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .form-container {
      background-color: #fbf6e8;
      padding: 40px 30px;
      border-radius: 12px;
      max-width: 400px;
      width: 100%;
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
    .alert {
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 8px;
      font-size: 14px;
    }
    .alert-danger {
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      color: #721c24;
    }
  </style>
</head>

<body>
  <div class="form-container text-center">
    <h3><b>Login PrajaEdu</b></h3>

    <?php if($error): ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $error; ?>
    </div>
    <?php endif; ?>

    <form action="" method="post" autocomplete="off">
      <div class="text-start mt-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control mt-1" required>

        <label class="mt-2">Password</label>
        <input type="password" name="password" class="form-control mt-1" required>

        <div class="d-flex gap-2 mt-4">
          <button type="submit" name="login" class="btn btn-primary">Login</button>
          <a href="registrasi.php" class="btn btn-danger">Register</a>
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