var monthNames = [ "January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December" ];

var globalMonth = "";

$(document).ready(function() {
	
	var contentDivX = $(".tab-content-in").position().top;
	var categoryDivX = $(".category-filter-div").position().top;
	var mobileNav = document.getElementById("mobile_nav");
	var desktopNav = document.getElementById("desktop_nav");
	if (contentDivX > categoryDivX) {
		mobileNav.style.display = "block";
		desktopNav.style.display = "none";
	}else{
		desktopNav.style.display = "block";
		mobileNav.style.display = "none";
	}
	
	sessionStorage.whyage65_warningProvided = 0;
	
	populateAllAccounts();
	populateAccountTypes();

	$('#account_form').submit(function(event) {
		// stop the form from submitting the normal way and refreshing
		// the page
		event.preventDefault();
		captureNewAccount();
	});

	$(".category-li").click(function() {

		var contentDivX = $(".tab-content-in").position().top;
		var categoryDivX = $(".category-filter-div").position().top;

		// alert("content x :" + contentDivX + " " + categoryDivX);

		if (contentDivX > categoryDivX) {
			$("html, body").animate({
				scrollTop : $(".tab-content-in").offset().top
			}, "slow");
		}
	});

	showFadingMessage("Use '-' for negative values. e.g. -2500");
});


function showFadingMessage(message){
	$("#fading_message").html(message);
	$("#fading_message").show().delay(10000).fadeOut();
}

function captureNewAccount() {
	var selectedAccountType = $('#select_accounttypes').children("option:selected").val();
	
	if(selectedAccountType.includes("Credit") || selectedAccountType.includes("Mortgages")){
		amount = $('#textAccountAmount').val();
		if(amount > -1){
			if(sessionStorage.whyage65_warningProvided == 0){
				$('#lbl_message').text("You are about to create a credit account with a positive balance. Submit to proceed");
				$('#lbl_message').removeClass(
						"display-none alert-success").addClass(
						"alert-danger");
				
				$("html, body").animate({
					scrollTop : $("#lbl_message").offset().top
				}, "slow");
				
				sessionStorage.whyage65_warningProvided = 1;
				
				return
			}
		}
	}
	$
			.post(
					'src/AppBundle/Controller/controller_account.php?addNewAccount=true',
					$('#account_form').serialize(), function(response) {
						checkSessionStillValid(response.message);
						var message = response.message;
						if (message.indexOf("successfully") > -1) {
							$('#lbl_message').text(message);
							$('#lbl_message').removeClass(
									"display-none alert-danger").addClass(
									"alert-success");

							// refresh the updated category
							var selectedAccountType = $('#select_accounttypes')
									.children("option:selected").val();
							populateAllAccounts(selectedAccountType);
						} else {
							$('#lbl_message').text(message);
							$('#lbl_message').removeClass(
									"display-none alert-success").addClass(
									"alert-danger");
						}

						$("html, body").animate({
							scrollTop : $("#lbl_message").offset().top
						}, "slow");

					}, 'json');
	
	sessionStorage.whyage65_warningProvided = 0;
	
}

function populateAllAccounts() {
	populateAccount("Bank Accounts");
	populateAccount("Credit");
	populateAccount("Investments");
	populateAccount("Mortgages");
	populateAccount("Vehicles");
	populateAccount("Properties");

}

