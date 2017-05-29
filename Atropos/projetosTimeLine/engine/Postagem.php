<?php
/**
 *
 */
class Postagem
{
  protected $titulo;
  protected $data;
  protected $texto;
  function __construct($titulo = "[titulo]",$data ="[data]",$texto = "[texto]")
  {
    $this->titulo = $titulo;
    $this->data = $data;
    $this->texto = $texto;
  }
  public function titulo()
  {
    return $this->titulo;
  }
  public function data()
  {
    return $this->data;
  }
  public function texto()
  {
    return $this->texto;
  }
}
