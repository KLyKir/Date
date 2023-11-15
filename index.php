<?php
    require __DIR__."/vendor/autoload.php";
    use \src\Date as Date;
    $newDate = new Date(2023, 1, 23);
    $newDate2 = new Date(2024, 1, 23);
    $days = $newDate->difference($newDate2);
    var_dump($newDate->isEqual($newDate2));
    var_dump($days);
    var_dump($newDate->format());
?>