<style>
h3 {
    text-align: center;
    font-family: 'Arial', sans-serif;
    color: #333;
    font-size: 24px;
    margin-bottom: 15px;
}

.comment-table-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

/* Style untuk tabel */
.comment-table {
    width: 80%;
    border-collapse: collapse;
    font-family: 'Arial', sans-serif;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Style untuk header tabel */
.comment-table th {
    background-color: #3498db;
    color: white;
    font-size: 16px;
    padding: 15px;
    text-align: left;
}

/* Style untuk sel tabel */
.comment-table td {
    padding: 15px;
    font-size: 14px;
    color: #555;
    border-bottom: 1px solid #ddd;
}

/* Hover effect untuk baris */
.comment-table tr:hover {
    background-color: #f4f4f4;
    transition: background-color 0.2s ease;
}

/* Efek zebra stripes */
.comment-table tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.comment-table tbody tr:nth-child(even) {
    background-color: #fff;
}

/* Responsive table */
@media screen and (max-width: 768px) {
    .comment-table {
        width: 100%;
    }

    .comment-table th, .comment-table td {
        font-size: 12px;
        padding: 10px;
    }
}

</style>
<h3>Daftar Komentar</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Komentar</th>
        <th>Waktu</th>
    </tr>
    <?php while ($row = $guests->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['comment']); ?></td>
        <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php } ?>
</table>