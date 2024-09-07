<?
$error = '';
$email = '';
$password = '';
$checkUser = '';
$checkEmail = '';
if (isset($_POST['auth'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $pass_md5 = md5($password);

    if ($password === '') {
        $error .= "<p class='error'>Введите пароль</p>";
    }
    if ($email === '') {
        $error .= "<p class='error'>Введите почту</p>";
    } else {
        $checkEmail = $connection->query("SELECT * FROM user WHERE email = '$email'")->fetch(PDO::FETCH_ASSOC);
        if (empty($checkEmail)) {
            $error .= "<p class='error'>Эта почта не зарегистрирована</p>";
        } else {
            $checkUser = $connection->query("SELECT * FROM user WHERE email = '$email' AND password = '$pass_md5'")->fetch(PDO::FETCH_ASSOC);
            if (empty($checkUser)) {
                $error .= "<p class='error'>Неверный логин или пароль!</p>";
            }
        }
    }
    if ($error === '') {

        $_SESSION['uid'] = $checkUser['id'];
        // var_dump($_SESSION['uid']);

        if ($checkUser['role'] === '2') {
            header('Location: ../admin/admin.php');
        } else {
            header('Location: ?page=user');
        }
    }
}
?>

<div class="form_login_registration mx_w ">
    <h2><span>Авторизация</span></h2>
    <form action="" method="POST" name="auth">
        <input type="email" name="email" placeholder="Почта" value="<?= $email ?>">
        <input type="password" name="password" placeholder="Пароль" value="<?= $password ?>">
        <?= $error ?>
        <a href="?page=reg">Нет аккаунта? <span>Зарегистрируйтесь</span> -> </a>
        <input type="submit" value="Войти" name="auth" class="btn_form">
        <!-- <a href="user.html">Личный кабинет</a>
        <a href="admin/admin_users.html">админ панель</a> -->
    </form>
</div>