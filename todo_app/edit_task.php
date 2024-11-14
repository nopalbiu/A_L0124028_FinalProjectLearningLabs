<?php
include 'db.php';

// Cek jika ada data yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil id dan task dari form
    $id = $_POST['id'];
    $task = $_POST['task'];

    // Update task di database
    $sql = "UPDATE tasks SET task='$task' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, redirect ke index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Jika tidak ada data POST, ambil id dari URL
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id=$id";
    $result = $conn->query($sql);

    // Cek apakah ada hasil
    if ($result->num_rows > 0) {
        $task = $result->fetch_assoc();
    } else {
        echo "Tugas tidak ditemukan.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
</head>
<body>
    <div class="container">
        <h1>Edit Tugas</h1>
        <form action="edit_task.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <input type="text" name="task" value="<?php echo htmlspecialchars($task['task']); ?>" required>
            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>