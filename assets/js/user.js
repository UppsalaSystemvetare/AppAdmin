//Menu highlight
$(document).ready(function() {
    document.getElementById('users-menu').className = "nav-item nav-link active";
    document.getElementById('missions-menu').className = "nav-item nav-link";
    document.getElementById('patrons-menu').className = "nav-item nav-link";
    document.getElementById('event-menu').className = "nav-item nav-link";
    document.getElementById('home-menu').className = "nav-item nav-link";
    document.getElementById('weekmissions-menu').className = "nav-item nav-link";
})

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

  $.post("include/functions/deleteUserDB.php", { ID: ID }, function(data) {
    location.reload();
  });

  $.post(
    "include/functions/deleteUserDB.php",
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


$(document).ready(function() {
  $("#change-team-none").click(function() {
    var users = selectedUsers();
    users.forEach(element => {
      changeTeam(element, 0);
    });
  });
});

//change team function
function changeTeam(ID, team) {
  $.post(
    "include/functions/changeTeamDB.php",
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
    "include/functions/changeRankDB.php",
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


// $(document).ready(function() {
//   $("#sort-name").click(function() {
//     alert("Sort by name");
//     sortTable($('#user-table'),'asc');
//   });
// });

// $(document).ready(function() {
//   $("#sort-rank").click(function() {
//     alert("Sort by rank");
//     sortTable($('#user-table'),'asc');
//   });
// });

// $(document).ready(function() {
//   $("#sort-team").click(function() {
//     alert("Sort by team");
//     sortTable($('#user-table'),'asc');
//   });
// });

$(document).ready(function() {
  $(".sortable thead").on("click", "th", function() {
    // Which column is this?
    var index = $(this).index();
    if (index > 0) {

      console.log(index);
      // Get the tbody
      var tbody = $(this)
        .closest("table")
        .find("tbody");

      // Disconnect the rows and get them as an array
      var rows = tbody
        .children()
        .detach()
        .get();

        if (index = 1) {
          rows.sort(function(left, right) {
            //Get the text of the relevant td from left and right
            var $left = $(left).children().eq(index);
            var $right = $(right).children().eq(index);
            console.log($left);
            console.log($right);
            return $left.text().localeCompare($right.text());
          });

        }
        if (index = 2) {
          rows.sort(function(left, right) {
            //Get the text of the relevant td from left and right
            var $left = $(left).children().eq(index);
            var $right = $(right).children().eq(index);
            console.log($left);
            console.log($right);
            return $left.text().localeCompare($right.text());
          });
        } 
        if (index = 3) {
          rows.sort();
          rows.reverse();
        }
      // Sort it
     

      // Put them back in the tbody
      tbody.append(rows);
    }
  });
});

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

//search function, filters user-table
$(document).ready(function(){
  $("#search-input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#user-table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
