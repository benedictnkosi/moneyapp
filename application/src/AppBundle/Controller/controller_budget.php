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

if (isset($_GET['populateCategoriesSelect'])) {
    if ($_GET['populateCategoriesSelect']) :
        populateCategoriesSelect($entityManager);
	endif;

}

if (isset($_GET['populateTransactionNameSelect'])) {
    if ($_GET['populateTransactionNameSelect']) :
    
   
        populateTransactionNameSelect($entityManager);
    
    endif;

}

if (isset($_POST['textTrasnctionAmount'])) {
    if ($_POST['textTrasnctionAmount']) :
        captureNewTransaction($entityManager);
    
    endif;

}

if (isset($_GET['deleteTransaction'])) {
    if ($_GET['deleteTransaction']) :
        deleteTransaction($entityManager);
    
    endif;

}

if (isset($_GET['populateUserTransactionsForMonth'])) {
    if ($_GET['populateUserTransactionsForMonth']) :
        populateUserTransactionsForMonth($entityManager);
    
    endif;

}

if (isset($_GET['populateUserBudgetForMonth'])) {
    if ($_GET['populateUserBudgetForMonth']) :
        populateUserBudgetForMonth($entityManager);
    
    endif;

}

if (isset($_GET['updateBudget'])) {
    if ($_GET['updateBudget']) :
        updateBudget($entityManager);
    
    endif;

}

if (isset($_GET['createBudget'])) {
    if ($_GET['createBudget']) :
        createBudget($entityManager);
    endif;

}

if (isset($_GET['populateBudgetOverallCategory'])) {
    if ($_GET['populateBudgetOverallCategory']) :

        getCategoryBudgetForMonthHTML($entityManager, $_GET['populateBudgetOverallCategory'], $_GET['selectedmonth'], $_GET['selectedyear']);
    
    endif;

}

if (isset($_GET['populateIncomeVsBudgetProgress'])) {
    if ($_GET['populateIncomeVsBudgetProgress']) :

        populateIncomeVsBudgetProgress($entityManager, $_GET['selectedmonth'], $_GET['selectedyear']);
    
    endif;

}


