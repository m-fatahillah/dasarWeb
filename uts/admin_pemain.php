<?php
// ==== KONEKSI KE POSTGRES ====
$host = "localhost";
$port = "5432";
$dbname = "manchesterUnited";
$user = "postgres";
$password = "123";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Koneksi ke database gagal!");
}

// Inisialisasi variabel untuk pesan feedback
$message = "";

// ==== LOGIKA UNTUK MEMPROSES FORM SAAT DI-SUBMIT ====
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_pemain'])) {

    // 1. Ambil data teks dari form
    $nama = $_POST['nama'];
    $position = $_POST['position'];
    
    // 2. Siapkan data gambar
    $target_dir = "uploads/"; // Pastikan folder 'uploads' ini ada
    $file_name = strtolower(str_replace(' ', '-', basename($_FILES["gambar"]["name"])));
    $target_file = $target_dir . $file_name;
    
    // 3. Pindahkan file yang di-upload ke folder 'uploads'
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        
        // 4. Jika upload gambar berhasil, masukkan data ke database
        $query = "INSERT INTO player_mu (nama, position, gambar) VALUES ($1, $2, $3)";
        $result = pg_query_params($conn, $query, array($nama, $position, $target_file));

        if ($result) {
            $message = '<div class="message success">Pemain baru ('. htmlspecialchars($nama) .') berhasil ditambahkan!</div>';
        } else {
            $message = '<div class="message error">Gagal menyimpan ke database: ' . pg_last_error($conn) . '</div>';
        }
        
    } else {
        $message = '<div class="message error">Maaf, terjadi error saat meng-upload gambar Anda.</div>';
    }
}

// ==== AMBIL DATA PEMAIN YANG SUDAH ADA UNTUK DITAMPILKAN ====
$query_pemain = "SELECT nama, position, gambar FROM player_mu ORDER BY nama ASC";
$result_pemain = pg_query($conn, $query_pemain);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Tambah Pemain MU</title>
    <link rel="stylesheet" type="text/css" href="styleHome.css">
    
    <link rel="stylesheet" type="text/css" href="styleAdmin.css">
</head>
<body>
    <nav>
        <ul>
            <li>MANCHESTER UNITED - ADMIN</li>
            <li><a href="tugasRevisiUTSHome.php">Home</a></li>
            <li><a href="tugasRevisiUTSAbout.php">About</a></li>
            <li><a href="admin_pemain.php" style="color: #ffcc00; font-weight: bold;">Admin Pemain</a></li>
        </ul>
    </nav>
    <hr>

    <div class="admin-container">
        
        <div class="admin-form">
            <h2 class="section-title">Tambah Pemain Baru</h2>
            
            <?php echo $message; ?>

            <form action="admin_pemain.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama Pemain:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div>
                    <label for="position">Posisi:</label>
                    <input type="text" id="position" name="position" required>
                </div>
                <div>
                    <label for="gambar">Upload Gambar:</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*" required>
                </div>
                <div>
                    <button type="submit" name="submit_pemain">Tambah Pemain</button>
                </div>
            </form>
        </div>

        <div class="players">
            <h2 class="section-title">Daftar Pemain Saat Ini</h2>
            <?php
            if (pg_num_rows($result_pemain) > 0) {
                while ($row = pg_fetch_assoc($result_pemain)) {
                    echo '<div class="player-card">';
                    echo '<img src="' . htmlspecialchars($row['gambar']) . '" alt="' . htmlspecialchars($row['nama']) . '" class="player-img">';
                    echo '<div class="player-name">' . htmlspecialchars($row['nama']) . '</div>';
                    echo '<div class="player-position">' . htmlspecialchars($row['position']) . '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Belum ada data pemain.</p>";
            }
            ?>
        </div>

    </div>

    <footer>
        <p>&copy; 2025 Manchester United Football Club. All Rights Reserved.</p>
        <p>Glory Glory Man United</p>
    </footer>
</body>
</html>
<?php pg_close($conn); ?>