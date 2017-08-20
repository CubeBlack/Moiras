<pre>
--------------- CLOTO NOVO----------------------------
<?php
require_once "engine.php";
$query = [];
echo file_get_contents("http://localhost:8080/Moiras/Cloto/query.json.php?query=".urlencode(json_encode($query,JSON_FORCE_OBJECT)));
form:
include "ClotoMenu.php";
