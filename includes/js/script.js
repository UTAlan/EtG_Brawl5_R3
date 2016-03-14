function clearErrors() {
    $("#errorWrapper").hide();
    $("#errorMessage").html('');
    $("#successWrapper").hide();
    $("#successMessage").html('');
}
function validateLoginForm() {
    var user = $("#username").val();
    var pass = $("#password").val();
    if(user == "" || pass == "") {
        $("#errorMessage").html('You must provide a username and password. Please try again.');
        $("#errorWrapper").show();
        return false;
    } else {
        return true;
    }
}
function validateSignupForm() {
    var user = $("#signup_username").val();
    var pass = $("#signup_password").val();
    var email = $("#signup_email").val();
    var msg = '';
    if(user == "" || pass == "" || email == "") {
        msg = 'You must provide a username, password, and email address. Please try again.';
    } else if(user.length < 3) {
        msg = 'Username must be at least 3 characters long.';
    } else if(pass.length < 4) {
        msg = 'Password must be at least 4 characters long.';
    } else if(!isValidEmailAddress(email)) {
        msg = 'Email Address must be in valid format.';
    }
    if(msg != '') {
        $("#errorMessage").html(msg);
        $("#errorWrapper").show();
        return false;
    } else {
        return true;
    }
}
function validateTroubleForm() {
    var user = $("#trouble_username").val();
    var email = $("#trouble_email").val();
    var msg = '';
    if(user == "" || email == "") {
        msg = 'Please provide a username and email address.';
    } else if(user.length < 3) {
        msg = 'Username must be at least 3 characters long.';
    } else if(!isValidEmailAddress(email)) {
        msg = 'Email Address must be in valid format.';
    }
    if(msg != '') {
        $("#errorMessage").html(msg);
        $("#errorWrapper").show();
        return false;
    } else {
        return true;
    }
}
function showResetForm() {
    $("#loginFormWrapper").hide();
    $("#resetFormWrapper").show();
}
function validateResetForm() {
    var password = $("#reset_password").val();
    var confirm = $("#reset_confirm").val();
    var msg = "";
    if(password == "" || confirm == "") {
        msg = "Please enter your new password twice.";
    } else if(password != confirm) {
        msg = "The passwords do not match. Please try again.";
    }
    if(msg != "") {
        $("#errorMessage").html(msg);
        $("#errorWrapper").show();
        return false;
    } else {
        return true;
    }
}
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};

$(function() {
    $("#loginForm").submit(function() {
        clearErrors();
        if(validateLoginForm()) {
            $.post("includes/php/login.php", $("#loginForm").serialize(), function(data) {
                if(data.length == 0) {
                    $("#loginFormWrapper").hide();
                    $("#successMessage").html('You have successfully logged in!');
                    $("#successWrapper").show();
                } else {
                    $("#errorMessage").html(data);
                    $("#errorWrapper").show();
                }
            });
        } 
        return false;
    });

    $("#loginLink").click(function() {
        $("#loginForm").submit();
        return false;
    });

    $("#loginForm input").on("keypress", function(e) {
        if(e.keyCode == 13) {
            $("#loginForm").submit();
            return false;
        }
    });

    $("#signupForm").submit(function() {
        clearErrors();
        if(validateSignupForm()) {
            $.post("includes/php/signup.php", $("#signupForm").serialize(), function(data) {
                if(data.length == 0) {
                    $("#username").val($("#signup_username").val());
                    $("#signupForm").trigger("reset");
                    $("#successMessage").html('You have successfully signed up! Please login below.');
                    $("#successWrapper").show();
                    $("#signupFormWrapper").hide("slide", { direction: "right" }, 200, function() {
                        $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
                    });
                } else {
                    $("#errorMessage").html(data);
                    $("#errorWrapper").show();
                }
            });
        }
        return false;
    });

    $("#signupLink").click(function() {
        clearErrors();
        $("#loginFormWrapper").hide("slide", { direction: "left" }, 200, function() {
            $("#signupFormWrapper").show("slide", { direction: "right" }, 200);
        });
        return false;
    });

    $("#signup_cancel").click(function() {
        clearErrors();
        $("#signupFormWrapper").hide("slide", { direction: "right" }, 200, function() {
            $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
        });
        return false;
    });

    $("#signup_submit").click(function() {
        $("#signupForm").submit();
        return false;
    });

    $("#signupForm input").on("keypress", function(e) {
        if(e.keyCode == 13) {
            $("#signupForm").submit();
            return false;
        }
    });

    $("#troubleLink").click(function() {
        clearErrors();
        $("#loginFormWrapper").hide("slide", { direction: "left" }, 200, function() {
            $("#troubleFormWrapper").show("slide", { direction: "right" }, 200);
        });
        return false;
    });

    $("#troubleForm").submit(function() {
        clearErrors();
        if(validateTroubleForm()) {
            $.post("includes/php/trouble.php", $("#troubleForm").serialize(), function(data) {
                if(data.length == 0) {
                    $("#troubleForm").trigger("reset");
                    $("#successMessage").html('Your password has been reset. Please check your email.')
                    $("#successWrapper").show();
                    $("#troubleFormWrapper").hide("slide", { direction: "right" }, 200, function() {
                        $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
                    });
                } else {
                    $("#errorMessage").html(data);
                    $("#errorWrapper").show();
                }
            });
        }
        return false;
    });

    $("#trouble_cancel").click(function() {
        clearErrors();
        $("#troubleFormWrapper").hide("slide", { direction: "right" }, 200, function() {
            $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
        });
        return false;
    });

    $("#trouble_submit").click(function() {
        $("#troubleForm").submit();
        return false;
    });

    $("#troubleForm input").on("keypress", function(e) {
        if(e.keyCode == 13) {
            $("#troubleForm").submit();
            return false;
        }
    });

    $("#resetForm").submit(function() {
        clearErrors();
        if(validateResetForm()) {
            $.post("includes/php/reset.php", $("#resetForm").serialize(), function(data) {
                if(data == '') {
                    $("#username").val($("#reset_username").val());
                    $("#resetForm").trigger("reset");
                    $("#successMessage").html('Your password has been saved. Please login below.')
                    $("#successWrapper").show();
                    $("#resetFormWrapper").hide("slide", { direction: "right" }, 200, function() {
                        $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
                    });
                } else {
                    $("#errorMessage").html(data);
                    $("#errorWrapper").show();
                }
            });
        }
        return false;
    });

    $("#reset_cancel").click(function() {
        clearErrors();
        $("#resetFormWrapper").hide("slide", { direction: "right" }, 200, function() {
            $("#loginFormWrapper").show("slide", { direction: "left" }, 200);
        });
        return false;
    });

    $("#reset_submit").click(function() {
        $("#resetForm").submit();
        return false;
    });

    $("#resetForm input").on("keypress", function(e) {
        if(e.keyCode == 13) {
            $("#resetForm").submit();
            return false;
        }
    });

    $("#bg_load").one("load", function() {
        $("html,body").css("background-image", "url('includes/images/bg.png')");
    }).attr("src", "includes/images/bg.png");
});
