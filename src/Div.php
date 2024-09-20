<?php
namespace Calc;
class Div implements Operation{
    private $a;
    private $b;

    public function __construct(float $a, float $b){
        $this->a = $a;
        $this->b = $b;
    }

    public function calculate():float
    {
        if($this->b == 0){
            throw new \InvalidArgumentException("Деление на ноль невозможно.");
        }
        return $this->a / $this->b;
    }
}