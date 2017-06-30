<?php
//header('Content-Type: application/json');
require_once "engine.php";
$queryStr="";
if (isset($_REQUEST["query"])) {
  $queryStr = $_REQUEST["query"];
}
//-----------------------
$queryObj = (array)json_decode($queryStr);
$chamada = new Query();
$chamada->query = $queryObj;
$chamada->exec();
echo json_encode($chamada->resposta);
