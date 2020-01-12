//Menu highlight
$(document).ready(function() {
    document.getElementById('event-menu').className = "nav-item nav-link active";
    document.getElementById('missions-menu').className = "nav-item nav-link";
    document.getElementById('users-menu').className = "nav-item nav-link";
    document.getElementById('home-menu').className = "nav-item nav-link";
    document.getElementById('weekmissions-menu').className = "nav-item nav-link";
})


$( document ).ready(function() {
    
    
    $('.btn_edit').click(function(){
        alert(this.id);
    });

    


    function OpenEditWindow(id){
        $('#edit_window').show();
    }
        
    



});