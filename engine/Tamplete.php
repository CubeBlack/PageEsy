<?php
/**
 *
 */
class Tamplete
{
  protected $pirce;
  function __construct($value, $tamplete = "defalt", $page = "conteudo"){
    $tempJson = file_get_contents(Config::DIR_TEMPLATE.$tamplete.".json");
    $tempObj = json_decode($tempJson);
    $valueIndex = 0;

    foreach ($tempObj->$page as $key => $tipo) {
      if ($tipo::VALUE && isset($value[$valueIndex])) {
        $this->addPirce(new $tipo($value[$valueIndex]));
        ++$valueIndex;
      }
      else {
        $this->addPirce(new $tipo());
      }
    }
  }
  public function viewHead(){

    $retorno = "";
    $css = "";
    foreach ($this->pirce as $key => $value) {
      $css .= $value->css()."\n";
    }
    $retorno .= "<title>[Titulo]</title>";
    $retorno .= "<script type=\"text/javascript\"></script>";
    $retorno .= "<style>";
    $retorno .= "$css";
    $retorno .= "</style>";
    return $retorno;
  }
  public function viewBody(){

    $retorno = "";
    foreach ($this->pirce as $key => $value) {
      $retorno .= $value->body()."\n";
    }
    return $retorno;
  }
  public function addPirce($pirce){
    if (is_array($this->pirce)) {
      array_push($this->pirce, $pirce);
    }
    else {
      $this->pirce[0] =  $pirce;
    }
  }
}

?>
