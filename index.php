<?php
// Inisialisasi variabel
$tinggi = "";
$pesan_error = "";
$tampilkan_hasil = false;

// Cek apakah form telah disubmit menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $input_tinggi = trim($_POST["tinggi"]);

    // Validasi: Cek apakah input kosong, bukan angka, atau bukan bilangan bulat
    if ($input_tinggi === "" || !is_numeric($input_tinggi) || intval($input_tinggi) != $input_tinggi) {
        $pesan_error = "Masukan tidak valid! Harap masukkan bilangan bulat.";
    } else {
        $tinggi = intval($input_tinggi);
        // Validasi rentang angka 1 sampai 20
        if ($tinggi < 1 || $tinggi > 20) {
            $pesan_error = "Nilai harus berada di antara 1 sampai 20!";
        } else {
            $tampilkan_hasil = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Segitiga Titik PHP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            width: 100%;
            max-width: 500px;
            padding: 25px 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 25px;
            box-sizing: border-box;
        }
        h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: #d9534f;
            background-color: #f9d6d5;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
        .grid-hasil {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 900px;
        }
        .kotak-pola {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        .kotak-pola h3 {
            margin-top: 0;
            color: #333;
            font-size: 15px;
            border-bottom: 2px solid #f0f2f5;
            padding-bottom: 10px;
        }
        pre {
            font-family: monospace;
            font-size: 15px;
            line-height: 1.2;
            background: #f8f9fa;
            padding: 15px;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            display: inline-block;
            text-align: left;
            margin: 0;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Form Tinggi Segitiga Titik</h2>
    
    <?php if (!empty($pesan_error)): ?>
        <div class="error"><?= htmlspecialchars($pesan_error); ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="tinggi">Masukkan Tinggi Segitiga (1 - 20):</label>
        <input type="number" id="tinggi" name="tinggi" min="1" max="20" value="<?= htmlspecialchars($tinggi); ?>" required>
        <input type="submit" name="submit" value="Tampilkan Segitiga">
    </form>
</div>

<?php if ($tampilkan_hasil): ?>
    <div class="grid-hasil">
        <!-- KOTAK 1: Segitiga Sama Kaki -->
        <div class="kotak-pola">
            <h3>1. Segitiga Sama Kaki</h3>
            <pre><?php
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($j = 1; $j <= ($tinggi - $i); $j++) { echo " "; }
                for ($k = 1; $k <= (2 * $i - 1); $k++) { echo "."; }
                echo "\n";
            }
            ?></pre>
        </div>

        <!-- KOTAK 2: Segitiga Sama Kaki Terbalik -->
        <div class="kotak-pola">
            <h3>2. Segitiga Sama Kaki Terbalik</h3>
            <pre><?php
            for ($i = $tinggi; $i >= 1; $i--) {
                for ($j = 1; $j <= ($tinggi - $i); $j++) { echo " "; }
                for ($k = 1; $k <= (2 * $i - 1); $k++) { echo "."; }
                echo "\n";
            }
            ?></pre>
        </div>

        <!-- KOTAK 3: Segitiga Menghadap ke Kiri (<) - Lebar Proporsional -->
        <div class="kotak-pola">
            <h3>3. Segitiga Menghadap ke Kiri</h3>
            <pre><?php
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($k = 1; $k <= $i; $k++) { echo "."; }
                echo "\n";
            }
            for ($i = $tinggi - 1; $i >= 1; $i--) {
                for ($k = 1; $k <= $i; $k++) { echo "."; }
                echo "\n";
            }
            ?></pre>
        </div>

        <!-- KOTAK 4: Segitiga Menghadap ke Kanan (>) - Lebar Proporsional -->
        <div class="kotak-pola">
            <h3>4. Segitiga Menghadap ke Kanan</h3>
            <pre><?php
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($j = 1; $j <= ($tinggi - $i); $j++) { echo " "; }
                for ($k = 1; $k <= $i; $k++) { echo "."; }
                echo "\n";
            }
            for ($i = $tinggi - 1; $i >= 1; $i--) {
                for ($j = 1; $j <= ($tinggi - $i); $j++) { echo " "; }
                for ($k = 1; $k <= $i; $k++) { echo "."; }
                echo "\n";
            }
            ?></pre>
        </div>
    </div>
<?php endif; ?>

</body>
</html>