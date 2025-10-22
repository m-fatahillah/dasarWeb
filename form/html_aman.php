<!DOCTYPE html>
<html>
<head>
    <title>HTML Injection & Validation</title>
</head>
<body>
    <h2>Form Gabungan</h2>
    <form method="post" action="">
        <label for="komentar">Komentar:</label><br>
        <input type="text" name="komentar" id="komentar" size="50">
        <br><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" size="30">
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h3>Hasil:</h3>

    <?php
    // Blok ini hanya berjalan jika form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // --- Bagian dari Soal 4.1: Mengamankan output komentar ---
        $komentar = $_POST['komentar'];
        $safe_komentar = htmlspecialchars($komentar, ENT_QUOTES, 'UTF-8');
        echo "Komentar Anda (aman): " . $safe_komentar . "<br>";


        // --- Bagian dari Soal 4.2: Memvalidasi format email ---
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email '<strong>" . htmlspecialchars($email) . "</strong>' adalah valid.";
        } else {
            echo "Format email '<strong>" . htmlspecialchars($email) . "</strong>' tidak valid.";
        }
    }
    ?>
</body>
</html>