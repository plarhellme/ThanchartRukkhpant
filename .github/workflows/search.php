<?php
include('config.php');

$search_query = '';
if (isset($_POST['search'])) {
    $search_query = $_POST['search'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%' OR category LIKE '%$search_query%' OR publish_year LIKE '%$search_query%'";
    $result = mysqli_query($conn, $sql);
} else {
    $sql = "SELECT * FROM books";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาหนังสือ</title>
    <nav>
            <a href="index.php">หน้าหลัก</a>
        </nav>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>ค้นหาหนังสือ</h1>
    </header>
    <div class="container">
        <form method="POST">
            <label for="search">ค้นหาหนังสือ:</label>
            <input type="text" name="search" value="<?php echo $search_query; ?>" required>
            <input type="submit" value="ค้นหา">
        </form>

        <div class="search-result">
            <h2>ผลการค้นหา</h2>
            <table>
                <thead>
                    <tr>
                        <th>ชื่อหนังสือ</th>
                        <th>ผู้เขียน</th>
                        <th>หมวดหมู่</th>
                        <th>ปีที่เผยแพร่</th>
                        <th>สถานะ</th>
                        <th>การกระทำ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['publish_year']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="edit_book.php?book_id=<?php echo $row['book_id']; ?>">แก้ไข</a> |
                                <a href="delete_book.php?book_id=<?php echo $row['book_id']; ?>">ลบ</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
