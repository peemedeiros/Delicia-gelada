$(document).ready(function(){
    let estado = true;
    
    $('#menu-mobile').click(function(){

        if( estado == true ){
            $('#menu-para-celular').css({
                visibility:'visible',
                left:'0px'
            });
            estado = false;
        }else{
            $('#menu-para-celular').css({
                visibility:'hidden',
                left:'-250px'
            });
            estado = true;
        }
    });
});