if (isset($_GET['captureNewBudgetItem'])) {
    if ($_GET['captureNewBudgetItem']) :
        captureNewBudgetItem($entityManager);
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

// user registration using email
function captureNewBudgetItem($entityManager)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
        }
    } catch (Exception $e) {}
    try {

        $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
            'active' => 1,
            'name' => $_POST['category']
        ), array(
            'name' => 'ASC'
        ));

        if ($category != null) {
            $UserTransactionName = $entityManager->getRepository('UserTransactionName')->findOneBy(array(
                'active' => 1,
                'userTransactionNameId' => urldecode($_POST['transaction_name'])
            ));

            if ($UserTransactionName != null) {

                $user = $entityManager->getRepository('User')->findOneBy(array(
                    'userId' => $_SESSION['user_id']
                ));

                if ($user != null) {

                    // check if budget alread exists for user
                    $budget = $entityManager->getRepository('Budget')->findOneBy(array(
                        'active' => 1,
                        'transaction' => $UserTransactionName->getTransaction(),
                        'user' => $user
                    ));

                    if ($budget != null) {
                        $response['status'] = 2;
                        $response['message'] = "Budget item already added";
                        echo json_encode($response);
                        return;
                    }

                    $date = new DateTime();
                    $transaction = new Transaction();

                    $transaction->setActive(1);
                    $transaction->setAmount(0);
                    $transaction->setName($UserTransactionName->getTransaction());
                    $transaction->setUser($user);
                    $transaction->setTransactionDate($date);
                    $transaction->setCategory($category);
                    $transaction->setDescription("no description");

                    $entityManager->persist($transaction);
                    $entityManager->flush();

                    $budgetItem = new Budget();

                    $budgetItem->setAmount(0);
                    $budgetItem->setActive(1);
                    $budgetItem->setTransaction($transaction->getName());
                    $budgetItem->setUser($user);

                    $entityManager->persist($budgetItem);
                    $entityManager->flush();

                    $response['status'] = 1;
                    $response['message'] = "successfully captured new budget item";
                    echo json_encode($response);
                } else {
                    $response['status'] = 2;
                    $response['message'] = "Exception : Failed to get User, please login again";
                    echo json_encode($response);
                }
            } else {
                $response['status'] = 2;
                $response['message'] = "Exception : Failed to get transaction, conctact admin";
                echo json_encode($response);
            }
        } else {
            $response['status'] = 2;
            $response['message'] = "Exception : failed to get category";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function updateBudget($entityManager)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}

    try {

        if (! is_numeric(urldecode($_GET['newAmount']))) {
            $response['status'] = 2;
            $response['message'] = "The amount must have numbers only";
            echo json_encode($response);
            return;
        }

        // check if user has enough income to update budget amount

        $budget = $entityManager->getRepository('Budget')->findOneBy(array(
            'active' => 1,
            'budgetId' => $_GET['updateBudget']
        ));

        if ($budget != null) {

            // check if user has enough income to update budget amount
            $budget_spending = intval($_SESSION['budget_spending']);
            $budget_income = intval($_SESSION['budget_income']);
            $availablebudget = $budget_income - $budget_spending;
            $originalAmount = intval($budget->getAmount());
            $budgetCategory = $budget->getTransaction()
                ->getCategory()
                ->getName();

            // echo 'available budget ' . $availablebudget;
            if (strcmp($budgetCategory, "Income") !== 0) {

                if (intval($_GET['newAmount']) > $originalAmount) {
                    if ((intval($_GET['newAmount']) - $originalAmount) > $availablebudget) {
                        $response['status'] = 2;
                        $response['message'] = "You have reached your budget income. Budget more income";
                        echo json_encode($response);
                        return;
                    }
                }
            }

            $budget->setAmount($_GET['newAmount']);

            $entityManager->persist($budget);
            $entityManager->flush();

            $response['status'] = 1;
            $response['message'] = "successfully updated budget";
            echo json_encode($response);
        } else {

            // get user
            $user = getUser($entityManager, $_GET['userId']);
            if ($user != null) {
                // get Transaction

                $budget = new Budget();
                $budget->getUser();
                $budget->setTransaction();
                $budget->setAmount($_GET['newAmount']);
                $budget->setActive(1);
            }

            $response['status'] = 2;
            $response['message'] = "Failed update budget, please refresh and try again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function createBudget($entityManager)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
    try {

        if (! is_numeric(urldecode($_GET['newAmount']))) {
            $response['status'] = 2;
            $response['message'] = "The amount must have numbers only";
            echo json_encode($response);
            return;
        }

        // get user
        $user = getUser($entityManager, $_GET['userId']);
        if ($user != null) {
            // get Transaction
            $transactionName = $entityManager->getRepository('TransactionName')->findOneBy(array(
                'transactionNameId' => $_GET['createBudget']
            ));

            if ($transactionName != null) {

                $budget = new Budget();
                $budget->setUser($user);
                $budget->setTransaction($transactionName);
                $budget->setAmount($_GET['newAmount']);
                $budget->setActive(1);

                $entityManager->persist($budget);
                $entityManager->flush();

                $response['status'] = 1;
                $response['message'] = "successfully created budget";
                echo json_encode($response);
            } else {
                $response['status'] = 2;
                $response['message'] = "failed to get the transaction to update";
                echo json_encode($response);
            }
        } else {
            $response['status'] = 2;
            $response['message'] = "failed to get user. please login again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function populateTransactionNameSelect($entityManager)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
    try {
        // echo $_SESSION ['user_id'];
        $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
            'active' => 1,
            'name' => urldecode($_GET['populateTransactionNameSelect'])
        ));

        if ($category != null) {

            $dql = "Select utn, tn from UserTransactionName utn JOIN utn.transaction tn
where utn.active = 1 and utn.user = " . $_SESSION['user_id'] . " ORDER BY tn.name asc";

            
            $query = $entityManager->createQuery($dql);
            $query->setMaxResults(100);
            $userTransactionNames = $query->getResult();

            if ($userTransactionNames != null) {
                // echo "test";
                foreach ($userTransactionNames as &$userTransactionName) {
                    if ($userTransactionName->getTransaction()->getCategory() == $category) {
                        echo '<option value="' . $userTransactionName->getUserTransactionNameId() . '">' . $userTransactionName->getTransaction()->getName() . '</option>';
                    }
                }

                echo '<option value="new_custom">--Add Custom Name--</option>';
            }else{
                echo '<option value="new_custom">--Add Custom Name--</option>';
            }
        } else {
            echo '<option value="">failed to get transaction categories</option>';
        }
    } catch (Exception $e) {
        echo '<option value="">' . $e->getMessage() . '</option>';
    }
}

function populateUserBudgetForMonth($entityManager)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
    // 5/2019
    $selectedMonth;
    $selectedYear;
    $date = new DateTime();
    if (strcmp($_GET['selectedmonth'], "now") == 0) {

        $selectedMonth = $date->format('m');
        $selectedYear = $date->format('Y');
        // echo $selectedMonth . "/" . $selectedYear;
    } else {
        $selectedMonth = $_GET['selectedmonth'];
        $selectedYear = $_GET['selectedyear'];
        $date = new DateTime($selectedYear . "/" . $selectedMonth . "/01");
        // add a zero in front of 4
        $pos = strrpos($selectedMonth, "0");

        if ($pos != 1) {
            $selectedMonth = "0" . $selectedMonth;
        }
    }

    try {
        $spentOrBudget = "Spent";
        // echo $_GET['populateUserBudgetForMonth'];
        if (strcmp($_GET['populateUserBudgetForMonth'], "Income") == 0) {

            $spentOrBudget = "Earned";
        }

        $overall_progress = getCategoryBudgetForMonthHTML($entityManager, $_GET['populateUserBudgetForMonth'], $selectedMonth, $selectedYear);

        // echo $overall_progress;
        echo '<div class="inbox-right">

								<div class="mailbox-content">
                                <h2 class="monthDisplay">' . $_GET['populateUserBudgetForMonth'] . '</h2>
									<div class="mail-toolbar clearfix"></div>
									<table class="table">
										<tbody id="personal_expenses_table"><tr class="table-row transactions-header">
            
												<td class="table-text"><h6>Category</h6></td>
												<td class="table-text"><h6>Progress</h6></td>
												<td class="table-text"><h6>' . $spentOrBudget . '</h6></td>
												<td class="table-text"><h6>Budget</h6></td>
												    
											</tr>';

        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_GET['userId']
        ));

        if ($user != null) {
            $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
                'active' => 1,
                'name' => $_GET['populateUserBudgetForMonth']
            ));

            if ($category != null) {
                // get budget
                $budgetAmount = 0;
                $progressBarValue = 100;
                $budgetID = "";
                $totalSpentID = "";
                $progressbartdID = "";
                $progressBarClass = "badProgressBar";

                $dql = "Select b, tn, tc from Budget b JOIN b.transaction tn JOIN tn.category tc 
where b.active = 1 and 
b.user = " . $_SESSION['user_id'] . " 
and tc.name = '" . $category->getName() . "' 
ORDER BY tn.name asc";

                // echo $dql;
                $query = $entityManager->createQuery($dql);
                $query->setMaxResults(100);
                $budgets = $query->getResult();

                if ($budgets != null) {

                    // echo "test";
                    foreach ($budgets as &$budgetForTransaction) {
                        // echo $budgetForTransaction->getTransaction()->getName() . " - ";
                        // get spent
                        // echo $budgetForTransaction->getTransaction()->getName();
                        $sql = "select sum(amount) as sum from transaction t 
                where t.active = 1
                and t.user = " . $user->getUserId() . "
                and t.transaction_date LIKE '%" . $selectedYear . "-" . $selectedMonth . "%'
                and t.name = " . $budgetForTransaction->getTransaction()->getTransactionNameId();

                        // echo $sql;
                        $results = querydatabase($sql);
                        $rsType = gettype($results);
                        $sumSpent = 0;
                        if (strcasecmp($rsType, "string") == 0) {} else {
                            while ($trasnasction = $results->fetch_assoc()) {
                                $sumSpent = $trasnasction["sum"];
                                if ($sumSpent == null) {
                                    $sumSpent = 0;
                                }
                            }
                        }

                        $budgetAmount = $budgetForTransaction->getAmount();
                        $budgetID = "budget_" . $budgetForTransaction->getBudgetId();
                        $totalSpentID = "totalspent_" . $budgetForTransaction->getBudgetId();
                        $progressbartdID = "progressbartd_" . $budgetForTransaction->getBudgetId();

                        if (intval($sumSpent) > intval($budgetAmount) || ($budgetAmount == 0)) {
                            $progressBarValue = 100;
                        } else {
                            $progressBarValue = (intval($sumSpent) / intval($budgetAmount)) * 100;
                            if ($progressBarValue < 33) {
                                $progressBarClass = "goodProgressBar";
                            } elseif ($progressBarValue > 32 && $progressBarValue < 67) {
                                $progressBarClass = "normalProgressBar";
                            }
                        }

                        echo '<tr class="table-row">
                            
												<td class="table-text">
													<h7>' . $budgetForTransaction->getTransaction()->getName() . '</h7>
													    
												</td>
												<td id="' . $progressbartdID . '"><li  class="' . $progressBarClass . '" data-width="' . intval($progressBarValue) . '" data-target="100"></li></td>
												<td class="march" id="' . $totalSpentID . '">' . $sumSpent . '</td>
												    
												<td class="march"><input type="text" class="budgetInputBox ' . strtolower(str_replace(" ", "", $category->getName())) . '" value="' . $budgetAmount . '" id="' . $budgetID . '" " maxlength="6"></td>
											</tr>';
                    }

                    echo '</tbody>
									</table></div>
							</div>';
                }
            } else {
                $response['status'] = 2;
                $response['message'] = "Exception : Failed to get category";
                echo json_encode($response);
            }
        } else {
            $response['status'] = 2;
            $response['message'] = "Exception : Failed to get User";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        echo $e;
    }
}



