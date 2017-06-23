<?php
require_once "comum.php";
$page = Template();
$page->TemplateLoad(array(
  'exp' => "page.html",
  'content'=>"content.option.html"
));
//---------
$page->TemplateDefine(array(
  "content.option.title"=>"Cloto",
  "content.option.content"=>"banco de dados",
  "content.option.link"=>"cloto.php"
));
$content = $page->TemplateExport("content");
//
$page->TemplateDefine(array(
  "content.option.title"=>"Laqueses",
  "content.option.content"=>"interação Humana",
  "content.option.link"=>"laqueses.php"
));
$content .= $page->TemplateExport("content");
//
$page->TemplateDefine(array(
  "content.option.title"=>"Atropos",
  "content.option.content"=>"Gerenciamento",
  "content.option.link"=>"cloto.php"
));
$content .= $page->TemplateExport("content");
//---------------
$page->TemplateDefine(array(
  "page.title"=>"Moiras",
  "page.content"=>$content
));
echo $page->TemplateExport('exp');
