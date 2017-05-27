<?php
/**
 *
 */
class Postagem
{
  protected $titulo;
  protected $texto;
  function __construct($titulo = "[titulo]",$texto = "[texto]")
  {
    $this->titulo = $titulo;
    $this->texto = $texto;
  }
  public function titulo()
  {
    return $this->titulo;
  }
  public function texto()
  {
    return $this->texto;
  }
}
