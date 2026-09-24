<?php
session_start();

// Demo credentials — replace with a real database lookup in production
$valid_username = 'admin';
$valid_password = 'password123';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        echo "<script>alert('Login successful! Welcome, " . htmlspecialchars($username) . "');</script>";
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f7;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background: #fff;
            padding: 32px 28px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #444;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover {
            background: #1d4ed8;
        }
        .error {
            background: #fdecea;
            color: #b91c1c;
            padding: 8px 10px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 13px;
        }
        .hint {
            margin-top: 14px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Sign In</h2>

        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <button type="submit">Log In</button>
        </form>

        <div class="hint">Demo login: admin / password123</div>
    </div>
</body>
</html>