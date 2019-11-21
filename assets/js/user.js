

$(document).on("click", "#users", "li", function(event) {
    var ID = event.target.id;
    $.post("selectUser.php", { ID: ID }, function(data) {
      alert(data);
      document.reload();
    });
  });
  