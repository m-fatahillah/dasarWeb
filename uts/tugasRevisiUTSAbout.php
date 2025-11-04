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

// ==== AMBIL DATA LEGENDA DARI POSTGRES ====
$query = "SELECT nama, deskripsi FROM legends_mu";
$result = pg_query($conn, $query);

// TAMBAHKAN INI UNTUK MENGECEK ERROR QUERY
if (!$result) {
    die("Query Gagal: " . pg_last_error($conn));
}
// ----------------------------------------
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manchester United - About</title>
    <link rel="stylesheet" type="text/css" href="styleAbout.css">
</head>
<body>
    <nav>
        <ul>
            <li>MANCHESTER UNITED</li>
            <li><a href="tugasRevisiUTSHome.php">Home</a></li>
            <li><a href="tugasRevisiUTSAbout.php">About</a></li>
        </ul>
    </nav>
    <hr>
    <div class="hero">
        <h1>About Manchester United</h1>
        <p>A Legacy of Excellence Since 1878</p>
    </div>

    <div class="container">
        <!-- History -->
        <div class="history-section">
            <h2 class="section-title">Our History</h2>
            <div class="history-content">
                <p>Manchester United didirikan pada tahun 1878 dengan nama Newton Heath LYR Football Club oleh para pekerja kereta api. Pada tahun 1902, klub ini hampir bangkrut dan diambil alih oleh J.H. Davies, yang kemudian mengubah namanya menjadi Manchester United.</p>
                <p>Era keemasan pertama datang di bawah kepemimpinan Sir Matt Busby pada tahun 1950-an dan 1960-an. Busby membangun tim legendaris "Busby Babes" yang penuh dengan talenta muda. Tragedi Munich Air Disaster pada tahun 1958 menewaskan 8 pemain, namun Busby bangkit kembali dan membawa United menjadi klub Inggris pertama yang memenangkan European Cup pada tahun 1968.</p>
                <p>Masa kejayaan terbesar datang di era Sir Alex Ferguson (1986-2013). Ferguson mentransformasi United menjadi kekuatan dominan di Inggris dan Eropa, memenangkan 13 gelar Premier League, 2 UEFA Champions League, dan banyak trofi lainnya. Era treble 1998-99 menjadi pencapaian paling ikonik ketika United memenangkan Premier League, FA Cup, dan Champions League dalam satu musim.</p>
                <p>Manchester United dikenal dengan tradisi mengembangkan pemain muda, filosofi menyerang yang menghibur, dan semangat pantang menyerah. Old Trafford, "Theatre of Dreams", telah menjadi saksi bisu perjalanan klub yang luar biasa ini.</p>
            </div>
        </div>

        <!-- Trophies -->
        <div class="trophy-section">
            <h2 class="section-title">Trophy Cabinet</h2>
            <div class="trophy-item"><span class="trophy-name">Premier League / First Division</span><span class="trophy-count">20</span></div>
            <div class="trophy-item"><span class="trophy-name">FA Cup</span><span class="trophy-count">12</span></div>
            <div class="trophy-item"><span class="trophy-name">League Cup</span><span class="trophy-count">6</span></div>
            <div class="trophy-item"><span class="trophy-name">UEFA Champions League</span><span class="trophy-count">3</span></div>
            <div class="trophy-item"><span class="trophy-name">Europa League</span><span class="trophy-count">1</span></div>
            <div class="trophy-item"><span class="trophy-name">FIFA Club World Cup</span><span class="trophy-count">1</span></div>
        </div>

        <!-- Iconic Players -->
        <div class="legends-section">
            <h2 class="section-title">Iconic Legends</h2>

            <?php
            if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    echo '<div class="legend-card">';
                    echo '<h3>' . htmlspecialchars($row['nama']) . '</h3>';
                    echo '<p>' . htmlspecialchars($row['deskripsi']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>Tidak ada data legenda yang tersedia.</p>";
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Manchester United Football Club. All Rights Reserved.</p>
        <p>Glory Glory Man United</p>
    </footer>
    <script src="scriptAbout.js"></script>
</body>
</html>
<?php pg_close($conn); ?>
