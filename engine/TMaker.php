<?php
/**
 *
 */

class TMaker
{
 protected $value;

 public function setValue($value){
   if (is_array($this->value)) {
     array_push($this->value, $value);
   }
   else {
     $this->value[0] =  $value;
   }
 }
 public function page(){
   $tam = new Tamplete($this->value);
   echo <<<EOT
   <!DOCTYPE html>
   <html>
     <head>
       {$tam->viewHead()}
     </head>
     <body>
       {$tam->viewBody()}
       <hr>
       <p>PageEsy by <a href = "http://limaserver/">Daniel Lima</a></p>
     </body>
   </html>
EOT;
 }
}


?>
