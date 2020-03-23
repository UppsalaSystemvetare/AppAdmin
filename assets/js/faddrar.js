//Menu highlight
$(document).ready(function() {
    document.getElementById('patrons-menu').className = "nav-item nav-link active";
    document.getElementById('users-menu').className = "nav-item nav-link";
    document.getElementById('missions-menu').className = "nav-item nav-link";
    document.getElementById('event-menu').className = "nav-item nav-link";
    document.getElementById('home-menu').className = "nav-item nav-link";
    document.getElementById('weekmissions-menu').className = "nav-item nav-link";
})

function scrollToCreateFaddrar(){
    var distance = $('#create-faddrar').offset().top;
    $('html,body').animate({scrollTop:distance},500);
}