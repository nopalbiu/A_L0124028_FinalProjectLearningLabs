<?php
$host = 'localhost';
$user = 'root'; // default XAMPP user
$password = ''; // default XAMPP password
$dbname = 'todo_list';

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>