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
  $(".sidebar").toggleClass("hidden");
});

$(".sidebar").on("click", function() {
  if (!$(".sidebar").hasClass("hidden")) {
    $(".sidebar").addClass("hidden")
  }
});

$(window).on("click resize scroll", function(event) {
  if ((!$(event.target).hasClass("btn-burger")) && (!$(".sidebar").hasClass("hidden"))) {
    $(".sidebar").addClass("hidden");
  }
});




function validateName(s) {
  s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
  if (!s) {
    return "*Required*";
  } else if (!s.match(/^[a-zA-Z-]*$/)) {  // Must use only letters and hyphens
    return "*Invalid Characters*";
  } else if (s.length < 2) {  // Must be at least 2 characters
    return "*Too Short*";
  } else if (s.length > 35) {   // Must be at most 35 characters
    return "*Too Long*";
  } else if (!s.match(/^(?!.*--)[a-zA-Z]{1}[a-zA-Z-]*[a-zA-Z]{1}$/)) {  // Must start and end with a letter, Must not contain two hyphens in a row
    return "*invalid*";
  } else {
    return ""; // valid
  }
}
$(".first").on("focusout", function() {
  error = validateName($("#first").val())
  $(".first p").remove();
  if (error) {
    if (error === "*Required*") {
      $("#first").val(""); // clean the input box to make sure placeholder is shown
    }
    $(".first").append(`<p>${error}</p>`);
    $(".first p").textillate({in:{effect: "flash", sync: true}});
  }
});
$(".last").on("focusout", function() {
  error = validateName($("#last").val())
  $(".last p").remove();
  if (error) {
    if (error === "*Required*") {
      $("#last").val(""); // clean the input box to make sure placeholder is shown
    }
    $(".last").append(`<p>${error}</p>`);
    $(".last p").textillate({in:{effect: "flash", sync: true}});
  }
});


function validateEmail(s) {
//
s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
if (!s) {
  return "*Required*";
} else if (!s.match(/^[a-zA-Z0-9-.@]*$/)) {   // Only alphanumeric, hyphen, period and AT characters
  return "*Invalid Characters*";
} else if (s.length > 254) {  // At most 254 characters
  return "*Too Long*";
} else if (!s.match(/^[a-zA-Z0-9-.]+@[a-zA-Z0-9-.]+\.[a-zA-Z]{2,}$/)) {   // Far from perfect, catches the general format of emails
  return "*Invalid*";
} else {
  return ""; // valid
}
}
$(".email").on("focusout", function() {
  error = validateEmail($("#email").val())
  $(".email p").remove();
  if (error) {
    if (error === "*Required*") {
      $("#email").val(""); // clean the input box to make sure placeholder is shown
    }
    $(".email").append(`<p>${error}</p>`);
    $(".email p").textillate({in:{effect: "flash", sync: true}});
  }
});


function validatePhone(s) {
  s = s.replace(/-+|\s+/gm,''); // remove ALL spaces and hypens
  if (!s) {
    return "null";
  } else if (!s.match(/^[0-9]*$/)) {
    return "*Invalid Characters*";
  } else if (s.length < 11) {
    return "*Too Short*";
  } else if (s.length > 12) {
    return "*Too Long*";
  } else {
    return ""; // valid
  }
}
$("#phone").on("focusout", function() {
  error = validatePhone($("#phone").val())
  $(".phone p").remove();
  if (error) {
    if (error === "null") {   // clean the input box to make sure placeholder is shown
      $("#phone").val("");
    } else {
      $(".phone").append(`<p>${error}</p>`);
      $(".phone p").textillate({in:{effect: "flash", sync: true}});
    }
  }
});

function validateSubject(s) {
  s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
  if (!s) {
    return "null";
  } else {
    return ""; // valid
  }
}
$("#subject").on("focusout", function() {
  error = validateSubject($("#subject").val())
  $(".subject p").remove();
  if (error) {
    if (error === "null") {   // clean the input box to make sure placeholder is shown
      $("#subject").val("");
    } else {
      $(".subject").append(`<p>${error}</p>`);
      $(".subject p").textillate({in:{effect: "flash", sync: true}});
    }
  }
});

function validateMessage(s) {
  s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
  if (!s) {
    return "*Required*";
  } else {
    return ""; // valid
  }
}
$(".message").on("focusout", function() {
  error = validateMessage($("#message").val())
  $(".message p").remove();
  if (error) {
    if (error === "*Required*") {
      $("#message").val(""); // clean the input box to make sure placeholder is shown
    }
    $(".message").append(`<p>${error}</p>`);
    $(".message p").textillate({in:{effect: "flash", sync: true}});
  }
});



$(".btn-submit").on("click", function() {

})




// On page load: trigger the focusout event on all form elements
// to make sure they show *Required* errors
$("form *").trigger("focusout");