<?php
/**
 *
 */
class Query
{
  public $query;
  public $resposta;
  public $erro;

  function __construct()
  {
    $this->query = Query::nulo();
    $this->erro=array(
      "header"=>array(
        "num"=>0
      ),
      "body"=>array(
        #colocar
      )
    );
  }

  public function exec()
  {
    $f = "exec";
    if(!is_array($this->query)) {$this->erro($f,"A query não é uma array"); return;}
    if(!Query::hasHeader($this->query)) {Query::erro($f,"Header não encontrado, reveja a estrutura do query",$query); return;}
    $this->hasType();
    return true;
  }
  public function hasHeader(){
    if(isset($this->query["header"]))
      return true;
  }
  public function hastype(){
    switch ($this->query["header"]["type"]) {
      case 'act': $this->hasAct();
    }
  }
  public function hasAct(){
    switch ($this->query["header"]["act"]) {
      case"insert": $this->save();
      case "search": $this->search();
    }
  }
  public function erro($funtion,$descricao,$value=null){
    $erro=array(
      "function"=>$funtion,
      "descricao"=>$descricao
    );
    $this->erro["body"][$this->erro["header"]["num"]] = $erro;
    $this->erro["header"]["num"]++;
    if (Config::showerror) {
      echo "<p>Coloto/Query::$funtion - $descricao</p>";
      if (isset($value))
        var_dump($value);
    }
  }
  static function nulo(){
    $retorno = array(
      "header"=>array(
        "type"=>"null"
      )
    );
    return $retorno;
  }
  public function save(){
    $key = array(
    );
    $content = array();
    $values[0] = json_decode($key,JSON_FORCE_OBJECT);
    $values[1] = json_decode($content,JSON_FORCE_OBJECT);
    MySQL::insert(null,$values);
  }
  public function search(){
    $this->resposta = MySQL::select();
  }
}
