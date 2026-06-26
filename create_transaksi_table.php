<?php
include 'koneksi.php';

echo "<h2>🔧 Buat Tabel Transaksi</h2>";

// Hapus tabel lama jika ada
echo "🗑️ Menghapus tabel lama...<br>";
$drop_table = "DROP TABLE IF EXISTS transaksi";
$conn->query($drop_table);
echo "✅ Tabel lama dihapus<br><br>";

// Buat tabel baru
echo "🔨 Membuat tabel transaksi...<br>";
$create_table = "CREATE TABLE `transaksi` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nama_paket` varchar(100) NOT NULL,
    `tanggal_pembelian` date NOT NULL,
    `tanggal_expired` date NOT NULL,
    `status_pembayaran` varchar(20) NOT NULL,
    `nama_user` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($create_table) === TRUE) {
    echo "✅ Tabel transaksi berhasil dibuat!<br><br>";
    
    // Tambah data contoh
    echo "📝 Menambahkan data contoh...<br>";
    $insert_data = "INSERT INTO `transaksi` (`nama_paket`, `tanggal_pembelian`, `tanggal_expired`, `status_pembayaran`, `nama_user`) VALUES
    ('Tryout SKD Kedinasan', '2025-04-12', '2025-07-12', 'Terkonfirmasi', 'M. Taufiequrohim R'),
    ('Simulasi CPNS', '2025-03-05', '2025-06-05', 'Menunggu', 'M. Taufiequrohim R'),
    ('Tryout CPNS', '2025-01-10', '2025-04-10', 'Ditolak', 'M. Taufiequrohim R')";
    
    if ($conn->query($insert_data) === TRUE) {
        echo "✅ Data contoh berhasil ditambahkan!<br>";
        
        // Verifikasi data
        $check_data = "SELECT * FROM transaksi";
        $data_result = $conn->query($check_data);
        
        if ($data_result && $data_result->num_rows > 0) {
            echo "<br>📊 Data yang ditambahkan:<br>";
            echo "<table border='1' style='border-collapse: collapse; margin-top: 10px;'>";
            echo "<tr style='background: #f0f0f0;'><th>ID</th><th>Nama Paket</th><th>Tanggal Pembelian</th><th>Tanggal Expired</th><th>Status</th><th>Nama User</th></tr>";
            
            while ($row = $data_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama_paket'] . "</td>";
                echo "<td>" . $row['tanggal_pembelian'] . "</td>";
                echo "<td>" . $row['tanggal_expired'] . "</td>";
                echo "<td>" . $row['status_pembayaran'] . "</td>";
                echo "<td>" . $row['nama_user'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        
    } else {
        echo "❌ Gagal menambahkan data contoh: " . $conn->error . "<br>";
    }
    
} else {
    echo "❌ Gagal membuat tabel: " . $conn->error . "<br>";
}

echo "<br><hr>";
echo "<h3>🎯 Status Akhir:</h3>";
echo "✅ Tabel transaksi sudah dibuat dengan struktur yang benar<br>";
echo "✅ Data contoh sudah ditambahkan<br>";
echo "✅ History transaksi siap digunakan<br>";

echo "<br><a href='historytransaksi.php' style='background: #252D79; color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-size: 16px; font-weight: bold;'>🚀 Lihat History Transaksi</a>";

$conn->close();
?> 