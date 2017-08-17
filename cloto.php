<?php
require_once "engine.php";
$page->contentType = Page::contentType_linkList;
$page->conteudo = array();
for ($i=0; $i < 29; $i++) {
  array_push($page->conteudo,"A".$i);
}
echo $page->view();
