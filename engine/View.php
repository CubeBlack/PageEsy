<?php
/**
 *
 */
class view
{
  static function tituloPage($str = "[titulo]"){
    echo "<h1>$str</h1>";
  }
  static function titulo($str = "[titulo]"){
    echo "<h3>$str</h3>";
  }
  static function paragrafo($str = "[paragrafo]"){
    echo "<p>$str</p>";
  }
  static function hr(){
    echo "<hr>";
  }
}
