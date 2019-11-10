$(document).ready(function(){
    let admConteudo = true;
    let admContato = true;
    let admUser = true;

    $('#adm-conteudo').click(function(){
       if(admConteudo == true){

           $(this).css({boxShadow:'none'});
           admConteudo = false;

       }else{
           $(this).css({boxShadow:'3px 3px 8px #666'});
           admConteudo = true;
       }
    });

    $('#adm-contato').click(function(){
       if(admContato == true){

           $(this).css({boxShadow:'none'});
           admContato = false;

       }else{
           $(this).css({boxShadow:'3px 3px 8px #666'});
           admContato = true;
       }
    });

    $('#adm-user').click(function(){
       if(admUser == true){

           $(this).css({boxShadow:'none'});
           admUser = false;

       }else{
           $(this).css({boxShadow:'3px 3px 8px #666'});
           admUser = true;
       }
    });
});