function getCategoryBudgetForMonthHTML($entityManager, $categoryName, $selectedMonth, $selectedYear)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}

    try {

        // add a zero in front of 4
        $pos = strrpos($selectedMonth, "0");
        // echo $selectedMonth ." pos " .$pos;
        if ($pos !== 1 && $pos !== 0) {
            $selectedMonth = "0" . $selectedMonth;
        }

        $spentOrBudget = "Spent";
        // echo $_GET['populateCategoryBudgetForMonth'];
        if (strcmp($categoryName, "Income") == 0) {

            $spentOrBudget = "Earned";
        }

        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_SESSION['user_id']
        ));

        if ($user != null) {
            $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
                'active' => 1,
                'name' => $categoryName
            ));

            if ($category != null) {

                $sql = "select SUM(amount) as totalSpent, transaction_category.name from transaction
inner join transaction_category on transaction.category = transaction_category.transaction_category_id
where transaction_category.name = '" . $category->getName() . "'
and transaction.user = " . $user->getUserId() . "
and transaction.active = 1
and transaction.transaction_date LIKE '%" . $selectedYear . "-" . $selectedMonth . "%'
group by transaction_category.name;";

                // echo $sql;

                $results = querydatabase($sql);
                $rsType = gettype($results);
                if (strcasecmp($rsType, "string") == 0) {
                    // echo 'total spent not found';
                    return;
                } else {
                    while ($row = $results->fetch_assoc()) {
                        $totalSpent = $row["totalSpent"];
                    }
                }

                $i = 0;

                // get budget
                $budgetAmount = 0;
                $progressBarValue = 100;
                $budgetID = "";
                $progressBarClass = "badProgressBar";

                $budgetSql = "select sum(amount) as budgeted from budget
inner join transaction_name  on budget.transaction = transaction_name.transaction_name_id
inner join transaction_category on transaction_name.category = transaction_category.transaction_category_id
where transaction_category.name = '" . $category->getName() . "' 
and budget.user = " . $user->getUserId() . "
and budget.active = 1 ";

                // echo $budgetSql;
                $budgetresults = querydatabase($budgetSql);
                $rsType = gettype($budgetresults);
                if (strcasecmp($rsType, "string") == 0) {
                    $response['status'] = 2;
                    $response['message'] = "Exception : budget for category";
                    echo json_encode($response);
                    return;
                } else {
                    while ($row = $budgetresults->fetch_assoc()) {

                        $budgetAmount = $row["budgeted"];

                        if (! $budgetAmount) {
                            $budgetAmount = 0;
                        }
                        if (intval($totalSpent) > intval($budgetAmount) || intval($budgetAmount) == 0) {
                            $progressBarValue = 100;
                        } else {
                            $progressBarValue = (intval($totalSpent) / intval($budgetAmount)) * 100;
                            if ($progressBarValue < 33) {
                                $progressBarClass = "goodProgressBar";
                            } elseif ($progressBarValue > 32 && $progressBarValue < 67) {
                                $progressBarClass = "normalProgressBar";
                            }
                        }
                    }

                    // echo 'test';
                    echo '<div id="category_prgress_div_' . strtolower(str_replace(" ", "", $category->getName())) . '">';
                    echo '<h5 class="float-right">' . $totalSpent . ' of ' . $budgetAmount . '</h5>
<h5 class="float-left">' . $category->getName() . ' (' . $spentOrBudget . ' VS Budgeted)</h5>
					<li class="' . $progressBarClass . '"   data-width="' . intval($progressBarValue) . '" data-target="100"></li>';
                    echo '</div>';
                    // return $response;
                }
            } else {
                echo '<h2>Exception : Failed to get Category For overall budget</h2>';
            }
        } else {
            echo '<h2>Exception : Failed to get User For overall budget</h2>';
        }
    } catch (Exception $e) {
        echo '<h2>Exception : Failed to overall budget</h2>';
    }
}

