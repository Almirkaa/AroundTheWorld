<?
try {
    $dsn = 'mysql:host=localhost;dbname=AroundTheWorld';
    $connection = new PDO($dsn, "root");
    session_start();
    // echo 'Подключено!';
}catch (PDOException $exception) {
    echo 'Ошибка - ' . $exception->getMessage();
}
?>
<?
// try {
//     $dsn = 'mysql:host=localhost;dbname=z940';
//     $connection = new PDO($dsn, "z940", "6ynDkNpm4XARNTCP");
// } catch (PDOException $exception) {
//     echo 'Ошибка - ' . $exception->getMessage();
// }
?>
