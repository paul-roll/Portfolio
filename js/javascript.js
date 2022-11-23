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