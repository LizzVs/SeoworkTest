<?php 
// Функция для генерации 50-значных чисел
function GetBigNumber():float {
    $str = rand(1,9);
    for ($i = 1; $i < 3; $i++) {
        $str .= rand(0,9);
    }
    return $str;
}

// Создание массива с 50 элементами
$a = Array();
for ($i = 0; $i < 10; $i++) {
    array_push($a, GetBigNumber());
    echo $a[$i] . "\n";
}

// Способ 1
// Сложение чисел через array_sum
echo sprintf("%.0F", array_sum($a));

