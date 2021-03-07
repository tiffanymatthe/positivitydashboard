function change_tab(id) {
  document.getElementById("page_content").innerHTML = document.getElementById(
    id + "_desc"
  ).innerHTML;
  document.getElementById("page1").className = "notselected";
  document.getElementById("page2").className = "notselected";
  document.getElementById("page3").className = "notselected";
  document.getElementById(id).className = "selected";
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
    }
  });
});
