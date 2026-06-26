<?php
include 'koneksi.php';

echo "<h2>🔍 Cek Struktur Tabel forum_diskusi</h2>";

// Cek apakah tabel forum_diskusi ada
$check_table = "SHOW TABLES LIKE 'forum_diskusi'";
$table_exists = $conn->query($check_table);

if ($table_exists->num_rows > 0) {
    echo "✅ Tabel forum_diskusi ditemukan<br><br>";
    
    // Cek struktur tabel
    $check_columns = "DESCRIBE forum_diskusi";
    $columns = $conn->query($check_columns);
    
    echo "<h3>Struktur tabel forum_diskusi saat ini:</h3>";
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
    
    // Cek data yang ada
    $check_data = "SELECT * FROM forum_diskusi LIMIT 5";
    $data = $conn->query($check_data);
    
    if ($data && $data->num_rows > 0) {
        echo "<h3>Data yang ada di tabel:</h3>";
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        
        // Header
        $first_row = $data->fetch_assoc();
        echo "<tr style='background: #f0f0f0;'>";
        foreach ($first_row as $key => $value) {
            echo "<th>" . $key . "</th>";
        }
        echo "</tr>";
        
        // Data
        echo "<tr>";
        foreach ($first_row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
        
        while ($row = $data->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tabel kosong atau tidak ada data.</p>";
    }
    
} else {
    echo "❌ Tabel forum_diskusi tidak ditemukan<br>";
}

echo "<br><a href='pancasila.php' style='background: #252D79; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>🔙 Kembali ke Pancasila</a>";

$conn->close();
?> 