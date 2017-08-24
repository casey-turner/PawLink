$( document ).ready(function() {

    console.log('ready');

    $('input[name=confirmpassword]').on('keyup change', function () {
        console.log('password compare');
        comparePasswords();
     });

     $('input[name=useremail]').change(function(){
        console.log('email check');
        checkEmail();
     });

//--------------- On FAQ page-------------------

// toggles the answer div  of questions
    $('.faqQuestion').click(function(){
        $(this).find('.faqAnswer').slideToggle();
    });

// Fades in faq's for dog walkers/owners when corresponding button is pressed
    $('#faqbtnOwner').click(function(){
        $("#faqWalker").css({"display": "none"});
        $("#faqOwner").fadeIn();
    });

    $('#faqbtnWalker').click(function(){
        $("#faqOwner").css({"display": "none"});
        $("#faqWalker").fadeIn();
    });

//--------------- Booking form on Profile page-------------------

// toggles the booking form
    $('.ratesRow').click(function(){
        $(this).closest('.rates-wrapper').find('.booking-dropdown').slideToggle();
    });

//--------------- Hamburger Menu for Mobile State -------------------

// Mobile menu functionality
        $(function() {
           $( ".mobileMenu" ).click(function() {
               $( "nav" ).toggle();
           });
       });

});



// Makes sure there is a value in both password fields, then compares input values
function comparePasswords() {
    if ($('input[name=password]').val() != '' && $('input[name=confirmpassword]').val() != '' ) {
        if ($('input[name=password]').val() == $('input[name=confirmpassword]').val()) {
            $(".password_error").html(" ");
            $(".password_error").css({"display": "none"});
            $('input[type=password]').css({"border-color": "green"});
            return true;
        } else {
            $(".password_error").html("Passwords do not match ");
            $(".password_error").css({"display": "block"});
            $('input[type=password]').css({"border-color": "red"});
            return false;
        }
    }
    return false;
}

// Checks that email is unique
function checkEmail(){
    if ( $('input[name=useremail]')[0].checkValidity() && $('input[name=useremail]').val() != '' ) {
        var ret_res = $.post("../controllers/check_email.php", $('#registerForm').serialize());
        ret_res.done(function( data ) {
            if(data == 'true') {
                $(".error_div").html("Email already exists");
                $(".error_div").css({"display": "block"});
                $('input[type=useremail]').css({"border-color": "red"});
                console.log('email exists');
                return false;
            } else {
                $(".error_div").html(" ");
                $(".error_div").css({"display": "none"});
                $('input[type=useremail]').css({"border-color": "green"});
                console.log('email does not exist');
                return true;
            }
        });
    }

    $(".error_div").html("Invalid email");
    $(".error_div").css({"display": "block"});
    return false;


}
