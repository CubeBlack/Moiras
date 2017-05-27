<?php
  date_default_timezone_set('UTC');
  echo $query = json_encode(array('y' => date("Y"), 'm' => date("m"),'d' => date("d")),JSON_FORCE_OBJECT);
  $query = urlencode($query);
?>
<form >
  <button type="button" onclick="loadPage()">Inicio</button>
  <button type="button" onclick="loadPage('dia','<?php echo $query; ?>')">Hoje</button>
</form>
