<?php
require_once (__DIR__ . '/../../../bootstrap.php');
require_once (__DIR__ . '/../../../app/application.php');

require_once (__DIR__ . '/../Entity/User.php');
require_once (__DIR__ . '/../Entity/TransactionCategory.php');
require_once (__DIR__ . '/../Entity/TransactionName.php');
require_once (__DIR__ . '/../Entity/Transaction.php');
require_once (__DIR__ . '/../Entity/Budget.php');
require_once (__DIR__ . '/../Entity/UserTransactionName.php');

require_once (__DIR__ . '/dataobject.php');

if (isset($_GET['populateDashboardBudget'])) {
    if ($_GET['populateDashboardBudget']) :
        populateDashboardBudget($entityManager);
    endif;

}

if (isset($_GET['populateWhereIsMyMoney'])) {
    if ($_GET['populateWhereIsMyMoney']) :
        populateWhereIsMyMoney($entityManager);
    endif;

}



if (isset($_GET['populateTopFiveExpense'])) {
    if ($_GET['populateTopFiveExpense']) :
    populateTopFiveExpense($entityManager);
    endif;
    
}


function startSession()
{
    try {
        if (! isset($_SESSION['timeout_idle'])) {
            // echo "starting session";
            session_start();
        }

        // print_r ($_SESSION);

        $cur_time = time();

        if (isset($_SESSION['timeout_idle'])) {
            if ($cur_time > $_SESSION['timeout_idle']) {
                // destroy the session (reset)
                session_destroy();
                // header("Location: HTTP://". $_SERVER['SERVER_NAME'] . "/" . FOLDER_NAME. "/signin.html");
                return false;
            } else {
                // echo "session expired";
                // set new time
                $_SESSION['timeout_idle'] = time() + 1800;
                return true;
            }
        } else {

            return false;
        }
    } catch (Exception $e) {}
}

function populateDashboardBudget($entityManager)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
    $totalSpent = 0;

    $date = new DateTime();
    $selectedMonth = $date->format('m');
    $selectedYear = $date->format('Y');
    // echo $selectedMonth . "/" . $selectedYear;

    try {

        echo '<div class="col-md-12 h2-dashboarder-header" >
				<h3>' . strtoupper($date->format('F') . ' ' . $date->format('Y') . ' Progress') . '</h3>
			</div>';

        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_SESSION['user_id']
        ));

        if ($user != null) {

            $sql = "select SUM(amount) as totalSpent, transaction_category.name from transaction
inner join transaction_category on transaction.category = transaction_category.transaction_category_id
where transaction.user = " . $user->getUserId() . "
and transaction.active = 1
and transaction.transaction_date LIKE '%" . $selectedYear . "-" . $selectedMonth . "%'
group by transaction_category.name;";

            // echo $sql;

            $results = querydatabase($sql);
            $rsType = gettype($results);
            if (strcasecmp($rsType, "string") == 0) {
                echo "<h5>Oops, looks like you don't have any transactions captured for this month.</h5>";
            } else {
                while ($row = $results->fetch_assoc()) {
                    $totalSpent = $row["totalSpent"];
                    $category = $row["name"];
                    $i = 0;
                    $displayGraph = true;

                    // get budget
                    $budgetAmount = 0;
                    $progressBarValue = 100;
                    $budgetID = "";
                    $progressBarClass = "badPieGraph";

                    $budgetSql = "select sum(amount) as budgeted from budget
inner join transaction_name  on budget.transaction = transaction_name.transaction_name_id
inner join transaction_category on transaction_name.category = transaction_category.transaction_category_id
where transaction_category.name = '" . $category . "'
and budget.user = " . $user->getUserId() . "
and budget.active = 1 ";

                    // echo $budgetSql;
                    $budgetresults = querydatabase($budgetSql);
                    $rsType = gettype($budgetresults);
                    if (strcasecmp($rsType, "string") == 0) {
                        $displayGraph = false;
                    } else {
                        while ($row = $budgetresults->fetch_assoc()) {

                            $budgetAmount = $row["budgeted"];

                            if (intval($budgetAmount) > 0) {
                                if (! $budgetAmount) {
                                    $budgetAmount = 0;
                                }
                                if (intval($totalSpent) > intval($budgetAmount)) {
                                    $progressBarValue = 100;
                                } else {
                                    $progressBarValue = (intval($totalSpent) / intval($budgetAmount)) * 100;
                                    if ($progressBarValue < 33) {
                                        $progressBarClass = "goodPieGraph";
                                    } elseif ($progressBarValue > 32 && $progressBarValue < 67) {
                                        $progressBarClass = "normalPieGraph";
                                    }
                                }
                            } else {
                                $displayGraph = false;
                            }
                        }

                        $response = '<a href="budget.html?category=' . strtolower(str_replace(" ", "_", $category)) . '"><div class="col-md-4 ">
				<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>' . $category . '</h5>
					<label>' . $totalSpent . '/' . $budgetAmount . ' </lab   el>
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-1" class="pie-title-center ' . $progressBarClass . '" data-percent="' . $progressBarValue . '"> <span class="pie-value"></span> </div>
				</div>
				 <div class="clearfix"> </div>
				</div>
				
			</div></a>';

                        if ($displayGraph) {
                            echo $response;
                        }
                    }
                }
            }
        } else {
            echo '<h2>Opps, system error please re-login</h2>';
        }

        echo '<div class="clearfix"> </div>';
    } catch (Exception $e) {
        echo '<h2>Exception : Failed to get overall budget</h2>';
    }
}

