<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col">

                <form action="result.php" method="post">
                    <h1>Registrasi</h1>
                    <br>
                    <img src="../halaman1/img/profile-1341-svgrepo-com.svg" alt="prfile" style="height:90px;width:90px;">
                    <br>
                    <input type="text" placeholder="Masukkan Id" style="width: 400px;margin:20px 20px;" id="id_user" name="id_user" required>
                    <br>
                    <input type="text" placeholder="Masukkan Nama" style="width: 400px;" id="name" name="name" required>
                    <br>
                    <input type="email" placeholder="Masukkan Email" style="width: 400px;margin:20px 20px;" id="email" name="email" required>
                    <br>
                    <input type="password" placeholder="Masukkan Password" style="width: 400px;" id="pass" name="pass" required>
                    <br>
                    <button type="submit">Registrasi</button>
                </form>
                <p style="margin: 20px;">Sudah punya akun?<a href="../halaman1/login.php">Login</a></p>
            </div>
        </div>
    </div>
</body>

</html>