
$(document).ready(
		function() {

			
			$('#userID').val(sessionStorage.whyage65_user_id);
			
			// process the form
			$('#transaction_form').submit(function(event) {
				// stop the form from submitting the normal way and refreshing
				// the page
				event.preventDefault();
				captureNewTransactionName();
			});

			populateCategories();
			//populateTransactionNames();
			

		});

function deleteTranscactionName(elem) {

	// alert("clicked");
	transaction_id = elem.id;
	transaction_id = transaction_id.replace("customTransaction_", "");
	$.get(
			'src/AppBundle/Controller/controller_transaction.php?deleteTransactionName='
					+ transaction_id, function(response) {
				var message = response.message;
				if (message.indexOf("successfully") > -1) {
					$('#lbl_message').text(message);
					$('#lbl_message').removeClass("display-none alert-danger")
							.addClass("alert-success");

					// refresh
					// the
					// updated
					// category

					populateTransactionNames();
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


function captureNewTransactionName() {

	$
			.post(
					'src/AppBundle/Controller/controller_transaction.php?captureNewTransactionName=true',
					$('#transaction_form').serialize(), function(response) {
						var message = response.message;
						if (message.indexOf("successfully") > -1) {
							$('#lbl_message').text(message);
							$('#lbl_message').removeClass(
									"display-none alert-danger").addClass(
									"alert-success");

							populateTransactionNames();
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



function populateTransactionNames() {
	
	var selectedCategory = $('#select_categories').children("option:selected").val();

	$("#transaction_names_ol")
			.load(
					"src/AppBundle/Controller/controller_transaction.php?populateTransactionNames=" + encodeURI(selectedCategory),
					function() {

					});
}



function populateCategories() {
	$("#select_categories")
			.load(
					"src/AppBundle/Controller/controller_transaction.php?populateCategoriesSelect=true",
					function() {
						$('#select_categories').change(
								function(event) {
									populateTransactionNames();
								});

						$("#select_categories").val("Personal Expenses");
						populateTransactionNames();

					});
}

