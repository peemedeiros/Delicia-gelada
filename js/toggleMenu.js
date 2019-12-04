$(document).ready(function(){
    let estado = true;
    
    $('.login-tablet').click(function(){

        if( estado == true ){
            $('.login').css({
                visibility:'visible'
            });
            estado = false;
        }else{
            $('.login').css({
                visibility:'hidden'
            });
            estado = true;
        }
    });
});

