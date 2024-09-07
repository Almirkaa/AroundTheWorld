<?

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $users = $connection->query("SELECT * FROM `user` WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $connection->query("DELETE FROM `user` WHERE id=$id");
    session_unset();
    header("Location: ?page=auth");
}
?>
<div class="user__name mx_w ptb">
    <h2><span>Личный Кабинет</span></h2>
    <div class="user__foto">
        <div class="foto">
            <? if ($user['img'] != "") { ?>
                <img src="<?= $user['img'] ?>" alt="">
            <? } else { ?>
                <img src="assets/img/users/user.png" alt="">
            <? } ?>
        </div>

    </div>
    <div class="user__info">
        <div class="user__info__card">
            <p>
                <?= $user['name'] ?>
            </p>
        </div>
        <div class="user__info__card">
            <? if ($user['f_name'] === '') { ?>
                <p>Фамилия</p>
            <? } else { ?>
                <p>
                    <?= $user['f_name'] ?>
                </p>
            <? } ?>
        </div>
        <div class="user__info__card">
            <p>
                <?= $user['email'] ?>
            </p>
        </div>
        <div class="user__info__card">
            <? if ($user['tel'] === '') { ?>
                <p>Телефон</p>
            <? } else { ?>
                <p>
                    <?= $user['tel'] ?>
                </p>
            <? } ?>
        </div>
    </div>
    <div class="user__btns">
        <a href="?page=user_edit&edit_id=<?= $user['id'] ?>" class="btn__user">Редактировать</a>
        <a href="?page=user&delete_id=<?= $user['id'] ?>" class="btn__user">Удалить</a>
        <?if($user['role']==='2') {?>
            <a href="../admin/admin.php" class="btn__user">АдминПанель</a>
            <?}?>
        <a href="?exit" class="btn__user">Выход</a>
        
    </div>
</div>

<div class="zayavki mx_w ptb" id="zayavki">
    <h2><span>Мои Заявки</span></h2>

    <?
    ?>


    <div class="zayavki__items" >

        <?
        if (isset($_GET['delete_id_order'])) {
            $id = $_GET['delete_id_order'];

            $connection->query("DELETE FROM `order` WHERE id=$id");
            header("Location: ?page=user#zayavki");
        }


        $sql = "SELECT * FROM `order` WHERE user_id='$id'";
        $order = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?
        if (empty($order)) { ?>
            <p class="order_p">У вас еще нет заявок</p>
            <a href="?page=katalog" class="btn">Заказать путешествие</a>
        <? }else{
        foreach ($order as $ord) {
            $sql1 = "SELECT * FROM `tovar` WHERE id={$ord['tovar_id']}";
            // var_dump($sql1);
        
            $tovar = $connection->query($sql1)->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="zayavki__card">
                <img src="<?= "../" . $tovar['img'] ?>" alt="">
                <p class="z_name">
                    <?= $ord['name'] ?>
                </p>
                <p class="z_country">
                    <?= $ord['country'] ?>
                </p>
                <p class="z_date">
                    <?= $ord['date_otpr'] ?> - <br><?= $ord['date_vozvr'] ?>
                </p>
                <p class="z_people">
                    <?= $ord['quantity'] ?> чел.
                </p>
                <a href="?page=user&delete_id_order=<?= $ord['id'] ?>"><i class="fa-solid fa-trash"></i></a>
            </div>
        <?}?>
        <?}?>


    </div>
</div>