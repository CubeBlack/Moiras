<?php
/**
 *
 */
class Query
{
  static function exec($query="")
  {
    $retornoTable = Query::listar();
    $retorno = $retornoTable;
    return $retorno;
  }
  static function listar(){
    return MySQL::select()->fetchAll();
  }
}
