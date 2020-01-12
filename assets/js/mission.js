//Menu highlight
$(document).ready(function() {
    document.getElementById('missions-menu').className = "nav-item nav-link active";
    document.getElementById('event-menu').className = "nav-item nav-link";
    document.getElementById('users-menu').className = "nav-item nav-link";
    document.getElementById('home-menu').className = "nav-item nav-link";
    document.getElementById('weekmissions-menu').className = "nav-item nav-link";
})

// Scroll to
function scrollToCreateMissions(){
    var distance = $('#create-missions').offset().top;
    $('html,body').animate({scrollTop:distance},500);
}

// TODO: Detect if bottom of page, change button functionality


function delete_mission(id){
    $.post("deleteMissionsDB.php", { ID: id }, function(data) {
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
 
  
