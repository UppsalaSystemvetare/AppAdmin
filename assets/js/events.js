//Menu highlight
$(document).ready(function() {
    document.getElementById('event-menu').className = "nav-item nav-link active";
    document.getElementById('missions-menu').className = "nav-item nav-link";
    document.getElementById('users-menu').className = "nav-item nav-link";
    document.getElementById('patrons-menu').className = "nav-item nav-link";
    document.getElementById('home-menu').className = "nav-item nav-link";
    document.getElementById('weekmissions-menu').className = "nav-item nav-link";
})

function scrollToCreateEvents(){
    var distance = $('#create-events').offset().top;
    $('html,body').animate({scrollTop:distance},500);
}

$( document ).ready(function() {
    $('.btn_edit').click(function(){
        alert(this.id);
    });

    function OpenEditWindow(id){
        $('#edit_window').show();
    }
});

$(document).on("click", "tr :checkbox", function(event) {
    $(this)
      .closest("tr")
      .toggleClass("table-primary");
});

//delete listener
$(document).ready(function() {
    $("#delete").click(function() {
      var events = selectedEvents();
      events.forEach(element => {
        delete_event(element);
      });
    });
  });

function delete_event(id){
    $.post("include/functions/deleteEventDB.php", { ID: id }, function(data) {
        location.reload();
    });
}

//get selected users
function selectedEvents() {
    var events = [];
    $("#event-table")
      .find("tr")
      .each(function() {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(":checked")) {
  
            events.push($(row)
            .find(".Id")
            .val());
  
        }
      });
    return events;
  }

    //Form validation
$(document).ready(function() {
  $("#add-event").submit(function() {        
      // Initiera error-variabler
      var titleValue = document.getElementById("title").value;
      var descValue = document.getElementById("description").value;
      var locationValue = document.getElementById("location").value;
      var dateValue = document.getElementById("datetime").value;
      var timeValue = document.getElementById("starttime").value;
      var pat1Value = document.getElementById("patron1").value;
      var pat2Value = document.getElementById("patron2").value;


      var currDate = new Date();
      currDate.setHours(0, 0, 0, 0);
      //alert(currDate);

      var errorMsg = "Ooops! Följande måste åtgärdas: \r\n";

      var sendToServer = true;

      if (titleValue.length === 0) {
          errorMsg += " ¤ Du måste fylla i ett namn på eventet. \r\n";
          sendToServer = false;
      }
      if (titleValue.includes("'") || titleValue.includes("\\")) {
          errorMsg += " ¤ Namnet innehåller otillåtna karaktärer. \r\n";
          sendToServer = false;
      }
      if (descValue.length === 0) {
          errorMsg += " ¤ Du måste fylla i en beskrivning. \r\n";
          sendToServer = false;
      }
      if (descValue.includes("'") || titleValue.includes("\\")) {
          errorMsg += " ¤ Beskrivningen innehåller otillåtna karaktärer. \r\n";
          sendToServer = false;
      }
      if (locationValue.length === 0) {
          errorMsg += " ¤ Du måste fylla i en plats. \r\n";
          sendToServer = false;
      }
      if (locationValue.includes("'") || titleValue.includes("\\")) {
          errorMsg += " ¤ Location innehåller otillåtna karaktärer. \r\n";
          sendToServer = false;
      }
      if (dateValue.length === 0) {
        errorMsg += " ¤ Du måste ange ett datum. \r\n";
        sendToServer = false;
      }
      /*if (dateValue < currDate) { //Lägg till kontroll så att datumet inte passerat?
          errorMsg += " ¤ Du har angett ett ogiltigt datum. \r\n";
          sendToServer = false;
      }*/
      if (timeValue.length === 0) {
        errorMsg += " ¤ Du måste ange ett klockslag. \r\n";
        sendToServer = false;
      }
      if (pat1Value.length === 0) {
        errorMsg += " ¤ Du måste ange nykterfadder #1. \r\n";
        sendToServer = false;
      }
      if (pat2Value.length === 0) {
        errorMsg += " ¤ Du måste ange nykterfadder #2. \r\n";
        sendToServer = false;
      }
      else if (pat1Value == pat2Value) {
        errorMsg += " ¤ Du måste välja två olika nykterfaddrar. \r\n";
        sendToServer = false;
      }

      if (!sendToServer){
          event.preventDefault();
          alert(errorMsg + "\r\nFixa det och försök igen.");
      }

  });
});