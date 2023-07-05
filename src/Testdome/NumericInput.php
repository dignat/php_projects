<?php 

namespace App\Testdome;

use App\Testdome\TextInput;

class NumericInput extends TextInput
{

  private string $value = '';

  public function add(string $text) {
    $result = preg_replace('/^[A-zZ-a]/','',$text);
    //$result .=$result;
    $this->value .= $result;
    
    return $this->value;
  }

  public function getValue() {
    return $this->value;
  }

}


$input = new NumericInput();
$input->add('1');
$input->add('a');
$input->add('0');
echo $input->getValue();