<?php
$harga = 120000;
$diskon = 0;

if ($harga > 100000) {
    $diskon = 0.2 * $harga;
}

$hargaAkhir = $harga - $diskon;

echo "Harga awal produk : Rp " . number_format($harga, 0, ',', '.') . "<br>";
echo "Diskon            : Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Harga yang dibayar: Rp " . number_format($hargaAkhir, 0, ',', '.') . "<br>";
?>