$(document).ready(function() {
	populateBudget();
	populateWhereIsMyMoney();
	populateTopExpensesForThisMonth();
});


function populateBudget() {
	

	queryString = "src/AppBundle/Controller/controller_dashboard.php?populateDashboardBudget=true";

	$("#budget-graphs")
			.load(
					queryString,
					function(response) {
						checkSessionStillValid(response);
						
						$('.goodPieGraph').pieChart({
			                barColor: '#3bb2d0',
			                trackColor: '#eee',
			                lineCap: 'round',
			                lineWidth: 8,
			                onStep: function (from, to, percent) {
			                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
			                }
			            });

			            $('.badPieGraph').pieChart({
			                barColor: 'rgb(217, 84, 89)',
			                trackColor: '#eee',
			                lineCap: 'butt',
			                lineWidth: 8,
			                onStep: function (from, to, percent) {
			                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
			                }
			            });
			            
			            $('.normalPieGraph').pieChart({
			                barColor: '#fbb03b',
			                trackColor: '#eee',
			                lineCap: 'square',
			                lineWidth: 8,
			                onStep: function (from, to, percent) {
			                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
			                }
			            });
			            
			            
			            
					
			
					});
}




function populateWhereIsMyMoney() {
	

	queryString = "src/AppBundle/Controller/controller_dashboard.php?populateWhereIsMyMoney=true";

	$
	.get(queryString,
			function(response) {
						checkSessionStillValid(response.message);
						pieData = response.data;
						new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
			
						
						for(var i = 0; i < pieData.length; i++) {
						    var obj = pieData[i];
						    var percentage = 0 ;
						    if(parseInt(response.total) !== 0){
						    	percentage = (parseInt(obj.value) / parseInt(response.total) )*100;
						    }
						    
						    category = obj.category;
						    switch (category) {
							case "Personal Expenses":
								$('#personal-expenses-value').html(parseInt(percentage) + "%");
								break;
							case "Investments":
								$('#investments-value').html(parseInt(percentage) + "%");
								break;
							case "Loan Pay Down":
								$('#loan-paydown-value').html(parseInt(percentage) + "%");
								break;
						
							default:
								// code block
							}
						}
						
	}, 'json');
}




function populateTopExpensesForThisMonth() {
	

	queryString = "src/AppBundle/Controller/controller_dashboard.php?populateTopFiveExpense=true";

	$
	.get(queryString,
			function(response) {
						checkSessionStillValid(response.message);
						pieData = response.data;
						new Chart(document.getElementById("pie-top5expenses").getContext("2d")).Pie(pieData);
			
						
						for(var i = 0; i < pieData.length; i++) {
						    var obj = pieData[i];
						    
						    percentage = (parseInt(obj.value) / parseInt(response.total) )*100;
						    category = obj.category;
						    htmlText =category + '<span id="expensevalue_">' + parseInt(percentage) + '%</span>'
						    $('#expense_' + (i + 1)).html(htmlText);
						   
						    "#D95459","#1ABC9C","#3BB2D0","FBB03B","#8a8acb"
						    
						    color = obj.color;
						    switch (color) {
							case "#D95459":
								$('#expense_' + (i + 1)).addClass('red-block');
								break;
							case "#1ABC9C":
								$('#expense_' + (i + 1)).addClass('green-block');
								break;
							case "#3BB2D0":
								$('#expense_' + (i + 1)).addClass('blue-block');
								break;
							case "#FBB03B":
								$('#expense_' + (i + 1)).addClass('yellow-block');
								break;
							case "#8a8acb":
								$('#expense_' + (i + 1)).addClass('purple-block');
								break;
						
							default:
								// code block
							}
						    
						}
						
	}, 'json');
}
