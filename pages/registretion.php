<?
$chekUser;
$error = '';
if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_reapet = $_POST['password_reapet'];

    if ($name === '') {
        $error .= "<p class='error'>Введите ваше имя! <br></p>";
    } else if (strlen($name) < 3) {
        $error .= "<p class='error'>Имя не должно быть меньше 3 символов <br></p>";
    }
    if ($email === '') {
        $error .= "<p class='error'>Введите вашe почту <br></p>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "<p class='error'>Неверный формат почты <br></p>";
    }

    if ($password === '') {
        $error .= "<p class='error'>Введите пароль <br></p>";
    } else if (strlen($password) < 6) {
        $error .= "<p class='error'>Пароль не должно быть меньше 6 символов <br></p>";
    } else if (strlen($password) > 12) {
        $error .= "<p class='error'>Пароль не должно быть больше 12 символов <br></p>";
    }

    if ($password != $password_reapet) {
        $error .= "<p class='error'>Пароль не совпадает<br></p>";
    }

    if ($password_reapet === '') {
        $error .= "<p class='error'>Введите пароль <br></p>";
    }
    $chekUser = $connection->query("SELECT * FROM `user` WHERE email ='$email'")->fetch(PDO::FETCH_ASSOC);

    // var_dump($chekUser);

    if (!empty($chekUser)) {
        $error .= "Данная почта уже зарегана!";
    }

    if ($error === '') {
        $pass_md5 = md5($password);

        $connection->query("INSERT INTO `user` (`name`, `email`, `password`, `f_name`, `tel`, `img`) VALUES ('$name','$email','$pass_md5', '', '', 'assets/img/users/user.png')");

        header("Location: ?page=auth");

    }
}

?>

<div class="form_login_registration mx_w ">
    <h2><span>Регистрация</span></h2>
    <form action="" method="POST" name="reg">
        <input type="email" name="email" placeholder="Почта" value="<?php if (isset($_POST['reg'])) {
            echo $_POST['email'];
        } ?>">
        <input type="text" name="name" placeholder="Имя" value="<?php if (isset($_POST['reg'])) {
            echo $_POST['name'];
        } ?>">
        <input type="text" name="password" placeholder="Пароль" value="<?php if (isset($_POST['reg'])) {
            echo $_POST['password'];
        } ?>">
        <input type="text" name="password_reapet" placeholder="Повторите пароль" value="<?php if (isset($_POST['reg'])) {
            echo $_POST['password_reapet'];
        } ?>">
        <?= $error ?>
        <a href="?page=authА">Уже есть аккаунта? <span>Войти</span> -> </a>
        <input type="submit" class="btn_form" value="Зарегестрироваться" name="reg">
    </form>
</div>