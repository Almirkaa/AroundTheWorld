<?
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $tovar = $connection->query("SELECT * FROM tovar WHERE id=$id")->fetch(PDO::FETCH_ASSOC);

}
?>

<div class="bg_banner banner_tovar" style="background-image: url('<?= $tovar['img'] ?>')">
    <div class="banner_tovar_grad"></div>
    <div class="banner mx_w">
        <h1>
            <?= $tovar['name'] ?>
        </h1>
        <div class="place__date">
            <div class="place">
                <img src="assets/img/icon/place.png" alt="">
                <h4>
                    <?= $tovar['country'] ?>
                </h4>
            </div>
            <p>
                <?= $tovar['date_otpr'] ?> -
                <?= $tovar['date_vozvr'] ?>
            </p>
        </div>
    </div>

</div>

<div class="tovar mx_w ptb">

    <div class="tovar__info">
        <!-- <div class="txtBox__tovar"> -->
            <!-- <p>Отправляйтесь в удивительное путешествие, где вас ждут встречи с величественными льдами и непокорной
                дикой природой Антарктики. Погрузитесь в мир ледников, проведите время с животными и насладитесь
                невероятной красотой этого уникального континента. Открыть для себя непроглядные обширные ледяные
                просторы и ощутить мощь и тишину этого удаленного уголка планеты - это приключение, которое навсегда
                останется в вашей памяти.</p> -->
                <p><?=$tovar['description']?></p>
            <p class="price"><span>Цена: </span>от
                <?= $tovar['price'] ?> ₽
            </p>
        <!-- </div> -->
        <!-- <img src="assets/img/tovar/antarctida__one.png" alt="">
        <img src="assets/img/tovar/antarctida__two.png" alt="" class="tovar__two"> -->
    </div>
    <? if (isset($_SESSION['uid'])) { ?>
    <a href="?page=order&id=<?=$tovar['id']?>" class="btn btn__tovar mx_w">НАЧАТЬ путешествие</a>
    <?} else {?>
        <a href="?page=auth" class="btn btn__tovar mx_w">НАЧАТЬ путешествие</a>
        <?}?>

</div>