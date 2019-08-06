var monthNames = ["January", "February", "March", "April", "May", "June",
	  "July", "August", "September", "October", "November", "December"
	];

var globalMonth ="";

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
	
	myDate = new Date();
	$('#current_month').html(monthNames[myDate.getMonth()]);
	$('#current_year').html(myDate.getFullYear());
	
	//populateCategories();
	populateAllBudget();
	
	$('#budget_form').submit(function(event) {
		// stop the form from submitting the normal way and refreshing
		// the page
		event.preventDefault();
		captureNewBudgetItem();
	});
	
	$("#budget_form").keypress(function(e) {
		  //Enter key
		  if (e.which == 13) {
		    return false;
		  }
		});
	
	
	$( ".previous-month" ).click(function() {
		currentMonth = $('#current_month').html();
		currentYear =  $('#current_year').html();
		
		  newMonth = getNextMonth(currentMonth,"back");
		  newYear = getNextYear(currentMonth,currentYear,"back");
		  
		  $('#current_month').html(newMonth);
		  $('#current_year').html(newYear);
			
		  populateAllBudget();
		});
	
	$( ".following-month" ).click(function() {
		
		currentMonth = $('#current_month').html();
		currentYear =  $('#current_year').html();
		
		  newMonth = getNextMonth(currentMonth,"forward");
		  newYear = getNextYear(currentMonth,currentYear,"forward");
		  
		  $('#current_month').html(newMonth);
		  $('#current_year').html(newYear);
			
		  populateAllBudget();
		});
	
	
	$(".category-li").click(function() {

		var contentDivX = $(".tab-content-in").position().top;
		var categoryDivX = $(".category-filter-div").position().top;
		if (contentDivX > categoryDivX) {
			$("html, body").animate({
				scrollTop : $(".tab-content-in").offset().top
			}, "slow");
		}
	});
	
	populateCategories();
	populateTransactionNameSelect();	
	
	//check url for add budget item option
	if(getUrlParameter("addBudgetItem")){
		showNewTransaction();
	};
	
	showFadingMessage("Budget items with zero won't be usable on the transactions window");

});


function showFadingMessage(message){
	$("#fading_message").html(message);
	$("#fading_message").show().delay(10000).fadeOut();
}


function captureNewBudgetItem() {

	$
			.post(
					'src/AppBundle/Controller/controller_budget.php?captureNewBudgetItem=true',
					$('#budget_form').serialize(), function(response) {
						
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
							populateBudget(selectedCategory);
							
							
							
						} else {
							$('#lbl_message').text(message);
							$('#lbl_message').removeClass(
									"display-none alert-success").addClass(
									"alert-danger");
							
							var contentDivX = $(".tab-content-in").position().top;
							var categoryDivX = $(".category-filter-div").position().top;

							// alert("content x :" + contentDivX + " " + categoryDivX);

							if (contentDivX > categoryDivX) {
								$("html, body").animate({
									scrollTop : $("#lbl_message").offset().top
								}, "slow");
							}
							
						}

						

					}, 'json');
}

function updateBudget(elem, previousValue){
	//alert(elem.id);
	
	//alert("clicked");
	budget_id = elem.id;
	queryString = "";
	categoryName = elem.classList.value.replace("budgetInputBox ", "");
	
	if (budget_id.includes("transaction_")) {
		budget_id = budget_id.replace("transaction_","");
		queryString = 'src/AppBundle/Controller/controller_budget.php?createBudget='+ budget_id + "&newAmount=" + elem.value + "&userId=" + sessionStorage.whyage65_user_id;
	}else{
		budget_id = budget_id.replace("budget_","");
		queryString = 'src/AppBundle/Controller/controller_budget.php?updateBudget='+ budget_id + "&newAmount=" + elem.value;
	}
	

	$
			.get(queryString,
					function(response) {
				
						var message = response.message;
						checkSessionStillValid(response.message);
						if (message
								.indexOf("successfully") > -1) {
							
							
							
							populateBudgetOverallCategory(categoryName);
							populateIncomeVsBudgetProgress();

							// refresh
							// the
							// updated
							// category

							//update progress bar
							
							//get spent amount
							var totalspentElement = document.getElementById("totalspent_" + budget_id);
							totalspent = parseInt(totalspentElement.innerText);
							//get td for progress bar
							progressBarValue = 0;
							progressBarClass = "badProgressBar";
							
							if (totalspent > parseInt(elem.value)) {
                                progressBarValue = 100;
                            } else {
                                progressBarValue = (totalspent / parseInt(elem.value)) * 100;
                                if (progressBarValue < 33) {
                                    progressBarClass = "goodProgressBar";
                                } else if (progressBarValue > 32 && progressBarValue < 67) {
                                    progressBarClass = "normalProgressBar";
                                }
                            }
							
							progressBarHtml = '<li  class="' + progressBarClass + '" data-width="' + parseInt(progressBarValue) + '" data-target="100"></li>';
							//$('#progressbartd_' + budget_id ).html(progressBarHtml);
							
							$('#progressbartd_' + budget_id).html("");
							//$('#progressbartd_6').html(progressBarHtml);
							$('#progressbartd_' + budget_id ).html(progressBarHtml);
							
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
							
							$(
							'#lbl_message')
							.text(
									"");
					$(
							'#lbl_message')
							.removeClass(
									"alert-success")
							.addClass(
									"display-none");
						} else {
							
							elem.value = previousValue;
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
							
							$("html, body")
							.animate(
									{
										scrollTop : $(
												"#lbl_message")
												.offset().top
									},
									"slow");
							
						}

						

					}, 'json');
	
	
}


