<?
if (isset($_GET['edit_id_products'])) {
    $id = $_GET['edit_id_products'];
    $tovar = $connection->query("SELECT * FROM tovar WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
}


$error = '';
if (isset($_POST['edit_pr'])) {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $date_otpr = $_POST['date_otpr'];
    $date_vozvr = $_POST['date_vozvr'];
    $text = $_POST['text'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // var_dump($_FILES['img']);
    if ($_FILES['img']['size'] > 2 * 1024 * 1024) {
        $error .= 'слишком большой размер файла!';

    }
    if ($_FILES['img']['type'] != 'image/jpeg' && $_FILES['img']['type'] != 'image/png') {
        $error .= 'изображение должно быть формата png и  jpg!';
    }
    $route = '../assets/img/card/' . time() . $_FILES['img']['name'];
    if ($error === '') {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $route)) {
            $route = str_replace('../', '', $route);
            $sql = "UPDATE `tovar` SET `name` = '$name', `country`='$country', `date_otpr`='$date_otpr', `date_vozvr`='$date_vozvr', `text`='$text', `description`='$description', `price`='$price', `img`='$route' WHERE id={$_GET['edit_id_products']}";
            $connection->query($sql);
            // var_dump($sql);

            header("Location: ./admin.php");
        } else {
            $error .= 'произошла какая-то ошибка с загрузкой изображения';
        }
    }
}
?>



<h4 class="admin__title">Редактировать товар</h4>
<p class="admin__edit__product__id"><?=$tovar['id']?></p>
<div class="txtBox__motion form_order">

    <?= $error ?>
    <form method="POST" name="edit_pr" enctype="multipart/form-data">

        <input type="file" name="img">
        <input type="text" name="name" placeholder="Название тура" value="<?=$tovar['name']?>">
        <input type="text" name="country" placeholder="Страна" value="<?=$tovar['country']?>">
        <div class="date_input">

            <!-- <label for="date_otpr">Дата отправления</label> -->
            <input type="text" id="date_otpr" name="date_otpr" placeholder="Дата отправления" value="<?=$tovar['date_otpr']?>">
        </div>
        <div class="date_input">
            <!-- <label for="date_vozvr">Дата возвращения</label> -->
            <input type="text" id="date_vozvr" name="date_vozvr" placeholder="Дата возвращения" value="<?=$tovar['date_vozvr']?>">
        </div>
        <textarea name="text" id=""><?=$tovar['text']?></textarea>
        <textarea name="description" placeholder="Полное описание"><?=$tovar['description']?></textarea>

        <input type="text" name="price" placeholder="Стоимость" value="<?=$tovar['price']?>">

        <input type="submit" class="btn__user" value="Сохранить" name="edit_pr">
    </form>

</div>