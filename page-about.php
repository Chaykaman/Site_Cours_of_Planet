<?php
/* Template Name: About  */
get_header();
?>
<main>
    <div class="AboutTitle">
        <h1>О нас</h1>
        <h2>Наша миссия — дать возможность каждому быть получать актуальную информацию о космосе прямо сейчас.
            Вне зависимости от возраста и географии.</h2>
        <!-- Изображение, ставшее кнопкой -->
        <img src="<?php echo get_template_directory_uri(); ?>/Img/About/image.png" id="videoButton" alt="Открыть видео"
            style="cursor: pointer;">

        <!-- Модальное окно с видео -->
        <div id="videoModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <video poster="https://cdn.skillbox.pro/wbd-front/skillbox-static/company/video-preview.jpg" controls
                    controlslist="nodownload" autoplay playsinline>
                    <source src="https://cdn.skillbox.pro/wbd-front/skillbox-static/general/video/Skillbox-IT.webm"
                        type="video/webm">
                    <source src="https://cdn.skillbox.pro/wbd-front/skillbox-static/general/video/Skillbox-IT.mp4"
                        type="video/mp4">
                    <track kind="subtitles" srclang="en" label="English"
                        src="<?php echo get_template_directory_uri(); ?>/Img/About/Rick.vtt" default>
                </video>

            </div>
        </div>

    </div>
    <div class="checkinfo">
        <h2>Мы предлагаем большой выбор курсов для вашего развития</h2>
        <div class="aboutinfo">
            <div class="singleaboutinfo">
                <h1><data value="787">787</data> </h1>
                <h2>Курсов</h2>
            </div>
            <div class="singleaboutinfo">
                <h1><data value="120">120</data></h1>
                <h2>Кураторов</h2>
            </div>
            <div class="singleaboutinfo">
                <h1><data value="1207333">1207333</data></h1>
                <h2>Пользователей</h2>
            </div>
        </div>
    </div>
    </div>
    <div class="checkinfo">
        <h2>Мы предлагаем большой выбор курсов для вашего развития</h2>
        <div class="aboutinfo">
            <div class="singleaboutinfo-double-shrink">
                <figure>
                    <figcaption>Сектор газа - Лирика</figcaption>
                    <audio controls src="<?php echo get_template_directory_uri(); ?>/Othercontent/Lirika.mp3"></audio>
                </figure>
            </div>
            <div class="singleaboutinfo-double-shrink">
                <p>
                    <bdo dir="rtl">
                        <bdi lang="ru">Обычный текст</bdi> |
                        Зеркальный текст
                    </bdo>
                </p>
            </div>
            <div class="singleaboutinfo-double-grow">
                <h2>Всего пройдено курсов <meter optimum="30" high="80" max="100" value="85">85%</meter></h2>
            </div>
        </div>
    </div>
    <div class="MainPeople">
        <h1>Основатели платформы</h1>
        <div class="PeopleAbout">
            <div class="singleMainPeople">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/About/DM.png">
                <h2>Дмитрий Брутов</h2>
                <h3>Основатель и генеральный директор</h3>
            </div>
            <div class="singleMainPeople">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/About/SV.png">
                <h2>Дмитрий Брутов</h2>
                <h3>Основатель и генеральный директор</h3>
            </div>
            <div class="singleMainPeople">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/About/DK.png">
                <h2>Дмитрий Брутов</h2>
                <h3>Основатель и генеральный директор</h3>
            </div>
        </div>
    </div>
    <div class="check-cours">
        <h1> Оцените наш сайт от одного до 10</h1>
        <form class="form-rating" oninput="rating.value = parseInt(rating__range.value)">
            <label class="form-rating__item-title" for="serviceRating">Удобство сервиса:</label>
            <span>0</span>
            <input type="range" name="rating__range" id="serviceRating" min="0" max="10" value="10"
                class="form-rating__item-range" wfd-id="id0">
            <span>10</span>
            <output role="status" name="rating" for="serviceRating" class="form-rating__output">10</output>
        </form>
        <form class="form-rating" oninput="rating.value = parseInt(rating__range.value)">
            <label class="form-rating__item-title" for="serviceRating">Дизайн сайта:</label>
            <span>0</span>
            <input type="range" name="rating__range" id="serviceRating" min="0" max="10" value="10"
                class="form-rating__item-range" wfd-id="id0">
            <span>10</span>
            <output role="status" name="rating" for="serviceRating" class="form-rating__output">10</output>
        </form>
        <form class="form-rating" oninput="rating.value = parseInt(rating__range.value)">
            <label class="form-rating__item-title" for="serviceRating">Проработка материала:</label>
            <span>0</span>
            <input type="range" name="rating__range" id="serviceRating" min="0" max="10" value="10"
                class="form-rating__item-range" wfd-id="id0">
            <span>10</span>
            <output role="status" name="rating" for="serviceRating" class="form-rating__output">10</output>
        </form>
        <button type="button">Отправить</button>
    </div>
</main>
<?php get_footer(); ?>
