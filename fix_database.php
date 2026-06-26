<?php
include 'koneksi.php';

echo "<h2>🔧 Database Fix Script</h2>";

// Cek apakah tabel forum_diskusi sudah ada
$check_table = "SHOW TABLES LIKE 'forum_diskusi'";
$table_exists = $conn->query($check_table);

if ($table_exists->num_rows > 0) {
    echo "✅ Tabel forum_diskusi sudah ada<br>";
    
    // Cek struktur tabel
    $check_columns = "DESCRIBE forum_diskusi";
    $columns = $conn->query($check_columns);
    
    echo "<h3>Struktur tabel forum_diskusi:</h3>";
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    
    while ($row = $columns->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . $row['Default'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
} else {
    echo "❌ Tabel forum_diskusi belum ada, membuat tabel...<br>";
    
    // Buat tabel baru
    $create_table = "CREATE TABLE `forum_diskusi` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nama_user` varchar(100) NOT NULL,
        `materi` varchar(100) NOT NULL,
        `komentar` text NOT NULL,
        `tanggal` datetime NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    
    if ($conn->query($create_table) === TRUE) {
        echo "✅ Tabel forum_diskusi berhasil dibuat!<br>";
        
        // Tambah data contoh
        $insert_data = "INSERT INTO `forum_diskusi` (`nama_user`, `materi`, `komentar`, `tanggal`) VALUES
        ('M. Taufiequrohim R', 'Pancasila', 'Materi Pancasila sangat menarik dan mudah dipahami!', '2024-01-15 10:30:00'),
        ('M. Taufiequrohim R', 'Pancasila', 'Bagaimana cara menghafal 5 sila dengan mudah?', '2024-01-15 11:15:00')";
        
        if ($conn->query($insert_data) === TRUE) {
            echo "✅ Data contoh berhasil ditambahkan!<br>";
        } else {
            echo "⚠️ Gagal menambahkan data contoh: " . $conn->error . "<br>";
        }
        
    } else {
        echo "❌ Gagal membuat tabel: " . $conn->error . "<br>";
    }
}

echo "<br><a href='pancasila.php' style='background: #252D79; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>🎉 Kembali ke Pancasila</a>";

$conn->close();
?> 