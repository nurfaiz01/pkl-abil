<?php
$servername="localhost";
$username="root";
$password="";
$dbname="akun";

$conn=new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO akun (id_user, name, email, pass) VALUES ('$id_user', '$name', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../halaman1/login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


?> 





