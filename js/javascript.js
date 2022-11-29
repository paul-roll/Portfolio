// ==========================================================================
// Banner Text Effect
// ==========================================================================

// Textillate Animations
$(".banner h1").textillate({
  autoStart: false,
  in: {
    effect: "fadeInUp",
    delay: 25,
  }
});
$(".banner h2").textillate({
  autoStart: false,
  initialDelay: 300,
  in: {
    effect: "fadeInDown",
    delay: 25,
  }
});

// Triggers to re-animate banner text
$(".btn-footer").on("click", function() {
  $(".banner h1").textillate("in");
  $(".banner h2").textillate("in");
});
$(".sidebar h1").on("click", function() {
  $(".banner h1").textillate("in");
  $(".banner h2").textillate("in");
});


// ==========================================================================
// Sidebar Animation
// ==========================================================================

// slide the sidebar and flip the classes
function sidebarSlideIn() {
  $(".sidebar").stop().css("left", "-200px").removeClass("hidden").animate({left: "+=200"}, 500, function() {
    $(".sidebar").css("left", "");
  });
  $(".wrapper").addClass("wrapper-nav").removeClass("wrapper");
}
function sidebarSlideOut() {
  $(".sidebar").stop().animate({left: "-=200"}, 500, function() {
    $(".sidebar").css("left", "").addClass("hidden");
  });
  $(".wrapper-nav").addClass("wrapper").removeClass("wrapper-nav");
}

// btn-burger button click 
$(".btn-burger").on("click", function() {
  if ($(".sidebar").hasClass("hidden")) {
    sidebarSlideIn();
  } else {
    sidebarSlideOut();
  }
});

// catch all scroll and click events to dismiss sidebar on screen widths under 768
// exclude clicks on btn-burger
$(window).on("click scroll", function(event) {
  if ((!$(event.target).hasClass("btn-burger")) && (!$(".sidebar").hasClass("hidden")) && ($(window).outerWidth() < 768)) {
    sidebarSlideOut();
  }
});

// catch resize events, track changes in screen width so that the functions only fire a single time
let prevWidth = $(window).outerWidth();
$(window).on("resize", function() {
    if ((prevWidth < 768) && ($(window).outerWidth() >= 768)) {
      sidebarSlideIn();
    } else if ((prevWidth >= 768) && ($(window).outerWidth() < 768)) {
      sidebarSlideOut();
    }
  prevWidth = $(window).outerWidth();
});


// ==========================================================================
// Form Validation
// ==========================================================================

