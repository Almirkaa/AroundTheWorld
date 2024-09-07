<?
    require './connect/connection.php';
    global $connection;
    if (isset($_SESSION['uid'])) {
        $id = $_SESSION['uid'];
        $user = $connection->query("SELECT * FROM user WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
    }
    
    if (isset($_GET['exit'])) {
        session_unset();
        header('Location: ?page=auth');
    }

    $users = $connection->query("SELECT * FROM user")->fetchALL(PDO::FETCH_ASSOC);

    $tovars = $connection->query("SELECT * FROM tovar")->fetchALL(PDO::FETCH_ASSOC);
?>
<!-- ф -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AroundTheWorld</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo/fav1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <? include ('./incl/header.php') ?>

    <?
    if (empty($_GET)) {
        require './pages/home.php';
    } elseif (isset($_GET['page'])) {
        if ($_GET['page'] === 'home') {
            require './pages/home.php';
        }
        if ($_GET['page'] === 'about') {
            require './pages/about.php';
        }
        if ($_GET['page'] === 'katalog') {
            require './pages/katalog.php';
        }
        if ($_GET['page'] === 'auth') {
            require './pages/autorization.php';
        }
        if ($_GET['page'] === 'contact') {
            require './pages/contact.php';
        }
        if ($_GET['page'] === 'order') {
            require './pages/order.php';
        }
        if ($_GET['page'] === 'reg') {
            require './pages/registretion.php';
        }
        if ($_GET['page'] === 'tovar') {
            require './pages/tovar.php';
        }
        if ($_GET['page'] === 'user') {
            require './pages/user.php';
        }
        if ($_GET['page'] === 'user_edit') {
            require './pages/user_edit.php';
        }
    }


    if ($_GET['page'] != 'contact') {
        include ('./incl/footer.php');
    }

    ?>



</body>

</html>