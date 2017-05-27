<?php
require_once "engine/engine.php";

require_once "engine/" . $_GET["query"] . ".php";

view::tituloPage($proj->name());
view::hr();
if (is_array($proj->postagen()))
  foreach ($proj->postagen() as $key => $post) {
    view::titulo($post->titulo());
    if($post->texto()!="[conteudo]")
      view::paragrafo($post->texto());
    view::hr();
  }