function populateIncomeVsBudgetProgress($entityManager, $selectedMonth, $selectedYear)
{
    try {
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}

    try {

        // add a zero in front of 4
        $pos = strrpos($selectedMonth, "0");
        // echo $selectedMonth ." pos " .$pos;
        if ($pos !== 1 && $pos !== 0) {
            $selectedMonth = "0" . $selectedMonth;
        }

        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_SESSION['user_id']
        ));

        if ($user != null) {

            $sql = "select sum(amount) as spent from budget
inner join transaction_name  on budget.transaction = transaction_name.transaction_name_id
inner join transaction_category on transaction_name.category = transaction_category.transaction_category_id
where transaction_category.name not in ('income')
and budget.user = " . $user->getUserId() . "
and budget.active = 1 ";

            // echo $sql;

            $results = querydatabase($sql);
            $rsType = gettype($results);
            if (strcasecmp($rsType, "string") == 0) {
                return;
            } else {
                while ($row = $results->fetch_assoc()) {
                    $totalSpent = $row["spent"];
                    if ($totalSpent == null) {

                        $totalSpent = 0;
                    }
                    $_SESSION['budget_spending'] = $totalSpent;
                }
            }

            $i = 0;

            // get budget
            $budgetAmount = 0;
            $progressBarValue = 100;
            $budgetID = "";
            $progressBarClass = "badProgressBar";

            $budgetSql = "select sum(amount) as budgeted from budget
inner join transaction_name  on budget.transaction = transaction_name.transaction_name_id 
inner join transaction_category on transaction_name.category = transaction_category.transaction_category_id
where transaction_category.name in ('income') 
and budget.user = " . $user->getUserId() . "
and budget.active = 1 ";

            // echo $budgetSql;
            $budgetresults = querydatabase($budgetSql);
            $rsType = gettype($budgetresults);
            if (strcasecmp($rsType, "string") == 0) {

                return;
            } else {
                while ($row = $budgetresults->fetch_assoc()) {

                    $budgetAmount = $row["budgeted"];
                    $_SESSION['budget_income'] = $budgetAmount;
                    if (! $budgetAmount) {
                        $budgetAmount = 0;
                    }
                    if (intval($totalSpent) > intval($budgetAmount) || intval($budgetAmount) == 0) {
                        $progressBarValue = 100;
                    } else {
                        $progressBarValue = (intval($totalSpent) / intval($budgetAmount)) * 100;
                        if ($progressBarValue < 33) {
                            $progressBarClass = "goodProgressBar";
                        } elseif ($progressBarValue > 32 && $progressBarValue < 67) {
                            $progressBarClass = "normalProgressBar";
                        }
                    }
                }

                // echo 'test';

                echo '<h5 class="float-right">' . $totalSpent . ' of ' . $budgetAmount . '</h5>
<h5 class="float-left"> Budgeted Spending  VS Budgeted Income</h5>
					<li class="' . $progressBarClass . '"   data-width="' . intval($progressBarValue) . '" data-target="100"></li>';

                // return $response;
            }
        } else {
            echo '<h2>Exception : Failed to get User For income vs expenses</h2>';
        }
    } catch (Exception $e) {
        echo '<h2>Exception : failed to generate income vs expenses</h2>';
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
