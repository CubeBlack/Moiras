loadWork = new Worker("resources/js/load.js");
loadWork.onmessage = function(e){
  document.getElementById(e.data.local).innerHTML = e.data.conteudo;
}

function load(page="", local = "", adicional =""){
  parametro = new Object();

  if(local=="") local = "conteudo";
  document.getElementById(local).innerHTML = "Loading...";

  parametro.url = "";
  parametro.url += "../php/";
  parametro.url += page;
  parametro.url += ".php";
  parametro.url += "?";
  parametro.url += adicional;

  parametro.local = local;

  loadWork.postMessage(parametro);
}
function loadPage(page = "", query = ""){
  adicional = "";
  if (query!="") {
    adicional = "query=" + query;
  }
  load("dia.conteudo", "conteudo", adicional);
  load("dia.menu", "menu", adicional);
}
