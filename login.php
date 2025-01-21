<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #6e8efb, #a777e3);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .input-group i {
      color: #666;
      font-size: 1.5rem;
      margin-right: 10px;
    }

    .input-group input {
      flex: 1;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .toggle-password {
      margin-left: 10px;
      cursor: pointer;
      font-size: 1.2rem;
      color: #666;
    }

    .login-container button {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: none;
      border-radius: 5px;
      background: #6e8efb;
      color: #fff;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-container button:hover {
      background: #5a75d9;
    }

    .error {
      color: red;
      font-size: 0.9rem;
      text-align: center;
      margin-bottom: 1rem;
    }
  </style>
  <!-- Add FontAwesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <?php
      $error = '';
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = $_POST['username'];
          $password = $_POST['password'];

          // Dummy credentials for demonstration
          $validUsername = 'admin';
          $validPassword = 'password123';

          if ($username === $validUsername && $password === $validPassword) {
              echo '<p style="color: green; text-align: center;">Login successful!</p>';
          } else {
              $error = 'Invalid username or password.';
          }
      }
    ?>
    <?php if ($error): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" action="">
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" required>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <span class="toggle-password" onclick="togglePassword()"></span>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const type = passwordInput.type === 'password' ? 'text' : 'password';
      passwordInput.type = type;
    }
  </script>
</body>
</html>
