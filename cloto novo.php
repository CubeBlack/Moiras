<?php
require_once "clotoComon.php";
$tem->TemplateLoad(array(
  'content' => "contentForm.html",
  'form' => "clotoForm.novo.html",
));
$tem->TemplateDefine(array(
  //"contentBlocks.blocks.title"=>$value->content
));
$form=$tem->TemplateExport('form');

$tem->TemplateDefine(array(
  "contentForm.form"=>$form
));
$section = $tem->TemplateExport('content');
echo clotoPage($section);
