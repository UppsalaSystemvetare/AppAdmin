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