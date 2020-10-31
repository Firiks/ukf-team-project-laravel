$(function(){
    var scroll = $('#scroll-to-form');

    if(scroll.length > 0){
        $('html, body').animate({ scrollTop: scroll.offset().top - 500 }, 800);
    }
});