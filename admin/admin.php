<?
require '../connect/connection.php';
global $connection;

$users = $connection->query("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);
$tovars = $connection->query("SELECT * FROM tovar")->fetchAll(PDO::FETCH_ASSOC);
if (isset($_SESSION['uid'])) {
    $id = $_SESSION['uid'];
    $user = $connection->query("SELECT * FROM user WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование товара</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/logo/fav1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="adminka">

        <header class="mx_w">
            <a href="../index.php"><img src="../assets/img/logo/logo_h.png" alt=""></a>
            <input type="checkbox" name="" id="burger">
            <label for="burger"></label>
            <div class="nav admin-nav">
                <nav class="header-nav">
                    <div class="navBox">
                        <i class="fa-regular fa-user"></i>
                        <a href="?page=users" class="nav_active_admin">Пользователи</a>
                    </div>
                    <div class="navBox">
                        <i class="fa-solid fa-table-cells-large"></i>
                        <a href="?page=products">Товары</a>
                    </div>
                    <div class="navBox">
                        <i class="fa-solid fa-list-ol"></i></i>
                        <a href="#!">Категории</a>
                    </div>
                    <div class="navBox">
                        <i class="fa-regular fa-square-plus"></i></i>
                        <a href="?page=new">Добавить товар</a>
                    </div>
                </nav>
            </div>

        </header>

        <div class="nav__panel">
            <header>
                <a href="../index.php"><img src="../assets/img/logo/logo_h.png" alt=""></a>
            </header>
            <div class="admin_navigation">

                <div class="admin_img_name">
                    <div class="imgBox_admin"><img src="<?= "../" . $user['img'] ?>" alt=""></div>
                    <div class="txtBox_admin">
                        <p class="name">
                            <?= $user['name'] ?>
                        </p>
                        <p>
                            <?= $user['email'] ?>
                        </p>
                    </div>
                </div>

                <nav>
                    <div class="navBox">
                        <i class="fa-regular fa-user" style="color: #333333;"></i>
                        <a href="?page=users">Пользователи</a>
                    </div>
                    <div class="navBox">
                        <i class="fa-solid fa-table-cells-large" style="color: #333333;"></i>
                        <a href="?page=products">Товары</a>
                    </div>
                    <!-- <div class="navBox">
                        <i class="fa-solid fa-list-ol" style="color: #333333;"></i></i>
                        <a href="#!">Категории</a>
                    </div> -->
                    <div class="navBox">
                        <i class="fa-regular fa-square-plus" style="color: #333333;"></i></i>
                        <a href="?page=new">Добавить товар</a>
                    </div>
                </nav>
            </div>
        </div>

        <div class="osnov__panel">
            <h3>Панель администратора</h3>

            <?
            if (empty($_GET)) {
                require './admin_products.php';
            } elseif (isset($_GET['page'])) {
                if ($_GET['page'] === 'products') {
                    require './admin_products.php';
                }
                if ($_GET['page'] === 'users') {
                    require './admin_users.php';
                }
                if ($_GET['page'] === 'new') {
                    require './admin_new_products.php';
                }
                if ($_GET['page'] === 'edit') {
                    require './admin_edit_products.php';
                }
                if ($_GET['page'] === 'delete') {
                    require './admin_delete.php';
                }
            }
            ?>

        </div>
    </div>
</body>

</html>