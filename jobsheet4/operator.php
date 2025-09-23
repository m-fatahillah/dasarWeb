<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "<h3>Hasil Operasi Aritmatika</h3>";
echo "a = $a <br>";
echo "b = $b <br><br>";

echo "Penjumlahan (a + b) = $hasilTambah <br>";
echo "Pengurangan (a - b) = $hasilKurang <br>";
echo "Perkalian (a * b)   = $hasilKali <br>";
echo "Pembagian (a / b)   = $hasilBagi <br>";
echo "Sisa bagi (a % b)   = $sisaBagi <br>";
echo "Pangkat (a ** b)    = $pangkat <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a < $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<h3>Hasil Operasi Perbandingan</h3>";
echo "a = $a <br>";
echo "b = $b <br><br>";

echo "Apakah a == b ? : " . ($hasilSama ? "true" : "false") . "<br>";
echo "Apakah a != b ? : " . ($hasilTidakSama ? "true" : "false") . "<br>";
echo "Apakah a < b  ? : " . ($hasilLebihKecil ? "true" : "false") . "<br>";
echo "Apakah a > b  ? : " . ($hasilLebihBesar ? "true" : "false") . "<br>";
echo "Apakah a <= b ? : " . ($hasilLebihKecilSama ? "true" : "false") . "<br>";
echo "Apakah a >= b ? : " . ($hasilLebihBesarSama ? "true" : "false") . "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = ! $a;
$hasilNotB = !$b;

echo "<h3>Hasil Operasi Logika</h3>";
echo "a = $a <br>";
echo "b = $b <br><br>";

echo "a && b = " . ($hasilAnd ? "true" : "false") . "<br>";
echo "a || b = " . ($hasilOr ? "true" : "false") . "<br>";
echo "!a     = " . ($hasilNotA ? "true" : "false") . "<br>";
echo "!b     = " . ($hasilNotB ? "true" : "false") . "<br>";
echo "<br><br>";

$a += $b;
$a -= $b;
$a *= $b;
$a /= $b;
$a %= $b;

$a1 = 10; $a1 += $b; echo "a += b : $a1 <br>";
$a2 = 10; $a2 -= $b; echo "a -= b : $a2 <br>";
$a3 = 10; $a3 *= $b; echo "a *= b : $a3 <br>";
$a4 = 10; $a4 /= $b; echo "a /= b : $a4 <br>";
$a5 = 10; $a5 %= $b; echo "a %= b : $a5 <br>";

echo"<br><br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "a === b : " . ($hasilIdentik ? "true" : "false") . "<br>";
echo "a !== b : " . ($hasilTidakIdentik ? "true" : "false") . "<br>";


?>