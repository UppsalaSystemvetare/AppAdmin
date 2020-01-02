function change_tab(going_to) {
    swap_classes(going_to);
    display(going_to);
}

// Changes the effective class on our buttons.
function swap_classes(going_to){
    if(document.getElementById("create_missions_button").className === "section-button selected" && going_to === "table"){
        document.getElementById("create_missions_button").className = "section-button"
        document.getElementById("all_missions_button").className = "section-button selected"
    } else if (document.getElementById("all_missions_button").className === "section-button selected" && going_to === "create") {
        document.getElementById("create_missions_button").className = "section-button selected"
        document.getElementById("all_missions_button").className = "section-button"
    }
}

// displays the correct view.
function display(going_to) {
    if(going_to === "table"){
        document.getElementById("all_missions").className = "table"
        document.getElementById("create_missions").className = "table hidden"
    } else {
        document.getElementById("all_missions").className = "table hidden"
        document.getElementById("create_missions").className = "table"
    }
}

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