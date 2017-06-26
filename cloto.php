<?php
require_once "clotoComon.php";
$tem->TemplateLoad(array(
  'content' => "contentBlocks.html",
  'blocks' => "contentBlocks.block.html",
));
// -------------- blocks
$respostaStr = file_get_contents(ClotoQueryUrl);
$conteudoObj = json_decode($respostaStr);
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
$section = $tem->TemplateExport('content');
echo clotoPage($section);
