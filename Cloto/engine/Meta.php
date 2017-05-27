<?php
/**
 *
 */
class Meta
{
  public $mesh;
  function __construct($argument="")
  {
  }
  public function set($key, $dado){
    $this->mesh[$key] = $dado;
  }
  public function get(){
    return $this->mesh;
  }
}
//$meta = new Meta();
//$meta->set("type","type");
//$meta->set("name","number");
//var_dump($meta->get());
