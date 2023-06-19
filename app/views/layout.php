<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/<?=APP_BASE_PATH?>/">minCrm</a>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="/<?=APP_BASE_PATH?>/users">Пользователи</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/<?=APP_BASE_PATH?>/roles">Роли</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/<?=APP_BASE_PATH?>/auth/register">Регистрация</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/<?=APP_BASE_PATH?>/auth/login">Авторизация</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/<?=APP_BASE_PATH?>/auth/logout">Выйти из аккаунта</a>
                  </li>
              </ul>
          </div>
      </nav>
      <div class="container mt-4">
          <?php echo $content;?>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>