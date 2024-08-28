<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akun";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start();

function createNote($conn, $userId, $title, $content)
{
    $sql = "INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $userId, $title, $content);
    $stmt->execute();
    $stmt->close();
}

function updateNote($conn, $noteId, $title, $content)
{
    $sql = "UPDATE notes SET title = ?, content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $content, $noteId);
    $stmt->execute();
    $stmt->close();
}

function deleteNote($conn, $noteId)
{
    $sql = "DELETE FROM notes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $noteId);
    $stmt->execute();
    $stmt->close();
}

function getNotes($conn, $userId)
{
    $sql = "SELECT * FROM notes WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $id_user = $_POST['id_user'];
        $password = trim($_POST['pass']);

        $sql = "SELECT id_user, pass FROM akun WHERE id_user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id_user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $akun = $result->fetch_assoc();

            if (password_verify($password, $akun['pass'])) {
                $_SESSION['id_user'] = $akun['id_user'];
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "<script>document.getElementById('feedback').innerHTML = 'Password salah!'; document.getElementById('feedback').classList.add('error'); document.getElementById('feedback').style.display = 'block';</script>";
            }
        } else {
            echo "<script>document.getElementById('feedback').innerHTML = 'Pengguna dengan ID ini tidak ditemukan!'; document.getElementById('feedback').classList.add('error'); document.getElementById('feedback').style.display = 'block';</script>";
        }
        $stmt->close();
    } elseif (isset($_POST['logout'])) {
        session_destroy();
        header("Location: ../halaman1/login.php");
        exit();
    } elseif (isset($_POST['create_note'])) {
        if (isset($_SESSION['id_user'])) {
            createNote($conn, $_SESSION['id_user'], $_POST['title'], $_POST['content']);
            echo "<script>document.getElementById('feedback').innerHTML = 'Catatan berhasil dibuat!'; document.getElementById('feedback').classList.add('success'); document.getElementById('feedback').style.display = 'block';</script>";
        } else {
            echo "<script>document.getElementById('feedback').innerHTML = 'Anda harus login untuk membuat catatan.'; document.getElementById('feedback').classList.add('error'); document.getElementById('feedback').style.display = 'block';</script>";
        }
    } elseif (isset($_POST['update_note'])) {
        if (isset($_SESSION['id_user'])) {
            updateNote($conn, $_POST['id'], $_POST['title'], $_POST['content']);
            echo "<script>document.getElementById('feedback').innerHTML = 'Catatan berhasil diperbarui!'; document.getElementById('feedback').classList.add('success'); document.getElementById('feedback').style.display = 'block';</script>";
        } else {
            echo "<script>document.getElementById('feedback').innerHTML = 'Anda harus login untuk memperbarui catatan.'; document.getElementById('feedback').classList.add('error'); document.getElementById('feedback').style.display = 'block';</script>";
        }
    } elseif (isset($_POST['delete_note'])) {
        if (isset($_SESSION['id_user'])) {
            deleteNote($conn, $_POST['id']);
            echo "<script>document.getElementById('feedback').innerHTML = 'Catatan berhasil dihapus!'; document.getElementById('feedback').classList.add('success'); document.getElementById('feedback').style.display = 'block';</script>";
        } else {
            echo "<script>document.getElementById('feedback').innerHTML = 'Anda harus login untuk menghapus catatan.'; document.getElementById('feedback').classList.add('error'); document.getElementById('feedback').style.display = 'block';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Catatan - Modern UI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Feedback Message -->
        <div id="feedback" class="feedback-message" style="display:none;"></div>

        <?php if (!isset($_SESSION['id_user'])): ?>
            <!-- Form Login -->
            <div class="login-section">
                <h2><i class="fas fa-user-circle"></i> Login</h2>
                <form method="post" class="form-auth">
                    <input type="text" name="id_user" placeholder="User ID" required>
                    <input type="password" name="pass" placeholder="Password" required>
                    <button type="submit" name="login" class="btn-primary">Login</button>
                </form>
            </div>
        <?php else: ?>
            <div class="logout-section">
                <form method="post">
                    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['id_user']); ?></h2>
                    <button type="submit" name="logout" class="btn-secondary">Logout</button>
                </form>
            </div>

            <div class="create-note-section">
                <h2>Create a Note</h2>
                <form method="post" class="form-note">
                    <input type="text" name="title" placeholder="Title" required>
                    <textarea name="content" placeholder="Content" required></textarea>
                    <button type="submit" name="create_note" class="btn-primary">Create Note</button>
                </form>
            </div>

            <div class="notes-section">
                <h2>Your Notes</h2>
                <?php if (isset($_SESSION['id_user'])): ?>
                    <?php
                    $notes = getNotes($conn, $_SESSION['id_user']);
                    if (count($notes) > 0): ?>
                        <div class="notes-grid">
                            <?php foreach ($notes as $note): ?>
                                <div class="note-card">
                                    <form method="post" class="form-note-update">
                                        <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
                                        <input type="text" name="title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
                                        <textarea name="content" required><?php echo htmlspecialchars($note['content']); ?></textarea>
                                        <div class="note-actions">
                                            <button type="submit" name="update_note" class="btn-primary">Update</button>
                                            <button type="submit" name="delete_note" class="btn-secondary">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No notes available.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const feedback = document.getElementById('feedback');
            if (feedback.style.display === 'block') {
                setTimeout(() => {
                    feedback.style.opacity = '0';
                }, 3000);
                setTimeout(() => {
                    feedback.style.display = 'none';
                    feedback.style.opacity = '1';
                    feedback.classList.remove('success', 'error');
                }, 3500);
            }
        });
    </script>
</body>

</html>

<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    .form-auth,
    .form-note,
    .form-note-update {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    input[type="text"],
    input[type="password"],
    textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1em;
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    .btn-primary,
    .btn-secondary {
        padding: 10px;
        border: none;
        border-radius: 5px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .feedback-message {
        font-size: 1em;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        text-align: center;
        transition: opacity 0.5s ease;
    }

    .feedback-message.success {
        color: #2e7d32;
        background-color: #e8f5e9;
        border: 1px solid #c8e6c9;
    }

    .feedback-message.error {
        color: #d32f2f;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
    }

    .notes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .note-card {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
    }

    .note-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }
</style>