//Listens for checkbox clicks and applies a css class
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
      deleteUser(element);
    });
  });
});

//delete function
function deleteUser(ID) {
  $.post(
    "deleteUserDB.php",
    { ID: ID},
    function(data) {
      location.reload();
    }
  );
}

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

$(document).ready(function() {
  $("#sort-name").click(function() {
    alert("Sort by name");
    sortTable($('#user-table'),'asc');
  });
});

$(document).ready(function() {
  $("#sort-rank").click(function() {
    alert("Sort by rank");
    sortTable($('#user-table'),'asc');
  });
});

$(document).ready(function() {
  $("#sort-team").click(function() {
    alert("Sort by team");
    sortTable($('#user-table'),'asc');
  });
});

$(document).ready(function() {
  $('.show-button').hover(
    function () {
      $('.change-number').show();
    }, 
    function () {
      $('.change-number').hide();
    }
  );
});
