<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/feed.css">
    <link rel="stylesheet" href="/styles/profile.css">
    <title>Лента новостей</title>
</head>
<body>
    <main>
        <div class="">
            <div class="profile-cover">
                <div class="menu-container">
                    <a class="list-icon" title="Expand" href="#" onclick="toggleMenu()">
                    </a>
                    <ul class="profile-actions" id="profile-actions" style="display: none;">
                        <li><a href="profile">Личный кабинет</a></li>
                        <li><a href="#">Скоро будет обновление</a></li>
                        <li><a href="/logout">Выход</a></li>
                    </ul>
                </div>
            </div> 
        </div>
        <h1>Лента новостей</h1>
        <section class="feed">
            <article>
                <h2>Новая технология в области искусственного интеллекта</h2>
                <img src="https://avatars.mds.yandex.net/i?id=b7379342d36683fee7df7679235b6de4_l-4077540-images-thumbs&n=13" alt="Искусственный интеллект" class="news-image">
                <p>Недавние исследования показали, что новые алгоритмы машинного обучения могут значительно улучшить точность предсказаний в различных областях, включая медицину и финансы. Ученые уверены, что эти технологии изменят подход к анализу данных.</p>
                <a href="https://www.gptunnel.ru/blog/the-future-of-ai-opportunities-and-risks" class="read-more">Читать далее</a>
            </article>
            <article>
                <h2>Экологические инициативы в крупных городах</h2>
                <img src="https://cdn.culture.ru/images/38f2bb2a-cc25-530a-b1d8-4ba6d32a12be" alt="Экология" class="news-image">
                <p>Многие города по всему миру начинают внедрять экологические инициативы, направленные на снижение уровня загрязнения и улучшение качества жизни. В этом месяце несколько городов объявили о планах по увеличению зеленых зон и улучшению общественного транспорта.</p>
                <a href="https://tass.ru/obschestvo/20411917" class="read-more">Читать далее</a>
            </article>
            <article>
                <h2>Спортивные достижения на Олимпийских играх</h2>
                <img src="https://img.olympics.com/images/image/private/t_1-1_1920/f_auto/primary/exwekdaa5hpqd5nrvjrd" alt="Олимпийские игры" class="news-image">
                <p>На последних Олимпийских играх спортсмены из разных стран продемонстрировали выдающиеся результаты. Особенно запомнились соревнования по легкой атлетике, где были установлены новые мировые рекорды.</p>
                <a href="https://olympics.com/ru/paris-2024" class="read-more">Читать далее</a>
            </article>
            <article>
                <h2>Культурные события месяца</h2>
                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9" alt="Культура" class="news-image">
                <p>В этом месяце в нашем городе пройдет множество культурных мероприятий, включая выставки, концерты и театральные постановки. Не упустите возможность посетить эти уникальные события и насладиться искусством!</p>
                <a href="https://kudago.com/msk/events/" class="read-more">Читать далее</a>
            </article>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/scripts/profile.js"></script>   
</body>
</html>
