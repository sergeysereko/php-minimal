<?php
function factorial(int $number):int
{
    $result = 1;

    for($i = 1; $i <= $number; $i++)
   {
       $result *= $i;
   }

    return  $result;
}
assert(factorial(0) == 1);
assert(factorial(1) == 1);
assert(factorial(4) == 24);


// ----------------------------------------------------------------
//Создать функцию even_to_zero(int $number) Которая цифры на четных ПОЗИЦИЯХ занулит.
// Например, из 12345 получается число 10305. Внимание! Важна позиция цифры, а не значение.


function even_to_zero(int $number2)
{

    $arr1 = array_map('intval', str_split((string)$number2));

    for($i = 0; $i < count($arr1); $i++){

        if(($arr1[$i]) % 2 == 0)
        {
            $arr1[$i] = 0;
        }
    }


    $resultStr = implode('', $arr1);
    $resultNumber = (int)$resultStr;
    return $resultNumber;

}

assert(even_to_zero(12345) == 10305);
assert(even_to_zero(345678) == 305070);
assert(even_to_zero(987654321) == 907050301);

//Создать функцию is_palindrome(string $word) которая выведет true если строка является
//палиндромом(читается одинаково в зад и вперед, например: шалаш) и иначе false.
//Внимание! Обязательно включите в проверки русские слова "шалаш" и "такси".

function is_palindrome(string $str): bool
{

    $count = mb_strlen($str);
    $str_arr = preg_split('//u', $str, null, PREG_SPLIT_NO_EMPTY);

    for ($i = 0; $i < $count / 2; $i++) {
        if ($str_arr[$i] != $str_arr[$count - 1 - $i]) {
            return false;
        }
    }

    return true;
}

assert(is_palindrome(  "шалаш") == true);
assert(is_palindrome("шалаша") == false);
assert(is_palindrome("SATOR AREPO TENET OPERA ROTAS") == true);

/* Написать функцию array_double, которая принимает на вход массив чисел, например [1,2,3] и
возвращает массив, в котором все числа умножены на 2, например [2, 4, 6]*/


function array_double(array $arr):array
{

    for($i = 0; $i < count($arr); $i++)
        {
            $arr[$i] = $arr[$i]*2;
        }

    return $arr;
}

assert(array_double( [1,2,3]) === [2,4,6]);
assert(array_double( [5,7,10]) === [10,14,20]);
assert(array_double( [100,200,300]) === [200,400,600]);

//Написать функцию only_odd, которая принимает массив [1, 2, 3] и возвращает массив только нечетных [1, 3]

function only_odd($arrWithoutOdd):array
{
    $arrOnlyOdd=[];
    for($i = 0; $i < count($arrWithoutOdd); $i++)
    {
        if($arrWithoutOdd[$i] %2 != 0)
        {
            $arrOnlyOdd[] = $arrWithoutOdd[$i];
        }
    }

    return $arrOnlyOdd;
}

assert(only_odd( [1,2,3,4,5,6]) === [1,3,5]);
assert(only_odd( [11,17,21]) === [11,17,21]);
assert(only_odd( [101,201,302,402]) === [101,201]);


//Напишите функцию divisible_by_three(int $max, int $min): array, которая формирует убывающий массив
//от $max и до $min из чисел, которые делятся на 3 без отстатка. В тестах проверьте что первый,
//последний и любой некрайний элемент списка действительно делятся на 3.
//Например для three_devided_range(1002, 0) вернет массив [1002, 999, ... 0]

function divisible_by_three(int $max, int $min): array
{
    if ($min >= $max) {
        return [];
    }

    $arrayDivByThree = [];
    for($i = $max; $i >= $min; $i--)
    {
        if($i %3 == 0)
        {
            $arrayDivByThree[] = $i;
        }
    }
    return $arrayDivByThree;
}

$resultArr = divisible_by_three(1002, 0);
assert($resultArr[0]/3 == 334);
assert($resultArr[1]/3 == 333);
assert($resultArr[count($resultArr)-1]%3 == 0);
assert($resultArr[count($resultArr)-2]%3 == 0);
assert($resultArr[count($resultArr)-3]%3 == 0);
assert($resultArr[count($resultArr)-1]/3 == 0);
assert($resultArr[count($resultArr)-2]/3 == 1);
assert($resultArr[count($resultArr)-3]/3 == 2);


