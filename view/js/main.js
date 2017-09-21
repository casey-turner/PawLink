
jQuery(document).ready(function($) {

    console.log('ready');

    /*$('input[name=confirmpassword]').on('keyup change', function () {
        console.log('password compare');
        comparePasswords();
    });*/

     /*$('input[name=useremail]').change(function(){
        console.log('email check');
        checkEmail();
    });*/
//-------------Login Form ---------------------

$("#ajaxLoginForm").submit(function(event){
    event.preventDefault();
    $.ajax({
       type: "POST",
       url: '?controller=users&action=login',
       data: $(this).serialize() + '&method=ajax',
       success: function(response) {
           if (response == 'true') {
               window.location = "?controller=profiles&action=dashboard"
           } else {
               $("#ajaxLoginError").css({"display": "block"});
               $( "#ajaxLoginError" ).html( "<p>Login failed. Try again.</p>" );
           }
       }
   });
});

//---------------Registration Form -----------------------------

$("#ajaxRegisterForm").submit(function(event){
    event.preventDefault();
    $.ajax({
       type: "POST",
       url: '?controller=users&action=register',
       data: $(this).serialize() + '&method=ajax',
       success: function(response) {
           if (response == 'true') {
               window.location = "?controller=profiles&action=create_profile"
           } else if (response =='sql error') {
               $("#ajaxRegisterError").css({"display": "block"});
               $( "#ajaxRegisterError" ).html( "<p>Registration failed. Try again.</p>" );
           } else {
               $("#ajaxRegisterError").css({"display": "block"});
               $( "#ajaxRegisterError" ).html( "<p>The email address "+ $("input[name='useremail']").val()+ " is already registered with PawLink.</p>" );
           }
       }
   });
});

//-----------------Forms Image Upload Modal ---------------
        var $uploadCrop,
		tempFilename,
		rawImg,
		imageId;
		function readFile(input) {
 			if (input.files && input.files[0]) {
                var reader = new FileReader();
	            reader.onload = function (e) {
					$('.upload-demo').addClass('ready');
					$('#cropImagePop').modal('show');
		            rawImg = e.target.result;
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	        else {
		        swal("Sorry - you're browser doesn't support the FileReader API");
		    }
		}

		$uploadCrop = $('#upload-demo').croppie({
			viewport: {
				width: 250,
				height: 250,
			},
			enforceBoundary: false,
			enableExif: true
		});

		$('#cropImagePop').on('shown.bs.modal', function(){
			// alert('Shown pop');
			$uploadCrop.croppie('bind', {
        		url: rawImg
        	}).then(function(){
        		console.log('jQuery bind complete');
        	});
		});

		$('.item-img').on('change', function () {
            imageId = $(this).data('id');
            tempFilename = $(this).val();
		    $('#cancelCropBtn').data('id', imageId);
            readFile(this);
        });

        $('.clearImageBtn').on('click', function (){
            $('#profileImageSelect').val('');
        });

		$('#cropImageBtn').on('click', function (ev) {
            $('#profileImageSelect').hide();
            $('.deleteImage').show();
			$uploadCrop.croppie('result', {
				type: 'base64',
				format: 'jpeg',
				size: {width: 250, height: 250}
			}).then(function (resp) {
				$('#item-img-output').attr('src', resp);
                $( ".profileImageOutput").val(resp);
				$('#cropImagePop').modal('hide');
			});
		});

        $('.deleteImage').on('click', function (){
            $('#item-img-output').attr('src', '');
            $( ".profileImageOutput").val('');
            $( ".deleteProfileImage").val('true');
            $('#profileImageSelect').val('');
            $('#profileImageSelect').css("display","block");
            $('.deleteImage').hide();
        });



//------------------Dog Walking Rates Page ---------------------------------
    $('#offerWalking').change(function() {
        if (this.checked) {
            $('.setRates').slideDown(200);
        } else {
            $('.setRates').slideUp(200);
        }

        $.ajax({
           type: "POST",
           url: '?controller=profiles&action=rates',
           data: $('#rates').serialize() + '&method=ajax',
           success: function(response) {
               if (response == 'true') {
                   console.log('success');
               } else {
                   console.log('fail');
                //   $("#ajaxLoginError").css({"display": "block"});
                  // $( "#ajaxLoginError" ).html( "<p>Error saving rates. Try again.</p>" );
               }
           }
       });

    });


    $("#rates").submit(function(event){
        event.preventDefault();
        $.ajax({
           type: "POST",
           url: '?controller=profiles&action=rates',
           data: $(this).serialize() + '&method=ajax',
           success: function(response) {
               if (response == 'true') {
                   window.location = "?controller=profiles&action=dashboard"
               } else {
                   $("#ajaxLoginError").css({"display": "block"});
                   $( "#ajaxLoginError" ).html( "<p>Login failed. Try again.</p>" );
               }
           }
       });
    });



//-----------------Local and Session storage for form values ----------------
$("#ajaxLoginForm").formcache();




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


//calculates cost of 30 minute walk
    $('#30WalkExtra').change(function() {
        var rate = $('#30Walk').data('rate');
        var extra = $('#30Walk').data('extra');
        var total = rate + ($('#30WalkExtra').val() - 1) * extra;
        $("#30Walk").html(total);
        $(".total h4").css({"display": "block"});
    });

//calculates cost of 60 minute walk
    $('#60WalkExtra').change(function() {
        var rate = $('#60Walk').data('rate');
        var extra = $('#60Walk').data('extra');
        var total = rate + ($('#60WalkExtra').val() - 1) * extra;
        $("#60Walk").html(total);
        $(".total h4").css({"display": "block"});
    });


//--------------- Member sub menu -------------------
// sub menu functionality
        $(function() {
           $( ".menuItemHasChildren" ).click(function() {
               $( ".subMenu" ).slideToggle("fast");
           });
           $(".subMenu").mouseleave(function(){
               $(".subMenu").slideToggle("fast");
           });
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
