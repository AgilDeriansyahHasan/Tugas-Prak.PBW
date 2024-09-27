<style>
    /* Style untuk header */
h2 {
    text-align: center;
    font-family: 'Arial', sans-serif;
    color: black;
    font-size: 28px;
    margin-bottom: 20px;
}

</style>
<h2>Selamat Datang di Buku Tamu</h2>
<form action="index.php" method="post">
    <label for="name">Nama:</label><br>
    <input type="text" name="name" required><br><br>
    <label for="comment">Komentar:</label><br>
    <textarea name="comment" rows="5" required></textarea><br><br>
    <input type="submit" value="Kirim">
</form>