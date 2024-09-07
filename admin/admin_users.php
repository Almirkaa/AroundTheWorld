<?
 if(isset($_GET['id'])){
        $id = $_GET['id'];
        $users = $connection->query("SELECT * FROM `user` WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }
    if(isset($_GET['delete_id_users'])) {
        $id = $_GET['delete_id_users'];
        $connection->query("DELETE FROM `user` WHERE id=$id");
        header("Location: ?page=users");
    }
?>
<h4>Пользователи</h4>
<div class="users__info__items">
    <div class="users__info__card">
        <p class="user__id">ID</p>
        <p class="users__name">Имя</p>
        <p class="user__LName">Фамилия</p>
        <p class="user__email">Почта</p>
        <p class="user__tel">Телефон</p>
        <!-- <a href="#!">Удалить</a>    -->
    </div>
    <?
    foreach($users as $user) {
        ?>
    <div class="users__info__card">
        <p class="user__id"><?=$user['id']?></p>
        <p class="users__name"><?=$user['name']?></p>
        <p class="user__LName"><?=$user['f_name']?></p>
        <p class="user__email"><?=$user['email']?></p>
        <p class="user__tel"><?=$user['tel']?></p>
        <a href="?page=users&delete_id_users=<?=$user['id']?>">Удалить</a>
    </div>
    <?
    }
    ?>
</div>