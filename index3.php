<?php
//Создать абстрактный класс Figure в пространстве имен My\Abstract с методами вычисления
// площади и периметра, а также методом, выводящим информацию о фигуре на экран(Тип, Площадиь и периметр).
// Создать производные классы в пространстве имен My\Concrete\: Rectangle (прямоугольник), Circle (круг),
// Triangle (треугольник) со своими методами вычисления площади и периметра.
//Создать массив n фигур и вывести полную информацию о фигурах на экран.

require_once __DIR__.'/vendor/autoload.php';

use My\Concrete\Rectangle;
use My\Concrete\Triangle;
use My\Concrete\Circle;
use My\Abstract\Figure;

$figures = [
    new Rectangle(5,10),
    new Circle(7),
    new Triangle(3,4,5)
    ];

foreach ($figures as $figure){
    $figure->printInfo();
}