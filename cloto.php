<?php
require_once "clotoComon.php";
$tem->TemplateLoad(array(
  'content' => "contentBlocks.html",
  'blocks' => "contentBlocks.block.html",
));
// -------------- blocks
$queryArr = array(
  "header"=>array(
    "type"=>"act",
    "act"=>"search"
  ),
  "body"=>array(

  )
);
echo $Url = ClotoQueryUrl."?query=".urlencode(json_encode($queryArr));
$respostaStr = file_get_contents($queryUrl);
var_dump($respostaStr);
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
