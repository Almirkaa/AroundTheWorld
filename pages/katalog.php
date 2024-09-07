<?
$tovars = $connection->query("SELECT * FROM tovar")->fetchAll(PDO::FETCH_ASSOC);
?>


<!-- <?

$rand = rand(10, 17);

?> -->
<div class="bg_banner banner_catalog">
    <div class="banner mx_w">
        <? if (isset($_SESSION['uid'])) { ?>
            <a class="btn" href="?page=order&id=<?= $rand ?>">придумайте мне путешествие</a>
        <? } else { ?>
            <a class="btn" href="?page=auth">придумайте мне путешествие</a>
        <? } ?>

    </div>

</div>

<div class="katalog">

    <!-- <div class="filtr__items mx_w">
        <a href="#!" class="filtr vse filtr__active">Все</a>
        <select name="napravlenie" id="" class="filtr">
            <option value="1">направление</option>
            <option value="2">Азия</option>
            <option value="2">Европа</option>
            <option value="3">Америка</option>
            <option value="4">Австралия</option>
        </select>
        <select name="napravlenie" id="" class="filtr">
            <option value="1">Сезон</option>
            <option value="2">Лето</option>
            <option value="2">Осень</option>
            <option value="3">Зима</option>
            <option value="4">Весна</option>
            <option value="5">Круглый год</option>
        </select>
        <select name="napravlenie" id="" class="filtr">
            <option value="1">Формат</option>
            <option value="2">Индивиуальные</option>
            <option value="2">Семейные</option>
            <option value="3">Групповые</option>

        </select>
    </div> -->

    <div class="items mx_w">
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



        <!-- <div class="pagination__katalog">
            <a href="#!" class="pagin_btn_kat pagin_btn_kat_active  ">1</a>
            <a href="#!" class="pagin_btn_kat ">2</a>
            <a href="#!" class="pagin_btn_kat ">3</a>
        </div> -->
    </div>
</div>