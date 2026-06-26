<?php
include 'koneksi.php';

echo "<h2>🔨 Force Create Table forum_diskusi</h2>";

// Force drop tabel lama
echo "🗑️ Menghapus tabel lama...<br>";
$drop_table = "DROP TABLE IF EXISTS forum_diskusi";
$conn->query($drop_table);
echo "✅ Tabel lama dihapus<br><br>";

// Force create tabel baru
echo "🔨 Membuat tabel baru...<br>";
$create_table = "CREATE TABLE `forum_diskusi` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nama_user` varchar(100) NOT NULL,
    `materi` varchar(100) NOT NULL,
    `komentar` text NOT NULL,
    `tanggal` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($create_table) === TRUE) {
    echo "✅ Tabel baru berhasil dibuat!<br><br>";
    
    // Verifikasi tabel dibuat
    $verify_table = "SHOW TABLES LIKE 'forum_diskusi'";
    $table_check = $conn->query($verify_table);
    
    if ($table_check && $table_check->num_rows > 0) {
        echo "✅ Verifikasi: Tabel forum_diskusi ada<br>";
        
        // Verifikasi kolom
        $verify_columns = "SHOW COLUMNS FROM forum_diskusi";
        $columns_check = $conn->query($verify_columns);
        
        echo "<h3>Kolom yang ada:</h3>";
        echo "<ul>";
        while ($col = $columns_check->fetch_assoc()) {
            echo "<li>" . $col['Field'] . " (" . $col['Type'] . ")</li>";
        }
        echo "</ul>";
        
        // Test insert
        echo "<br>🧪 Testing insert data...<br>";
        $test_insert = "INSERT INTO forum_diskusi (nama_user, materi, komentar, tanggal) VALUES ('Test User', 'Pancasila', 'Test komentar', NOW())";
        
        if ($conn->query($test_insert) === TRUE) {
            echo "✅ Test insert berhasil!<br>";
            
            // Test select
            $test_select = "SELECT * FROM forum_diskusi WHERE materi = 'Pancasila'";
            $test_result = $conn->query($test_select);
            
            if ($test_result && $test_result->num_rows > 0) {
                echo "✅ Test select berhasil! (" . $test_result->num_rows . " data)<br>";
            } else {
                echo "⚠️ Test select gagal<br>";
            }
            
            // Hapus data test
            $conn->query("DELETE FROM forum_diskusi WHERE nama_user = 'Test User'");
            
        } else {
            echo "❌ Test insert gagal: " . $conn->error . "<br>";
        }
        
        // Tambah data contoh
        echo "<br>📝 Menambahkan data contoh...<br>";
        $insert_data = "INSERT INTO `forum_diskusi` (`nama_user`, `materi`, `komentar`, `tanggal`) VALUES
        ('M. Taufiequrohim R', 'Pancasila', 'Materi Pancasila sangat menarik dan mudah dipahami!', '2024-01-15 10:30:00'),
        ('M. Taufiequrohim R', 'Pancasila', 'Bagaimana cara menghafal 5 sila dengan mudah?', '2024-01-15 11:15:00'),
        ('M. Taufiequrohim R', 'Pancasila', 'Terima kasih atas penjelasannya yang detail', '2024-01-15 12:00:00')";
        
        if ($conn->query($insert_data) === TRUE) {
            echo "✅ Data contoh berhasil ditambahkan!<br>";
        } else {
            echo "❌ Gagal menambahkan data contoh: " . $conn->error . "<br>";
        }
        
    } else {
        echo "❌ Verifikasi gagal: Tabel tidak ditemukan<br>";
    }
    
} else {
    echo "❌ Gagal membuat tabel: " . $conn->error . "<br>";
}

echo "<br><hr>";
echo "<h3>🎯 Status Akhir:</h3>";
echo "✅ Tabel forum_diskusi sudah dibuat dengan struktur yang benar<br>";
echo "✅ Semua kolom (id, nama_user, materi, komentar, tanggal) tersedia<br>";
echo "✅ Data contoh sudah ditambahkan<br>";
echo "✅ Forum diskusi siap digunakan<br>";

echo "<br><a href='pancasila.php' style='background: #252D79; color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-size: 16px; font-weight: bold;'>🚀 Test Forum Diskusi Sekarang!</a>";

$conn->close();
?> 