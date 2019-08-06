$(document).ready(function() {

	 if (!sessionStorage.whyage65_username) {
			if(getCookie("whyage65_moneyapp") == null){
				if(!window.location.href.includes("sign")){
					 window.location.href = "signin.html";
				 }
			}else{
				saveCookieToSession();
			}
		}
	 
	
	 
	 $( "#password").on( "keydown", function(event) {
 	      if(event.which == 13) {
 	    	  $( "#cmdLogin" ).click();
 	      }
 	    });


       $( "#username").on( "keydown", function(event) {
   	      if(event.which == 13) {
   	    	  $( "#cmdLogin" ).click();
   	      }
   	    });

	// process the form
	$('#signin').submit(function(event) {
		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
		loginByEmail();
	});

	$('#signup').submit(function(event) {
		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
		registerByEmail();

	});
	
	$("#demobutton").click(function() {
		demoLogin();
	});
	
	
	

});


function signout(){

	var i = sessionStorage.length;
	while(i--) {
	  var key = sessionStorage.key(i);
	  if (key.indexOf("whyage65") > -1) {
		  sessionStorage.removeItem(key);
	  }
	}
	
	
	$
	.get(
			'src/AppBundle/Controller/controller_security.php?logout=1',
			function(response) {
				var message = response.message;
				if (message
						.indexOf("You have been logged out.") > -1) {
					
					window.location.href = "signin.html";
					
					$(
							'#lbl_message')
							.text(
									message);
					$(
							'#lbl_message')
							.removeClass(
									"display-none alert-danger")
							.addClass(
									"alert-success");

	
				} else {
					$(
							'#lbl_message')
							.text(
									message);
					$(
							'#lbl_message')
							.removeClass(
									"display-none alert-success")
							.addClass(
									"alert-danger");
				}

				$("html, body")
						.animate(
								{
									scrollTop : $(
											"#lbl_message")
											.offset().top
								},
								"slow");

			}, 'json');
	
	
}


var delete_cookie = function(name) {
	$.removeCookie(name, { path: '/' });
};

function registerByEmail() {
	$.post('src/AppBundle/Controller/controller_security.php', $('#signup')
			.serialize(), function(response) {
		var message = response.message;
		if (message.indexOf("successfully") > -1) {
			$('#lbl_message').text(message);
			$('#lbl_message').removeClass("display-none alert-danger")
					.addClass("alert-success");
		} else {
			$('#lbl_message').text(message);
			$('#lbl_message').removeClass("display-none alert-success")
			.addClass("alert-danger");
		}

		$("html, body").animate({
			scrollTop : $("#lbl_message").offset().top
		}, "slow");

	}, 'json');
}


function demoLogin() {
	$.post('src/AppBundle/Controller/controller_security.php',{ login: "demo", password: "pass" }, function(response) {
		var message = response.message;
		if (message.indexOf("successfully") > -1) {
			sessionStorage.whyage65_username = response.username;

			sessionStorage.whyage65_user_id = response.user_id;
			window.location.href = "index.html";
		} else {
			$('#lbl_message').text(message);
			$('#lbl_message').removeClass("display-none alert-success")
			.addClass("alert-danger");
			
		}

		$("html, body").animate({
			scrollTop : $("#lbl_message").offset().top
		}, "slow");

	}, 'json');

}

function loginByEmail() {
	$.post('src/AppBundle/Controller/controller_security.php', $('#signin')
			.serialize(), function(response) {
		var message = response.message;
		if (message.indexOf("successfully") > -1) {
			sessionStorage.whyage65_username = response.username;

			sessionStorage.whyage65_user_id = response.user_id;
			window.location.href = "index.html";
		} else {
			$('#lbl_message').text(message);
			$('#lbl_message').removeClass("display-none alert-success")
			.addClass("alert-danger");
			
		}

		$("html, body").animate({
			scrollTop : $("#lbl_message").offset().top
		}, "slow");

	}, 'json');

}


function checkSessionStillValid(response){
	if(response.includes('session time out')){
		window.location.href = "signin.html";
	}
}


function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	// console.log(re.test(email));
	return re.test(email);
}