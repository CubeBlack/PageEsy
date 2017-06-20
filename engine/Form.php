<?php
/**
 *
 */
class Form extends Pirce
{
  const VALUE = true;
  const CONTENT = true;
  public function body(){
    return "<Form>{$this->value}</p>";
  }
}
