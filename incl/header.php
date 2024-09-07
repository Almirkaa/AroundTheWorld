<?
// if (isset($_SESSION['uid'])) {
//     $id = $_SESSION['uid'];
//     $user = $connection->query("SELECT * FROM user WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
// }

// if (isset($_GET['exit'])) {
//     session_unset();
//     header('Location: ?page=auth');
// }
?>
<header class="mx_w">

    <a href="?page=home"><img src="assets/img/logo/logo_h.png" alt=""></a>

    <input type="checkbox" name="" id="burger">
    <label for="burger"></label>
    <div class="nav">
        <nav class="header-nav">
            <a href="?page=home">Главная</a>
            <a href="?page=about">О нас</a>
            <a href="?page=katalog">Путешествия</a>
            <a href="?page=contact">Контакты</a>
            <? if (isset($_SESSION['uid'])) { ?>
                <a class="header-no" href="?page=user">Личный кабинет</a>
            <? } else { ?>
                <a class="header-no" href="?page=auth">Вход</a>
                <a class="header-no" href="?page=reg">Регистрация</a>
            <? } ?>
        </nav>
    </div>

<?
// var_dump($_SESSION['uid']);
if (isset($_SESSION['uid'])) { ?>
    <div class="header__img__user">

        <a href="?page=user">
            <? if ($user['img'] != "") { ?>
                <img src="<?= $user['img'] ?>" alt="">
            <? } ?>
        </a>

    </div>

<? } else { ?>
    <a href="?page=auth" class="user__icon"><i class="fa-solid fa-user" style="color: #ffffff;"></i></a>

<? } ?>

</header>