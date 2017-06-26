<?php
/**
 *
 */
class Query
{
  public $query;
  public $resposta;
  public function exec()
  {
    $f = "exec";
    if(!is_array($this->query)) $this->erro($f,"A query não é uma array"); return;
    if(!Query::hasHeader($this->query)) Query::erro($f,"Header não encontrado, reveja a estrutura do query",$query); return;
    $this->hasType();
    return $true;
  }
  public function hasHeader(){
    if(isset($this->query["header"]))
      return true;
  }
  public function hastype($query){
    switch ($query["header"]["type"]) {
      case 'act':
        $retorno = Act::inserir("",$query["body"]);
        echo "insert";
        break;

      default:
        # code...
        break;
    }
  }
  public function setAct($query){
    switch ($query["header"]["type"]) {
      case 'act':
        $retorno = Act::inserir("",$query["body"]);
        echo "insert";
        break;
      default:
        # code...
        break;
    }
  }
  public function erro($funtion,$descricao,$value=null){
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

}
