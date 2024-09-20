<?php
require 'vendor/autoload.php';
use App\Sergey\Test;

$test = new Test();
$test->doSomething();


///команда для проверки логов cat /tmp/mylog.log