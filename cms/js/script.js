const $nivelAdm = document.getElementById('nivelAdm');
const $nivelContatos = document.getElementById('nivelContatos');
const $nivelConteudo = document.getElementById('nivelConteudo');

var controle = 0;

const selecionado = (obj) => {
    if(controle == 0){
        obj.style = "border:solid 5px #00ff00;";
        controle = 1
    }else if(controle == 1){
        obj.style = "border:0;";
        controle = 0;
    }
    
}
