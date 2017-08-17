<?php
/**
 *
 */
class Page
{
  public $template;
  public $conteudo;
  public $contentType;

  const
    contentType_blocks = "",
    contentType_article = "",
    contentType_linkList = ""
  ;
  function __construct()
  {
    $this->template = new Template();
    $this->template->template_path = Config::template_path;
    $this->template->TemplateLoad(array('page' => "page.html"),true);
  }
  public function menu ($tipo="normal"){
    $this->template->template_path = Config::template_path;
    $this->template->TemplateLoad(array(
      'menu' => "menu.html",
      'option' => "menu.optionSolo.html"
    ),true);

    $options = "";
    // Moiras
    $this->template->TemplateDefine(array(
      "menu.optionSolo.texto"=>"Moiras",
      "menu.optionSolo.link"=>"index.php"
    ));
    $options .= $this->template->TemplateExport("option");

    // Cloto
    $this->template->TemplateDefine(array(
      "menu.optionSolo.texto"=>"Cloto",
      "menu.optionSolo.link"=>"Cloto.php"
    ));
    $options .= $this->template->TemplateExport("option");

    // Atropos
    $this->template->TemplateDefine(array(
      "menu.optionSolo.texto"=>"Atropos",
      "menu.optionSolo.link"=>"Atropos.php"
    ));
    $options .= $this->template->TemplateExport("option");

    /// -------------------- compor
    $this->template->TemplateDefine(array(
      "menu.option"=>$options
    ));

    $retorno = $this->template->TemplateExport("menu");
    return $retorno;
  }
  public function conteudo(){
    $this->template->TemplateLoad(array(
      "conteudo"=>"contentBlocks.html",
      "bloco"=>"contentBlocks.block.html",
    ));

    //definir blocos
    $blocos = "";
    foreach ($this->conteudo as $key => $bloco) {
      /*
      $this->template->TemplateDefine(array(
        "contentBlocks.blocks.title"=>"Titulo",
        "menu.optionSolo.link"=>"Atropos.php"
      ));
      */
      $blocos .= $this->template->TemplateExport("bloco");
    }
    /// - -------------- compor ------------
    $this->template->TemplateDefine(array(
      "contentBlocks.blocks"=>$blocos
    ));
    return $this->template->TemplateExport("conteudo");
  }
  public function view(){
    $this->template->TemplateDefine(array(
      "page.title"=>"Moiras",
      "page.menu"=>$this->menu(),
      "page.content"=>$this->conteudo(),
    ));

    $retorno = $this->template->TemplateExport("page");
    return $retorno;
  }
}
