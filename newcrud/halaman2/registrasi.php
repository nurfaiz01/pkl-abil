<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
<style>
    body,
    html,
    div,
    form,
    input,
    p,
    h1 {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font-family: 'Arial', sans-serif;
        vertical-align: baseline;
        box-sizing: border-box;
    }

    body {
        background: #f0f4f8;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #333;
    }

    .container {
        background: #ffffff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 2.5em;
        margin-bottom: 10px;
        color: #4a90e2;
        font-family: 'Poppins', sans-serif;
    }

    img {
        margin-bottom: 20px;
        filter: drop-shadow(0 0 8px rgba(0, 0, 0, 0.1));
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 15px;
        margin: 15px 0;
        border-radius: 25px;
        border: 2px solid #d0d3d4;
        background-color: #f8f9fa;
        color: #333;
        outline: none;
        font-size: 1em;
        transition: all 0.3s ease;
    }

    input[type="text"]::placeholder,
    input[type="email"]::placeholder,
    input[type="password"]::placeholder {
        color: #9e9e9e;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #4a90e2;
        background-color: #ffffff;
        color: #333;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        border-radius: 25px;
        border: none;
        background-color: #4a90e2;
        color: #ffffff;
        font-size: 1em;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #357abd;
        transform: translateY(-2px);
    }

    p {
        font-size: 1em;
        color: #333;
        margin-top: 20px;
    }

    p a {
        color: #4a90e2;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    p a:hover {
        color: #357abd;
    }

    @media (max-width: 576px) {
        .container {
            width: 90%;
            padding: 20px;
        }

        h1 {
            font-size: 2em;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        button[type="submit"] {
            font-size: 1em;
        }
    }
</style>

</html>