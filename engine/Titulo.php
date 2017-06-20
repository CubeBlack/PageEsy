<?php
/**
 *
 */
class Titulo extends Pirce
{
  const VALUE = true;
  public function body(){
    return "<h1>{$this->value}</h1>";
  }
  public function css(){
    $retono = "
    h1{

    }
    ";
  }
}
