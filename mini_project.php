<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mini Project - Data Mahasiswa</title>
</head>
<body>

    <h1>Formulir Data Mahasiswa</h1>

    <form method="POST" action="">
        <label>Nama:</label>
        <input type="text" name="nama">
        <br><br>

        <label>NIM:</label>
        <input type="text" name="nim">
        <br><br>

        <label>Program Studi:</label>
        <input type="text" name="prodi">
        <br><br>

        <label>Semester:</label>
        <input type="number" name="semester">
        <br><br>

        <label>Email:</label>
        <input type="text" name="email">
        <br><br>

        <button type="submit">Kirim Data</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nama = trim($_POST["nama"] ?? "");
            $nim = trim($_POST["nim"] ?? "");
            $prodi = trim($_POST["prodi"] ?? "");
            $semesterInput = trim($_POST["semester"] ?? "");
            $email = trim($_POST["email"] ?? "");

            $errors = [];

            if ($nama === "") {
                $errors[] = "Nama wajib diisi.";
            }

            if ($nim === "") {
                $errors[] = "NIM wajib diisi.";
            }

            if ($prodi === "") {
                $errors[] = "Program studi wajib diisi.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Format email tidak valid.";
            }

            if (
                !ctype_digit($semesterInput) ||
                (int)$semesterInput < 1 ||
                (int)$semesterInput > 14
            ) {
                $errors[] = "Semester harus berupa angka 1-14.";
            }

            if (!empty($errors)) {
                echo "<h3>Terjadi Kesalahan</h3>";

                foreach ($errors as $error) {
                    echo "<p>" . htmlspecialchars($error) . "</p>";
                }
            } else {
                $semester = (int)$semesterInput;

                $data = compact("nama", "nim", "prodi", "email");

                echo "<h3>Data Mahasiswa Berhasil Diterima</h3>";

                echo "Nama: " . htmlspecialchars($data["nama"]) . "<br>";
                echo "NIM: " . htmlspecialchars($data["nim"]) . "<br>";
                echo "Program Studi: " . htmlspecialchars($data["prodi"]) . "<br>";
                echo "Semester: " . $semester . "<br>";
                echo "Email: " . htmlspecialchars($data["email"]);
            }
        }
    ?>

</body>
</html>