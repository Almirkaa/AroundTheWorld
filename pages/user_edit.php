<?
$error = '';
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $users = $connection->query("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
}
if (isset($_POST['ed'])) {
    $error = '';
    $name = $_POST['name'];
    $f_name = $_POST['f_name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $pass_md5 = $users['password'];

    if ($_FILES['img']['size'] > 2 * 1024 * 1024) {
        $error .= 'слишком большой размер файла!';

    }
    if ($_FILES['img']['type'] != 'image/jpeg' && $_FILES['img']['type'] != 'image/png') {
        $error .= 'изображение должно быть формата png и  jpg!';
    }
    $route = './assets/img/users/' . time() . $_FILES['img']['name'];
    if ($error === '') {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $route)) {
            $route = str_replace('./', '', $route);
            $connection->query("UPDATE `user` SET `name`='$name', `f_name`='$f_name', `email`='$email', `tel`='$tel', `password`='$pass_md5', `img`='$route' WHERE id={$_GET['edit_id']}");
            header('Location: ?page=user');
        } else {
            $error .= 'произошла какая-то ошибка с загрузкой изображения';
        }
    }
}
?>
<div class="user__name mx_w ptb">
    <h2><span>Личный Кабинет</span></h2>
    <form method="POST" name="ed" enctype="multipart/form-data" class="user__info">
        <div class="user__info__card file">
            <input type="file" name="img">
        </div>
        <div class="user__info__card">
            <input type="text" name="name" placeholder="Имя" value="<?= $users['name'] ?>">
        </div>
        <div class="user__info__card">
            <input type="text" name="f_name" placeholder="Фамилия" value="<?= $users['f_name'] ?>">
        </div>
        <div class="user__info__card">
            <input type="text" name="email" placeholder="Почта" value="<?= $users['email'] ?>">
        </div>
        <div class="user__info__card">
            <input type="text" name="tel" placeholder="Телефон" value="<?= $users['tel'] ?>">
        </div>
        <div class="error">
            <?= $error ?>
        </div>
        <input type="submit" class="btn__user" name="ed" value="Сохранить">
    </form>
</div>