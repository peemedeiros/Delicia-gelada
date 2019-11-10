$(document).ready(function(){
    let admConteudo = true;
    let admContato = true;
    let admUser = true;

    let sombraOffConteudo = false;
    let sombraOffContato = false;
    let sombraOffUser = false;

    $('#adm-conteudo').click(function(){
       if(admConteudo == true){

           $(this).css({boxShadow:'none',backgroundColor:'#fff'});
           admConteudo = false;

       }else{
           $(this).css({boxShadow:'3px 3px 8px #666',backgroundColor:'rgb(241, 239, 255)'});
           admConteudo = true;
       }
    });

    $('#adm-contato').click(function(){
       if(admContato == true){

           $(this).css({boxShadow:'none',backgroundColor:'#fff'});
           admContato = false;

       }else{
           $(this).css({boxShadow:'3px 3px 8px #666',backgroundColor:'rgb(241, 239, 255)'});
           admContato = true;
       }
    });

    $('#adm-user').click(function(){
       if(admUser == true){

           $(this).css({boxShadow:'none',backgroundColor:'#fff'});
           admUser = false;

       }else{
           $(this).css({boxShadow:'3px 3px 8px #666',backgroundColor:'rgb(241, 239, 255)'});
           admUser = true;
       }
    });

    $('#adm-conteudo-sombra-off').click(function(){
        if(sombraOffConteudo == true){

            $(this).css({boxShadow:'none',backgroundColor:'#fff'});
            sombraOffConteudo = false;
 
        }else{
            $(this).css({boxShadow:'3px 3px 8px #666',backgroundColor:'rgb(241, 239, 255)'});
            sombraOffConteudo = true;
        }

    });

    $('#adm-contato-sombra-off').click(function(){
        if(sombraOffContato == true){

            $(this).css({boxShadow:'none',backgroundColor:'#fff'});
            sombraOffContato = false;
 
        }else{
            $(this).css({boxShadow:'3px 3px 8px #666',backgroundColor:'rgb(241, 239, 255)'});
            sombraOffContato = true;
        }

    });

    $('#adm-usuario-sombra-off').click(function(){
        if(sombraOffUser == true){

            $(this).css({boxShadow:'none',backgroundColor:'#fff'});
            sombraOffUser = false;
 
        }else{
            $(this).css({boxShadow:'3px 3px 8px #666',backgroundColor:'rgb(241, 239, 255)'});
            sombraOffUser = true;
        }

    });
});