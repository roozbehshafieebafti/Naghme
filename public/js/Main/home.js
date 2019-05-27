function openMenu() {
  $("#menuContent").css("display", "block");
  $(".not-menu-content").fadeIn("fast");
  $("#menuContent").animate({ width: "250px" });
//   $(".toggle-button-key").css({transform: "rotate(90deg)"});
}

function closeMenu() {
  $("#menuContent").animate({ width: "0px" });
  setTimeout(() => {
    $("#menuContent").css("display", "none");
    $(".not-menu-content").fadeOut("fast");
  }, 300);
}
