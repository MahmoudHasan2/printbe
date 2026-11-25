<?php
session_start();
require_once __DIR__ . '/config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username'] ?? '');
    $pass = $_POST['password'] ?? '';
    if ($user === ADMIN_USER && password_verify($pass, ADMIN_PASS_HASH)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    }
    $error = 'Incorrect username or password.';
}
if (!empty($_SESSION['admin_logged_in'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login — PrintBe</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/admin.css">
</head>
<body class="login-body">
  <form class="login-card" method="post">
    <div class="login-logo"><i class="fas fa-print"></i></div>
    <h1>PrintBe Dashboard</h1>
    <p>Sign in to edit your website's content.</p>
    <?php if ($error): ?><div class="login-error"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
    <label>Username</label>
    <input type="text" name="username" required autofocus>
    <label>Password</label>
    <input type="password" name="password" required>
    <button type="submit">Log In <i class="fas fa-arrow-right"></i></button>
  </form>
</body>
</html>
