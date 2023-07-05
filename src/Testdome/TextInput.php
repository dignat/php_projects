<?php
namespace App\Testdome;
class TextInput
{
    private string $value = '';
  
  public function add(string $text) {
    $this->value .= $text;
    return $text;
  }

  public function getValue() {
    return $this->value;
  }

}
