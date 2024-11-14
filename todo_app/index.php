<?php
include 'db.php';

// Ambil semua tugas dari database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        <form action="add_task.php" method="POST">
            <input type="text" name="task" placeholder="Tambahkan tugas baru..." required>
            <button type="submit">Tambah Tugas</button>
        </form>
        <ul>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <li>
                        <?php echo $row['task']; ?>
                        <a href="edit_task.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete_task.php?id=<?php echo $row['id']; ?>">Hapus</a>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>Tidak ada tugas.</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>

<?php $conn->close(); ?>