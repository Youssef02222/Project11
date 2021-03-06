<?php
require_once 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

include("factorial.php");

class FactorialTest extends TestCase
{
    public function testFactorialZero(){
        self::assertEquals(1, factorial(0), "Factorial 0 should return one");
    }
    public function testFactorialOne(){
        self::assertEquals(1, factorial(1), "Factorial 1 should return one");
    }
    public function testFactorialFive(){
        self::assertEquals(120, factorial(5), "Factorial 5 should return 120");
    }
    public function testFactorialRandom(){
        $num = 3;
        $result = 6;
        self::assertEquals($result, factorial($num), "Factorial $num should return $result");
    }
    public function testFactorialMinusThree(){
        self::assertEquals(null, factorial(-3), "Factorial -3 should return null");
    }
    public function testFactorialOnePointFive(){
        self::assertEquals(null, factorial(1.5), "Factorial 1.5 should return null");
    }
    public function testFactorialFalse(){
        self::assertEquals(null, factorial(false), "Factorial false should return null");
    }
    public function testFactorialString(){
        self::assertEquals(null, factorial("abc"), "Factorial <string> should return null");
    }
}