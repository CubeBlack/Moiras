<pre>
<?php
require_once"server.php";
var_dump($_REQUEST);

if(!isset($_FILES['clotoScript'])){
    echo 'Erro: Não foi foi enviado o arquivo : $_REQUEST["clotoScript"] == null\n';
    goto fim;
}
echo "* Requisitos preenchidos.\n";

$uploaddir = 'restoration/';
$uploadfile = $uploaddir . basename($_FILES['clotoScript']['name']);

if (move_uploaded_file($_FILES['clotoScript']['tmp_name'], $uploadfile)) {
    echo "* Arquivo enviado [$uploadfile].\n";
} else {
    echo "- Não foi posivel enviar o arquivo.\n";
    goto fim;
}

if(($comStr = file_get_contents($uploadfile))=== false){
    echo "- Não foi posivel abrir o arquivo.\n";
    goto fim;
}
echo "* Arquivo aberto.\n";
if(isset($_REQUEST["apagar"]))
    if($_REQUEST["apagar"] == "on"){
        echo "* Apagando dados.\n";
        echo "* {$config->auto()}\n";
    }

$term->chamada($comStr);
echo "* Arquivo executado.\n";
fim:
