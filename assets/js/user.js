$(document).on("click", "tr :checkbox", function(event) {
  $(this)
    .closest("tr")
    .toggleClass("table-primary");
});

// $(document).on("click", "search", function () {
//   $('#user-table').find('tr').each(function () {
//       var row = $(this);
//       alert(this);
//       if (row.find('input[type="checkbox"]').is(':checked')) {
//           alert('You must fill the text area!');
//       }
//   });
// });

$(document).ready(function() {
  $("#delete").click(function() {
    $("#user-table")
      .find("tr")
      .each(function() {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(":checked")) {
          console.log(
            $(row)
              .find(".ID")
              .val()
          );
        }
      });
  });
});

$(document).ready(function() {
  $("#delete").click(function() {});
});

$(document).ready(function() {
  $("#change-team-red").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeTeam(element, 1);
    });
  });
});

$(document).ready(function() {
  $("#change-team-green").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeTeam(element, 2);
    });
  });
});
$(document).ready(function() {
  $("#change-team-yellow").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeTeam(element, 3);
    });
  });
});
$(document).ready(function() {
  $("#change-team-blue").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeTeam(element, 4);
    });
  });
});

function changeTeam(ID, team) {
  $.post(
    "changeTeamDB.php",
    { ID: ID, Team: team },
    function(data) {
      location.reload();
    }
  );
}

function selectedUsers() {
  var users = [];
  $("#user-table")
    .find("tr")
    .each(function() {
      var row = $(this);
      if (row.find('input[type="checkbox"]').is(":checked")) {
        users.push($(row)
          .find(".ID")
          .val());
      }
    });
  return users;
}
