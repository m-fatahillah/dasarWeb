<?php
$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;
$persentaseKosong = ($kursiKosong / $totalKursi) * 100;
echo "<h3> RESTORAN </h3>";
echo "Total kursi       : $totalKursi <br>";
echo "Kursi terisi      : $kursiTerisi <br>";
echo "Kursi kosong      : $kursiKosong <br>";
echo "Persentase kosong : " . number_format($persentaseKosong, 2) . "%<br>";
?>