//Напишите функцию count_even(array $arr): int, которая считает количество четных чисел в массиве
//и возвращает их количество. В массиве [1, 2, 3] - только 1 четный элемент, функция вернет 1.

function count_even(array $arr):int
{
    $count_int = 0;
    for($i = 0; $i < count($arr); $i++)
    {
        if($arr[$i]%2 == 0)
        {
            $count_int++;
        }
    }
    return $count_int;
}


assert(count_even([1,2,3,4,5,7]) == 2);
assert(count_even([2,4,6,8,10,20]) == 6);
assert(count_even([-2,-4,-6,-8,-10,-20]) == 6);


//Напишите функцию min_even(array $arr): int, Найдите наименьший четный(по значению) элемент массива.
//В массиве [1, 2, 3, 4] - 2 наименьший четный элемент.

function min_even(array $arr):int{
    $minEvenElement = -1;
    $counter = 0;
    $tmp = 0;
    for($i = 0; $i<count($arr); $i++){
        if($counter == 0 && $arr[$i] %2 == 0){
            $tmp = $arr[$i];
            $minEvenElement = $arr[$i];
            $counter++;
        }
        else if($arr[$i] %2 == 0){
            $tmp = $arr[$i];
            if($tmp < $minEvenElement){
                $minEvenElement = $tmp;
            }
        }
    }
    return  $minEvenElement;
}


assert(min_even([1,2,3,4,5,7]) == 2);
assert(min_even([1,2,3,4,5,7,-2]) == -2);

//Напишите функцию min_sum_elements(array $arr): array, которая возвращает два соседних элемента,
//сумма которых минимальна. В массиве [1, 2, 3, 4] это элементы [1, 2].

function min_sum_element(array $arr):array{
    if (count($arr) < 2) {
        return [];
    }
    $a = $arr[0];
    $b = $arr[1];
    $temp_sum = $a + $b;
    $resArr = [$a, $b];

    for ($i = 1; $i < count($arr) - 1; $i++) {
        $a = $arr[$i];
        $b = $arr[$i + 1];
        $current_sum = $a + $b;

        if ($current_sum < $temp_sum) {
            $temp_sum = $current_sum;
            $resArr[0] = $a;
            $resArr[1] = $b;
        }
    }
    return $resArr;
}

assert(min_sum_element([1,2,3,4,5,7]) == [1,2]);
assert(min_sum_element([3,4,5,7,1,2]) == [1,2]);
assert(min_sum_element([3,4,5,7,1,2,8,9,10]) == [1,2]);


//Написать рекурсивную функцию sumn рассчета суммы 1 + 2 + 3 + ... + n.
function sumn(int $number):int{

    if($number == 0){
        return 0;
    } else{
        return $number + sumn($number -1);
    }
}

assert(sumn(2) == 3);
assert(sumn(3) == 6);
assert(sumn(5) == 15);
assert(sumn(10) == 55);
assert(sumn(15) == 120);


//Написать функцию create_min_max_validator(int $min, int $max) которая возвращает функцию принимающую один аргумент,
//функция проверяет входит ли аргумент в диапазон от $min до $max включительно.

function create_min_max_validator(int $min, int $max):callable{

    return function($value) use($min,$max){
        return $value >= $min && $value <= $max;
    };
}

$validator = create_min_max_validator(2, 5);
assert($validator(3));
assert($validator(4));
assert(!$validator(6));
assert(!$validator(1));


//Написать функцию add_item($arr, $item), которая ничего не возвращает, но при этом добавляет в конец массива $arr
//элемент $item

function add_item(array &$arr, $item)
{

    $arr[]+=$item;
}

$myArray = [1, 2, 3];
add_item($myArray, 4);
assert($myArray[count($myArray)-1] == 4);
add_item($myArray, 11);
assert($myArray[count($myArray)-1] == 11);