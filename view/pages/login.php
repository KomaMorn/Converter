<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="tools/css/bootstrap.css">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <h2 class="mt-5">Sign In</h2>
    <form class="mt-5" action="auth/login" method="post">
      <div class="mb-3">
        <label for="inputLogin" class="form-label">Ваш логин</label>
        <input type="text" name="username" class="form-control" id="inputLogin">
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="inputPassword">
      </div>
      <button type="submit" class="btn btn-primary">Войти</button>
      <a href="/converter.ru/register" class="link-primary">Нет аккаунта? Зарегистрируйтесь.</a>
    </form>
  </div>
</body>

</html>