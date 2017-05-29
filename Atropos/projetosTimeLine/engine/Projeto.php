<?php
/**
 *
 */
class Projeto
{
  protected $name;
  protected $postagen;

  function __construct($name = "This_Poject_name")
  {
    $this->name = $name;
  }
  public function postagenadd($titulo = "[titulo]",$data = "[data]",$contudo = "[conteudo]"){
    if (!is_array($this->postagen)) {
      $this->postagen[0] = new Postagem($titulo,$data,$contudo);
    }
    else {
      array_unshift($this->postagen,new Postagem($titulo,$data,$contudo));
    }
  }
  public function name(){
    return $this->name;
  }
  public function postagen(){
    return $this->postagen;
  }
}
