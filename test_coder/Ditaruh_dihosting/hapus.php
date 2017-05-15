    <?php
    // koneksi ke mysql di server hosting
    mysql_connect('localhost', 'user', 'pass');
    mysql_select_db('db');

    // baca ID data yang akan dihapus yang dikirim via CURL dari localhost
    $id = $_POST['id'];
    // hapus data SMS berdasarkan ID
    $query = "DELETE FROM outbox WHERE id = '$id'";
    mysql_query($query);

    ?>