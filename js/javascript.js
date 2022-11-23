$(".banner h1").textillate({
  in: {
    effect: "tada",
  }
});
$(".btn-footer").on("click", function() {
  $(".banner h1").textillate("in");
});
$(".sidebar h1").on("click", function() {
  $(".banner h1").textillate("in");
});

$(".btn-burger").removeClass("hidden");

$(".btn-burger").on("click", function() {
  $("nav").toggleClass("hidden");
});

$(".sidebar").on("click", function() {
  if (!$(".sidebar").hasClass("hidden")) {
    $(".sidebar").addClass("hidden")
  }
});

$("body").on("click", function(event) {
  if ((!$(event.target).parent().hasClass("btn-burger")) && (!$(".sidebar").hasClass("hidden"))) {
    $(".sidebar").addClass("hidden");
  }
})