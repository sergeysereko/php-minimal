<?php
require 'vendor/autoload.php';
use Calc\Calculator;
use Calc\Div;
use Calc\Plus;
use Calc\Minus;
use Calc\Mult;

require_once 'src/Calculator.php';

$calculator = new Calculator();

assert(
    $calculator->firstNumber(2)
    ->secondNumber(2)
    ->operation(Mult::class)
    ->result() ==4
);

assert(
    $calculator->firstNumber(5)
    ->secondNumber(3)
    ->operation(Plus::class)
    ->result()==8
);

assert(
    $calculator->firstNumber(10)
    ->secondNumber(4)
    ->operation(Minus::class)
    ->result() ==6
);

assert(
    $calculator->firstNumber(20)
    ->secondNumber(5)
    ->operation(Div::class)
    ->result()==4
);

try{
    $calculator->firstNumber(10)
    ->secondNumber(0)
    ->operation(Div::class)
    ->result();
    assert(false);
}catch(\InvalidArgumentException $e){
    assert($e->getMessage()==="Деление на ноль невозможно.");
}