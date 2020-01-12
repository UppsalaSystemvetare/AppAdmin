//Menu highlight
$(document).ready(function() {
    document.getElementById('weekmissions-menu').className = "nav-item nav-link active";
    document.getElementById('missions-menu').className = "nav-item nav-link";
    document.getElementById('home-menu').className = "nav-item nav-link";
    document.getElementById('event-menu').className = "nav-item nav-link";
    document.getElementById('users-menu').className = "nav-item nav-link";
})

function scrollToCreate2(){
    var distance = $('#create-missions').offset().top;
    $('html,body').animate({scrollTop:distance},500);
}