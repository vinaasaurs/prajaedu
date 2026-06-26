<?php
include 'koneksi.php';

// Query untuk membuat tabel forum_diskusi
$sql = "CREATE TABLE IF NOT EXISTS `forum_diskusi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($sql) === TRUE) {
    echo "✅ Tabel forum_diskusi berhasil dibuat!<br>";
    
    // Insert data contoh
    $insert_sql = "INSERT INTO `forum_diskusi` (`nama_user`, `materi`, `komentar`, `tanggal`) VALUES
    ('M. Taufiequrohim R', 'Pancasila', 'Materi Pancasila sangat menarik dan mudah dipahami!', '2024-01-15 10:30:00'),
    ('M. Taufiequrohim R', 'Pancasila', 'Bagaimana cara menghafal 5 sila dengan mudah?', '2024-01-15 11:15:00'),
    ('M. Taufiequrohim R', 'Pancasila', 'Terima kasih atas penjelasannya yang detail', '2024-01-15 12:00:00')";
    
    if ($conn->query($insert_sql) === TRUE) {
        echo "✅ Data contoh berhasil ditambahkan!<br>";
    } else {
        echo "⚠️ Data contoh sudah ada atau gagal ditambahkan: " . $conn->error . "<br>";
    }
    
    echo "<br>🎉 Sekarang kamu bisa mengakses <a href='pancasila.php'>pancasila.php</a> tanpa error!";
    
} else {
    echo "❌ Error membuat tabel: " . $conn->error;
}

$conn->close();
?> 