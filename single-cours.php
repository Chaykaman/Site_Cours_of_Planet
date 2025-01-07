<?php get_header(); ?>
<main>
    <div class="PreviewTitleCours">
        <div class="NameClass">
            <h1><?php the_title(); ?></h1> <!-- Выводим название курса -->
            <h2>
                <?php
                // Выводим полный контент курса
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        // Проверяем, есть ли контент
                        if (get_the_content()) {
                            the_content();
                        } else {
                            echo 'Описание пока недоступно.';
                        }
                    }
                }
                ?>
            </h2>
            <div class="CheckCours">
                <a href="#" class="subscribe-button"
                    data-nonce="<?php echo wp_create_nonce('subscribe_course_nonce'); ?>">
                    <span>+</span>
                    <h2>Записаться сейчас</h2>
                </a>
            </div>
        </div>
        <img src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="infoOfCours">
        <figure>
            <picture>
                <source srcset="">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/calendare.png">
            </picture>
            <figcaption>4 недели</figcaption>
        </figure>
        <figure>
            <picture>
                <source srcset="">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/task.png">
            </picture>
            <figcaption>Расширит ваш кругозор</figcaption>
        </figure>
        <figure>
            <picture>
                <source srcset="">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/hat.png">
            </picture>
            <figcaption><?php the_excerpt(); ?></figcaption>
        </figure>
    </div>
    <div class="WhatWeStudy">
        <h1>Чему вы научитесь</h1>
        <div class="CheckStudys">
            <div class="SingleStudy">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/blackhole.png">
                <h2><b>Ориентироваться в терминах</b></h2>
                <h2>Разберётесь в основных астрономических закономерностях и понятиях. Узнаете, как менялось
                    представление о них.</h2>
            </div>
            <div class="SingleStudy">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/blackhole.png">
                <h2><b>Кометы и их поведение</b></h2>
                <h2>Узнаете о кометах, их орбитах и химическом составе. Разберётесь в механизмах их появления и
                    ярких хвостов.</h2>
            </div>
            <div class="SingleStudy">
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/blackhole.png">
                <h2><b>Метеориты и метеоры</b></h2>
                <h2>Изучите, как метеориты и метеоры взаимодействуют с Землёй и другие планеты. Понимание их роли в
                    нашей солнечной системе.</h2>
            </div>
        </div>
    </div>
    <div class="StageStudy">
        <div class="StageStudyTitle">
            <h1>Как проходит обучение</h1>
            <a>
                <span>+</span>
                <h2>Хочу на курс!!!</h2>
            </a>
        </div>
        <div class="Stages">
            <div class="SingleStages">
                <span>1</span>
                <div class="StagesTittle">
                    <h2>Знакомство</h2>
                    <h3>После оплаты курса вам на почту придет вся необходимая информация о старте.</h3>
                </div>
            </div>
            <div class="SingleStages">
                <span>2</span>
                <div class="StagesTittle">
                    <h2>16 уроков за 4 недели</h2>
                    <h3>Вам будет предложено пройти 16 онлайн-занятий, в которых будут разбираться различные стороны
                        вашей личности. <wbr>Рекомендуем изучать по 4 урока в неделю.</h3>
                </div>
            </div>
            <div class="SingleStages">
                <span>3</span>
                <div class="StagesTittle">
                    <h2>Гибкий график</h2>
                    <h3>Вы можете заниматься в любое удобное для вас время или настроить индивидуальный график с
                        возможностью получать напоминания на почту.</h3>
                </div>
            </div>
            <div class="SingleStages">
                <span>4</span>
                <div class="StagesTittle">
                    <h2>Полная информация</h2>
                    <h3>В каждом из 16 уроков программы есть теоретический<wbr> блок, разделенный на краткую и подробную
                        части. Уроки содержат тесты с детальной интерпретацией ваших результатов.</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="MainQuestion">
        <h1>Часто задаваемые вопросы</h1>
        <details>
            <summary>
                Как проходят занятия
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/arrow.png">
            </summary>
            <h2>
                Все занятия на нашем сайте проходят онлайн и предполагают самостоятельное обучение без вмешательства
                преподавателя (хотя вы всегда можете задать вопрос тьютору через чат). Вам нужно лишь перейти к
                уроку и выполнять те задачи, которые перед вами поставлены. В связи с этим мы рассчитываем на то,
                что вы проявите самодисциплину и сможете сами контролировать процесс обучения.
            </h2>
        </details>
        <details>
            <summary>
                Программа точно принесёт мне результат?
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/arrow.png">
            </summary>
            <h2>
                <mark>Эта программа - не волшебная таблетка</mark>. Многое зависит именно от вас, от вашего желания и
                усердия.
                Большинство пользователей показывают прогресс и получают полезные знания и навыки. Мы постарались
                сделать программу удобной, информативной и ориентированной на практику.
            </h2>
        </details>
        <details>
            <summary>
                Когда начинаются занятия и можно ли перенести дату старта курса?
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/arrow.png">
            </summary>
            <h2>
                Программа начинается с момента ее оплаты (кроме случаев предзаписи, когда указана конкретная дата
                начала). Если вам нужно <mark>перенести дату начала курса на несколько дней или недель, напишите нам на
                    help@CoP.ru заранее</mark>, и мы отложим старт. Всё дело в том, что программа автоматизирована и
                может
                быть не привязана к определенной дате старта.
            </h2>
        </details>
        <details>
            <summary>
                Что делать, если я не вижу ответа на свой вопрос?
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/arrow.png">
            </summary>
            <h2>
                Если вы не нашли свой вопрос или ответ на него, напишите нам на help@CoP.ru.
            </h2>
        </details>
        <details>
            <summary>
                FAQ
                <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/Icons/arrow.png">
            </summary>
            <embed src="<?php echo get_template_directory_uri(); ?>/Img/About/FAQ.pdf" type="application/pdf">
        </details>

    </div>
</main>
<?php get_footer(); ?>

<script>
    document.querySelector('.subscribe-button').addEventListener('click', function (e) {
        e.preventDefault();
        const nonce = this.dataset.nonce;

        fetch(ajaxurl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                action: 'subscribe_to_course',
                nonce: nonce
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Вы успешно подписались на курс!');
                } else {
                    alert('Ошибка: ' + data.message);
                }
            });
    });
</script>