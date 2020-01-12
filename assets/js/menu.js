function scrollToTop(){
    var distance = $('#top-menu').offset().top;
    $('html,body').animate({scrollTop:distance},500);
}