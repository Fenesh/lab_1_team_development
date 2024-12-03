<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/profile.css">
    <title>Профиль пользователя</title>
</head>
<body>
    <div class="profile-card">
        <div class="profile-cover">
            <div class="menu-container">
                <a class="list-icon" title="Expand" href="#" onclick="toggleMenu()">
                </a>
                <ul class="profile-actions" id="profile-actions" style="display: none;">
                    <li><a href="feed">Новости</a></li>
                    <li><a href="#">Скоро будет обновление</a></li>
                    <li><a href="/logout">Выход</a></li>
                </ul>
            </div>
            <div class="profile-avatar">
                <a href="#"><img src="https://dl.dropboxusercontent.com/s/7pcnqq18skh1myk/avatar.jpg" alt="Anis M" class="avatar" /></a>
            </div>
                <div class="profile-details">
                    <h1><?= $user['username'] ?></h1>
                        <div class="user-info">
                            <h2>Дата рождения</h2>
                            <p>1 января 1990</p>
                            <h2>Контакты</h2>
                            <p>Телефон: +7 (123) 456-78-90</p>
                            <p>Почта: <?= $user['email'] ?></p>
                            <p>Социальные сети: <a href="#" style="color: white;">Instagram</a>, <a href="#" style="color: white;">VK</a></p>
                        </div>
                </div>
            </div>
        </div>

    </div>
    <?= render('components/footer'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/scripts/profile.js"></script>   
</body>
</html>