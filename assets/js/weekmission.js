//Menu highlight
$(document).ready(function() {
    document.getElementById('weekmissions-menu').className = "nav-item nav-link active";
    document.getElementById('missions-menu').className = "nav-item nav-link";
    document.getElementById('home-menu').className = "nav-item nav-link";
    document.getElementById('event-menu').className = "nav-item nav-link";
    document.getElementById('users-menu').className = "nav-item nav-link";
    document.getElementById('patrons-menu').className = "nav-item nav-link";
})

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
    $.post("deleteWeekMissionsDB.php", { ID: id }, function(data) {
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
 
function scrollToCreateWeekMissions(){
    var distance = $('#create-missions').offset().top;
    $('html,body').animate({scrollTop:distance},500);
}