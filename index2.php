<?php
//Атолоадер 2
require 'vendor/autoload.php';

use One\Test as Test1;
use Two\Test as Test2;
use Three\Four\Test as Test3;

$test1 = new Test1();
$test2 = new Test2();
$test3 = new Test3();

$test1->do();
$test2->do();
$test3->do();
