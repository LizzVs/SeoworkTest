<?php 
$number_count = 50;
$sign_count = 50;

// Функция для генерации 50-значных чисел
function GetBigNumber($sign_count) {
    $str = rand(1,9);
    for ($i = 1; $i < $sign_count; $i++) {
        $str .= rand(0,9);
    }
    return $str;
}

// Создание и вывод массива с 50 элементами
$a = Array();
echo "Массив: \n";
for ($i = 0; $i < $number_count; $i++) {
    array_push($a, GetBigNumber($sign_count));
    echo $a[$i] . "\n";
}

// Способ 1
// Сложение чисел через array_sum
echo "Способ 1: Сумма - " . sprintf("%.0F", array_sum($a));

// Способ 2
// Сложение с помощью библиотеки BCMath, позволяющей работать с большими числами
$sum = 0;
for ($i = 0; $i < $number_count; $i++) {
    $sum = bcadd($sum, $a[$i]);
}
echo "\nСпособ 2: Сумма - " . $sum;

// Способ 3
// Поразрядное сложение
$sum = $a[0];
for ($i = 1; $i < $number_count; $i++) {
    $res = 0;
    $plus = 0;
    $sign = strlen($sum) - strlen($a[$i]);
    $sum = strval($sum);
    // Сложение чисел по разрядам
    for ($j = $sign_count-1; $j >= 0; $j--) {
        // Прибавить 1, если результат прошлого разряда >= 10
        if ($plus == 1) {
            $res += 1;
            $plus = 0;
        }    
        // Сложение чисел одного разряда
        $res += $sum[$j+$sign] + $a[$i][$j];
        // Запомнить 1 для следующего разряда, если сумма >= 10
        if ($res >= 10 ) {
            $plus = 1;
        }
        // Результат вычислений в разряде
        $sum[$j+$sign] = strval($res % 10);
        $res = 0;
        // Добавление нового разряда
        if ($j == 0 && $plus == 1) {
            $sum += 10**($sign_count);
            $sum = sprintf("%.0F",$sum);
        }
    }
}
echo "\nСпособ 3: Сумма - " . sprintf("%.0F",$sum);

// Способ 4
//

