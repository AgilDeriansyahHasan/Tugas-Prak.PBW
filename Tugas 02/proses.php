<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function sanitize_input($input) {
        return htmlspecialchars(stripslashes(trim($input)));
    }

    $nama = sanitize_input($_POST['nama']);
    $email = sanitize_input($_POST['email']);
    $komentar = sanitize_input($_POST['komentar']);
    $gender = sanitize_input($_POST['gender']);

    $cookie_expiry = time() + 86400;
    setcookie('guest_name', $nama, $cookie_expiry, "/", "", false, true);

    $entry = implode(" | ", [$nama, $email, $komentar, $gender]) . PHP_EOL;

    $file = 'bukutamu.txt';
    file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);

    echo "<p>Terima kasih atas partisipasi Anda, $nama!</p>";
    echo "<p><a href='index.php'>Kembali ke halaman utama</a></p>";
}
?>