function populateAllBudget() {
	populateBudget("Personal Expenses");
	populateBudget("Loan Pay Down");
	populateBudget("Investments");
	populateBudget("Income");
	populateBudget("Business Expenses");
	populateIncomeVsBudgetProgress();
}





function populateBudget(category) {
	// get month
	selectedMonth = "";
	selectedYear = "";
	tableid = "";
	try {
		selectedMonth = $('#current_month').html();
		selectedYear =  $('#current_year').html();

		globalMonth = selectedMonth;
		indexOfCurrentMonth = monthNames.findIndex(checkMonth) + 1;
		
	} catch (err) {
		selectedMonth = "now";
		selectedYear = "now";
	}

	queryString = "src/AppBundle/Controller/controller_budget.php?populateUserBudgetForMonth="
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
						
						var previous;
						
						$(".budgetInputBox").on('focus', function () {
						    previous = this.value;
						}).change(function() {
						    
						    //previous = this.value;
						    updateBudget(this, previous);
						});
					
					});
}




function populateBudgetOverallCategory(category) {
	// get month
	selectedMonth = "";
	selectedYear = "";
	tableid = "";
	try {
		selectedMonth = $('#current_month').html();
		selectedYear =  $('#current_year').html();

		globalMonth = selectedMonth;
		indexOfCurrentMonth = monthNames.findIndex(checkMonth) + 1;
		
	} catch (err) {
		selectedMonth = "now";
		selectedYear = "now";
	}

	
		// code block
	
	categoryName = "";
	switch (category) {
	case "businessexpenses":
		categoryName = "Business Expenses";
		break;
	case "income":
		categoryName = "Income";
		break;
	case "nnvestments":
		categoryName = "Investment";
		break;
	case "paydown":
		categoryName = "paydownLoan Pay Down";
		break;
	case "personalexpenses":
		categoryName = "Personal Expenses";
		break;
	default:
		// code block
	}
	
	queryString = "src/AppBundle/Controller/controller_budget.php?populateBudgetOverallCategory="
		+ encodeURI(categoryName)
		+ "&userId="
		+ sessionStorage.whyage65_user_id
		+ "&selectedmonth="
		+ indexOfCurrentMonth + "&selectedyear=" + selectedYear;

	
	tableid = "category_prgress_div_" + category;
	$("#" + tableid)
			.load(
					queryString,
					function(response) {
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



function populateIncomeVsBudgetProgress() {
	// get month
	selectedMonth = "";
	selectedYear = "";
	tableid = "";
	try {
		selectedMonth = $('#current_month').html();
		selectedYear =  $('#current_year').html();

		globalMonth = selectedMonth;
		indexOfCurrentMonth = monthNames.findIndex(checkMonth) + 1;
		
	} catch (err) {
		selectedMonth = "now";
		selectedYear = "now";
	}

	
	
	queryString = "src/AppBundle/Controller/controller_budget.php?populateIncomeVsBudgetProgress=yes"
		+ "&selectedmonth="
		+ indexOfCurrentMonth + "&selectedyear=" + selectedYear;

	
	tableid = "incomevsbudget_div";
	$("#" + tableid)
			.load(
					queryString,
					function(response) {
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



function checkMonth(month){
	return month.includes(globalMonth);
}

function getNextMonth(currentMonth,direction){
	globalMonth = currentMonth;
	indexOfCurrentMonth = monthNames.findIndex(checkMonth)
	
	//indexOfCurrentMonth = monthNames.findIndex(currentMonth);
	console.log(indexOfCurrentMonth);
	
	if(direction.includes('forward')){
		indexOfCurrentMonth = indexOfCurrentMonth + 1;
	}else{
		indexOfCurrentMonth = indexOfCurrentMonth - 1;
	}
	
	
	
	if(currentMonth.includes('January') &&  direction.includes('back')){
		indexOfCurrentMonth = 11;
	}
	
	if(currentMonth.includes('December') &&  direction.includes('forward')){
		indexOfCurrentMonth = 0;
	}
	
	newMonth = monthNames[indexOfCurrentMonth];
	

	return newMonth; 
}


function getNextYear(currentMonth, currentYear,direction){
	
	//get year
	if(currentMonth.includes('January') &&  direction.includes('back')){
		currentYear = currentYear - 1;
		return currentYear;
	}
	
	if(currentMonth.includes('December') &&  direction.includes('forward')){
		currentYear = currentYear + 1;
		return currentYear;
	}
	
	
	return currentYear;
}



function populateTransactionNameSelect(category) {
	$("#select_transactions")
			.load(
					"src/AppBundle/Controller/controller_budget.php?populateTransactionNameSelect="
							+ encodeURI(category) + "&UserId=" + sessionStorage.whyage65_user_id, function(response) {
								checkSessionStillValid(response);
								$('#select_transactions').change(
										function(event) {
											var selectedTransaction = $(this).children("option:selected").val();
											if(selectedTransaction.includes("new_custom")){
												window.location.href = "config.html";
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
