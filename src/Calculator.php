<?php
namespace Calc;

class Calculator {
    private $firstNumber;
    private $secondNumber;
    private $operation;

    public function firstNumber(float $number): self{
        $this->firstNumber = $number;
        return $this;
    }

    public function secondNumber(float $number):self{
        $this->secondNumber = $number;
        return $this;
    }
    public function operation(string $operationClass):self{
        if(!in_array(\Calc\Operation::class, class_implements($operationClass))){
            throw new \InvalidArgumentException("Класс не реализует интерфейс Operation");
        }
        $this ->operation = new $operationClass($this->firstNumber, $this->secondNumber);
        return $this;
    }

    public function result(): float{
        if(!$this->operation){
            throw new \LogicException("Операция не задана!");
        }
        return $this->operation->calculate();
    }

}