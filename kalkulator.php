<?php
// kalkulator.php

// Pastikan data POST dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil nilai dan konversi ke angka
    $angka1 = (float)$_POST['angka1'];
    $angka2 = (float)$_POST['angka2'];
    $operasi = $_POST['operasi'];
    $hasil = 0;
    $simbol = "";

    // Lakukan perhitungan berdasarkan operator
    switch ($operasi) {
        case 'tambah':
            $hasil = $angka1 + $angka2;
            $simbol = "+";
            break;
        case 'kurang':
            $hasil = $angka1 - $angka2;
            $simbol = "-";
            break;
        case 'kali':
            $hasil = $angka1 * $angka2;
            $simbol = "x";
            break;
        case 'bagi':
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
                $simbol = "/";
            } else {
                $hasil = "Error: Pembagian oleh nol!";
                $simbol = "/";
            }
            break;
        default:
            $hasil = "Operasi tidak valid";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kalkulasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Hasil Kalkulasi PHP</h1>
        
        <?php if (isset($hasil)): ?>
            <div class="result-box">
                <?php if (!is_string($hasil)): ?>
                    <p class="expression"><?php echo "$angka1 $simbol $angka2"; ?></p>
                    <p class="final-result"><?php echo "= " . number_format($hasil, 2); ?></p>
                <?php else: ?>
                    <p class="error-result"><?php echo $hasil; ?></p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>Silakan kembali dan masukkan angka.</p>
        <?php endif; ?>

        <a href="index.html" class="back-btn">Hitung Lagi</a>
    </div>
</body>
</html>
