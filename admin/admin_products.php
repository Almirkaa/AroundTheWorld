<?
 $tovars = $connection->query("SELECT * FROM tovar")->fetchAll(PDO::FETCH_ASSOC);
 ?>
<h4>Товары</h4>
<div class="users__products__items">
    <div class="users__products__card">
        <p class="user__id">ID</p>
        <p class="prod__img__name">Фото труа</p>
        <p class="prod__name">Название тура</p>
        <p class="prod__country">Страна</p>
        <!-- <p class="prod__season">Сезон</p> -->
        <p class="prod__price">Стоимость</p>
    </div>
    <? foreach ($tovars as $tovar) {?>
    <div class="users__products__card">
        <p class="user__id"><?=$tovar['id']?></p>
        <div class="prod__img"><img src="<?="../".$tovar['img']?>" alt=""></div>
        <p class="prod__name"><?=$tovar['name']?></p>
        <p class="prod__country"><?=$tovar['country']?></p>
        <!-- <p class="prod__season">Сезон</p> -->
        <p class="prod__price"><?=$tovar['price']?> ₽</p>
        <div class="btn__edit">
            <a href="?page=edit&edit_id_products=<?=$tovar['id']?>"><i class="fa-regular fa-pen-to-square"></i></a>
            <a href="?page=delete&id=<?=$tovar['id']?>"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
    <?}?>

   
</div>