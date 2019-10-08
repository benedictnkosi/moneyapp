warning: LF will be replaced by CRLF in application/.gitignore.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in application/.htaccess.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in application/app/application.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in application/bootstrap.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in application/js/commons.js.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in application/js/events/budget.js.
The file will have its original line endings in your working directory
[1mdiff --git a/application/.gitignore b/application/.gitignore[m
[1mindex c279389..0a68b40 100644[m
[1m--- a/application/.gitignore[m
[1m+++ b/application/.gitignore[m
[36m@@ -9,3 +9,4 @@[m
 /composer.phar[m
 /vendor/[m
 /web/bundles/[m
[32m+[m[32m/bootstrap.php[m
[1mdiff --git a/application/.htaccess b/application/.htaccess[m
[1mindex 1dd052c..a2706fc 100644[m
[1m--- a/application/.htaccess[m
[1m+++ b/application/.htaccess[m
[36m@@ -6,11 +6,13 @@[m [mOptions +FollowSymlinks[m
 RewriteEngine on[m
 [m
 # map neat URL to internal URL[m
[31m-RewriteRule ^newuser/(.+)/(.+)/(.+)/$   /src/AppBundle/Controller/controller_security.php?register=$1&password=$2&confirm=$3 [nc,qsa][m
[31m-RewriteRule ^getuser/(.+)/$   /src/AppBundle/Controller/controller_security.php?getuser=$1 [nc,qsa][m
[32m+[m[32mRewriteRule ^newuser/(.+)/(.+)/(.+)/$   src/AppBundle/Controller/controller_security.php?register=$1&password=$2&confirm=$3 [nc,qsa][m
[32m+[m[32mRewriteRule ^getuser/$   /src/AppBundle/Controller/controller_security.php?getuser=true [nc,qsa][m
 RewriteRule ^login/(.+)/(.+)/$   /src/AppBundle/Controller/controller_security.php?login=$1&password=$2 [nc,qsa][m
 RewriteRule ^logout/$   /src/AppBundle/Controller/controller_security.php?logout=true [nc,qsa][m
[31m-RewriteRule ^logout   /src/AppBundle/Controller/controller_security.php?logout=true [nc,qsa][m
[32m+[m[32mRewriteRule ^getcategories/$   /src/AppBundle/Controller/controller_transaction.php?getCategories=true [nc,qsa][m
[32m+[m[32mRewriteRule ^gettransactionnames/(.+)/(.+)/$   /src/AppBundle/Controller/controller_budget.php?getTransactionNames=$1&UserId=$2 [nc,qsa][m
[32m+[m
 [m
 # php -- BEGIN cPanel-generated handler, do not edit[m
 # NOTE this account's php is controlled via FPM and the vhost, this is a place holder.[m
[1mdiff --git a/application/app/application.php b/application/app/application.php[m
[1mindex 516adff..b1b0837 100644[m
[1m--- a/application/app/application.php[m
[1m+++ b/application/app/application.php[m
[36m@@ -54,9 +54,9 @@[m [mdefine("DB_HOST", "localhost");[m
 [m
 define("DB_NAME", "sixtylee_moneyapp_preprod");[m
 [m
[31m-define("DB_USER", "sixtylee_user");[m
[32m+[m[32mdefine("DB_USER", "root");[m
 [m
[31m-define("DB_PASSWORDWORD", ")*kTmcMYz7zB");[m
[32m+[m[32mdefine("DB_PASSWORDWORD", "");[m
 [m
 define("ADMIN_AUTH_CODE", "591f5e3b9b48a");[m
 [m
[1mdiff --git a/application/bootstrap.php b/application/bootstrap.php[m
[1mindex be667ec..5e9acbb 100644[m
[1m--- a/application/bootstrap.php[m
[1m+++ b/application/bootstrap.php[m
[36m@@ -12,8 +12,8 @@[m [m$config    = Setup::createXMLMetadataConfiguration(array(__DIR__."/src/AppBundle[m
 // database configuration parameters[m
 $conn = array([m
     'driver'   => 'pdo_mysql',[m
[31m-    'user'     => 'sixtylee_user',[m
[31m-    'password' => ')*kTmcMYz7zB',[m
[32m+[m[32m    'user'     => 'root',[m
[32m+[m[32m    'password' => '',[m
     'dbname'   => 'sixtylee_moneyapp_preprod',[m
 	'host' => 'localhost',[m
 );[m
[1mdiff --git a/application/js/commons.js b/application/js/commons.js[m
[1mindex 4a09453..5fa88fa 100644[m
[1m--- a/application/js/commons.js[m
[1m+++ b/application/js/commons.js[m
[36m@@ -11,14 +11,11 @@[m [mfunction getUrlParameter(sParam) {[m
 	return false;[m
 }[m
 [m
[31m-[m
 function saveCookieToSession() {[m
 	var JsonCookie = jQuery.parseJSON(unescape(getCookie("whyage65_moneyapp")));[m
 	sessionStorage.whyage65_username = JsonCookie['username'];[m
 	sessionStorage.whyage65_user_id = JsonCookie['user_id'];[m
[31m-	}[m
[31m-[m
[31m-[m
[32m+[m[32m}[m
 [m
 function getCookie(cname) {[m
 	var name = cname + "=";[m
[36m@@ -51,48 +48,88 @@[m [mfunction replaceParameter(strKey, strValue) {[m
 	return allParameters;[m
 }[m
 [m
[31m-function getNextMonth(currentMonth,direction){[m
[31m-	const monthNames = ["January", "February", "March", "April", "May", "June",[m
[31m-		  "July", "August", "September", "October", "November", "December"[m
[31m-		];[m
[31m-	[m
[32m+[m[32mfunction getNextMonth(currentMonth, direction) {[m
[32m+[m	[32mconst monthNames = [ "January", "February", "March", "April", "May",[m
[32m+[m			[32m"June", "July", "August", "September", "October", "November",[m
[32m+[m			[32m"December" ];[m
[32m+[m
 	indexOfCurrentMonth = monthNames.findIndex(currentMonth);[m
 	console.log(indexOfCurrentMonth);[m
[31m-	[m
[31m-	if(direction.includes('forward')){[m
[32m+[m
[32m+[m	[32mif (direction.includes('forward')) {[m
 		indexOfCurrentMonth = indexOfCurrentMonth + 1;[m
[31m-	}else{[m
[32m+[m	[32m} else {[m
 		indexOfCurrentMonth = indexOfCurrentMonth - 1;[m
 	}[m
[31m-	[m
[31m-	[m
[31m-	[m
[31m-	if(currentMonth.includes('January') &&  direction.includes('back')){[m
[32m+[m
[32m+[m	[32mif (currentMonth.includes('January') && direction.includes('back')) {[m
 		indexOfCurrentMonth = 11;[m
 	}[m
[31m-	[m
[31m-	if(currentMonth.includes('December') &&  direction.includes('forward')){[m
[32m+[m
[32m+[m	[32mif (currentMonth.includes('December') && direction.includes('forward')) {[m
 		indexOfCurrentMonth = 0;[m
 	}[m
[31m-	[m
[32m+[m
 	newMonth = monthNames[indexOfCurrentMonth];[m
[31m-	[m
 [m
[31m-	return newMonth; [m
[32m+[m	[32mreturn newMonth;[m
 }[m
 [m
[32m+[m[32mfunction getNextYear(currentMonth, currentYear, direction) {[m
 [m
[31m-function getNextYear(currentMonth, currentYear,direction){[m
[31m-	[m
[31m-	//get year[m
[31m-	if(currentMonth.includes('January') &&  direction.includes('back')){[m
[32m+[m	[32m// get year[m
[32m+[m	[32mif (currentMonth.includes('January') && direction.includes('back')) {[m
 		currentYear = currentYear - 1;[m
 	}[m
[31m-	[m
[31m-	if(currentMonth.includes('December') &&  direction.includes('forward')){[m
[32m+[m
[32m+[m	[32mif (currentMonth.includes('December') && direction.includes('forward')) {[m
 		currentYear = currentYear + 1;[m
 	}[m
[32m+[m
[32m+[m	[32mreturn[m[41m [m
[32m+[m
[32m+[m[41m	[m
[32m+[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32mfunction populateDropdown(element, jsonData, href, callback) {[m
[32m+[m	[32m$.each(jsonData, function(i, obj) {[m
[32m+[m		[32melement.append(new Option(obj.text, obj.value));[m
[32m+[m	[32m});[m
 	[m
[32m+[m	[32mcallback(element, href);[m
 	return [m
[32m+[m
[32m+[m[41m	[m
[32m+[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32mfunction addEvent(element, href) {[m
[32m+[m
[32m+[m
[32m+[m	[32mif(element.id.localeCompare("select_categories") == 0 ){[m
[32m+[m		[32mpopulateTransactionNameSelectJson("Personal Expenses");[m
[32m+[m	[32m}[m
[32m+[m[41m	[m
[32m+[m[41m	[m
[32m+[m	[32m$("#" + element.id).change(function() {[m
[32m+[m		[32mvar selectedTransaction = $(this).children("option:selected").val();[m
[32m+[m		[32mif (selectedTransaction.includes("new_custom")) {[m
[32m+[m			[32mwindow.location.href = href;[m
[32m+[m		[32m}[m
[32m+[m[41m		[m
[32m+[m		[32mif(element.id.localeCompare("select_categories") == 0 ){[m
[32m+[m			[32mvar selectedCategory = $("#" + element.id)[m
[32m+[m			[32m.children("option:selected")[m
[32m+[m			[32m.val();[m
[32m+[m			[32mpopulateTransactionNameSelectJson(selectedCategory);[m
[32m+[m		[32m}[m
[32m+[m	[32m});[m
[32m+[m[41m	[m
[32m+[m[41m	[m
[32m+[m[41m	[m
[32m+[m[41m	[m
[32m+[m
[32m+[m
 }[m
 [m
[1mdiff --git a/application/js/events/budget.js b/application/js/events/budget.js[m
[1mindex d4e0634..dc98515 100644[m
[1m--- a/application/js/events/budget.js[m
[1m+++ b/application/js/events/budget.js[m
[36m@@ -1,111 +1,127 @@[m
[31m-var monthNames = ["January", "February", "March", "April", "May", "June",[m
[31m-	  "July", "August", "September", "October", "November", "December"[m
[31m-	];[m
[32m+[m[32mvar monthNames = [ "January", "February", "March", "April", "May", "June",[m
[32m+[m		[32m"July", "August", "September", "October", "November", "December" ];[m
[32m+[m
[32m+[m[32mvar globalMonth = "";[m
[32m+[m
[32m+[m[32m$(document)[m
[32m+[m		[32m.ready([m
[32m+[m				[32mfunction() {[m
[32m+[m
[32m+[m					[32mvar contentDivX = $(".tab-content-in").position().top;[m
[32m+[m					[32mvar categoryDivX = $(".category-filter-div").position().top;[m
[32m+[m					[32mvar mobileNav = document.getElementById("mobile_nav");[m
[32m+[m					[32mvar desktopNav = document.getElementById("desktop_nav");[m
[32m+[m					[32mif (contentDivX > categoryDivX) {[m
[32m+[m						[32mmobileNav.style.display = "block";[m
[32m+[m						[32mdesktopNav.style.display = "none";[m
[32m+[m					[32m} else {[m
[32m+[m						[32mdesktopNav.style.display = "block";[m
[32m+[m						[32mmobileNav.style.display = "none";[m
[32m+[m					[32m}[m
[32m+[m
[32m+[m					[32mmyDate = new Date();[m
[32m+[m					[32m$('#current_month').html(monthNames[myDate.getMonth()]);[m
[32m+[m					[32m$('#current_year').html(myDate.getFullYear());[m
[32m+[m
[32m+[m					[32m// populateCategories();[m
[32m+[m					[32mpopulateAllBudget();[m
[32m+[m
[32m+[m					[32m$('#budget_form').submit(function(event) {[m
[32m+[m						[32m// stop the form from submitting the normal way and[m
[32m+[m						[32m// refreshing[m
[32m+[m						[32m// the page[m
[32m+[m						[32mevent.preventDefault();[m
[32m+[m						[32mcaptureNewBudgetItem();[m
[32m+[m					[32m});[m
 [m
[31m-var globalMonth ="";[m
[32m+[m					[32m$("#budget_form").keypress(function(e) {[m
[32m+[m						[32m// Enter key[m
[32m+[m						[32mif (e.which == 13) {[m
[32m+[m							[32mreturn false;[m
[32m+[m						[32m}[m
[32m+[m					[32m});[m
 [m
[31m-$(document).ready(function() {[m
[32m+[m					[32m$(".previous-month").click([m
[32m+[m							[32mfunction() {[m
[32m+[m								[32mcurrentMonth = $('#current_month').html();[m
[32m+[m								[32mcurrentYear = $('#current_year').html();[m
 [m
[31m-	[m
[31m-	var contentDivX = $(".tab-content-in").position().top;[m
[31m-	var categoryDivX = $(".category-filter-div").position().top;[m
[31m-	var mobileNav = document.getElementById("mobile_nav");[m
[31m-	var desktopNav = document.getElementById("desktop_nav");[m
[31m-	if (contentDivX > categoryDivX) {[m
[31m-		mobileNav.style.display = "block";[m
[31m-		desktopNav.style.display = "none";[m
[31m-	}else{[m
[31m-		desktopNav.style.display = "block";[m
[31m-		mobileNav.style.display = "none";[m
[31m-	}[m
[31m-	[m
[31m-	myDate = new Date();[m
[31m-	$('#current_month').html(monthNames[myDate.getMonth()]);[m
[31m-	$('#current_year').html(myDate.getFullYear());[m
[31m-	[m
[31m-	//populateCategories();[m
[31m-	populateAllBudget();[m
[31m-	[m
[31m-	$('#budget_form').submit(function(event) {[m
[31m-		// stop the form from submitting the normal way and refreshing[m
[31m-		// the page[m
[31m-		event.preventDefault();[m
[31m-		captureNewBudgetItem();[m
[31m-	});[m
[31m-	[m
[31m-	$("#budget_form").keypress(function(e) {[m
[31m-		  //Enter key[m
[31m-		  if (e.which == 13) {[m
[31m-		    return false;[m
[31m-		  }[m
[31m-		});[m
[31m-	[m
[31m-	[m
[31m-	$( ".previous-month" ).click(function() {[m
[31m-		currentMonth = $('#current_month').html();[m
[31m-		currentYear =  $('#current_year').html();[m
[31m-		[m
[31m-		  newMonth = getNextMonth(currentMonth,"back");[m
[31m-		  newYear = getNextYear(currentMonth,currentYear,"back");[m
[31m-		  [m
[31m-		  $('#current_month').html(newMonth);[m
[31m-		  $('#current_year').html(newYear);[m
[31m-			[m
[31m-		  populateAllBudget();[m
[31m-		});[m
[31m-	[m
[31m-	$( ".following-month" ).click(function() {[m
[31m-		[m
[31m-		currentMonth = $('#current_month').html();[m
[31m-		currentYear =  $('#current_year').html();[m
[31m-		[m
[31m-		  newMonth = getNextMonth(currentMonth,"forward");[m
[31m-		  newYear = getNextYear(currentMonth,currentYear,"forward");[m
[31m-		  [m
[31m-		  $('#current_month').html(newMonth);[m
[31m-		  $('#current_year').html(newYear);[m
[31m-			[m
[31m-		  populateAllBudget();[m
[31m-		});[m
[31m-	[m
[31m-	[m
[31m-	$(".category-li").click(function() {[m
[32m+[m								[32mnewMonth = getNextMonth(currentMonth, "back");[m
[32m+[m								[32mnewYear = getNextYear(currentMonth,[m
[32m+[m										[32mcurrentYear, "back");[m
 [m
[31m-		var contentDivX = $(".tab-content-in").position().top;[m
[31m-		var categoryDivX = $(".category-filter-div").position().top;[m
[31m-		if (contentDivX > categoryDivX) {[m
[31m-			$("html, body").animate({[m
[31m-				scrollTop : $(".tab-content-in").offset().top[m
[31m-			}, "slow");[m
[31m-		}[m
[31m-	});[m
[31m-	[m
[31m-	populateCategories();[m
[31m-	populateTransactionNameSelect();	[m
[31m-	[m
[31m-	//check url for add budget item option[m
[31m-	if(getUrlParameter("addBudgetItem")){[m
[31m-		showNewTransaction();[m
[31m-	};[m
[31m-	[m
[31m-	showFadingMessage("Budget items with zero won't be usable on the transactions window");[m
[31m-[m
[31m-});[m
[32m+[m								[32m$('#current_month').html(newMonth);[m
[32m+[m								[32m$('#current_year').html(newYear);[m
 [m
[32m+[m								[32mpopulateAllBudget();[m
[32m+[m							[32m});[m
 [m
[31m-function showFadingMessage(message){[m
[32m+[m					[32m$(".following-month")[m
[32m+[m							[32m.click([m
[32m+[m									[32mfunction() {[m
[32m+[m
[32m+[m										[32mcurrentMonth = $('#current_month')[m
[32m+[m												[32m.html();[m
[32m+[m										[32mcurrentYear = $('#current_year').html();[m
[32m+[m
[32m+[m										[32mnewMonth = getNextMonth(currentMonth,[m
[32m+[m												[32m"forward");[m
[32m+[m										[32mnewYear = getNextYear(currentMonth,[m
[32m+[m												[32mcurrentYear, "forward");[m
[32m+[m
[32m+[m										[32m$('#current_month').html(newMonth);[m
[32m+[m										[32m$('#current_year').html(newYear);[m
[32m+[m
[32m+[m										[32mpopulateAllBudget();[m
[32m+[m									[32m});[m
[32m+[m
[32m+[m					[32m$(".category-li")[m
[32m+[m							[32m.click([m
[32m+[m									[32mfunction() {[m
[32m+[m
[32m+[m										[32mvar contentDivX = $(".tab-content-in")[m
[32m+[m												[32m.position().top;[m
[32m+[m										[32mvar categoryDivX = $([m
[32m+[m												[32m".category-filter-div")[m
[32m+[m												[32m.position().top;[m
[32m+[m										[32mif (contentDivX > categoryDivX) {[m
[32m+[m											[32m$("html, body")[m
[32m+[m													[32m.animate([m
[32m+[m															[32m{[m
[32m+[m																[32mscrollTop : $([m
[32m+[m																		[32m".tab-content-in")[m
[32m+[m																		[32m.offset().top[m
[32m+[m															[32m}, "slow");[m
[32m+[m										[32m}[m
[32m+[m									[32m});[m
[32m+[m
[32m+[m					[32mpopulateCategories();[m
[32m+[m					[32m//populateTransactionNameSelect();[m
[32m+[m					[32m//populateTransactionNameSelectJson();[m
[32m+[m
[32m+[m					[32m// check url for add budget item option[m
[32m+[m					[32mif (getUrlParameter("addBudgetItem")) {[m
[32m+[m						[32mshowNewTransaction();[m
[32m+[m					[32m}[m
[32m+[m					[32m;[m
[32m+[m
[32m+[m					[32mshowFadingMessage("Budget items with zero won't be usable on the transactions window");[m
[32m+[m
[32m+[m				[32m});[m
[32m+[m
[32m+[m[32mfunction showFadingMessage(message) {[m
 	$("#fading_message").html(message);[m
 	$("#fading_message").show().delay(10000).fadeOut();[m
 }[m
 [m
[31m-[m
 function captureNewBudgetItem() {[m
 [m
 	$[m
 			.post([m
 					'src/AppBundle/Controller/controller_budget.php?captureNewBudgetItem=true',[m
[31m-					$('#budget_form').serialize(), function(response) {[m
[31m-						[m
[32m+[m					[32m$('#budget_form').serialize(),[m
[32m+[m					[32mfunction(response) {[m
[32m+[m
 						checkSessionStillValid(response.message);[m
 						var message = response.message;[m
 						if (message.indexOf("successfully") > -1) {[m
[36m@@ -118,157 +134,135 @@[m [mfunction captureNewBudgetItem() {[m
 							var selectedCategory = $('#select_categories')[m
 									.children("option:selected").val();[m
 							populateBudget(selectedCategory);[m
[31m-							[m
[31m-							[m
[31m-							[m
[32m+[m
 						} else {[m
 							$('#lbl_message').text(message);[m
 							$('#lbl_message').removeClass([m
 									"display-none alert-success").addClass([m
 									"alert-danger");[m
[31m-							[m
[32m+[m
 							var contentDivX = $(".tab-content-in").position().top;[m
[31m-							var categoryDivX = $(".category-filter-div").position().top;[m
[32m+[m							[32mvar categoryDivX = $(".category-filter-div")[m
[32m+[m									[32m.position().top;[m
 [m
[31m-							// alert("content x :" + contentDivX + " " + categoryDivX);[m
[32m+[m							[32m// alert("content x :" + contentDivX + " " +[m
[32m+[m							[32m// categoryDivX);[m
 [m
 							if (contentDivX > categoryDivX) {[m
 								$("html, body").animate({[m
 									scrollTop : $("#lbl_message").offset().top[m
 								}, "slow");[m
 							}[m
[31m-							[m
[31m-						}[m
 [m
[31m-						[m
[32m+[m						[32m}[m
 [m
 					}, 'json');[m
 }[m
 [m
[31m-function updateBudget(elem, previousValue){[m
[31m-	//alert(elem.id);[m
[31m-	[m
[31m-	//alert("clicked");[m
[32m+[m[32mfunction updateBudget(elem, previousValue) {[m
[32m+[m	[32m// alert(elem.id);[m
[32m+[m
[32m+[m	[32m// alert("clicked");[m
 	budget_id = elem.id;[m
 	queryString = "";[m
 	categoryName = elem.classList.value.replace("budgetInputBox ", "");[m
[31m-	[m
[32m+[m
 	if (budget_id.includes("transaction_")) {[m
[31m-		budget_id = budget_id.replace("transaction_","");[m
[31m-		queryString = 'src/AppBundle/Controller/controller_budget.php?createBudget='+ budget_id + "&newAmount=" + elem.value + "&userId=" + sessionStorage.whyage65_user_id;[m
[31m-	}else{[m
[31m-		budget_id = budget_id.replace("budget_","");[m
[31m-		queryString = 'src/AppBundle/Controller/controller_budget.php?updateBudget='+ budget_id + "&newAmount=" + elem.value;[m
[32m+[m		[32mbudget_id = budget_id.replace("transaction_", "");[m
[32m+[m		[32mqueryString = 'src/AppBundle/Controller/controller_budget.php?createBudget='[m
[32m+[m				[32m+ budget_id[m
[32m+[m				[32m+ "&newAmount="[m
[32m+[m				[32m+ elem.value[m
[32m+[m				[32m+ "&userId="[m
[32m+[m				[32m+ sessionStorage.whyage65_user_id;[m
[32m+[m	[32m} else {[m
[32m+[m		[32mbudget_id = budget_id.replace("budget_", "");[m
[32m+[m		[32mqueryString = 'src/AppBundle/Controller/controller_budget.php?updateBudget='[m
[32m+[m				[32m+ budget_id + "&newAmount=" + elem.value;[m
 	}[m
[31m-	[m
 [m
[31m-	$[m
[31m-			.get(queryString,[m
[31m-					function(response) {[m
[31m-				[m
[31m-						var message = response.message;[m
[31m-						checkSessionStillValid(response.message);[m
[31m-						if (message[m
[31m-								.indexOf("successfully") > -1) {[m
[31m-							[m
[31m-							[m
[31m-							[m
[31m-							populateBudgetOverallCategory(categoryName);[m
[31m-							populateIncomeVsBudgetProgress();[m
[31m-[m
[31m-							// refresh[m
[31m-							// the[m
[31m-							// updated[m
[31m-							// category[m
[31m-[m
[31m-							//update progress bar[m
[31m-							[m
[31m-							//get spent amount[m
[31m-							var totalspentElement = document.getElementById("totalspent_" + budget_id);[m
[31m-							totalspent = parseInt(totalspentElement.innerText);[m
[31m-							//get td for progress bar[m
[31m-							progressBarValue = 0;[m
[31m-							progressBarClass = "badProgressBar";[m
[31m-							[m
[31m-							if (totalspent > parseInt(elem.value)) {[m
[31m-                                progressBarValue = 100;[m
[31m-                            } else {[m
[31m-                                progressBarValue = (totalspent / parseInt(elem.value)) * 100;[m
[31m-                                if (progressBarValue < 33) {[m
[31m-                                    progressBarClass = "goodProgressBar";[m
[31m-                                } else if (progressBarValue > 32 && progressBarValue < 67) {[m
[31m-                                    progressBarClass = "normalProgressBar";[m
[31m-                                }[m
[31m-                            }[m
[31m-							[m
[31m-							progressBarHtml = '<li  class="' + progressBarClass + '" data-width="' + parseInt(progressBarValue) + '" data-target="100"></li>';[m
[31m-							//$('#progressbartd_' + budget_id ).html(progressBarHtml);[m
[31m-							[m
[31m-							$('#progressbartd_' + budget_id).html("");[m
[31m-							//$('#progressbartd_6').html(progressBarHtml);[m
[31m-							$('#progressbartd_' + budget_id ).html(progressBarHtml);[m
[31m-							[m
[31m-							$('.goodProgressBar').progressBar({[m
[31m-								shadow : true,[m
[31m-								percentage : true,[m
[31m-								animation : false,[m
[31m-								barColor : "#1ABC9C",[m
[31m-							});[m
[31m-							$('.badProgressBar').progressBar({[m
[31m-								shadow : true,[m
[31m-								percentage : true,[m
[31m-								animation : false,[m
[31m-								barColor : "#D95459",[m
[31m-							});[m
[31m-							$('.normalProgressBar').progressBar({[m
[31m-								shadow : true,[m
[31m-								percentage : true,[m
[31m-								animation : false,[m
[31m-								barColor : "#FFA800",[m
[31m-							});[m
[31m-							[m
[31m-							$([m
[31m-							'#lbl_message')[m
[31m-							.text([m
[31m-									"");[m
[31m-					$([m
[31m-							'#lbl_message')[m
[31m-							.removeClass([m
[31m-									"alert-success")[m
[31m-							.addClass([m
[31m-									"display-none");[m
[31m-						} else {[m
[31m-							[m
[31m-							elem.value = previousValue;[m
[31m-							$([m
[31m-									'#lbl_message')[m
[31m-									.text([m
[31m-											message);[m
[31m-							$([m
[31m-									'#lbl_message')[m
[31m-									.removeClass([m
[31m-											"display-none alert-success")[m
[31m-									.addClass([m
[31m-											"alert-danger");[m
[31m-							[m
[31m-							$("html, body")[m
[31m-							.animate([m
[31m-									{[m
[31m-										scrollTop : $([m
[31m-												"#lbl_message")[m
[31m-												.offset().top[m
[31m-									},[m
[31m-									"slow");[m
[31m-							[m
[31m-						}[m
[32m+[m	[32m$.get(queryString, function(response) {[m
[32m+[m
[32m+[m		[32mvar message = response.message;[m
[32m+[m		[32mcheckSessionStillValid(response.message);[m
[32m+[m		[32mif (message.indexOf("successfully") > -1) {[m
[32m+[m
[32m+[m			[32mpopulateBudgetOverallCategory(categoryName);[m
[32m+[m			[32mpopulateIncomeVsBudgetProgress();[m
[32m+[m
[32m+[m			[32m// refresh[m
[32m+[m			[32m// the[m
[32m+[m			[32m// updated[m
[32m+[m			[32m// category[m
[32m+[m
[32m+[m			[32m// update progress bar[m
[32m+[m
[32m+[m			[32m// get spent amount[m
[32m+[m			[32mvar totalspentElement = document.getElementById("totalspent_"[m
[32m+[m					[32m+ budget_id);[m
[32m+[m			[32mtotalspent = parseInt(totalspentElement.innerText);[m
[32m+[m			[32m// get td for progress bar[m
[32m+[m			[32mprogressBarValue = 0;[m
[32m+[m			[32mprogressBarClass = "badProgressBar";[m
[32m+[m
[32m+[m			[32mif (totalspent > parseInt(elem.value)) {[m
[32m+[m				[32mprogressBarValue = 100;[m
[32m+[m			[32m} else {[m
[32m+[m				[32mprogressBarValue = (totalspent / parseInt(elem.value)) * 100;[m
[32m+[m				[32mif (progressBarValue < 33) {[m
[32m+[m					[32mprogressBarClass = "goodProgressBar";[m
[32m+[m				[32m} else if (progressBarValue > 32 && progressBarValue < 67) {[m
[32m+[m					[32mprogressBarClass = "normalProgressBar";[m
[32m+[m				[32m}[m
[32m+[m			[32m}[m
[32m+[m
[32m+[m			[32mprogressBarHtml = '<li  class="' + progressBarClass[m
[32m+[m					[32m+ '" data-width="' + parseInt(progressBarValue)[m
[32m+[m					[32m+ '" data-target="100"></li>';[m
[32m+[m			[32m// $('#progressbartd_' + budget_id ).html(progressBarHtml);[m
[32m+[m
[32m+[m			[32m$('#progressbartd_' + budget_id).html("");[m
[32m+[m			[32m// $('#progressbartd_6').html(progressBarHtml);[m
[32m+[m			[32m$('#progressbartd_' + budget_id).html(progressBarHtml);[m
[32m+[m
[32m+[m			[32m$('.goodProgressBar').progressBar({[m
[32m+[m				[32mshadow : true,[m
[32m+[m				[32mpercentage : true,[m
[32m+[m				[32manimation : false,[m
[32m+[m				[32mbarColor : "#1ABC9C",[m
[32m+[m			[32m});[m
[32m+[m			[32m$('.badProgressBar').progressBar({[m
[32m+[m				[32mshadow : true,[m
[32m+[m				[32mpercentage : true,[m
[32m+[m				[32manimation : false,[m
[32m+[m				[32mbarColor : "#D95459",[m
[32m+[m			[32m});[m
[32m+[m			[32m$('.normalProgressBar').progressBar({[m
[32m+[m				[32mshadow : true,[m
[32m+[m				[32mpercentage : true,[m
[32m+[m				[32manimation : false,[m
[32m+[m				[32mbarColor : "#FFA800",[m
[32m+[m			[32m});[m
[32m+[m
[32m+[m			[32m$('#lbl_message').text("");[m
[32m+[m			[32m$('#lbl_message').removeClass("alert-success").addClass([m
[32m+[m					[32m"display-none");[m
[32m+[m		[32m} else {[m
[32m+[m
[32m+[m			[32melem.value = previousValue;[m
[32m+[m			[32m$('#lbl_message').text(message);[m
[32m+[m			[32m$('#lbl_message').removeClass("display-none alert-success")[m
[32m+[m					[32m.addClass("alert-danger");[m
 [m
[31m-						[m
[32m+[m			[32m$("html, body").animate({[m
[32m+[m				[32mscrollTop : $("#lbl_message").offset().top[m
[32m+[m			[32m}, "slow");[m
 [m
[31m-					}, 'json');[m
[31m-	[m
[31m-	[m
[31m-}[m
[32m+[m		[32m}[m
[32m+[m
[32m+[m	[32m}, 'json');[m
 [m
[32m+[m[32m}[m
 [m
 function populateAllBudget() {[m
 	populateBudget("Personal Expenses");[m
[36m@@ -279,10 +273,6 @@[m [mfunction populateAllBudget() {[m
 	populateIncomeVsBudgetProgress();[m
 }[m
 [m
[31m-[m
[31m-[m
[31m-[m
[31m-[m
 function populateBudget(category) {[m
 	// get month[m
 	selectedMonth = "";[m
[36m@@ -290,11 +280,11 @@[m [mfunction populateBudget(category) {[m
 	tableid = "";[m
 	try {[m
 		selectedMonth = $('#current_month').html();[m
[31m-		selectedYear =  $('#current_year').html();[m
[32m+[m		[32mselectedYear = $('#current_year').html();[m
 [m
 		globalMonth = selectedMonth;[m
 		indexOfCurrentMonth = monthNames.findIndex(checkMonth) + 1;[m
[31m-		[m
[32m+[m
 	} catch (err) {[m
 		selectedMonth = "now";[m
 		selectedYear = "now";[m
[36m@@ -329,45 +319,39 @@[m [mfunction populateBudget(category) {[m
 		// code block[m
 	}[m
 [m
[31m-	$("#" + tableid)[m
[31m-			.load([m
[31m-					queryString,[m
[31m-					function(response) {[m
[31m-						checkSessionStillValid(response);[m
[31m-						$('.goodProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#1ABC9C",[m
[31m-						});[m
[31m-						$('.badProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#D95459",[m
[31m-						});[m
[31m-						$('.normalProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#FFA800",[m
[31m-						});[m
[31m-						[m
[31m-						var previous;[m
[31m-						[m
[31m-						$(".budgetInputBox").on('focus', function () {[m
[31m-						    previous = this.value;[m
[31m-						}).change(function() {[m
[31m-						    [m
[31m-						    //previous = this.value;[m
[31m-						    updateBudget(this, previous);[m
[31m-						});[m
[31m-					[m
[31m-					});[m
[31m-}[m
[32m+[m	[32m$("#" + tableid).load(queryString, function(response) {[m
[32m+[m		[32mcheckSessionStillValid(response);[m
[32m+[m		[32m$('.goodProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#1ABC9C",[m
[32m+[m		[32m});[m
[32m+[m		[32m$('.badProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#D95459",[m
[32m+[m		[32m});[m
[32m+[m		[32m$('.normalProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#FFA800",[m
[32m+[m		[32m});[m
 [m
[32m+[m		[32mvar previous;[m
 [m
[32m+[m		[32m$(".budgetInputBox").on('focus', function() {[m
[32m+[m			[32mprevious = this.value;[m
[32m+[m		[32m}).change(function() {[m
 [m
[32m+[m			[32m// previous = this.value;[m
[32m+[m			[32mupdateBudget(this, previous);[m
[32m+[m		[32m});[m
[32m+[m
[32m+[m	[32m});[m
[32m+[m[32m}[m
 [m
 function populateBudgetOverallCategory(category) {[m
 	// get month[m
[36m@@ -376,19 +360,18 @@[m [mfunction populateBudgetOverallCategory(category) {[m
 	tableid = "";[m
 	try {[m
 		selectedMonth = $('#current_month').html();[m
[31m-		selectedYear =  $('#current_year').html();[m
[32m+[m		[32mselectedYear = $('#current_year').html();[m
 [m
 		globalMonth = selectedMonth;[m
 		indexOfCurrentMonth = monthNames.findIndex(checkMonth) + 1;[m
[31m-		[m
[32m+[m
 	} catch (err) {[m
 		selectedMonth = "now";[m
 		selectedYear = "now";[m
 	}[m
 [m
[31m-	[m
[31m-		// code block[m
[31m-	[m
[32m+[m	[32m// code block[m
[32m+[m
 	categoryName = "";[m
 	switch (category) {[m
 	case "businessexpenses":[m
[36m@@ -409,46 +392,38 @@[m [mfunction populateBudgetOverallCategory(category) {[m
 	default:[m
 		// code block[m
 	}[m
[31m-	[m
[32m+[m
 	queryString = "src/AppBundle/Controller/controller_budget.php?populateBudgetOverallCategory="[m
[31m-		+ encodeURI(categoryName)[m
[31m-		+ "&userId="[m
[31m-		+ sessionStorage.whyage65_user_id[m
[31m-		+ "&selectedmonth="[m
[31m-		+ indexOfCurrentMonth + "&selectedyear=" + selectedYear;[m
[32m+[m			[32m+ encodeURI(categoryName)[m
[32m+[m			[32m+ "&userId="[m
[32m+[m			[32m+ sessionStorage.whyage65_user_id[m
[32m+[m			[32m+ "&selectedmonth="[m
[32m+[m			[32m+ indexOfCurrentMonth + "&selectedyear=" + selectedYear;[m
 [m
[31m-	[m
 	tableid = "category_prgress_div_" + category;[m
[31m-	$("#" + tableid)[m
[31m-			.load([m
[31m-					queryString,[m
[31m-					function(response) {[m
[31m-						checkSessionStillValid(response);[m
[31m-						$('.goodProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#1ABC9C",[m
[31m-						});[m
[31m-						$('.badProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#D95459",[m
[31m-						});[m
[31m-						$('.normalProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#FFA800",[m
[31m-						});[m
[31m-						[m
[31m-						[m
[31m-					[m
[31m-					});[m
[31m-}[m
[31m-[m
[32m+[m	[32m$("#" + tableid).load(queryString, function(response) {[m
[32m+[m		[32mcheckSessionStillValid(response);[m
[32m+[m		[32m$('.goodProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#1ABC9C",[m
[32m+[m		[32m});[m
[32m+[m		[32m$('.badProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#D95459",[m
[32m+[m		[32m});[m
[32m+[m		[32m$('.normalProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#FFA800",[m
[32m+[m		[32m});[m
 [m
[32m+[m	[32m});[m
[32m+[m[32m}[m
 [m
 function populateIncomeVsBudgetProgress() {[m
 	// get month[m
[36m@@ -457,183 +432,158 @@[m [mfunction populateIncomeVsBudgetProgress() {[m
 	tableid = "";[m
 	try {[m
 		selectedMonth = $('#current_month').html();[m
[31m-		selectedYear =  $('#current_year').html();[m
[32m+[m		[32mselectedYear = $('#current_year').html();[m
 [m
 		globalMonth = selectedMonth;[m
 		indexOfCurrentMonth = monthNames.findIndex(checkMonth) + 1;[m
[31m-		[m
[32m+[m
 	} catch (err) {[m
 		selectedMonth = "now";[m
 		selectedYear = "now";[m
 	}[m
 [m
[31m-	[m
[31m-	[m
 	queryString = "src/AppBundle/Controller/controller_budget.php?populateIncomeVsBudgetProgress=yes"[m
[31m-		+ "&selectedmonth="[m
[31m-		+ indexOfCurrentMonth + "&selectedyear=" + selectedYear;[m
[32m+[m			[32m+ "&selectedmonth="[m
[32m+[m			[32m+ indexOfCurrentMonth[m
[32m+[m			[32m+ "&selectedyear="[m
[32m+[m			[32m+ selectedYear;[m
 [m
[31m-	[m
 	tableid = "incomevsbudget_div";[m
[31m-	$("#" + tableid)[m
[31m-			.load([m
[31m-					queryString,[m
[31m-					function(response) {[m
[31m-						checkSessionStillValid(response);[m
[31m-						$('.goodProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#1ABC9C",[m
[31m-						});[m
[31m-						$('.badProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#D95459",[m
[31m-						});[m
[31m-						$('.normalProgressBar').progressBar({[m
[31m-							shadow : true,[m
[31m-							percentage : true,[m
[31m-							animation : false,[m
[31m-							barColor : "#FFA800",[m
[31m-						});[m
[31m-						[m
[31m-						[m
[31m-					[m
[31m-					});[m
[31m-}[m
[31m-[m
[32m+[m	[32m$("#" + tableid).load(queryString, function(response) {[m
[32m+[m		[32mcheckSessionStillValid(response);[m
[32m+[m		[32m$('.goodProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#1ABC9C",[m
[32m+[m		[32m});[m
[32m+[m		[32m$('.badProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#D95459",[m
[32m+[m		[32m});[m
[32m+[m		[32m$('.normalProgressBar').progressBar({[m
[32m+[m			[32mshadow : true,[m
[32m+[m			[32mpercentage : true,[m
[32m+[m			[32manimation : false,[m
[32m+[m			[32mbarColor : "#FFA800",[m
[32m+[m		[32m});[m
 [m
[32m+[m	[32m});[m
[32m+[m[32m}[m
 [m
[31m-function checkMonth(month){[m
[32m+[m[32mfunction checkMonth(month) {[m
 	return month.includes(globalMonth);[m
 }[m
 [m
[31m-function getNextMonth(currentMonth,direction){[m
[32m+[m[32mfunction getNextMonth(currentMonth, direction) {[m
 	globalMonth = currentMonth;[m
 	indexOfCurrentMonth = monthNames.findIndex(checkMonth)[m
[31m-	[m
[31m-	//indexOfCurrentMonth = monthNames.findIndex(currentMonth);[m
[32m+[m
[32m+[m	[32m// indexOfCurrentMonth = monthNames.findIndex(currentMonth);[m
 	console.log(indexOfCurrentMonth);[m
[31m-	[m
[31m-	if(direction.includes('forward')){[m
[32m+[m
[32m+[m	[32mif (direction.includes('forward')) {[m
 		indexOfCurrentMonth = indexOfCurrentMonth + 1;[m
[31m-	}else{[m
[32m+[m	[32m} else {[m
 		indexOfCurrentMonth = indexOfCurrentMonth - 1;[m
 	}[m
[31m-	[m
[31m-	[m
[31m-	[m
[31m-	if(currentMonth.includes('January') &&  direction.includes('back')){[m
[32m+[m
[32m+[m	[32mif (currentMonth.includes('January') && direction.includes('back')) {[m
 		indexOfCurrentMonth = 11;[m
 	}[m
[31m-	[m
[31m-	if(currentMonth.includes('December') &&  direction.includes('forward')){[m
[32m+[m
[32m+[m	[32mif (currentMonth.includes('December') && direction.includes('forward')) {[m
 		indexOfCurrentMonth = 0;[m
 	}[m
[31m-	[m
[32m+[m
 	newMonth = monthNames[indexOfCurrentMonth];[m
[31m-	[m
 [m
[31m-	return newMonth; [m
[32m+[m	[32mreturn newMonth;[m
 }[m
 [m
[32m+[m[32mfunction getNextYear(currentMonth, currentYear, direction) {[m
 [m
[31m-function getNextYear(currentMonth, currentYear,direction){[m
[31m-	[m
[31m-	//get year[m
[31m-	if(currentMonth.includes('January') &&  direction.includes('back')){[m
[32m+[m	[32m// get year[m
[32m+[m	[32mif (currentMonth.includes('January') && direction.includes('back')) {[m
 		currentYear = currentYear - 1;[m
 		return currentYear;[m
 	}[m
[31m-	[m
[31m-	if(currentMonth.includes('December') &&  direction.includes('forward')){[m
[32m+[m
[32m+[m	[32mif (currentMonth.includes('December') && direction.includes('forward')) {[m
 		currentYear = currentYear + 1;[m
 		return currentYear;[m
 	}[m
[31m-	[m
[31m-	[m
[32m+[m
 	return currentYear;[m
 }[m
 [m
 [m
[32m+[m[32mfunction populateTransactionNameSelectJson(category) {[m
[32m+[m[41m	[m
[32m+[m	[32m$('#select_transactions')[m
[32m+[m[32m    .find('option')[m
[32m+[m[32m    .remove();[m
[32m+[m[41m	[m
[32m+[m[41m	[m
 [m
[31m-function populateTransactionNameSelect(category) {[m
[31m-	$("#select_transactions")[m
[31m-			.load([m
[31m-					"src/AppBundle/Controller/controller_budget.php?populateTransactionNameSelect="[m
[31m-							+ encodeURI(category) + "&UserId=" + sessionStorage.whyage65_user_id, function(response) {[m
[31m-								checkSessionStillValid(response);[m
[31m-								$('#select_transactions').change([m
[31m-										function(event) {[m
[31m-											var selectedTransaction = $(this).children("option:selected").val();[m
[31m-											if(selectedTransaction.includes("new_custom")){[m
[31m-												window.location.href = "config.html";[m
[31m-											}[m
[31m-										});[m
[31m-					});[m
[31m-}[m
[31m-[m
[31m-function populateCategories() {[m
[31m-	$("#select_categories")[m
[31m-			.load([m
[31m-					"src/AppBundle/Controller/controller_transaction.php?populateCategoriesSelect=true",[m
[31m-					function(response) {[m
[31m-						checkSessionStillValid(response);[m
[31m-						$('#select_categories')[m
[31m-								.change([m
[31m-										function(event) {[m
[31m-											var selectedCategory = $(this)[m
[31m-													.children("option:selected")[m
[31m-													.val();[m
[31m-											populateTransactionNameSelect(selectedCategory);[m
[31m-										});[m
[31m-[m
[31m-						$("#select_categories").val("Personal Expenses");[m
[31m-						populateTransactionNameSelect("Personal Expenses");[m
[31m-[m
[31m-						// populate transacton capture defaul date[m
[31m-						var today = new Date();[m
[31m-						var dd = today.getDate();[m
[31m-[m
[31m-						$('#datepicker').val([m
[31m-								today.getMonth() + 1 + "/" + today.getDate()[m
[31m-										+ "/" + today.getFullYear());[m
[32m+[m	[32mqueryString = "src/AppBundle/Controller/controller_budget.php?getTransactionNames="[m
[32m+[m			[32m+ encodeURI(category)[m
[32m+[m			[32m+ "&UserId="[m
[32m+[m			[32m+ sessionStorage.whyage65_user_id;[m
[32m+[m	[32m$.get(queryString, function(response) {[m
[32m+[m		[32mcheckSessionStillValid(response);[m
[32m+[m		[32melement = document.getElementById("select_transactions");[m
[32m+[m		[32mpopulateDropdown(element, response, "config.html", addEvent);[m
[32m+[m[41m		[m
[32m+[m	[32m}, 'json');[m
 [m
[31m-					});[m
 }[m
 [m
 [m
[31m-function hideNewTransaction(){[m
[31m-	$('#new_transaction_div').removeClass([m
[31m-	"display").addClass([m
[31m-	"display-none");[m
[32m+[m[32mfunction populateCategories() {[m
 	[m
[31m-	$('#minusButton').removeClass([m
[31m-	"display").addClass([m
[31m-	"display-none");[m
[32m+[m	[32m$('#select_categories')[m
[32m+[m[32m    .find('option')[m
[32m+[m[32m    .remove();[m
 	[m
[31m-	$('#plusButton').removeClass([m
[31m-	"display-none").addClass([m
[31m-	"display");[m
 	[m
[31m-}[m
 [m
[32m+[m	[32mqueryString = "src/AppBundle/Controller/controller_transaction.php?getCategories=true";[m
[32m+[m	[32m$.get(queryString, function(response) {[m
[32m+[m		[32mcheckSessionStillValid(response);[m
[32m+[m		[32melement = document.getElementById("select_categories");[m
[32m+[m		[32mpopulateDropdown(element, response, "config.html", addEvent);[m
[32m+[m[41m		[m
[32m+[m[41m		[m
[32m+[m		[32mvar today = new Date();[m
[32m+[m		[32mvar dd = today.getDate();[m
 [m
[31m-function showNewTransaction(){[m
[31m-	$('#new_transaction_div').removeClass([m
[31m-	"display-none").addClass([m
[31m-	"display");[m
[31m-	[m
[31m-	[m
[31m-	$('#plusButton').removeClass([m
[31m-	"display").addClass([m
[31m-	"display-none");[m
[31m-	[m
[31m-	$('#minusButton').removeClass([m
[31m-	"display-none").addClass([m
[31m-	"display");[m
[31m-	[m
[32m+[m		[32m$('#datepicker').val([m
[32m+[m				[32mtoday.getMonth() + 1 + "/" + today.getDate()[m
[32m+[m						[32m+ "/" + today.getFullYear());[m
[32m+[m[41m		[m
[32m+[m	[32m}, 'json');[m
 	[m
 }[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m[32mfunction hideNewTransaction() {[m
[32m+[m	[32m$('#new_transaction_div').removeClass("display").addClass("display-none");[m
[32m+[m
[32m+[m	[32m$('#minusButton').removeClass("display").addClass("display-none");[m
[32m+[m
[32m+[m	[32m$('#plusButton').removeClass("display-none").addClass("display");[m
[32m+[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32mfunction showNewTransaction() {[m
[32m+[m	[32m$('#new_transaction_div').removeClass("display-none").addClass("display");[m
[32m+[m
[32m+[m	[32m$('#plusButton').removeClass("display").addClass("display-none");[m
[32m+[m
[32m+[m	[32m$('#minusButton').removeClass("display-none").addClass("display");[m
[32m+[m
[32m+[m[32m}[m
[1mdiff --git a/application/src/AppBundle/Controller/controller_budget.php b/application/src/AppBundle/Controller/controller_budget.php[m
[1mindex 609a299..ad49383 100644[m
[1m--- a/application/src/AppBundle/Controller/controller_budget.php[m
[1m+++ b/application/src/AppBundle/Controller/controller_budget.php[m
[36m@@ -20,14 +20,23 @@[m [mif (isset($_GET['populateCategoriesSelect'])) {[m
 [m
 if (isset($_GET['populateTransactionNameSelect'])) {[m
     if ($_GET['populateTransactionNameSelect']) :[m
[31m-    [m
[31m-   [m
[32m+[m
         populateTransactionNameSelect($entityManager);[m
     [m
     endif;[m
 [m
 }[m
 [m
[32m+[m
[32m+[m[32mif (isset($_REQUEST['getTransactionNames'])) {[m
[32m+[m[32m    if ($_REQUEST['getTransactionNames']) :[m
[32m+[m[41m    [m
[32m+[m[32m    getTransactionNames($entityManager);[m
[32m+[m[41m    [m
[32m+[m[32m    endif;[m
[32m+[m[41m    [m
[32m+[m[32m}[m
[32m+[m
 if (isset($_POST['textTrasnctionAmount'])) {[m
     if ($_POST['textTrasnctionAmount']) :[m
         captureNewTransaction($entityManager);[m
[36m@@ -93,7 +102,6 @@[m [mif (isset($_GET['populateIncomeVsBudgetProgress'])) {[m
 [m
 }[m
 [m
[31m-[m
 if (isset($_GET['captureNewBudgetItem'])) {[m
     if ($_GET['captureNewBudgetItem']) :[m
         captureNewBudgetItem($entityManager);[m
[36m@@ -392,7 +400,6 @@[m [mfunction populateTransactionNameSelect($entityManager)[m
             $dql = "Select utn, tn from UserTransactionName utn JOIN utn.transaction tn[m
 where utn.active = 1 and utn.user = " . $_SESSION['user_id'] . " ORDER BY tn.name asc";[m
 [m
[31m-            [m
             $query = $entityManager->createQuery($dql);[m
             $query->setMaxResults(100);[m
             $userTransactionNames = $query->getResult();[m
[36m@@ -406,7 +413,7 @@[m [mwhere utn.active = 1 and utn.user = " . $_SESSION['user_id'] . " ORDER BY tn.nam[m
                 }[m
 [m
                 echo '<option value="new_custom">--Add Custom Name--</option>';[m
[31m-            }else{[m
[32m+[m[32m            } else {[m
                 echo '<option value="new_custom">--Add Custom Name--</option>';[m
             }[m
         } else {[m
[36m@@ -417,6 +424,48 @@[m [mwhere utn.active = 1 and utn.user = " . $_SESSION['user_id'] . " ORDER BY tn.nam[m
     }[m
 }[m
 [m
[32m+[m[32mfunction getTransactionNames($entityManager)[m
[32m+[m[32m{[m
[32m+[m[41m    [m
[32m+[m[32m    $transactionsArray = array();[m
[32m+[m[41m    [m
[32m+[m[32m    try {[m
[32m+[m[32m        // echo $_SESSION ['user_id'];[m
[32m+[m[32m        $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array([m
[32m+[m[32m            'active' => 1,[m
[32m+[m[32m            'name' => urldecode($_REQUEST['getTransactionNames'])[m
[32m+[m[32m        ));[m
[32m+[m
[32m+[m[41m        [m
[32m+[m[32m        if ($category != null) {[m
[32m+[m
[32m+[m[32m            $dql = "Select utn, tn from UserTransactionName utn JOIN utn.transaction tn[m
[32m+[m[32mwhere utn.active = 1 and utn.user = " . $_REQUEST['UserId'] . " ORDER BY tn.name asc";[m
[32m+[m
[32m+[m[32m            $query = $entityManager->createQuery($dql);[m
[32m+[m[32m            $query->setMaxResults(100);[m
[32m+[m[32m            $userTransactionNames = $query->getResult();[m
[32m+[m
[32m+[m[32m            if ($userTransactionNames != null) {[m
[32m+[m[32m                // echo "test";[m
[32m+[m[32m                foreach ($userTransactionNames as &$userTransactionName) {[m
[32m+[m[32m                    if ($userTransactionName->getTransaction()->getCategory() == $category) {[m
[32m+[m[32m                        // echo '<option value="' . $userTransactionName->getUserTransactionNameId() . '">' . $userTransactionName->getTransaction()->getName() . '</option>';[m
[32m+[m[32m                        $response['value'] = $userTransactionName->getUserTransactionNameId();[m
[32m+[m[32m                        $response['text'] = $userTransactionName->getTransaction()->getName();[m
[32m+[m
[32m+[m[32m                        array_push($transactionsArray, $response);[m
[32m+[m[32m                    }[m
[32m+[m[32m                }[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m[41m [m
[32m+[m[41m        [m
[32m+[m[32m        echo json_encode($transactionsArray);[m
[32m+[m[32m    } catch (Exception $e) {[m
[32m+[m[32m        echo json_encode($transactionsArray);[m
[32m+[m[32m    }[m
[32m+[m[32m}[m
[32m+[m
 function populateUserBudgetForMonth($entityManager)[m
 {[m
     try {[m
[36m@@ -578,8 +627,6 @@[m [mORDER BY tn.name asc";[m
     }[m
 }[m
 [m
[31m-[m
[31m-[m
 function getCategoryBudgetForMonthHTML($entityManager, $categoryName, $selectedMonth, $selectedYear)[m
 {[m
     try {[m
[1mdiff --git a/application/src/AppBundle/Controller/controller_security.php b/application/src/AppBundle/Controller/controller_security.php[m
[1mindex 208e224..62997a1 100644[m
[1m--- a/application/src/AppBundle/Controller/controller_security.php[m
[1m+++ b/application/src/AppBundle/Controller/controller_security.php[m
[36m@@ -138,6 +138,9 @@[m [mfunction login($entityManager)[m
 function getuser($entityManager)[m
 {[m
     try {[m
[32m+[m[41m        [m
[32m+[m
[32m+[m
         $login = new login($entityManager);[m
         $login->getuser($entityManager);[m
        [m
[1mdiff --git a/application/src/AppBundle/Controller/controller_transaction.php b/application/src/AppBundle/Controller/controller_transaction.php[m
[1mindex 91956cf..a118cd1 100644[m
[1m--- a/application/src/AppBundle/Controller/controller_transaction.php[m
[1m+++ b/application/src/AppBundle/Controller/controller_transaction.php[m
[36m@@ -18,6 +18,15 @@[m [mif (isset($_GET['populateCategoriesSelect'])) {[m
 [m
 }[m
 [m
[32m+[m[32mif (isset($_REQUEST['getCategories'])) {[m
[32m+[m[32m    if ($_REQUEST['getCategories']) :[m
[32m+[m[32m    getCategories($entityManager);[m
[32m+[m[32m    endif;[m
[32m+[m[41m  [m
[32m+[m[32m}[m
[32m+[m
[32m+[m
[32m+[m
 if (isset($_GET['populateTransactionNameSelect'])) {[m
     if ($_GET['populateTransactionNameSelect']) :[m
         populateTransactionNameSelect($entityManager);[m
[36m@@ -624,6 +633,38 @@[m [mfunction populateCategoriesSelect($entityManager)[m
     }[m
 }[m
 [m
[32m+[m
[32m+[m[32mfunction getCategories($entityManager)[m
[32m+[m[32m{[m
[32m+[m[41m    [m
[32m+[m[32m    $categoriesArray = array();[m
[32m+[m[41m    [m
[32m+[m[32m    try {[m
[32m+[m[41m        [m
[32m+[m[32m        // ECHO "test";[m
[32m+[m[32m        $categories = $entityManager->getRepository('TransactionCategory')->findBy(array([m
[32m+[m[32m            'active' => 1[m
[32m+[m[32m        ), array([m
[32m+[m[32m            'name' => 'ASC'[m
[32m+[m[32m        ));[m
[32m+[m[41m        [m
[32m+[m[32m        if ($categories != null) {[m
[32m+[m[32m            foreach ($categories as &$category) {[m
[32m+[m[32m                $response['value'] = $category->getName();[m
[32m+[m[32m                $response['text'] = $category->getName();[m
[32m+[m[41m                [m
[32m+[m[32m                array_push($categoriesArray, $response);[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m[41m        [m
[32m+[m[32m        echo json_encode($categoriesArray);[m
[32m+[m[41m        [m
[32m+[m[32m    } catch (Exception $e) {[m
[32m+[m[32m        echo json_encode($categoriesArray);[m
[32m+[m[32m    }[m
[32m+[m[32m}[m
[32m+[m
[32m+[m
 function populateTransactionNameSelect($entityManager)[m
 {[m
     try {[m
[36m@@ -647,7 +688,7 @@[m [mfunction populateTransactionNameSelect($entityManager)[m
 where b.active = 1 and b.user = " . $_SESSION['user_id'] . " and b.amount > 0 [m
 and tc.name = '" . $category->getName() . "' ORDER BY tn.name asc";[m
 [m
[31m-            echo $dql;[m
[32m+[m[32m            //echo $dql;[m
             $query = $entityManager->createQuery($dql);[m
             $query->setMaxResults(100);[m
             $budgets = $query->getResult();[m
[1mdiff --git a/application/src/AppBundle/Logic/login.php b/application/src/AppBundle/Logic/login.php[m
[1mindex 52fb492..dcc94c9 100644[m
[1m--- a/application/src/AppBundle/Logic/login.php[m
[1m+++ b/application/src/AppBundle/Logic/login.php[m
[36m@@ -135,13 +135,19 @@[m [mclass Login[m
     public function getuser($entityManager)[m
     {[m
         try {[m
[32m+[m[41m            [m
[32m+[m[32m            try {[m
[32m+[m[32m                startSession();[m
[32m+[m[32m            } catch (Exception $e) {}[m
[32m+[m[41m            [m
             // check login form contents[m
[31m-            if (empty($_REQUEST['getuser'])) {[m
[32m+[m[32m            if (empty($_SESSION['username'])) {[m
                 $this->errors[] = "username field was empty.";[m
             } else {[m
 [m
[32m+[m[32m                //print_r($_SESSION);[m
                 $user = $entityManager->getRepository('User')->findOneBy(array([m
[31m-                    'username' => $_REQUEST['getuser'][m
[32m+[m[32m                    'username' => $_SESSION['username'][m
                 ));[m
 [m
                 if ($user) {[m
