<?php
function __autoload($nomeClasse){
     include_once("engine/".$nomeClasse.".php");
}

$dbs = new DBServer();
