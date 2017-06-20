<?php
/**
 *
 */
class Pirce
{
  const VALUE = false;
  public $value;
  function __construct($value = "[Value]")
  {
    $this->value = $value;
  }
  public function body(){
    $retorno = "<!-- Sem tag tag -->";
    return $retorno;
  }
  public function js(){
  $retorno = "//sem java";
    return $retorno;
  }
  public function css(){
    $retorno = "#sem estilo";
    return $retorno;
  }
}
