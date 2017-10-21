
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
    var $uploadCrop, tempFilename, rawImg, imageId;
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

        if ( $('#rates').parsley().isValid() ) {

            $.ajax({
               type: "POST",
               url: '?controller=profiles&action=rates',
               data: $('#rates').serialize() + '&method=ajax',
               success: function(response) {

                   if (response == 'inserted') {
                       $(".notification").css({"display": "block"});
                       $( ".notification" ).html( "Success, your dog walking rates have been set!" );

                   } else if (response == 'updated') {
                       $(".notification").css({"display": "block"});
                       $( ".notification" ).html( "Success, your dog walking rates have been updated!" );
                  } else {
                       $(".error").css({"display": "block"});
                       $( ".error" ).html( "Error saving rates, please try again." );
                  }
               }
           });

        }

    });

    $("#rates").submit(function(event){
        event.preventDefault();

        $.ajax({
           type: "POST",
           url: '?controller=profiles&action=rates',
           data: $(this).serialize() + '&method=ajax',
           success: function(response) {
               if (response == 'inserted') {
                   $(".notification").css({"display": "block"});
                   $( ".notification" ).html( "Success, your dog walking rates have been set!" );
               } else if (response == 'updated') {
                   $(".notification").css({"display": "block"});
                   $( ".notification" ).html( "Success, your dog walking rates have been updated!" );
              } else {
                   $(".error").css({"display": "block"});
                   $( ".error" ).html( "Error saving rates, please try again." );
              }
           }
       });
    });

    //----------------- Session storage for form values ----------------

    if (sessionStorage.getItem('registerForm') !== null) {
        var registerFormSessionStorage = JSON.parse(sessionStorage.getItem('registerForm'));
        var field;
        for (field in registerFormSessionStorage) {
            $('input[name='+field+']').val( registerFormSessionStorage[field] );
        }
    } else {
        var registerFormSessionStorage = {};
    }

    $("#ajaxRegisterForm input").not(":input[type=password], :input[type=submit]").change(function(){
        var value = $(this).val();
        var name = $(this).attr("name");
        registerFormSessionStorage[name] = value;

        sessionStorage.setItem('registerForm', JSON.stringify(registerFormSessionStorage));
    });



    //-------------------Wall of Paws Dog Gallery ------------------
    $('.grid').masonry({
      itemSelector: '.grid-item',
    });

    // layout Masonry after each image loads
    $('.grid').imagesLoaded().progress( function() {
        $('.grid').masonry('layout');
    });
    window.sr = ScrollReveal();
    sr.reveal('.grid-item', {
        duration: 1000,
        scale: 0.5,
        origin: 'top',
        distance: '50px',
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


    //calculates cost of 30 minute walk
    $('#30WalkExtra').change(function() {
        var rate = $('#30Walk').data('rate');
        var extra = $('#30Walk').data('extra');
        var total = rate + ($('#30WalkExtra').val() - 1) * extra;
        $("#30Walk").html(total);

    });

    //calculates cost of 60 minute walk
    $('#60WalkExtra').change(function() {
        var rate = $('#60Walk').data('rate');
        var extra = $('#60Walk').data('extra');
        var total = rate + ($('#60WalkExtra').val() - 1) * extra;
        $("#60Walk").html(total);

    });

    //Submit 30 or 60 minute walk booking form
    $("#walk30min,#walk60min").submit(function(event){
        event.preventDefault();

        var formID = this.id;

        $.ajax({
           type: "POST",
           url: '?controller=bookings&action=create',
           data: $(this).serialize() + '&method=ajax',
           success: function(response) {
               if (response == 'inserted') {
                   //Display booking summary modal
                   $('#bookingPop').modal('show');
                   //Create date time object and format for output in modal
                   var dateTime = toJSDate($("#"+formID+"DateTime").val());
                   var formattedDate = formatDate(dateTime);
                   var formattedTime = formatTime(dateTime);
                   //Booking form summary
                   $('.summaryDetails').empty().append(
                       '<p><strong>Time: </strong>'+formattedDate+' at '+formattedTime+'</p>'+
                       '<p><strong>Length: </strong>'+$("#"+formID+" input[name=duration]").val()+' minutes</p>'+
                       '<p><strong>Number of Dogs: </strong>'+$("#"+formID+" input[name=noDogs]").val()+'</p>'
                   );
                   //Reset booking form
                   $( "#"+formID )[0].reset();
              } else {
                   $("#"+formID+" .error").css({"display": "block"});
                   $("#"+formID+" .error").html( "Error with booking, please try again." );
              }
           }
       });
    });

    //-----------------Booking Overview Buttons----------------------
    //Update the booking status to "confirmed"
    $(".confirmBooking").click(function(event){
        event.preventDefault();

        var bookingID = $(this).data("bookingid");

        $.ajax({
           type: "GET",
           url: '?controller=bookings&action=confirm&bookingid=' + $(this).data("bookingid"),
           success: function(response) {
               if (response == 'true') {
                   $('.confirmBooking[data-bookingid="'+bookingID+'"]').closest( ".col-md-4" ).empty().append(
                       '<div class="alert alert-success centre-content">'+
                            '<span><strong>Confirmed</strong></span>'+
                        '</div>'+
                        '<div class="">'+
                            '<button class="blue-btn" type="button" name="button" value="Cancel Booking Request" data-bookingID="'+bookingID+'">Cancel Booking Request</button>'+
                        '</div>'
                   );
              } else {
                   console.log('did not update ');
              }
           }
       });
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

}); //End document.load function

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

//Converts flatpickr date to JS date object
function toJSDate (dateTime) {

    var dateTime = dateTime.split(" ");//dateTime[0] = date, dateTime[1] = time

    var date = dateTime[0].split("-");
    var time = dateTime[1].split(":");
    var month = date[1] - 1;

    //(year, month, day, hours, minutes, seconds, milliseconds)
    return new Date(date[0], month, date[2], time[0], time[1], 0, 0);
}

//Formats the date portion of JS date object
function formatDate(date) {
  var monthNames = [
    "January", "February", "March",
    "April", "May", "June", "July",
    "August", "September", "October",
    "November", "December"
  ];

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return day + ' ' + monthNames[monthIndex] + ' ' + year;
}

//Formats the time portion of JS date object
function formatTime(date) {

  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';

  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;

  var strTime = hours + ':' + minutes + ' ' + ampm;

  return strTime;
}

//------------------Search Local Walkers-----------------------
function searchWalkers() {

    $.ajax({
       type: "GET",
       url: '?controller=search&action=search_walkers',
       success: function(response) {
            response = JSON.parse(response);

            var map = new google.maps.Map(document.getElementById('map'), {
                center:new google.maps.LatLng(-27.470125, 153.021072),
                zoom:12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var geocoder = new google.maps.Geocoder();

            $.each(response, function () {

                $(".searchResults").append(
                    '<div class="search-profile">'+
                        '<a href="?controller=profiles&action=profile&profileID='+this.profileID+'">'+
                            '<div class="row">'+
                                '<div class="col-3 ">'+
                                    '<div class="search-thumb">'+
                                        '<img src="view/uploads/'+this.profileImage+'" >'+
                                        '<p>'+this.firstName+' '+this.lastName+'.'+'</p>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-9 search-result">'+
                                    '<h3>'+this.profileTitle+'</h3>'+
                                    '<h4>'+this.suburb+'</h4>'+
                                    '<p>'+trimProfileDescription(this.profileDescription,250)+'</p>'+
                                '</div>'+
                            '</div>'+
                        '</a>'+
                    '</div>'
                );


              geocoder.geocode({'address': this.suburb+', Australia'}, function(results, status) {
                    if (status === 'OK') {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });

            }); //end each
        }
    });


    /*var locations = [
     ['London Eye', 51.503510, -0.119434, 5],
     ['Charing Cross', 51.507383, -0.127202, 4],
     ['Leicester Square', 51.511336, -0.128361, 3],
     ['Euston Station', 51.526825, -0.132395, 2],
     ['Kings Cross Station', 51.530616, -0.123125, 1]
 ];*/

   /*var infowindow = new google.maps.InfoWindow();

   var marker, i;
   var markers = new Array();

       for (i = 0; i < locations.length; i++) {
     marker = new google.maps.Marker({
       position: new google.maps.LatLng(locations[i][1], locations[i][2]),
       map: map
     });

     markers.push(marker);

     google.maps.event.addListener(marker, 'click', (function(marker, i) {
       return function() {
         infowindow.setContent(locations[i][0]);
         infowindow.open(map, marker);
       }
     })(marker, i));
   }

   function AutoCenter() {
     //  Create a new viewpoint bound
     var bounds = new google.maps.LatLngBounds();
     //  Go through each...
     $.each(markers, function (index, marker) {
     bounds.extend(marker.position);
     });
     //  Fit these bounds to the map
     map.fitBounds(bounds);
   }
   AutoCenter();*/

}

function trimProfileDescription(text,length) {
    var trimmedText = text.substring(0, length);
    var lastIndex = trimmedText.lastIndexOf(" ");
    trimmedText = trimmedText.substring(0, lastIndex)+'...';

    return trimmedText;
}
