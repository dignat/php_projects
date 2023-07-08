<?php

namespace Tests\MyTests;

use PHPUnit\Framework\TestCase;
use App\Testdome\NumericInput;
use App\Testdome\TextInput;
class TreeTest extends TestCase {

    public function testNonNumeric() {
        $input = new NumericInput();
        $input->add('1');
        $input->add('a');
        $input->add('0');
        $result = $input->getValue();

        $this->assertSame($result, '10');
    }
}