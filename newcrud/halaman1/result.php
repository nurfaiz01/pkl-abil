<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akun";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];
    $password = trim($_POST['pass']);

    $sql = "SELECT id_user, pass FROM akun WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $akun = $result->fetch_assoc();

        echo "Entered Password: " . $password . "<br>";
        echo "Hashed Password in DB: " . $akun['pass'] . "<br>";

        if ($password === $akun['pass']) {
            session_start();
            $_SESSION['id_user'] = $akun['id_user'];
            header("Location: ../home/home.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this ID!";
    }

    $stmt->close();
    $conn->close();
}
