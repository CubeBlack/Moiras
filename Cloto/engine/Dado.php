<?php
require_once "Meta.php";
require_once "DBServer.php";
Class Dado{
  public $data;
  static function  set($meta,$type)
  {
    $retono = new Dado();
    $retono->data = $meta->get();
    $retono->data["type"] = $type;
    $retono->data["criacao"] = $type;
    $retono->data["modificacao"] = $type;
    return $retono->data;
  }
  static function get($meta = null){
    $retono = $this->date;
    return $retono;
  }
  static function save($data){
    global $dbs;

  }
}
$nome = new Meta();
$nome->set("type","text");
$nome->set("label","nome");
$nome->set("value","Juca");

$idade = new Meta();
$idade->set("type","number");
$idade->set("label","idade");
$idade->set("value","20");

$juca = new Meta();
$juca->set("nome",$nome->get());
$juca->set("idade",$idade->get());

var_dump(Dado::set($juca,"pessoa"));
