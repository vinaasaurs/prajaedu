<?php
include 'koneksi.php';

echo "<h2>🔧 Simple Fix - Buat Tabel forum_diskusi</h2>";

// Hapus tabel lama dulu
echo "🗑️ Menghapus tabel lama...<br>";
$drop_sql = "DROP TABLE IF EXISTS `forum_diskusi`";
$conn->query($drop_sql);
echo "✅ Tabel lama dihapus<br><br>";

// Buat tabel baru dengan struktur yang benar
echo "🔨 Membuat tabel baru...<br>";
$sql = "CREATE TABLE `forum_diskusi` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nama_user` varchar(100) NOT NULL,
    `materi` varchar(100) NOT NULL,
    `komentar` text NOT NULL,
    `tanggal` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($sql) === TRUE) {
    echo "✅ Tabel forum_diskusi berhasil dibuat!<br><br>";
    
    // Tambah data contoh untuk berbagai materi
    echo "📝 Menambahkan data contoh...<br>";
    $insert_sql = "INSERT INTO `forum_diskusi` (`nama_user`, `materi`, `komentar`, `tanggal`) VALUES
    ('M. Taufiequrohim R', 'Pancasila', 'Materi Pancasila sangat menarik dan mudah dipahami!', '2024-01-15 10:30:00'),
    ('M. Taufiequrohim R', 'Pancasila', 'Bagaimana cara menghafal 5 sila dengan mudah?', '2024-01-15 11:15:00'),
    ('M. Taufiequrohim R', 'Pancasila', 'Terima kasih atas penjelasannya yang detail', '2024-01-15 12:00:00'),
    ('M. Taufiequrohim R', 'Teknologi Informasi', 'Materi teknologi informasi sangat bermanfaat untuk CPNS!', '2024-01-15 13:30:00'),
    ('M. Taufiequrohim R', 'Teknologi Informasi', 'Bagaimana cara menguasai materi TI dengan cepat?', '2024-01-15 14:15:00'),
    ('M. Taufiequrohim R', 'Teknologi Informasi', 'Video pembahasan sangat jelas dan mudah dipahami', '2024-01-15 15:00:00'),
    ('M. Taufiequrohim R', 'NKRI dan Sejarahnya', 'Sejarah Indonesia sangat menarik untuk dipelajari', '2024-01-15 16:30:00'),
    ('M. Taufiequrohim R', 'Sistem Pemerintahan', 'Materi sistem pemerintahan sangat penting untuk CPNS', '2024-01-15 17:15:00'),
    ('M. Taufiequrohim R', 'Sosial Budaya', 'Pemahaman sosial budaya sangat diperlukan', '2024-01-15 18:00:00')";
    
    if ($conn->query($insert_sql) === TRUE) {
        echo "✅ Data contoh berhasil ditambahkan!<br>";
    } else {
        echo "❌ Gagal menambahkan data contoh: " . $conn->error . "<br>";
    }
    
    echo "<br>🎉 Sekarang forum diskusi sudah siap digunakan!<br>";
    
} else {
    echo "❌ Gagal membuat tabel: " . $conn->error . "<br>";
}

echo "<br><a href='index.php' style='background: #252D79; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>🚀 Kembali ke Home</a>";

$conn->close();
?> 