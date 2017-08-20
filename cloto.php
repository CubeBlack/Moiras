<pre>
--------------- CLOTO ----------------------------
<?php
require_once "engine.php";
echo file_get_contents("http://localhost:8080/Moiras/Cloto/query.json.php");

include "ClotoMenu.php";
