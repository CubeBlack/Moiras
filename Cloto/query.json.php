<?php
header('Content-Type: application/json');
require_once "engine.php";
$queryStr="";
if (isset($_REQUEST["query"])) {
  $queryStr = $_REQUEST["query"];
}
$queryJson=json_encode($queryStr,JSON_FORCE_OBJECT);
$queryJson = json_encode(Query::exec($queryJson));
echo $queryJson;
