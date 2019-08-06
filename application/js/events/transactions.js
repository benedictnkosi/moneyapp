var monthNames = [ "January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December" ];

var globalMonth = "";

$(document).ready(
		function() {
			
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
			

			sessionStorage.popupOpen = 0;
			sessionStorage.closePopUpClicked = 0;
			
			myDate = new Date();

			const monthNames = [ "January", "February", "March", "April",
					"May", "June", "July", "August", "September", "October",
					"November", "December" ];

			$('#userID').val(sessionStorage.whyage65_user_id);
			$('#current_month').html(monthNames[myDate.getMonth()]);
			$('#current_year').html(myDate.getFullYear());

			// process the form
			$('#transaction_form').submit(function(event) {
				// stop the form from submitting the normal way and refreshing
				// the page
				event.preventDefault();
				captureNewTransaction();
			});
			
			$("#transaction_form").keypress(function(e) {
				  //Enter key
				  if (e.which == 13) {
				    return false;
				  }
				});
			

			populateCategories();
			populateAllTransactions();

			$(".previous-month").click(function() {
				currentMonth = $('#current_month').html();
				currentYear = $('#current_year').html();

				newMonth = getNextMonth(currentMonth, "back");
				newYear = getNextYear(currentMonth, currentYear, "back");

				$('#current_month').html(newMonth);
				$('#current_year').html(newYear);

				populateAllTransactions();
			});

			$(".following-month").click(function() {

				currentMonth = $('#current_month').html();
				currentYear = $('#current_year').html();

				newMonth = getNextMonth(currentMonth, "forward");
				newYear = getNextYear(currentMonth, currentYear, "forward");

				$('#current_month').html(newMonth);
				$('#current_year').html(newYear);

				populateAllTransactions();
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
			
			showFadingMessage("Set up your budget before you add transactions");

		});


function showFadingMessage(message){
	$("#fading_message").html(message);
$("#fading_message").show().delay(10000).fadeOut();
}



function populateAllTransactions() {
	populateTransactions("Personal Expenses");
	populateTransactions("Loan Pay Down");
	populateTransactions("Investments");
	populateTransactions("Income");
	populateTransactions("Business Expenses");
}

function populateTransactions(category) {
	// get month
	selectedMonth = "";
	selectedYear = "";
	tableid = "";
	try {
		selectedMonth = $('#current_month').html();
		selectedYear = $('#current_year').html();

		globalMonth = selectedMonth;
		indexOfCurrentMonth = monthNames.findIndex(checkMonth) + 1;

	} catch (err) {
		selectedMonth = "now";
		selectedYear = "now";
	}

	queryString = "src/AppBundle/Controller/controller_transaction.php?populateUserTransactionsForMonth="
			+ encodeURI(category)
			+ "&userId="
			+ sessionStorage.whyage65_user_id
			+ "&selectedmonth="
			+ indexOfCurrentMonth + "&selectedyear=" + selectedYear;

	console.log(queryString);

	switch (category) {
	case "Business Expenses":
		tableid = "business_expenses";
		break;
	case "Income":
		tableid = "income";
		break;
	case "Investments":
		tableid = "investment";
		break;
	case "Loan Pay Down":
		tableid = "paydown";
		break;
	case "Personal Expenses":
		tableid = "personal_expenses";
		break;
	default:
		// code block
	}
	
	$("#" + tableid)
	.load(
			queryString,
			function(response) {
				checkSessionStillValid(response);

	
			});
	

}


function closepopup(elem){
	transaction_id = elem.id;
	transaction_id = transaction_id.replace("close_popup_button_", "");
	
	var popup = document.getElementById("myPopup_" + transaction_id);
	popup.classList.toggle("show");
	sessionStorage.popupOpen = 0;
	sessionStorage.closePopUpClicked = 1;
	
}


function showPopUp(elem) {
	transaction_id = elem.id;
	transaction_id = transaction_id.replace("popup_", "");
	
  var popup = document.getElementById("myPopup_" + transaction_id);
  if(sessionStorage.popupOpen.includes("0") && sessionStorage.closePopUpClicked.includes("0")){
	  popup.classList.toggle("show");
	  sessionStorage.popupOpen = 1;
  }else{
	  sessionStorage.closePopUpClicked = 0;
  }
  
}

function updateDescription(elem) {

	// alert("clicked");
	transaction_id = elem.id;
	transaction_id = transaction_id.replace("description_", "");

	description = elem.value;
	if (description.length < 1) {
		var popup = document.getElementById("myPopup_" + transaction_id);
		popup.classList.toggle("show");
		sessionStorage.popupOpen = 0;
		return;
	}
	
	$.get(
			'src/AppBundle/Controller/controller_transaction.php?updateDescription='
					+ transaction_id + "&description=" + description, function(response) {
				checkSessionStillValid(response.message);
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

				var popup = document.getElementById("myPopup_" + transaction_id);
				
				popup.classList.toggle("show");
				sessionStorage.popupOpen = 0;
				
				//update description label
				$('#descriptionP_' + transaction_id ).html(description);
				
				$("html, body").animate({
					scrollTop : $("#lbl_message").offset().top
				}, "slow");

			}, 'json');
}

function deleteTranscaction(elem) {

	// alert("clicked");
	transaction_id = elem.id;
	transaction_id = transaction_id.replace("delete_transaction_", "");
	$.get(
			'src/AppBundle/Controller/controller_transaction.php?deleteTransaction='
					+ transaction_id, function(response) {
						checkSessionStillValid(response.message);
				var message = response.message;
				if (message.indexOf("successfully") > -1) {
					$('#lbl_message').text(message);
					$('#lbl_message').removeClass("display-none alert-danger")
							.addClass("alert-success");

					// refresh
					// the
					// updated
					// category

					populateTransactions(response.category);
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
function captureNewTransaction() {

	$
			.post(
					'src/AppBundle/Controller/controller_transaction.php?captureNewTransaction=true',
					$('#transaction_form').serialize(), function(response) {
						checkSessionStillValid(response.message);
						var message = response.message;
						if (message.indexOf("successfully") > -1) {
							$('#lbl_message').text(message);
							$('#lbl_message').removeClass(
									"display-none alert-danger").addClass(
									"alert-success");

							// refresh the updated category
							var selectedCategory = $('#select_categories')
									.children("option:selected").val();
							populateTransactions(selectedCategory);
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
}

function populateTransactionNameSelect(category) {
	$("#select_transactions")
			.load(
					"src/AppBundle/Controller/controller_transaction.php?populateTransactionNameSelect="
							+ encodeURI(category) + "&UserId=" + sessionStorage.whyage65_user_id, function(response)
							{checkSessionStillValid(response);
								$('#select_transactions').change(
										function(event) {
											var selectedTransaction = $(this).children("option:selected").val();
											if(selectedTransaction.includes("new_custom")){
												window.location.href = "budget.html?addBudgetItem=true";
											}
										});
					});
}

function populateCategories() {
	$("#select_categories")
			.load(
					"src/AppBundle/Controller/controller_transaction.php?populateCategoriesSelect=true",
					function(response) {
						checkSessionStillValid(response);
						$('#select_categories')
								.change(
										function(event) {
											var selectedCategory = $(this)
													.children("option:selected")
													.val();
											populateTransactionNameSelect(selectedCategory);
										});

						$("#select_categories").val("Personal Expenses");
						populateTransactionNameSelect("Personal Expenses");

						// populate transacton capture defaul date
						var today = new Date();
						var dd = today.getDate();

						$('#datepicker').val(
								today.getMonth() + 1 + "/" + today.getDate()
										+ "/" + today.getFullYear());

					});
}

function checkMonth(month) {
	return month.includes(globalMonth);
}

function getNextMonth(currentMonth, direction) {
	globalMonth = currentMonth;
	indexOfCurrentMonth = monthNames.findIndex(checkMonth)

	// indexOfCurrentMonth = monthNames.findIndex(currentMonth);
	console.log(indexOfCurrentMonth);

	if (direction.includes('forward')) {
		indexOfCurrentMonth = indexOfCurrentMonth + 1;
	} else {
		indexOfCurrentMonth = indexOfCurrentMonth - 1;
	}

	if (currentMonth.includes('January') && direction.includes('back')) {
		indexOfCurrentMonth = 11;
	}

	if (currentMonth.includes('December') && direction.includes('forward')) {
		indexOfCurrentMonth = 0;
	}

	newMonth = monthNames[indexOfCurrentMonth];

	return newMonth;
}

function getNextYear(currentMonth, currentYear, direction) {

	// get year
	if (currentMonth.includes('January') && direction.includes('back')) {
		currentYear = currentYear - 1;
		return currentYear;
	}

	if (currentMonth.includes('December') && direction.includes('forward')) {
		currentYear = currentYear + 1;
		return currentYear;
	}

	return currentYear;
}


function hideNewTransaction(){
	$('#new_transaction_div').removeClass(
	"display").addClass(
	"display-none");
	
	$('#minusButton').removeClass(
	"display").addClass(
	"display-none");
	
	$('#plusButton').removeClass(
	"display-none").addClass(
	"display");
	
}


function showNewTransaction(){
	$('#new_transaction_div').removeClass(
	"display-none").addClass(
	"display");
	
	
	$('#plusButton').removeClass(
	"display").addClass(
	"display-none");
	
	$('#minusButton').removeClass(
	"display-none").addClass(
	"display");
	
	
}