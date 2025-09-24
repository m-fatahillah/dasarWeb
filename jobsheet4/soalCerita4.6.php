<?php
$nilai = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$jumlah = count($nilai);

// 2 nilai tertinggi dan 2 nilai terendah
$max1 = $max2 = $nilai[0];
$min1 = $min2 = $nilai[0];

// seleksi
for ($i = 1; $i < $jumlah; $i++) {
    if ($nilai[$i] > $max1) {
        $max2 = $max1;
        $max1 = $nilai[$i];
    } elseif ($nilai[$i] > $max2) {
        $max2 = $nilai[$i];
    }

    if ($nilai[$i] < $min1) {
        $min2 = $min1;
        $min1 = $nilai[$i];
    } elseif ($nilai[$i] < $min2) {
        $min2 = $nilai[$i];
    }
}

// hitung total
$total = 0;
$count = 0;
for ($i = 0; $i < $jumlah; $i++) {
    if ($nilai[$i] == $max1 || $nilai[$i] == $max2 || $nilai[$i] == $min1 || $nilai[$i] == $min2) {
        continue;
    }
    $total += $nilai[$i];
    $count++;
}

$rata = $total / $count;

echo "Total nilai (setelah abaikan 2 tertinggi & 2 terendah): $total<br>";
echo "Rata-rata nilai: " . number_format($rata, 2) . "<br>";
?>