function populateWhereIsMyMoney($entityManager)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
    $totalSpent = 0;

    $date = new DateTime();
    $selectedMonth = $date->format('m');
    $selectedYear = $date->format('Y');
    // echo $selectedMonth . "/" . $selectedYear;

    try {

       

        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_SESSION['user_id']
        ));

        if ($user != null) {

            $sql = "select SUM(amount) as totalSpent, transaction_category.name from transaction
inner join transaction_category on transaction.category = transaction_category.transaction_category_id
where transaction.user = " . $user->getUserId() . "
and transaction.active = 1
and transaction.transaction_date LIKE '%" . $selectedYear . "-" . $selectedMonth . "%' 
and transaction_category.name in ('Personal Expenses','Investments','Loan Pay Down') 
group by transaction_category.name;";

           //  echo $sql;

            $results = querydatabase($sql);
            $rsType = gettype($results);
            if (strcasecmp($rsType, "string") == 0) {
                echo "<h5>Oops, looks like you don't have any transactions captured for this month.</h5>";
            } else {
                $graphData=array();
                $graphColors=array("#D95459","#1ABC9C","#3BB2D0");
                $i = 0;
                $total = 0;
                while ($row = $results->fetch_assoc()) {
                    $totalSpent = $row["totalSpent"];
                    $category = $row["name"];
                    $total = $total + $totalSpent;
                    $dataPoint['value'] = intval($totalSpent);
                    $dataPoint['color'] = $graphColors[$i];
                    $dataPoint['category'] = $category;
                    
                    array_push($graphData,$dataPoint);
                  $i = $i + 1;
                }
                $response['data'] = $graphData;
                $response['total'] = $total;
                $response['message'] = "success";
                echo json_encode($response);
            }
        } else {
            $response['status'] = 2;
            $response['message'] = "Opps, system error please re-login";
            echo json_encode($response);
            
        }

        
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}


function populateTopFiveExpense($entityManager)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
    $totalSpent = 0;
    
    $date = new DateTime();
    $selectedMonth = $date->format('m');
    $selectedYear = $date->format('Y');
    // echo $selectedMonth . "/" . $selectedYear;
    
    try {
        
        
        
        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_SESSION['user_id']
        ));
        
        if ($user != null) {
            
            $sql = "select SUM(amount) as totalSpent, transaction_name.name from transaction
inner join transaction_name on transaction.name = transaction_name.transaction_name_id 
inner join transaction_category on transaction.category = transaction_category.transaction_category_id 
where transaction.user = " . $user->getUserId() . " 
and transaction.active = 1
and transaction.transaction_date LIKE '%" . $selectedYear . "-" . $selectedMonth . "%' 
and transaction_category.name not in ('income','investments') 
group by transaction_name.name 
order by totalSpent desc
limit 5;";
            
            // echo $sql;
            
            $results = querydatabase($sql);
            $rsType = gettype($results);
            if (strcasecmp($rsType, "string") == 0) {
                echo "<h5>Oops, looks like you don't have any transactions captured for this month.</h5>";
            } else {
                $graphData=array();
                $graphColors=array("#D95459","#1ABC9C","#3BB2D0","#FBB03B","#8a8acb");
                $i = 0;
                $total = 0;
                while ($row = $results->fetch_assoc()) {
                    
                    $totalSpent = $row["totalSpent"];
                    if($totalSpent > 0){
                        $category = $row["name"];
                        $total = $total + $totalSpent;
                        $dataPoint['value'] = intval($totalSpent);
                        $dataPoint['color'] = $graphColors[$i];
                        $dataPoint['category'] = $category;
                        
                        
                        array_push($graphData,$dataPoint);
                    }
                    
                    
                    $i = $i + 1;
                }
                $response['data'] = $graphData;
                $response['total'] = $total;
                $response['message'] = "success";
                echo json_encode($response);
            }
        } else {
            $response['status'] = 2;
            $response['message'] = "Opps, system error please re-login";
            echo json_encode($response);
            
        }
        
        
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function getUser($entityManager, $userID)
{
    try {
        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $userID
        ));

        if ($user != null) {
            return $user;
        } else {
            return null;
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

?>
