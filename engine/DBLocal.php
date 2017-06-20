<?php
/**
 *
 */
 //
 require_once 'config.php';
 $prefixo = $DBL_prefixo;
class DBLocal
{
  public $table;
  public $value;
  public $coment;
  function __construct()
  {
    $this->coment = "criado";
  }
  //tables
  public function tableCreat($name,$colunas)
  {
    if (isset($this->table[$name])) {
      $this->coment = "DBLocal::tableCreat($name,<colunas>) -> Tabela ja Existe";
      return;
    }
    foreach ($colunas as $key => $value) {
      $this->table[$name][$key] = $value;
    }
    return true;
  }
  public function tableInsert($tableName,$values)
  {
    if (!isset($this->table[$tableName])) {
      $this->coment = "DBLocal::tableInsert($tableName,<colunas>) -> Tabela Inextente";
      return;
    }
    if(!isset($_SESSION))
      session_start();
    if(!isset($_SESSION["dl_{$tableName}_index"])){
      $index = 0;
      $this->coment = "DBLocal::tableInsert($tableName,<colunas>) -> Primeiro item";
    }
    else {
      $index = $_SESSION["dl_{$tableName}_index"];
    }
    foreach ($values as $key => $valor) {
      $colunName = $colunName = $this->table[$tableName][$key];
      $_SESSION["dl_{$tableName}_{$index}_{$colunName}"] = $valor;
    }
    ++$index;
    $_SESSION["dl_{$tableName}_index"]  = $index;
  }
  public function tableSelect($tableName)
  {
    if (!isset($this->table[$tableName])) {
      $this->coment = "DBLocal::tableSelect -> Tabela inexstente";
      return;
    }
    if(!isset($_SESSION))
      session_start();
    if(!isset($_SESSION["dl_{$tableName}_index"])){
      $this->coment = "DBLocal::tableSelect($tableName) -> Tabela Vazia";
      return;
    }
    else {
      $index = $_SESSION["dl_{$tableName}_index"];
    }
    for ($i=0; $i < $index; $i++) {
      foreach ($this->table[$tableName] as $key => $colunName) {
        $colunName = $colunName = $this->table[$tableName][$key];
        $resposta[$i][$colunName] = $_SESSION["dl_{$tableName}_{$i}_{$colunName}"];
      }
    }
    return $resposta;
  }
  public function valueCreat($valueName)
  {
    if (!isset($this->value[$valueName])) {
      $this->value[$valueName] = "type";
    }
    else {
      $this->coment = "DBLocal::valueCreat($valueName) -> o Value ja existe";
    }
  }
  public function valueIncert($valueName, $value)
  {
    if (isset($this->value[$valueName])) {
      if(!isset($_SESSION))
        session_start();
      $_SESSION["dl_{$valueName}"] = $value;
    }
    else {
      $this->coment = "DBLocal::valueInsert($valueName) -> o Value não Existe";
    }
  }
  public function valueSelect($valueName)
  {
    if (isset($this->value[$valueName])) {
      if(!isset($_SESSION))
        session_start();
      if (isset($_SESSION["dl_{$valueName}"])) {
          return $_SESSION["dl_{$valueName}"];
      }
    }
    else {
      $this->coment = "DBLocal::valueSelect($valueName) -> o Value não Existe";
    }
  }
  public function dump()
  {
    $respposta;
    if (is_array($this->table))
      foreach ($this->table as $key => $value) {
        $respposta["tables"][$key] = $this->tableSelect($key);
      }
    if (is_array($this->value))
      foreach ($this->value as $key => $value) {
          $respposta["values"][$key] = $this->valueSelect($key);
      }
    return $respposta;
  }
  static function destroy(){
    if(!isset($_SESSION))
      session_start();
    session_destroy();
  }
}
