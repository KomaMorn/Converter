<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="tools/css/bootstrap.css">
  <title>Register</title>
</head>

<body>
  <div class="container">
    <h2 class="mt-5">Sign Up</h2>
    <form class="mt-5" action="auth/register" method="post">
      <div class="mb-3">
        <label for="inputLogin" class="form-label">Создайте логин</label>
        <input type="text" name="username" class="form-control" id="inputLogin">
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="form-label">Создайте пароль</label>
        <input type="password" name="password" class="form-control" id="inputPassword">
      </div>
      <div class="mb-3">
        <label for="inputPasswordConfirm" class="form-label">Подтвердите пароль</label>
        <input type="password" name="confirm" class="form-control" id="inputPasswordConfirm">
      </div>
      <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
      <a href="/converter.ru/login" class="link-primary">Уже есть аккаунт? Войдите.</a>
    </form>
  </div>
</body>

</html>