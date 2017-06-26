<?php
require_once "comum.php";
function clotoPage($section){
  global $tem;
  $tem->TemplateLoad(array(
    'page' => "page.html",
  ));
  $tem->TemplateDefine(array(
    "page.menu"=>menu(),
    "page.title"=>"Cloto:All",
    "page.content"=>clotoSubmenu() . $section
  ));
  return $tem->TemplateExport('page');
}
function clotoSubmenu(){
  global $tem;
  $tem->TemplateLoad(array(
    'submenu' => "cloto.submenu.html",
    'sublinks' => "cloto.Submenu.links.html",
    'subacoes' => "cloto.Submenu.acoes.html"
  ));
  //links
  $submenuLinks="Cloto";
  //acoes
  $submenuAcoes="";
  $tem->TemplateDefine(array(
    "cloto.submenu.acoes.text"=>"Novo",
    "cloto.Submenu.acoes.url"=>"cloto novo.php"
  ));
  $submenuAcoes.=$tem->TemplateExport('subacoes');
  //menu
  $tem->TemplateDefine(array(
    "clotoSubmenu.links"=>$submenuLinks,
    "clotoSubmenu.acoes"=>$submenuAcoes
  ));
  return $tem->TemplateExport('submenu');
}
