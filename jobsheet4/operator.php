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
?>