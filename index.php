<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum PHP</title>
</head>
<body>
    <!-- LATIHAN 1 -->
    <h1>Belajar PHP</h1>
    <?php
        echo "<p>PHP berhasil dijalankan.</p>";
        echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
    ?>

    <!-- LATIHAN 2 Variabel dan Percabangan -->
    <?php
        $nama = "Siti";
        $tugas = 85;
        $uts = 78;
        $uas = 90;
        $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

        if ($nilaiAkhir >= 85) {
            $predikat = "A";
        } elseif ($nilaiAkhir >= 75) {
            $predikat = "B";
        } elseif ($nilaiAkhir >= 60) {
            $predikat = "C";
        } else {
            $predikat = "D";
        }

        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
        echo "Predikat: " . $predikat;
    ?>


    <!-- LATIHAN 3 Array dan Perulangan -->
            <?php $mahasiswa = ["Alya", "Bima", "Citra", "Doni"]; ?>
            <ol>
                <?php foreach ($mahasiswa as $namaMahasiswa): ?>
                    <li><?= htmlspecialchars($namaMahasiswa, ENT_QUOTES, "UTF-8") ?></li>
                <?php endforeach; ?>
            </ol>

    <!-- LATIHAN 4 Function -->
            <?php
            function hitungDiskon($harga, $persen)
            {
                $potongan = $harga * ($persen / 100);

                return $harga - $potongan;
            }

            $hargaAkhir = hitungDiskon(150000, 10);
            ?>
            <p>Harga setelah diskon: Rp<?= number_format($hargaAkhir, 0, ",", ".") ?></p>

    <!-- LATIHAN 5 Form GET -->
            <form method="get" action="">
                <label for="kata">Kata kunci:</label>
                <input id="kata" name="kata" type="text">
                <button type="submit">Cari</button>
            </form>

            <?php if (isset($_GET["kata"])): ?>
                <p>Kata kunci: <?= htmlspecialchars(trim($_GET["kata"]), ENT_QUOTES, "UTF-8") ?></p>
            <?php endif; ?>

    <!-- LATIHAN 6 Form POST -->
            <form method="post" action="">
                <label for="nama">Nama:</label>
                <input id="nama" name="nama" type="text" required>

                <label for="prodi">Program Studi:</label>
                <input id="prodi" name="prodi" type="text" required>

                <button type="submit" name="kirim">Kirim Data</button>
            </form>

            <?php if (isset($_POST["kirim"])): ?>
                <?php
                $nama = trim($_POST["nama"] ?? "");
                $prodi = trim($_POST["prodi"] ?? "");
                ?>
                <?php if ($nama === "" || $prodi === ""): ?>
                    <p>Semua kolom wajib diisi.</p>
                <?php else: ?>
                    <h3>Data diterima</h3>
                    <p>Nama: <?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?></p>
                    <p>Program Studi: <?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?></p>
                <?php endif; ?>
            <?php endif; ?>


    <!-- LATIHAN 7 Pengolahan data Sederhana -->
            <form method="post" action="">
                <label for="barang">Nama barang:</label>
                <input id="barang" name="barang" type="text" required>

                <label for="harga">Harga:</label>
                <input id="harga" name="harga" type="number" min="0" step="0.01" required>

                <label for="jumlah">Jumlah:</label>
                <input id="jumlah" name="jumlah" type="number" min="1" step="1" required>

                <button type="submit" name="hitung">Hitung</button>
            </form>

            <?php if (isset($_POST["hitung"])): ?>
                <?php
                $barang = trim($_POST["barang"] ?? "");
                $hargaInput = $_POST["harga"] ?? "";
                $jumlahInput = $_POST["jumlah"] ?? "";
                ?>
                <?php if (
                    $barang === ""
                    || !is_numeric($hargaInput)
                    || !ctype_digit((string) $jumlahInput)
                    || (float) $hargaInput < 0
                    || (int) $jumlahInput < 1
                ): ?>
                    <p>Periksa kembali nama barang, harga, dan jumlah.</p>
                <?php else: ?>
                    <?php $subtotal = (float) $hargaInput * (int) $jumlahInput; ?>
                    <p>Barang: <?= htmlspecialchars($barang, ENT_QUOTES, "UTF-8") ?></p>
                    <p>Subtotal: Rp<?= number_format($subtotal, 0, ",", ".") ?></p>
                <?php endif; ?>
            <?php endif; ?>
            
</body>
</html>