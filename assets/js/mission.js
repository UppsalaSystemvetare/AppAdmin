//Menu highlight
$(document).ready(function() {
    document.getElementById('missions-menu').className = "nav-item nav-link active";
    document.getElementById('event-menu').className = "nav-item nav-link";
    document.getElementById('users-menu').className = "nav-item nav-link";
    document.getElementById('patrons-menu').className = "nav-item nav-link";
    document.getElementById('home-menu').className = "nav-item nav-link";
    document.getElementById('weekmissions-menu').className = "nav-item nav-link";
})

// Scroll to
function scrollToCreateMissions(){
    var distance = $('#create-missions').offset().top;
    $('html,body').animate({scrollTop:distance},500);
}

// TODO: Detect if bottom of page, change button functionality

$(document).on("click", "tr :checkbox", function(event) {
    $(this)
      .closest("tr")
      .toggleClass("table-primary");
});

//delete listener
$(document).ready(function() {
    $("#delete").click(function() {
      var users = selectedUsers();
      users.forEach(element => {
        delete_mission(element);
      });
    });
  });

function delete_mission(id){
    $.post("include/functions/deleteMissionsDB.php", { ID: id }, function(data) {
        location.reload();
    });
}

function change_mission(id, desc, points){
    var correctInput = false;
    while(!correctInput){
        var newDesc = prompt("Ny beskrivning:", desc);
        var newPoints = prompt("Ändra poäng:", points);
        if (((!newDesc == null || !newDesc == "") && (!newPoints == null || !newPoints == "" )) && newPoints >= 0) { 
            desc = newDesc;
            points = newPoints;
            correctInput = true;
        } else{
            alert("Bad input. Inga fält får lämnas tomma och poängen måste vara en siffra.")
        }
    }
    $.post("changeMissionsDB.php", { ID: id, DESC : desc, POINTS : points }, function(data) {
        location.reload();
    });
}
  //get selected users
  function selectedUsers() {
    var users = [];
    $("#all_missions")
      .find("tr")
      .each(function() {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(":checked")) {
          users.push(
            $(row)
              .find(".Id")
              .val()
          );
        }
      });
    return users;
  }
 
  //Form validation
$(document).ready(function() {
  $("#missions-form").submit(function() {        
      // Initiera error-variabler
      var errorMsg = "Ooops! Följande måste åtgärdas: \r\n";

      var sendToServer = true;
      

      if ($("#desc").val().length === 0) {
          errorMsg += " ¤ Du måste fylla i en beskrivning. \r\n";
          sendToServer = false;
      }
      if ($("#desc").val().includes("'") || $("#desc").val().includes("\\")) {
          errorMsg += " ¤ Beskrivningen innehåller otillåtna karaktärer. \r\n";
          sendToServer = false;
      }
      if ($("#point").val().length === 0) {
          errorMsg += " ¤ Du måste fylla i ett poängvärde \r\n";
          sendToServer = false;
      }
      if (isNaN($("#point").val())) { 
          errorMsg += " ¤ Poängvärdet måste vara en siffra \r\n";
          sendToServer = false;
      }
      if (!sendToServer){
          event.preventDefault();
          alert(errorMsg + "\r\nFixa det och försök igen.");
      }

  });
});
