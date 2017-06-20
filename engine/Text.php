<?php
/**
 *
 */
class Text extends Pirce
{
  const VALUE = true;
  public function body(){
    return "<p>{$this->value}</p>";
  }
}
