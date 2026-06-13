<?php
include "koneksi.php";

$error = "";
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($query) === 1) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah woi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GlowFlora - Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #fff6f7 0%, #ffeef1 100%); 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-family: sans-serif;
        }
        .card-login { 
            border: none; 
            border-radius: 16px; 
            box-shadow: 0 8px 24px rgba(255, 182, 193, 0.3); 
            width: 380px; 
        }
        .btn-pink { background-color: #ffb6c1; color: white; border: none; }
        .btn-pink:hover { background-color: #ff8da1; color: white; }
    </style>
</head>
<body>
<div class="card card-login p-4 bg-white">
    <div class="text-center mb-4">
        <h3 class="fw-bold" style="color: #ff8da1;">GLOWFLORA</h3>
        <small class="text-muted">Florist & Skin Admin System</small>
    </div>
    
    <?php if($error != ""): ?>
        <div class="alert alert-danger py-2 text-center small"><?= $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <div class="mb-3">
            <label class="form-label small fw-medium">Username</label>
            <input type="text" name="username" class="form-control" required placeholder="Masukkan username" autocomplete="off">
        </div>
        <div class="mb-4">
            <label class="form-label small fw-medium">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="••••••••">
        </div>
        <button type="submit" name="login" class="btn btn-pink w-100 py-2 fw-medium">Masuk Aplikasi</button>
    </form>
</div>
</body>
</html>