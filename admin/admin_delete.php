<?
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $tovars = $connection->query("SELECT * FROM `tovar` WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['delete_id_tovar'])) {
    $id = $_GET['delete_id_tovar'];

    $connection->query("DELETE FROM `tovar` WHERE id=$id");

    header("Location: ?page=products");
}
?>

<h4 class="admin__title">Удалить товар</h4>
<div class="txtBox__motion">
    <p class="delete__txt">Вы действительно хотите удалить товар?</p>
    <p class="delete__product__name">
        <?= $tovars['name'] ?>
    </p>
    <div class="user__btns">
        <a href="?page=products" class="cancle">Отменить</a>
        <a href="?page=delete&delete_id_tovar=<?=$tovars['id']?>" class="btn__user">Удалить</a>
    </div>
</div>