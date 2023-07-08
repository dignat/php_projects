<?php
namespace Tests\MyTests;

use PHPUnit\Framework\TestCase;
use App\Testdome\Fibonachi;

class FibTest extends TestCase {

    public function testFib() {
      $fib = new Fibonachi();
      $res = $fib->fib(8);
      
       $this->assertSame($res, [0,1,1,2,3,5,8,13]);
    }
}