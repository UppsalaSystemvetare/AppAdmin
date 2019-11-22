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
  $("#search").click(function() {
    $("#user-table")
      .find("tr")
      .each(function() {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(":checked")) {
          alert("You must fill the text area!");
        }
      });
  });
});
