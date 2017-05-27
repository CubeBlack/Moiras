self.addEventListener('message', function(e) {
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET",e.data.url,false);
  xmlHttp.send(null);

  resposta =  new Object();
  resposta.conteudo = xmlHttp.responseText;
  resposta.local = e.data.local;
  postMessage(resposta);

}, false);
