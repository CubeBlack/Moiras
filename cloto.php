<?php
require_once "comum.php";
$tem = Template();
// ----------
$tem->TemplateLoad(array(
  'page' => "page.html",

  'content' => "contentBlocks.html",
  'blocks' => "contentBlocks.block.html",

  'submenu' => "cloto.submenu.html",
  'sublinks' => "cloto.Submenu.links.html",
  'subacoes' => "cloto.Submenu.acoes.html"
));
$query="?query=";
$conteudoJson = file_get_contents(ClotoQueryUrl.$query);
$conteudoObj = json_decode($conteudoJson);
// -------------- blocks
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
// ------------------ submenu
//links
$submenuLinks="Cloto";
//acoes
$submenuAcoes="";
$tem->TemplateDefine(array(
  "cloto.submenu.acoes.text"=>"Novo",
  "clotoSubmenu.acoes.link"=>"novo"
));
$submenuAcoes.=$tem->TemplateExport('subacoes');
//menu
$tem->TemplateDefine(array(
  "clotoSubmenu.links"=>$submenuLinks,
  "clotoSubmenu.acoes"=>$submenuAcoes
));
$clotoSubmenu = $tem->TemplateExport('submenu');
// ------------------

// ---------------------------------- page
$tem->TemplateDefine(array(
  "page.menu"=>menu(),
  "page.title"=>"Cloto:All",
  "page.content"=>$clotoSubmenu . $section
));
echo $tem->TemplateExport('page');