function updateBalance(elem) {
	balance_id = elem.id;
	queryString = "";
	progressBarValue = 0;
	progressBarClass = "";

	balance_id = balance_id.replace("balance_", "");
	queryString = 'src/AppBundle/Controller/controller_account.php?updateBalance='
			+ balance_id
			+ "&newAmount="
			+ elem.value
			+ "&userId="
			+ sessionStorage.whyage65_user_id;

	$
			.get(
					queryString,
					function(response) {
						var message = response.message;
						checkSessionStillValid(response.message);
						if (message.indexOf("successfully") > -1) {

							$('#lbl_message').removeClass("alert-success")
									.addClass("display-none");

							accountTypeName = response.accountTypeName;

							goalAmount = response.goalAmount;

							balance = parseInt(elem.value);

							switch (accountTypeName) {

							case "Credit":

								break;
							case "Mortgages":
								
								break;
							default:
								if (parseInt(goalAmount) > 0) {
									if (parseInt(balance) > parseInt(goalAmount)) {
										progressBarValue = 100;
										progressBarClass = "goodProgressBar";
									} else {
										progressBarValue = (parseInt(balance) / parseInt(goalAmount)) * 100;
										if (progressBarValue < 33) {
											progressBarClass = "badProgressBar";
										} else if (progressBarValue > 32
												&& progressBarValue < 67) {
											progressBarClass = "normalProgressBar";
										} else {
											progressBarClass = "goodProgressBar";
										}
									}
								} else {
									if (parseInt(balance) > parseInt(goalAmount)
											|| parseInt(balance) == parseInt(goalAmount)) {
										progressBarValue = 100;
										progressBarClass = "goodProgressBar";
									} else {
										progressBarValue = 0;
										progressBarClass = "badProgressBar";
									}
								}
							}

							progressBarHtml = '<li  class="' + progressBarClass
									+ '" data-width="'
									+ parseInt(progressBarValue)
									+ '" data-target="100"></li>';
							// $('#progressbartd_' + budget_id
							// ).html(progressBarHtml);

							$('#progressbartd_' + balance_id).html("");
							// $('#progressbartd_6').html(progressBarHtml);
							$('#progressbartd_' + balance_id).html(
									progressBarHtml);

							$('.goodProgressBar').progressBar({
								shadow : true,
								percentage : true,
								animation : false,
								barColor : "#1ABC9C",
							});
							$('.badProgressBar').progressBar({
								shadow : true,
								percentage : true,
								animation : false,
								barColor : "#D95459",
							});
							$('.normalProgressBar').progressBar({
								shadow : true,
								percentage : true,
								animation : false,
								barColor : "#FFA800",
							});

							// update field id with new id userAccount_id
							elem.id = "balance_" + response.userAccount_id;

						} else {
							$('#lbl_message').text(message);
							$('#lbl_message').removeClass(
									"display-none alert-success").addClass(
									"alert-danger");

							$("html, body").animate({
								scrollTop : $("#lbl_message").offset().top
							}, "slow");

						}

					}, 'json');

}

function updateGoal(elem) {
	goal_id = elem.id;
	queryString = "";

	goal_id = goal_id.replace("goal_", "");

	if (parseInt(elem.value) < 0) {
		$('#lbl_message').text("Goal can't be negative");
		$('#lbl_message').removeClass("display-none alert-success").addClass(
				"alert-danger");

		$("html, body").animate({
			scrollTop : $("#lbl_message").offset().top
		}, "slow");
		return;
	}

	queryString = 'src/AppBundle/Controller/controller_account.php?updateGoal='
			+ goal_id + "&newAmount=" + elem.value + "&userId="
			+ sessionStorage.whyage65_user_id;

	$
			.get(
					queryString,
					function(response) {
						checkSessionStillValid(response.message);
						var message = response.message;
						if (message.indexOf("successfully") > -1) {
							$('#lbl_message').removeClass("alert-success")
									.addClass("display-none");

							accountTypeName = response.accountTypeName;

							balance = response.balance;

							goalAmount = parseInt(elem.value);

							switch (accountTypeName) {

							case "Credit":

								if (parseInt(balance) > parseInt(goalAmount)
										|| parseInt(balance) == parseInt(goalAmount)) {
									progressBarValue = 100;
									progressBarClass = "goodProgressBar";
								} else {
									progressBarValue = 0;
									progressBarClass = "badProgressBar";
								}

								break;
							case "Mortgages":
								if (parseInt(balance) > parseInt(goalAmount)
										|| parseInt(balance) == parseInt(goalAmount)) {
									progressBarValue = 100;
									progressBarClass = "goodProgressBar";
								} else {
									progressBarValue = 0;
									progressBarClass = "badProgressBar";
								}
								break;
							default:
								if (parseInt(goalAmount) > 0) {
									if (parseInt(balance) > parseInt(goalAmount)) {
										progressBarValue = 100;
										progressBarClass = "goodProgressBar";
									} else {
										progressBarValue = (parseInt(balance) / parseInt(goalAmount)) * 100;
										if (progressBarValue < 33) {
											progressBarClass = "badProgressBar";
										} else if (progressBarValue > 32
												&& progressBarValue < 67) {
											progressBarClass = "normalProgressBar";
										} else {
											progressBarClass = "goodProgressBar";
										}
									}
								} else {
									if (parseInt(balance) > parseInt(goalAmount)
											|| parseInt(balance) == parseInt(goalAmount)) {
										progressBarValue = 100;
										progressBarClass = "goodProgressBar";
									} else {
										progressBarValue = 0;
										progressBarClass = "badProgressBar";
									}

								}
							}

							progressBarHtml = '<li  class="' + progressBarClass
									+ '" data-width="'
									+ parseInt(progressBarValue)
									+ '" data-target="100"></li>';
							// $('#progressbartd_' + budget_id
							// ).html(progressBarHtml);

							$('#progressbartd_' + goal_id).html("");
							// $('#progressbartd_6').html(progressBarHtml);
							$('#progressbartd_' + goal_id)
									.html(progressBarHtml);

							$('.goodProgressBar').progressBar({
								shadow : true,
								percentage : true,
								animation : false,
								barColor : "#1ABC9C",
							});
							$('.badProgressBar').progressBar({
								shadow : true,
								percentage : true,
								animation : false,
								barColor : "#D95459",
							});
							$('.normalProgressBar').progressBar({
								shadow : true,
								percentage : true,
								animation : false,
								barColor : "#FFA800",
							});

						} else {
							$('#lbl_message').text(message);
							$('#lbl_message').removeClass(
									"display-none alert-success").addClass(
									"alert-danger");

							$("html, body").animate({
								scrollTop : $("#lbl_message").offset().top
							}, "slow");

						}

					}, 'json');

}



