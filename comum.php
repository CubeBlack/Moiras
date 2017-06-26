<?php
// ----------
// config
// ----------------
  const template_path = "../Moiras/template/";
  const ClotoQueryUrl = "http://localhost/DanielLima/moiras/cloto/query.json.php";
// --------------------------
require_once "../PageEsy2/engine.php";
$tem = Template();
function Template()
{
  $page = New PageEsy();
  $page->template_path = template_path;
  return $page;
}
function menu(){
  $menu = Template();
  $menu->TemplateLoad(array(
    'menu' => "menu.html",
    'optionS' => "menu.optionSolo.html"
  ));
  $menu->TemplateDefine(array(
    'menu.optionSolo.texto' => "Cloto",
    'menu.optionSolo.link' => "cloto.php",
  ));
  $optioins = $menu->TemplateExport('optionS');
  $menu->TemplateDefine(array(
    'menu.optionSolo.texto' => "Atopos",
    'menu.optionSolo.link' => "atropos.php",
  ));
  $optioins .= $menu->TemplateExport('optionS');
  $menu->TemplateDefine(array(
    'menu.optionSolo.texto' => "Laqueses",
    'menu.optionSolo.link' => "laqueses.php",
  ));
  $optioins .= $menu->TemplateExport('optionS');
  $menu->TemplateDefine(array(
    "menu.option"=>$optioins
  ));
  return $menu->TemplateExport('menu');
}
function footer(){
  $page = new PageEsy();
  $page->TemplateLoad(array('exp' => "footer.html"));
  $page->TemplateDefine(array(

  ));
  return $page->TemplateExport('exp');
}
