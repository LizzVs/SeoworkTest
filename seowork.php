<?php 
// Функция для генерации 50-значных чисел
function GetBigNumber() {
    $str = rand(1,9);
    for ($i = 1; $i < 50; $i++) {
        $str .= rand(0,9);
    }
    return $str;
}

// Создание и вывод массива с 50 элементами
$a = Array();
echo "Массив: \n";
for ($i = 0; $i < 50; $i++) {
    array_push($a, GetBigNumber());
    echo $a[$i] . "\n";
}

// Способ 1
// Сложение чисел через array_sum
echo "Способ 1: Сумма - " . sprintf("%.0F", array_sum($a));

// Способ 2
// Сложение с помощью библиотеки BCMath, позволяющей работать с большими числами
$sum = 0;
for ($i = 0; $i < 50; $i++) {
    $sum = bcadd($sum, $a[$i]);
}
echo "\nСпособ 2: Сумма - " . $sum;


