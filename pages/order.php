<?
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $tovars = $connection->query("SELECT * FROM tovar WHERE id=$id")->fetch(PDO::FETCH_ASSOC);

}
$error = '';
if (isset($_POST['order'])) {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $date_otpr = $_POST['date_otpr'];
    $date_vozvr = $_POST['date_vozvr'];
    $quantity = $_POST['quantity'];
 


    $sql = "INSERT INTO `order`(`name`, `country`, `date_otpr`, `date_vozvr`, `quantity`, `user_id`,`tovar_id`) VALUES ('$name','$country', '$date_otpr', '$date_vozvr', '$quantity', '$user[id]', '$tovars[id]')";
    $connection->query($sql);
    // var_dump($sql);

    header('Location: ?page=user#zayavki');


}
?>



<div class="form_order mx_w">
    <h2><span>Путешествие мечты</span></h2>
    <form method="POST" name="order">      
        <input type="text" name="country" placeholder="Страна" value="<?=$tovars['country']?>">
        <input type="text" name="name" placeholder="Название тура" value="<?=$tovars['name']?>">

        <div class="date_input">

            <!-- <label for="date_otpr">Дата отправления</label> -->
            <input type="text" id="date_otpr" name="date_otpr" placeholder="Дата отправления" value="<?=$tovars['date_otpr']?>">
        </div>
        <div class="date_input">
            <!-- <label for="date_vozvr">Дата возвращения</label> -->
            <input type="text" id="date_vozvr" name="date_vozvr" placeholder="Дата возвращения" value="<?=$tovars['date_vozvr']?>">
        </div>
        <input type="number" name="quantity" placeholder="Количество человек">

        <input type="submit" class="btn__user" value="Оставить заявку" name="order">
    </form>
</div>