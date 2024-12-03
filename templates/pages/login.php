
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/login.css">
    <link rel="stylesheet" href="/scripts/login.js">
    <title>Document</title>
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://i.pinimg.com/originals/c1/c4/4a/c1c44a54126f793241da90e3d4c147e3.png" alt="illustration" class="illustration" />
                <b><h1 class="opacity">Авторизация</h1></b>
                <? if ($error) :?>
                    <span><?= $error ?></span>
                <? endif;?>
                <form action="/login" method="post">
                    <input name="username" type="text" placeholder="Логин" />
                    <input name="password" type="password" placeholder="Пароль" />
                    <button class="opacity">Войти</button>
                </form>
                <div class="register-forget opacity">
                    <a href="/register">Регистрация</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
</html>