<?php
require_once "comum.php";
$tem = Template();
// ----------
$tem->TemplateLoad(array(
  'content' => "contentBlocks.html",
  'blocks' => "contentBlocks.block.html"
));
$query="?query=";
$conteudoJson = file_get_contents(ClotoQueryUrl.$query);
$conteudoObj = json_decode($conteudoJson);
// --------------
$bloks="";
foreach ($conteudoObj as $key => $value) {
  $tem->TemplateDefine(array(
    "contentBlocks.blocks.title"=>$value->content,
    "contentBlocks.blocks.keys"=>$value->key
  ));
  $bloks.=$conteudo=$tem->TemplateExport('blocks');
}
$tem->TemplateDefine(array(
  "contentBlocks.blocks"=>$bloks
));
$conteudo=$tem->TemplateExport('content');
// ---------------------------------- page

$tem->TemplateLoad(array(
  'page' => "page.html"
));
$tem->TemplateDefine(array(
  "page.menu"=>menu(),
  "page.title"=>"Cloto:All",
  "page.content"=>"$conteudo"
));
echo $tem->TemplateExport('page');
