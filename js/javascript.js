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
        return " is required.";
    } else if (!s.match(/^[a-zA-Z-']*$/)) {    // Must use only letter / hyphen / Apostrophe
        return " contains invalid characters.";
    } else if (s.length < 2) {    // Must be at least 2 characters
        return " is too short.";
    } else if (s.length > 35) {     // Must be at most 35 characters
        return " is too long.";
    } else if (!s.match(/^(?!.*--|.*'')[a-zA-Z]{1}[a-zA-Z-']*[a-zA-Z]{1}$/)) {    // Must start and end with a letter, Must not contain two hyphens or apostrophe in a row
        return " is invalid.";
    } else {
        return ""; // valid
    }
}
function validateEmail(s) {
//
s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
if (!s) {
    return " is required.";
} else if (!s.match(/^[a-zA-Z0-9-!#$%&'*+.\/=?@^_`{|}~]*$/)) {     // valid characters in email
    return " contains invalid characters.";
} else if (s.length > 254) {    // At most 254 characters
    return " is too long.";
} else if (!s.match(/^[a-zA-Z0-9-!#$%&'*+.\/=?@^_`{|}~]+@[a-zA-Z0-9-.]+\.[a-zA-Z]{2,}$/)) {     // Far from perfect, catches the general format of emails
    return " is invalid.";
} else {
    return ""; // valid
}
}
function validatePhone(s) {
    s = s.replace(/-+|\s+/gm,''); // remove ALL spaces and hypens
    if (!s) {
        return "null";
    } else if (!s.match(/^[0-9]*$/)) {
        return " contains invalid characters.";
    } else if (s.length < 11) {
        return " is too short.";
    } else if (s.length > 12) {
        return " is too long.";
    } else {
        return ""; // valid
    }
}
function validateSubject(s) {
    s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
    if (!s) {
        return "null";
	} else if (s.length > 254) {    // At most 254 characters
		return " is too long.";
    } else {
        return ""; // valid
    }
}
function validateMessage(s) {
    s = s.replace(/^\s+|\s+$/gm,''); // remove starting and trailing spaces
    if (!s) {
        return " is required.";
	} else if (s.length < 5) {
        return " is too short.";
    } else {
        return ""; // valid
    }
}

// function to check all form fields and update the submit button
// returns false if any of the fields return an error message (with the exception that "null" on phone/subject don't count)
function validateForm() {
	$("form *").trigger("input");
    if ((validateName($("#first").val())) || (validateName($("#last").val())) || (validateEmail($("#email").val())) || ((validatePhone($("#phone").val())) && (validatePhone($("#phone").val()) !== "null")) || ((validateSubject($("#subject").val())) && (validateSubject($("#subject").val()) !== "null")) || (validateMessage($("#message").val()))) {
        return false;
    } else {
        return true;
    }
}

// Events that trigger when each input content changes
$(".first").on("input", function() {
    $(".first p").remove();
    if (error = validateName($("#first").val())) {
		$("#first").addClass("error");
        if (error === " is required.") {
            $("#first").val(""); // clean the input box to make sure placeholder is shown
        }
		$(".first").append(`<p>First Name ${error}</p>`);
    } else {
		$("#first").removeClass("error");
	}
});

$(".last").on("input", function() {
    $(".last p").remove();
    if (error = validateName($("#last").val())) {
		$("#last").addClass("error");
        if (error === " is required.") {
            $("#last").val(""); // clean the input box to make sure placeholder is shown
        }
		$(".last").append(`<p>Last Name ${error}</p>`);
    } else {
		$("#last").removeClass("error");
	}
});

$(".email").on("input", function() {
    $(".email p").remove();
    if (error = validateEmail($("#email").val())) {
		$("#email").addClass("error");
        if (error === " is required.") {
            $("#email").val(""); // clean the input box to make sure placeholder is shown
        }
		$(".email").append(`<p>Email Address ${error}</p>`);
    } else {
		$("#email").removeClass("error");
	}
});

$("#phone").on("input", function() {
    $(".phone p").remove();
    if (error = validatePhone($("#phone").val())) {
        if (error === "null") {     // clean the input box to make sure placeholder is shown
			$("#phone").removeClass("error");
            $("#phone").val("");
        } else {
			$("#phone").addClass("error");
            $(".phone").append(`<p>Phone Number ${error}</p>`);
        }
    } else {
		$("#phone").removeClass("error");
	}
});

$("#subject").on("input", function() {
    $(".subject p").remove();
    if (error = validateSubject($("#subject").val())) {
        if (error === "null") {     // clean the input box to make sure placeholder is shown
			$("#subject").removeClass("error");
            $("#subject").val("");
        } else {
			$("#subject").addClass("error");
            $(".subject").append(`<p>Subject ${error}</p>`);
        }
    } else {
		$("#subject").removeClass("error");
	}
});

$(".message").on("input", function() {
    $(".message p").remove();
    if (error = validateMessage($("#message").val())) {
		$("#message").addClass("error");
        if (error === " is required.") {
            $("#message").val(""); // clean the input box to make sure placeholder is shown
        }
        $(".message").append(`<p>Message ${error}</p>`);
    } else {
		$("#message").removeClass("error");
	}
});

// event when submit button is clicked, prevent anything from happening if it still shows "Submitted", otherwise;
// trigger every input's focusout event to make any errors flash, then if validateButton returns true action the form-submit
// disabled to let PHP take full control of submit validation.
// $("form").submit(function(e) {
//     if (validateForm()) {
// 		submit here
//     } else {
//         e.preventDefault();
// 		$('form [class*=error]:first').focus();
//     }
// });

// ==========================================================================
// For the code examples
// ==========================================================================

// show a popup message briefly at the bottom of the screen
let messageBusy = false;
function showMessage(message) {
    if (!messageBusy) {
		messageBusy = true;
		$("#popup").html(message);
		$("#popup").slideDown(500).delay(2000).slideUp(500, function() {
			messageBusy = false;
		});
    }
}

// return true when email validates OK
function exampleValidateEmail(email) {
    if (!email) {
		showMessage("An Email Is Required");
		return false;
    } else if (!email.match(/^[a-zA-Z0-9-!#$%&'*+.\/=?@^_`{|}~]*$/)) {     // Invalid characters in email
		showMessage("Invalid Characters In Email");
		return false;
    } else if (email.length > 254) {    // At most 254 Characters
		showMessage("Email Is Too Long");
		return false;
    } else if (!email.match(/^[a-zA-Z0-9-!#$%&'*+.\/=?^_`{|}~]+@[a-zA-Z0-9-.]+\.[a-zA-Z]{2,}$/)) {     // Far from perfect, catches the general format of emails
		showMessage("Invalid Email");
    } else {
        showMessage("Example Validated OK"); //Just for this example
            return true;
    }
}

$(".btn-test").on("click", function() {
    exampleValidateEmail($(".example3 input[type=email]").val());
});


// ==========================================================================
// Page Load Complete
// ==========================================================================

$(document).ready(function() {

    // start the sidebar out if screen is wider than 768
    if ($(window).outerWidth() >= 768) {
        $(".sidebar").removeClass("hidden");
        $(".wrapper").addClass("wrapper-nav").removeClass("wrapper");
    }

    // Start banner animations
    $(".banner h1").textillate("start");
    $(".banner h2").textillate("start");
    


});



