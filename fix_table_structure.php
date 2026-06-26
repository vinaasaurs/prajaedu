<?php
include 'koneksi.php';

echo "<h2>🔧 Perbaiki Struktur Tabel forum_diskusi</h2>";

// Drop tabel lama jika ada
$drop_table = "DROP TABLE IF EXISTS forum_diskusi";
if ($conn->query($drop_table) === TRUE) {
    echo "✅ Tabel lama berhasil dihapus<br>";
} else {
    echo "⚠️ Gagal menghapus tabel lama: " . $conn->error . "<br>";
}

// Buat tabel baru dengan struktur yang benar
$create_table = "CREATE TABLE `forum_diskusi` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nama_user` varchar(100) NOT NULL,
    `materi` varchar(100) NOT NULL,
    `komentar` text NOT NULL,
    `tanggal` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($create_table) === TRUE) {
    echo "✅ Tabel baru berhasil dibuat dengan struktur yang benar<br>";
    
    // Tambah data contoh
    $insert_data = "INSERT INTO `forum_diskusi` (`nama_user`, `materi`, `komentar`, `tanggal`) VALUES
    ('M. Taufiequrohim R', 'Pancasila', 'Materi Pancasila sangat menarik dan mudah dipahami!', '2024-01-15 10:30:00'),
    ('M. Taufiequrohim R', 'Pancasila', 'Bagaimana cara menghafal 5 sila dengan mudah?', '2024-01-15 11:15:00'),
    ('M. Taufiequrohim R', 'Pancasila', 'Terima kasih atas penjelasannya yang detail', '2024-01-15 12:00:00')";
    
    if ($conn->query($insert_data) === TRUE) {
        echo "✅ Data contoh berhasil ditambahkan<br>";
    } else {
        echo "⚠️ Gagal menambahkan data contoh: " . $conn->error . "<br>";
    }
    
    // Verifikasi struktur
    $check_columns = "DESCRIBE forum_diskusi";
    $columns = $conn->query($check_columns);
    
    echo "<h3>Struktur tabel yang baru dibuat:</h3>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background: #f0f0f0;'><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    
    while ($row = $columns->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . $row['Default'] . "</td>";
        echo "<td>" . $row['Extra'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
} else {
    echo "❌ Gagal membuat tabel baru: " . $conn->error . "<br>";
}

echo "<br><a href='pancasila.php' style='background: #252D79; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>🎉 Test Forum Diskusi</a>";

$conn->close();
?> 