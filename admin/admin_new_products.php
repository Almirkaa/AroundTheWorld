<?
$error = '';
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $date_otpr = $_POST['date_otpr'];
    $date_vozvr = $_POST['date_vozvr'];
    $text = $_POST['text'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // var_dump($_FILES['img']);

    if ($_FILES['img']['size'] > 2 * 1920 * 1100) {
        $error .= 'слишком большой размер файла!';

    }
    if ($_FILES['img']['type'] != 'image/jpeg' && $_FILES['img']['type'] != 'image/png') {
        $error .= 'изображение должно быть формата png и  jpg!';
    }
    $route = '../assets/img/card/' . time() . $_FILES['img']['name'];
    if ($error === '') {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $route)) {
            $route = str_replace('../','',$route);
            $sql = "INSERT INTO `tovar`(`name`, `country`, `date_otpr`, `date_vozvr`, `text`,`description`, `price`, `img`) VALUES ('$name','$country', '$date_otpr', '$date_vozvr', '$text', '$description','$price','$route')";
            $connection->query($sql);
            // var_dump($sql);

            header("Location: ./admin.php");
        } else {
            $error .= 'произошла какая-то ошибка с загрузкой изображения';
        }
    }
}
?>


<h4 class="admin__title">Добавить товар</h4>
<div class="txtBox__motion form_order">
    <?= $error ?>
    <form method="POST" name="add" enctype="multipart/form-data">
        
        <input type="file" name="img">
        <input type="text" name="name" placeholder="Название тура">
        <input type="text" name="country" placeholder="Страна">
        <div class="date_input">

            <!-- <label for="date_otpr">Дата отправления</label> -->
            <input type="text" id="date_otpr" name="date_otpr" placeholder="Дата отправления">
        </div>
        <div class="date_input">
            <!-- <label for="date_vozvr">Дата возвращения</label> -->
            <input type="text" id="date_vozvr" name="date_vozvr" placeholder="Дата возвращения">
        </div>
        <textarea name="text" placeholder="Краткое описание"></textarea>
        <textarea name="description" placeholder="Полное описание товара"></textarea>

       <input type="number" name="price" placeholder="Стоимость" >
       

        <input type="submit" class="btn__user" value="Добавить" name="add">
    </form>

</div>