<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | MBOZOKAMANE</title>
  <link rel="stylesheet" href="asset/styles.css">
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(180deg, #dbeafe 0%, #ffffff 100%);
    }

    .login-container {
      background: white;
      padding: 40px 50px;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 320px;
    }

    .login-container h2 {
      margin-bottom: 25px;
      color: #1e3a8a;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #3b82f6;
      color: white;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      font-size: 15px;
    }

    button:hover {
      background-color: #2563eb;
    }

    ::placeholder {
      color: #9ca3af;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login ke Sistem</h2>
    <form action="proses_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit">Masuk</button>
    </form>
  </div>
</body>
</html>
