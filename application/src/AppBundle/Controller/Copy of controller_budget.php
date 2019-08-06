<?php
require_once (__DIR__ . '/../../../bootstrap.php');
require_once (__DIR__ . '/../../../app/application.php');

require_once (__DIR__ . '/../Entity/User.php');
require_once (__DIR__ . '/../Entity/TransactionCategory.php');
require_once (__DIR__ . '/../Entity/TransactionName.php');
require_once (__DIR__ . '/../Entity/Transaction.php');
require_once (__DIR__ . '/../Entity/Budget.php');
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

if (isset($_GET['populateCategoryBudgetForMonth'])) {
    if ($_GET['populateCategoryBudgetForMonth']) :
        populateCategoryBudgetForMonth($entityManager);
    endif;

}

function updateBudget($entityManager)
{

    // echo "teST";
    try {

        if (! is_numeric(urldecode($_GET['newAmount']))) {
            $response['status'] = 2;
            $response['message'] = "The amount must have numbers only";
            echo json_encode($response);
            return;
        }

        $budget = $entityManager->getRepository('Budget')->findOneBy(array(
            'active' => 1,
            'budgetId' => $_GET['updateBudget']
        ));

        if ($budget != null) {

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
            $response['message'] = "Oops : Failed update budget, please refresh and try again";
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
                $response['message'] = "successfully updated budget";
                echo json_encode($response);
            } else {
                $response['status'] = 2;
                $response['message'] = "Oops : failed to get the transaction to update";
                echo json_encode($response);
            }
        } else {
            $response['status'] = 2;
            $response['message'] = "Oops : failed to get user. please login again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function populateUserBudgetForMonth($entityManager)
{

    // 5/2019
    $selectedMonth;
    $selectedYear;

    if (strcmp($_GET['selectedmonth'], "now") == 0) {
        $date = new DateTime();
        $selectedMonth = $date->format('m');
        $selectedYear = $date->format('Y');
        // echo $selectedMonth . "/" . $selectedYear;
    } else {
        $selectedMonth = $_GET['selectedmonth'];
        $selectedYear = $_GET['selectedyear'];

        // add a zero in front of 4
        $pos = strrpos($selectedMonth, "0");

        if ($pos != 1) {
            $selectedMonth = "0" . $selectedMonth;
        }
    }

    try {
        $spentOrBudget = "Spent";
        echo $_GET['populateUserBudgetForMonth'];
        if (strcmp($_GET['populateUserBudgetForMonth'], "Income") == 0) {

            $spentOrBudget = "Earned";
        }

        echo '<tr class="table-row transactions-header">
            
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

                $dql = "SELECT SUM(t.amount) AS mySum, t , tc FROM Transaction t JOIN t.category tc
	where tc.name = '" . $_GET['populateUserBudgetForMonth'] . "'
	and t.active = 1
and t.user = " . $user->getUserId() . "
and t.transactionDate LIKE '%" . $selectedYear . "-" . $selectedMonth . "%'
GROUP BY t.name";

                // echo $dql;

                $query = $entityManager->createQuery($dql);
                $query->setMaxResults(5);
                $transactions = $query->getResult();

                if ($transactions != null) {
                    $i = 0;
                    foreach ($transactions as &$transaction) {

                        // get budget
                        $budgetAmount = 0;
                        $progressBarValue = 100;
                        $budgetID = "";
                        $progressBarClass = "badProgressBar";
                        $budgetForTransaction = $entityManager->getRepository('Budget')->findOneBy(array(
                            'active' => 1,
                            'transaction' => $transaction[0]->getName(),
                            'user' => $user
                        ));

                        if ($budgetForTransaction != null) {
                            $budgetAmount = $budgetForTransaction->getAmount();
                            $budgetID = "budget_" . $budgetForTransaction->getBudgetId();
                            if (intval($transactions[$i]['mySum']) > intval($budgetAmount)) {
                                $progressBarValue = 100;
                            } else {
                                $progressBarValue = (intval($transactions[$i]['mySum']) / intval($budgetAmount)) * 100;
                                if ($progressBarValue < 33) {
                                    $progressBarClass = "goodProgressBar";
                                } elseif ($progressBarValue > 32 && $progressBarValue < 67) {
                                    $progressBarClass = "normalProgressBar";
                                }
                            }
                        } else {
                            $budgetID = "transaction_" . $transaction[0]->getName()->getTransactionNameId();
                        }

                        echo '<tr class="table-row">
                            
												<td class="table-text">
													<h7>' . $transaction[0]->getName()->getName() . '</h7>
													    
												</td>
												<td><li class="' . $progressBarClass . '" data-width="' . $progressBarValue . '" data-target="100"></li></td>
												<td class="march">' . $transactions[$i]['mySum'] . '</td>
												    
												<td class="march"><input type="text" value="' . $budgetAmount . '" id="' . $budgetID . '" onchange="updateBudget(this)"></td>
											</tr>';

                        $i = $i + 1;
                    }
                } else {
                    $response['status'] = 2;
                    $response['message'] = "Exception : Failed to get transaction";
                    echo json_encode($response);
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

function populateCategoryBudgetForMonth($entityManager)
{
    $selectedMonth;
    $selectedYear;
    $totalSpent = 0;

    if (strcmp($_GET['selectedmonth'], "now") == 0) {
        $date = new DateTime();
        $selectedMonth = $date->format('m');
        $selectedYear = $date->format('Y');
        // echo $selectedMonth . "/" . $selectedYear;
    } else {
        $selectedMonth = $_GET['selectedmonth'];
        $selectedYear = $_GET['selectedyear'];

        // add a zero in front of 4
        $pos = strrpos($selectedMonth, "0");

        if ($pos != 1) {
            $selectedMonth = "0" . $selectedMonth;
        }
    }

    try {
        $spentOrBudget = "Spent";
        // echo $_GET['populateCategoryBudgetForMonth'];
        if (strcmp($_GET['populateCategoryBudgetForMonth'], "Income") == 0) {

            $spentOrBudget = "Earned";
        }

        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_GET['userId']
        ));

        if ($user != null) {
            $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
                'active' => 1,
                'name' => $_GET['populateCategoryBudgetForMonth']
            ));

            if ($category != null) {
                $sql = "select SUM(amount) as totalSpent, transaction_category.name from moneyapp.transaction
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
                    $response['status'] = 2;
                    $response['message'] = "Exception : failed to get spent for budget";
                    echo json_encode($response);
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
                        if (intval($totalSpent) > intval($budgetAmount)) {
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

                    echo '<h2>Personal Expenses</h2>
				<h2 class="float-right">' . $totalSpent . ' of ' . $budgetAmount . '</h2>
					<li class="' . $progressBarClass . '"   data-width="' . $progressBarValue . '" data-target="100"></li>';
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

function populateUserTransactionsForMonth($entityManager)
{

    // 5/2019
    $selectedMonth;
    $selectedYear;

    if (strcmp($_GET['selectedmonth'], "now") == 0) {
        $date = new DateTime();
        $selectedMonth = $date->format('m');
        $selectedYear = $date->format('Y');
        echo $selectedMonth . "/" . $selectedYear;
    } else {
        $selectedMonth = $_GET['selectedmonth'];
        $selectedYear = $_GET['selectedyear'];

        // add a zero in front of 4
        $pos = strrpos($selectedMonth, "0");

        if ($pos != 1) {
            $selectedMonth = "0" . $selectedMonth;
        }
    }

    try {

        echo '<tr class="table-row transactions-header">

												<td class="table-text"><h6>Transaction</h6></td>
												<td class="table-text"><h6>Category</h6></td>
												<td class="table-text"><h6>Amount</h6></td>

												<td class="table-text"><h6><i class="fa fa-trash"></i></h6></td>
											</tr>';

        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_GET['userId']
        ));
        if ($user != null) {
            $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
                'active' => 1,
                'name' => $_GET['populateUserTransactionsForMonth']
            ));

            if ($category != null) {

                $dql = "SELECT t, tn, tc FROM Transaction t JOIN t.name tn  JOIN t.category tc 
	where tc.name = '" . $_GET['populateUserTransactionsForMonth'] . "'
	and t.active = 1 
and t.user = " . $user->getUserId() . " 
and t.transactionDate LIKE '%" . $selectedYear . "-" . $selectedMonth . "%'
ORDER BY t.transactionDate desc";

                echo $dql;
                $query = $entityManager->createQuery($dql);
                $query->setMaxResults(100);
                $transactions = $query->getResult();

                if ($transactions != null) {
                    foreach ($transactions as &$transaction) {
                        echo '<tr class="table-row">
                            
												<td class="table-text">
													<h7>' . $transaction->getName()->getName() . '</h7>
													<p>' . $transaction->getTransactionDate()->format('Y-m-d') . '</p>
												</td>
												<td><span class="' . strtolower(str_replace(" ", "_", $_GET['populateUserTransactionsForMonth'])) . '">' . $_GET['populateUserTransactionsForMonth'] . '</span></td>
												<td class="march">' . $transaction->getAmount() . '</td>
                            
												<td><i class="fa fa-trash delete_transaction_button" onclick="deleteTranscaction(this)" id="delete_transaction_' . $transaction->getTransactionId() . '"></i></td>
											</tr>';
                    }
                } else {
                    $response['status'] = 2;
                    $response['message'] = "Exception : Failed to get transaction";
                    echo json_encode($response);
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

function deleteTransaction($entityManager)
{

    // echo "teST";
    try {

        $transaction = $entityManager->getRepository('Transaction')->findOneBy(array(
            'active' => 1,
            'transactionId' => $_GET['deleteTransaction']
        ));

        if ($transaction != null) {

            $transaction->setActive(0);

            $entityManager->persist($transaction);
            $entityManager->flush();

            $response['status'] = 1;
            $response['category'] = $transaction->getCategory()->getName();
            $response['message'] = "successfully deleted transaction";
            echo json_encode($response);
        } else {
            $response['status'] = 2;
            $response['message'] = "Oops : Failed delete transaction, please refresh and try again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

// user registration using email
function captureNewTransaction($entityManager)
{
    try {
        // echo urldecode($_POST ['transaction_name']);

        if (! is_numeric(urldecode($_POST['textTrasnctionAmount']))) {
            $response['status'] = 2;
            $response['message'] = "The amount must have numbers only";
            echo json_encode($response);
            return;
        }

        $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
            'active' => 1,
            'name' => $_POST['category']
        ), array(
            'name' => 'ASC'
        ));

        if ($category != null) {
            $transactionName = $entityManager->getRepository('TransactionName')->findOneBy(array(
                'active' => 1,
                'name' => urldecode($_POST['transaction_name'])
            ));

            if ($transactionName != null) {

                $user = $entityManager->getRepository('User')->findOneBy(array(
                    'userId' => $_POST['userId']
                ));

                if ($user != null) {
                    $date = new DateTime($_POST['transaction_date']);
                    $transaction = new Transaction();

                    $transaction->setActive(1);
                    $transaction->setAmount($_POST['textTrasnctionAmount']);
                    $transaction->setName($transactionName);
                    $transaction->setUser($user);
                    $transaction->setTransactionDate($date);
                    $transaction->setCategory($category);
                    $entityManager->persist($transaction);
                    $entityManager->flush();

                    $response['status'] = 1;
                    $response['message'] = "successfully captured new transaction";
                    echo json_encode($response);
                } else {
                    $response['status'] = 2;
                    $response['message'] = "Exception : Failed to get User";
                    echo json_encode($response);
                }
            }
        } else {
            $response['status'] = 2;
            $response['message'] = "Exception : failed to get transaction";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function populateCategoriesSelect($entityManager)
{
    try {

        // ECHO "test";
        $categories = $entityManager->getRepository('TransactionCategory')->findBy(array(
            'active' => 1
        ), array(
            'name' => 'ASC'
        ));

        if ($categories != null) {
            foreach ($categories as &$category) {
                echo '<option value="' . $category->getName() . '">' . $category->getName() . '</option>';
            }
        }
    } catch (Exception $e) {
        echo '<option value="">failed to get categories</option>';
    }
}

function populateTransactionNameSelect($entityManager)
{
    try {

        $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
            'active' => 1,
            'name' => urldecode($_GET['populateTransactionNameSelect'])
        ));

        if ($category != null) {

            $transactionNames = $entityManager->getRepository('TransactionName')->findBy(array(
                'active' => 1,
                'category' => $category
            ), array(
                'name' => 'ASC'
            ));

            if ($transactionNames != null) {
                // echo "test";
                foreach ($transactionNames as &$transactionName) {
                    echo '<option value="' . $transactionName->getName() . '">' . $transactionName->getName() . '</option>';
                }
            } else {
                echo '<option value="">failed to get transaction names</option>';
            }
        } else {
            echo '<option value="">failed to get transaction categories</option>';
        }
    } catch (Exception $e) {
        echo '<option value="">failed to get transaction names</option>';
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