function updateInterestRate(elem) {
	interest_id = elem.id;
	queryString = "";

	interest_id = interest_id.replace("interest_", "");

	if (parseInt(elem.value) < 0) {
		$('#lbl_message').text("Interest can't be negative");
		$('#lbl_message').removeClass("display-none alert-success").addClass(
				"alert-danger");

		$("html, body").animate({
			scrollTop : $("#lbl_message").offset().top
		}, "slow");
		return;
	}

	queryString = 'src/AppBundle/Controller/controller_account.php?updateInterestRate='
			+ interest_id + "&newAmount=" + elem.value + "&userId="
			+ sessionStorage.whyage65_user_id;

	console.log(queryString);
	$
			.get(
					queryString,
					function(response) {
						checkSessionStillValid(response.message);
						var message = response.message;
						if (message.indexOf("successfully") > -1) {
							$('#lbl_message').removeClass("alert-success")
									.addClass("display-none");

							

						} else {
							$('#lbl_message').text(message);
							$('#lbl_message').removeClass(
									"display-none alert-success").addClass(
									"alert-danger");

							$("html, body").animate({
								scrollTop : $("#lbl_message").offset().top
							}, "slow");

						}

					}, 'json');

}


function populateAccount(accountType) {
	// get month
	queryString = "src/AppBundle/Controller/controller_account.php?populateUserAccounts="
			+ encodeURI(accountType)
			+ "&userId="
			+ sessionStorage.whyage65_user_id;

	console.log(queryString);

	switch (accountType) {
	case "Bank Accounts":
		tableid = "bank_accounts";
		break;
	case "Credit":
		tableid = "credit";
		break;
	case "Investments":
		tableid = "investments";
		break;
	case "Mortgages":
		tableid = "mortgage";
		break;
	case "Properties":
		tableid = "property";
		break;
	case "Vehicles":
		tableid = "vehicles";
		break;
	default:
		// code block
	}

	$("#" + tableid).load(queryString, function(response) {
		checkSessionStillValid(response);
		$('.goodProgressBar').progressBar({
			shadow : true,
			percentage : true,
			animation : false,
			barColor : "#1ABC9C",
		});
		$('.badProgressBar').progressBar({
			shadow : true,
			percentage : true,
			animation : false,
			barColor : "#D95459",
		});
		$('.normalProgressBar').progressBar({
			shadow : true,
			percentage : true,
			animation : false,
			barColor : "#FFA800",
		});

	});
}

function populateAccountTypes() {
	$("#select_accounttypes")
			.load(
					"src/AppBundle/Controller/controller_account.php?populateAccountTypeSelect=true",
					function(response) {
						checkSessionStillValid(response);
						$('#select_accounttypes').change(function(event) {

						});
					});
}

function hideNewTransaction() {
	$('#new_transaction_div').removeClass("display").addClass("display-none");

	$('#minusButton').removeClass("display").addClass("display-none");

	$('#plusButton').removeClass("display-none").addClass("display");

}

function showNewTransaction() {
	$('#new_transaction_div').removeClass("display-none").addClass("display");

	$('#plusButton').removeClass("display").addClass("display-none");

	$('#minusButton').removeClass("display-none").addClass("display");

}
