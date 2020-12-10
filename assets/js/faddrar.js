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

    //Form validation
    $(document).ready(function() {
        $("#fadder-form").submit(function() {        
            // Initiera error-variabler
            var nameValue = document.getElementById("name").value;
            var numberValue = document.getElementById("number").value;
            var imgValue = document.getElementById("imgurl").value;

            alert(nameValue + numberValue + imgValue);
            //event.preventDefault();
      
            var errorMsg = "Ooops! Följande måste åtgärdas: \r\n";
            
            var sendToServer = true;
            alert(sendToServer);
            
            //Något är fel med valideringen
            if (nameValue.length === 0) {
                errorMsg += " ¤ Du måste fylla i ett namn. \r\n";
                sendToServer = false;
            }
            if (nameValue.includes("'") || titleValue.includes("\\")) {
                errorMsg += " ¤ Namnet innehåller otillåtna karaktärer. \r\n";
                sendToServer = false;
            }
            if (numberValue.length === 0) {
                errorMsg += " ¤ Du måste fylla i ett telefonnummer. \r\n";
                sendToServer = false;
            }
            if (numberValue.includes("'") || titleValue.includes("\\")) {
                errorMsg += " ¤ Telefonnumret innehåller otillåtna karaktärer. \r\n";
                sendToServer = false;
            }
            if (imgValue.length === 0) {
                errorMsg += " ¤ Du måste ange en bildlänk. \r\n";
                sendToServer = false;
            }
            if (imgValue.includes("'") || titleValue.includes("\\")) {
                errorMsg += " ¤ Bildlänken innehåller otillåtna karaktärer. \r\n";
                sendToServer = false;
            }                  
            if (!sendToServer){
                event.preventDefault();
                alert(errorMsg + "\r\nFixa det och försök igen.");
            }

            alert(sendToServer);
      
        });
    });