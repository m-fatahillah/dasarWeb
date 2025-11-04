<?php   
$host = "localhost";
$port = "5432";
$dbname = "manchesterUnited";
$user = "postgres";
$password = "123";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Koneksi ke database gagal!");
}

//ambil data dari postgree
$query = "SELECT nama, position, gambar FROM player_mu";
$result = pg_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manchester United - Home</title>
    <link rel="stylesheet" type="text/css" href="styleHome.css">
</head>
<body>
    <nav>
    <ul>
        <li>MANCHESTER UNITED</li>
        <li><a href="tugasRevisiUTSHome.php">Home</a></li>
        <li><a href="tugasRevisiUTSAbout.php">About</a></li>
        <li><a href="admin_pemain.php">Admin</a></li>
    </ul>
</nav>
    <hr>
    <div class="judul">
        <div class="logo-kiri">
            <img src="logomu.img">
        </div>
        <div class="hero-1">
            <h1>Welcome to Manchester United</h1>
            <p>The Red Devils - Glory Glory Man United</p>
        </div>
        <div class="logo-kanan">
            <img src="logomu.img">
        </div>
    </div>

    <div class="container">
        <div class="news">
            <h2 class="section-title">Latest News</h2>
            <div class="news-card">
                <h3>United Secure Important Victory</h3>
                <p>Manchester United earned three crucial points with a dominant performance at Old Trafford, showcasing improved form under the new tactics.</p>
                <div class="news-date">October 04, 2025</div>
            </div>
            <div class="news-card">
                <h3>New Signing Settles In Well</h3>
                <p>The summer acquisition has quickly adapted to the Premier League, impressing fans and teammates with exceptional performances in training.</p>
                <div class="news-date">October 10, 2025</div>
            </div>
            <div class="news-card">
                <h3>Youth Academy Continues to Shine</h3>
                <p>Manchester United's youth system produces another talented prospect, continuing the club's proud tradition of developing world-class players.</p>
                <div class="news-date">October 8, 2025</div>
            </div>
        </div>


        <div class="schedule">
            <h2 class="section-title">Upcoming Fixtures</h2>
            <div class="match">
                <div class="match-date">October 19, 2025 - 22.30</div>
                <div class="match-teams">Manchester United vs Liverpool</div>
                <div class="match-date">Premier League - Anfield</div>
            </div>
            <div class="match">
                <div class="match-date">October 25, 2025 - 23:30</div>
                <div class="match-teams">Brighton vs Manchester United</div>
                <div class="match-date">Premier Leagua - Old Trafford</div>
            </div>
            <div class="match">
                <div class="match-date">November 1, 2025 - 22.00</div>
                <div class="match-teams">Nottingham Forest vs Manchester United</div>
                <div class="match-date">Premier League - City Ground</div>
            </div>
        </div>

    <div class="players">
        <h2 class="section-title">Key Players</h2>
        <?php
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                echo '<div class="player-card">';
                echo '<img src="' . htmlspecialchars($row['gambar']) . '" alt="' . htmlspecialchars($row['nama']) . '" class="player-img">';
                echo '<div class="player-name">' . htmlspecialchars($row['nama']) . '</div>';
                echo '<div class="player-position">' . htmlspecialchars($row['position']) . '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>Tidak ada data pemain yang tersedia.</p>";
        }
        ?>
    </div>

    </div>

    <footer>
        <p>&copy; 2025 Manchester United Football Club. All Rights Reserved.</p>
        <p>Glory Glory Man United</p>
    </footer>
    <script src="scriptHome.js"></script>
</body>
</html>

<?php pg_close($conn); ?>