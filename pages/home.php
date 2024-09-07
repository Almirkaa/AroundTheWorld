<?
$tovars = $connection->query("SELECT * FROM tovar")->fetchALL(PDO::FETCH_ASSOC);
?>


<div class="bg_banner banner_index">
    <div class="banner mx_w">
        <a class="btn btn-style702" href="?page=katalog">Заказать путешествие</a>
    </div>
</div>

<div class="popular_tour mx_w ptb">
    <h2><span>ПОПУЛЯРНЫЕ</span> ТУРЫ</h2>
    <div class="popular_tour__items">

        <div class="popular_tour__card">
            <div class="imgBox__popular">
                <img src="assets/img/popular_tour/russia.png" alt="">
            </div>
            <div class="txtBox__popular">
                <div class="place">
                    <img src="assets/img/icon/place.png" alt="">
                    <h4>Россия</h4>
                </div>
                <p class="name_tour">Золотое кольцо: культурные сокровища</p>
            </div>
        </div>

        <div class="popular_tour__card">
            <div class="imgBox__popular">
                <img src="assets/img/popular_tour/norway.png" alt="">
            </div>
            <div class="txtBox__popular">
                <div class="place">
                    <img src="assets/img/icon/place.png" alt="">
                    <h4>Норгвегия</h4>
                </div>
                <p class="name_tour">Северное сияние и величественные горы</p>
            </div>
        </div>

        <div class="popular_tour__card">
            <div class="imgBox__popular">
                <img src="assets/img/popular_tour/alyska.png" alt="">
            </div>

            <div class="txtBox__popular">
                <div class="place">
                    <img src="assets/img/icon/place.png" alt="">
                    <h4>Аляска</h4>
                </div>
                <p class="name_tour">Круиз по ледникам и ледовым полям</p>
            </div>
        </div>

        <div class="popular_tour__card">
            <div class="imgBox__popular">
                <img src="assets/img/popular_tour/iceland.png" alt="">
            </div>
            <div class="txtBox__popular">
                <div class="place">
                    <img src="assets/img/icon/place.png" alt="">
                    <h4>Исландия</h4>
                </div>
                <p class="name_tour">Огненные водопады и ледяные пещеры</p>
            </div>
        </div>

    </div>

    <div class="pagination__index">
        <div class="pagin_btn pagin_btn_active"></div>
        <div class="pagin_btn"></div>
        <div class="pagin_btn"></div>
    </div>
</div>

<div class="statistics mx_w ptb">
    <div class="title">
        <h2><span>Around The World</span> - ваш путеводитель в незабываемые приключения</h2>
        <img src="assets/img/logo/statistic.png" alt="">
    </div>
    <div class="stat__items">
        <div class="stat__card">
            <h3>21</h3>
            <p><span>вершина</span><br>в списке восхождений</p>
        </div>
        <div class="stat__card">
            <h3>15</h3>
            <p><span>человек</span><br>в команде</p>
        </div>
        <div class="stat__card">
            <h3>> 500</h3>
            <p><span>клиентов</span><br>со всего мира</p>
        </div>
        <div class="stat__card">
            <h3>50</h3>
            <p><span>стран</span><br>посетили</p>
        </div>
    </div>
</div>

<div class="format mx_w ptb">
    <h2>Выберите <span>свой формат</span> путешествий</h2>
    <div class="format_items">
        <div class="format_card format_card_one">
            <img src="assets/img/format/gproup_form.png" alt="">
            <p>Групповые путешествия</p>
        </div>
        <div class="format__group2">
            <div class="format_card">
                <img src="assets/img/format/individual.png" alt="">
                <p>Индивиуальные путешествия</p>
            </div>
            <div class="format_card">
                <img src="assets/img/format/family.png" alt="">
                <p>Семейные путешествия</p>
            </div>
        </div>
    </div>
</div>

<div class="group_tour mx_w ptb">
    <h2><span>Групповые</span> путешествия</h2>
    <div class="items">
        <? foreach ($tovars as $tovar) { ?>
            <div class="card">
                <a href="?page=tovar&id=<?= $tovar['id'] ?>">
                    <div class="imgBox">

                        <img class="img__card" src="<?= $tovar['img'] ?>" alt="">

                        <div class="card__name">

                            <div class="place">
                                <img src="assets/img/icon/place.png" alt="">
                                <h4>
                                    <?= $tovar['country'] ?>
                                </h4>
                            </div>
                            <p class="name_tour">
                                <?= $tovar['name'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="txtBox">
                        <p class="date">
                            <?= $tovar['date_otpr'] ?> -
                            <?= $tovar['date_vozvr'] ?>
                        </p>
                        <p>
                            <?= $tovar['text'] ?>
                        </p>
                        <p class="price">от
                            <?= $tovar['price'] ?> ₽
                        </p>
                    </div>
                    <? if (isset($_SESSION['uid'])) { ?>
                        <a href="?page=order&id=<?= $tovar['id'] ?>" class="btn__card btn">Оставить заявку</a>
                    <? } else { ?>
                        <a href="?page=auth" class="btn__card btn">Оставить заявку</a>
                    <? } ?>
                </a>
            </div>
        <? } ?>
        <!-- 
        <div class="pagination__index">
            <div class="pagin_btn pagin_btn_active"></div>
            <div class="pagin_btn"></div>
            <div class="pagin_btn"></div>
        </div> -->
    </div>

    <div class="otzyv mx_w ptb">
        <h2><span>Сообщество</span> путешественников</h2>
        <div class="otzyv__items">
            <div class="otzyv__card">
                <img src="assets/img/otzyv/one.png" alt="">
                <h5>Арина Клин</h5>
                <p>Почему я хожу в экспедиции с Transformator travel? Здесь я получаю получаю массу мощных эмоций,
                    сильных друзей и море инсайтов!</p>
                <a href="#!" class="btn__otzyv">Читать полный отзыв</a>
            </div>
            <div class="otzyv__card">
                <img src="assets/img/otzyv/отзыв2.png" alt="">
                <h5>Полина Петрова</h5>
                <p>Мы посетили Грецию и остались в восторге от экскурсий и комфорта. Профессиональные гиды сделали наше
                    путешествие незабываемым.</p>
                <a href="#!" class="btn__otzyv">Читать полный отзыв</a>
            </div>
            <div class="otzyv__card">
                <img src="assets/img/otzyv/отзыв3.png" alt="">
                <h5>Максим Смирнов</h5>
                <p>Благодаря профессионализму гидов и водителей, наша поездка стала поистине незабываемой. Благодарим за
                    отличную организацию!</p>
                <a href="#!" class="btn__otzyv">Читать полный отзыв</a>
            </div>
        </div>
    </div>