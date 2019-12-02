//Listens for checkbox clicks and applies a css class
$(document).on("click", "tr :checkbox", function(event) {
  $(this)
    .closest("tr")
    .toggleClass("table-primary");
});

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

//change team listeners
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

//change team function
function changeTeam(ID, team) {
  $.post(
    "changeTeamDB.php",
    { ID: ID, Team: team },
    function(data) {
      location.reload();
    }
  );
}

//change rank listeners
$(document).ready(function() {
  $("#change-rank-recce").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeRank(element, 1);
    });
  });
});

$(document).ready(function() {
  $("#change-rank-fadder").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeRank(element, 2);
    });
  });
});

$(document).ready(function() {
  $("#change-rank-kapten").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeRank(element, 3);
    });
  });
});

$(document).ready(function() {
  $("#change-rank-general").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeRank(element, 4);
    });
  });
});

//change rank function
function changeRank(ID, rank) {
  $.post(
    "changeRankDB.php",
    { ID: ID, Rank: rank },
    function(data) {
      location.reload();
    }
  );
}

//get selected users
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
