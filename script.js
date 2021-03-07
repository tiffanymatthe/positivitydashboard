function change_tab(id) {
  document.getElementById("page_content").innerHTML = document.getElementById(
    id + "_desc"
  ).innerHTML;
  document.getElementById("page1").className = "notselected";
  document.getElementById("page2").className = "notselected";
  document.getElementById("page3").className = "notselected";
  document.getElementById(id).className = "selected";

  if (id == "page1") {
    document.getElementById("page_content").style.backgroundColor = "var(--achievement-color)";
  } else if(id == "page2") {
      document.getElementById("page_content").style.backgroundColor = "var(--motivation-color)";
  } else {
    document.getElementById("page_content").style.backgroundColor = "var(--gratitude-color)";
  }
}

function show_adding() {
  document.getElementById("add_entry").style.display = "block";
  document.getElementById("container").style.display = "none";
}

function hide_adding() {
  document.getElementById("add_entry").style.display = "none";
  document.getElementById("container").style.display = "block";
}

$(document).ready(function () {
  $('input[type="radio"]').click(function () {
    var inputValue = $(this).attr("value");
    if (
      inputValue == "Achievement" ||
      inputValue == "Motivation" ||
      inputValue == "Gratitude"
    ) {
      var targetBox = $("#" + inputValue.toLowerCase() + "-tags");
      $(".tag-box").not(targetBox).hide();
      $(targetBox).show();
      $("#tag-header").show();
    }
  });
});
