<!doctype html>
<html>
    <head>
        <title id="title">&alpha;|Cloto</title>
        <script>
            function load(page,local="",adicional="")
            {
                if(local=="") local = "conteudo";
                document.getElementById(local).innerHTML = "Loading...";
                theUrl = "";
                theUrl += "page/";
                theUrl += page;
                theUrl += ".php";
                theUrl += "?" + adicional;
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
                xmlHttp.send( null );
                document.getElementById(local).innerHTML = xmlHttp.responseText;
                console.log(theUrl);
            }
            function loadConteudo(dados=""){
                load('conteudo');
                load('menu','menu');
                load('titulo','titulo')
                load('title','title')
            }
        </script>
    </head>
    <body onload="loadConteudo();">
        <div id="titulo"></div>
        <hr>
        <div id="menu">/</div>
        <hr>
        <div id="conteudo"></div>
        <hr><hr>
        <div id="rodape"><a href="../">Moiras</a> by Daniel Lima</div>
    </body>
</html>
