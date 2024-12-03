<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/register.css">
    <link rel="stylesheet" href="/scripts/register.js">
    <title>Document</title>
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container" >
                <img src="https://i.pinimg.com/originals/c1/c4/4a/c1c44a54126f793241da90e3d4c147e3.png" alt="illustration" class="illustration" />
                <b><h1 class="opacity">Регистрация</h1></b>
                    <main>
                        <? if ($error) :?>
                            <span><?= $error ?></span>
                        <? endif;?>
                        <form action="/register" method="POST">
                            <label for="username" >Имя пользователя:</label>
                            <input type="text" id="username" name="username" placeholder="Олег" required>
                            <label for="email">Электронная почта:</label>
                            <input type="email" id="email" name="email" placeholder="*****@yandex.ru" required>
                            <label for="password">Пароль:</label>
                            <input type="password" id="password" name="password" placeholder="Aa12345" required>
                            <button type="submit" class="opacity button_reg">Зарегистрироваться</button>
                        </form>
                        <div class="register-forget ">
                            <a href="/login">Авторизоватся</a>
                        </div>
                    </main>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
</html>
