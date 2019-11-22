function change_tab(going_to) {
    swap_classes();
    display(going_to);
}

// Changes the effective class on our buttons.
function swap_classes(){
    if(document.getElementById("create_missions_button").className === "section-button selected"){
        document.getElementById("create_missions_button").className = "section-button"
        document.getElementById("all_missions_button").className = "section-button selected"
    } else {
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