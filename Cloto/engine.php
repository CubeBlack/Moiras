<?php
function __autoload($className){
  $url = "engine/$className.php";
  require_once $url;
}