// Validation functions for each input type, returns error message or empty string when valid, for non-required "null" triggers whitespace clearing
function validateName(s) {
  s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
  if (!s) {
    return "*Required*";
  } else if (!s.match(/^[a-zA-Z-']*$/)) {  // Must use only letter / hyphen / Apostrophe
    return "*Invalid Characters*";
  } else if (s.length < 2) {  // Must be at least 2 characters
    return "*Too Short*";
  } else if (s.length > 35) {   // Must be at most 35 characters
    return "*Too Long*";
  } else if (!s.match(/^(?!.*--|.*'')[a-zA-Z]{1}[a-zA-Z-']*[a-zA-Z]{1}$/)) {  // Must start and end with a letter, Must not contain two hyphens or apostrophe in a row
    return "*Invalid*";
  } else {
    return ""; // valid
  }
}
function validateEmail(s) {
//
s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
if (!s) {
  return "*Required*";
} else if (!s.match(/^[a-zA-Z0-9-!#$%&'*+.\/=?@^_`{|}~]*$/)) {   // valid characters in email
  return "*Invalid Characters*";
} else if (s.length > 254) {  // At most 254 characters
  return "*Too Long*";
} else if (!s.match(/^[a-zA-Z0-9-!#$%&'*+.\/=?@^_`{|}~]+@[a-zA-Z0-9-.]+\.[a-zA-Z]{2,}$/)) {   // Far from perfect, catches the general format of emails
  return "*Invalid*";
} else {
  return ""; // valid
}
}
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
function validateSubject(s) {
  s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
  if (!s) {
    return "null";
  } else {
    return ""; // valid
  }
}
function validateMessage(s) {
  s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
  if (!s) {
    return "*Required*";
  } else {
    return ""; // valid
  }
}

// function to check all form fields and update the submit button
// returns false if any of the fields return an error message (with the exception that "null" on phone/subject don't count)
function validateButton() {
  if ((validateName($("#first").val())) || (validateName($("#last").val())) || (validateEmail($("#email").val())) || ((validatePhone($("#phone").val())) && (validatePhone($("#phone").val()) !== "null")) || ((validateSubject($("#subject").val())) && (validateSubject($("#subject").val()) !== "null")) || (validateMessage($("#message").val()))) {
    $(".btn-submit").css("background-color", "lightcoral").attr("value", "Can't Submit (Check Form)");
    return false;
  } else {
    $(".btn-submit").css("background-color", "#87CEEB").attr("value", "Submit");
    return true;
  }
}

// clear all form input boxes.
function clearForm() {
  $("#first").val("");
  $("#last").val("");
  $("#email").val("");
  $("#phone").val("");
  $("#subject").val("");
  $("#message").val("");
}

// Events that trigger when each input box looses focus, flash its own error and update the button
$(".first").on("focusout", function() {
  const error = validateName($("#first").val());
  $(".first p").remove();
  if (error) {
    if (error === "*Required*") {
      $("#first").val(""); // clean the input box to make sure placeholder is shown
      $(".first").append(`<p>${error}</p>`);
    } else {
      $(".first").append(`<p>First Name: ${error}</p>`);
    }
    $(".first p").textillate({in:{effect: "flash", sync: true}});
  }
  validateButton();
});
$(".last").on("focusout", function() {
  const error = validateName($("#last").val());
  $(".last p").remove();
  if (error) {
    if (error === "*Required*") {
      $("#last").val(""); // clean the input box to make sure placeholder is shown
      $(".last").append(`<p>${error}</p>`);
    } else {
      $(".last").append(`<p>Last Name: ${error}</p>`);
    }
    $(".last p").textillate({in:{effect: "flash", sync: true}});
  }
  validateButton();
});
$(".email").on("focusout", function() {
  const error = validateEmail($("#email").val());
  $(".email p").remove();
  if (error) {
    if (error === "*Required*") {
      $("#email").val(""); // clean the input box to make sure placeholder is shown
      $(".email").append(`<p>${error}</p>`);
    } else {
      $(".email").append(`<p>Email: ${error}</p>`);
    }
    $(".email p").textillate({in:{effect: "flash", sync: true}});
  }
  validateButton();
});
$("#phone").on("focusout", function() {
  const error = validatePhone($("#phone").val());
  $(".phone p").remove();
  if (error) {
    if (error === "null") {   // clean the input box to make sure placeholder is shown
      $("#phone").val("");
    } else {
      $(".phone").append(`<p>Phone Number: ${error}</p>`);
      $(".phone p").textillate({in:{effect: "flash", sync: true}});
    }
  }
  validateButton();
});
$("#subject").on("focusout", function() {
  const error = validateSubject($("#subject").val());
  $(".subject p").remove();
  if (error) {
    if (error === "null") {   // clean the input box to make sure placeholder is shown
      $("#subject").val("");
    } else {
      $(".subject").append(`<p>${error}</p>`);
      $(".subject p").textillate({in:{effect: "flash", sync: true}});
    }
  }
  validateButton();
});
$(".message").on("focusout", function() {
  const error = validateMessage($("#message").val());
  $(".message p").remove();
  if (error) {
    if (error === "*Required*") {
      $("#message").val(""); // clean the input box to make sure placeholder is shown
    }
    $(".message").append(`<p>${error}</p>`);
    $(".message p").textillate({in:{effect: "flash", sync: true}});
  }
  validateButton();
});

// event when submit button is clicked, prevent anything from happening if it still shows "Submitted", otherwise;
// trigger every input's focusout event to make any errors flash, then if validateButton returns true action the form-submit
$(".btn-submit").on("click", function() {
  if ($(".btn-submit").attr("value") !== "Submitted") {
    $("form *").trigger("focusout");
    if (validateButton()) {
      // Add Form Submit Code Here
      $(".btn-submit").css("background-color", "lightgreen").attr("value","Submitted");
      clearForm();
    }
  }
});


// ==========================================================================
// Page Load Complete
// ==========================================================================

$(document).ready(function() {

  // trigger the focusout event on all form elements
  // to make sure they show *Required* 'error' from the start
  $("form *").trigger("focusout");

  // start the sidebar out if screen is wider than 768
  if ($(window).outerWidth() >= 768) {
    $(".sidebar").removeClass("hidden");
    $(".wrapper").addClass("wrapper-nav").removeClass("wrapper");
  }

  // Start banner animations
  $(".banner h1").textillate("start");
  $(".banner h2").textillate("start");
  
  // Prevent the form from reloading the page on submit
  $("form").submit(function(e) {
    e.preventDefault();
  });

});



