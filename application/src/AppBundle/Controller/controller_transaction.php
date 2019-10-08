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

if (isset($_REQUEST['getCategories'])) {
    if ($_REQUEST['getCategories']) :
    getCategories($entityManager);
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

if (isset($_POST['textNewTrasnctionName'])) {
    if ($_POST['textNewTrasnctionName']) :
        captureNewTransactionName($entityManager);
    
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

if (isset($_GET['populateDashboardBudget'])) {
    if ($_GET['populateDashboardBudget']) :
        populateDashboardBudget($entityManager);
    endif;

}

if (isset($_GET['updateDescription'])) {
    if ($_GET['updateDescription']) :
        updateDescription($entityManager);
    endif;

}

if (isset($_GET['deleteTransactionName'])) {
    if ($_GET['deleteTransactionName']) :
        deleteTransactionName($entityManager);
    endif;

}

if (isset($_GET['populateTransactionNames'])) {
    if ($_GET['populateTransactionNames']) :
        populateTransactionNames($entityManager);
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
                return false;
                header("Location: signin.html");
            } else {
                // echo "session expired";
                // set new time
                $_SESSION['timeout_idle'] = time() + 1800;
                return true;
            }
        } else {
            // echo "timeout_idle not set";
            return false;
            header("Location: signin.html");
        }
    } catch (Exception $e) {}
}

function populateUserTransactionsForMonth($entityManager)
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

        echo '<div class="inbox-right">

								<div class="mailbox-content">
								<h2 class="monthDisplay">' . $_GET['populateUserTransactionsForMonth'] . '</h2>
								
									<div class="mail-toolbar clearfix"></div>
									<table class="table">
										<tbody id="personal_expenses_table"><tr class="table-row transactions-header">

												<td class="table-text"><h6>Transaction</h6></td>
												<td class="table-text"><h6>Description</h6></td>
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
and t.amount > 0 
ORDER BY t.transactionDate desc";

                // echo $dql;
                $query = $entityManager->createQuery($dql);
                $query->setMaxResults(100);
                $transactions = $query->getResult();

                if ($transactions != null) {
                    foreach ($transactions as &$transaction) {
                        /*
                         * $description;
                         * if (strcmp($transaction->getDescription(), "click to add description") !== 0) {
                         * $description = 0;
                         * };
                         */

                        echo '<tr class="table-row">
                            
												<td class="table-text">
													<h7>' . $transaction->getName()->getName() . '</h7>';

                        echo '<p>' . $transaction->getTransactionDate()->format('Y-m-d') . '</p>

												</td>';

                        if (strcmp($transaction->getDescription(), "no description") !== 0) {
                            echo '<td  class="table-text"><p id="descriptionP_' . $transaction->getTransactionId() . '">'.$transaction->getDescription().'</p></td>';
                        } else {
                            echo '<td  class="table-text"><p id="descriptionP_' . $transaction->getTransactionId() . '"></p></td>';
                        }
                        ;

                        echo '<td class="march">' . $transaction->getAmount() . '</td>
                            
												<td><i class="fa fa-trash delete_transaction_button" onclick="deleteTranscaction(this)" id="delete_transaction_' . $transaction->getTransactionId() . '"></i>
 <div class="popup" onclick="showPopUp(this)" id="popup_' . $transaction->getTransactionId() . '"><i class="fa fa-edit"></i><span class="popuptext" id="myPopup_' . $transaction->getTransactionId() . '"><input type="text" maxlength="20" onchange="updateDescription(this)" placeholder="Custom Description" id="description_' . $transaction->getTransactionId() . '" class="description_text" maxlength="30"><i class="fa fa-close closer_popup_button" onclick="closepopup(this)" id="close_popup_button_' . $transaction->getTransactionId() . '"></i></span></div>
</td>
											</tr>';
                    }

                    echo '</tbody>
									</table>
								</div>
							</div>';
                } else {}
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

function updateDescription($entityManager)
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

        $transaction = $entityManager->getRepository('Transaction')->findOneBy(array(
            'active' => 1,
            'transactionId' => $_GET['updateDescription']
        ));

        if ($transaction != null) {

            $transaction->setDescription($_GET['description']);

            $entityManager->persist($transaction);
            $entityManager->flush();

            $response['status'] = 1;
            $response['category'] = $transaction->getCategory()->getName();
            $response['message'] = "successfully updated transaction";
            echo json_encode($response);
        } else {
            $response['status'] = 2;
            $response['message'] = "Failed update transaction, please refresh and try again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function deleteTransaction($entityManager)
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
            $response['message'] = "Failed delete transaction, please refresh and try again";
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
        if (startSession() == false) {
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
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
            $UserTransactionName = $entityManager->getRepository('UserTransactionName')->findOneBy(array(
                'active' => 1,
                'transaction' => urldecode($_POST['transaction_name']),
                'user' => $_SESSION['user_id']
            ));

            if ($UserTransactionName != null) {

                $user = $entityManager->getRepository('User')->findOneBy(array(
                    'userId' => $_SESSION['user_id']
                ));

                if ($user != null) {
                    $date = new DateTime($_POST['transaction_date']);
                    $transaction = new Transaction();

                    $transaction->setActive(1);
                    $transaction->setAmount($_POST['textTrasnctionAmount']);
                    $transaction->setName($UserTransactionName->getTransaction());
                    $transaction->setUser($user);
                    $transaction->setTransactionDate($date);
                    $transaction->setCategory($category);
                    $transaction->setDescription("no description");

                    $entityManager->persist($transaction);
                    $entityManager->flush();

                    $response['status'] = 1;
                    $response['message'] = "successfully captured new transaction";
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
            $response['message'] = "Exception : failed to get transaction";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function deleteTransactionName($entityManager)
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

        $transactionName = $entityManager->getRepository('UserTransactionName')->findOneBy(array(
            'active' => 1,
            'userTransactionNameId' => $_GET['deleteTransactionName']
        ));

        if ($transactionName != null) {

            $transactionName->setActive(0);

            $entityManager->persist($transactionName);
            $entityManager->flush();

            $response['status'] = 1;
            $response['message'] = "successfully deleted transaction name";
            echo json_encode($response);
        } else {
            $response['status'] = 2;
            $response['message'] = "Failed to delete transaction name, please refresh and try again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function captureNewTransactionName($entityManager)
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

        $category = $entityManager->getRepository('TransactionCategory')->findOneBy(array(
            'active' => 1,
            'name' => $_POST['category']
        ), array(
            'name' => 'ASC'
        ));

        if ($category != null) {

           
            $user = $entityManager->getRepository('User')->findOneBy(array(
                'userId' => $_SESSION['user_id']
            ));

            if ($user != null) {
                
                //check if transaction is already addedd for user
                
                
                $dql = "Select utn, tn from UserTransactionName utn JOIN utn.transaction tn
where utn.active = 1 and utn.user = " . $_SESSION['user_id'] . " and  tn.name = '" . $_POST['textNewTrasnctionName'] . "' ORDER BY tn.name asc";
                
              //  ECHO $dql;
                $query = $entityManager->createQuery($dql);
                $query->setMaxResults(100);
                $userTransactionNames = $query->getResult();

                if($userTransactionNames){
                    $response['status'] = 2;
                    $response['message'] = "Transaction name already added";
                    echo json_encode($response);
                    return;
                }
                $TransactionName = new TransactionName();

                $TransactionName->setName($_POST['textNewTrasnctionName']);
                $TransactionName->setActive(1);
                $TransactionName->setCustom(1);
                $TransactionName->setCategory($category);

                $entityManager->persist($TransactionName);
                $entityManager->flush();

                if ($TransactionName != null) {
                    $userTransactionName = new UserTransactionName();

                    $userTransactionName->setActive(1);
                    $userTransactionName->setUser($user);
                    $userTransactionName->setTransaction($TransactionName);

                    $entityManager->persist($userTransactionName);
                    $entityManager->flush();
                }

                $response['status'] = 1;
                $response['message'] = "successfully captured new transaction name";
                echo json_encode($response);
            } else {
                $response['status'] = 2;
                $response['message'] = "Exception : Failed to get User, please login again";
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

function populateTransactionNames($entityManager)
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

        $dql = "Select utn, tn from UserTransactionName utn JOIN utn.transaction tn JOIN tn.category tc
where utn.active = 1 and utn.user = " . $_SESSION['user_id'] . " and  tc.name = '" . $_GET['populateTransactionNames'] . "' ORDER BY tn.name asc";

        $query = $entityManager->createQuery($dql);
        $query->setMaxResults(100);
        $userTransactionNames = $query->getResult();

        // $userTransactionName->getTransaction()->getTransactionNameId() . '">' . $userTransactionName->getTransaction()->getName()
        if ($userTransactionNames != null) {
            // echo "test";
            foreach ($userTransactionNames as &$userTransactionName) {
                echo '<li><a href="javascript:void(0)">' . $userTransactionName->getTransaction()->getName() . ' <i class="fa fa-trash float-right" id="customTransaction_' . $userTransactionName->getUserTransactionNameId() . '" onclick="deleteTranscactionName(this)"></i></a></li>';
            }
        } else {
            echo 'Add custom transaction names to have more control';
        }
    } catch (Exception $e) {
        echo $e;
    }
}

function populateCategoriesSelect($entityManager)
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


function getCategories($entityManager)
{
    
    $categoriesArray = array();
    
    try {
        
        // ECHO "test";
        $categories = $entityManager->getRepository('TransactionCategory')->findBy(array(
            'active' => 1
        ), array(
            'name' => 'ASC'
        ));
        
        if ($categories != null) {
            foreach ($categories as &$category) {
                $response['value'] = $category->getName();
                $response['text'] = $category->getName();
                
                array_push($categoriesArray, $response);
            }
        }
        
        echo json_encode($categoriesArray);
        
    } catch (Exception $e) {
        echo json_encode($categoriesArray);
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

            $dql = "Select b, tn, tc from Budget b JOIN b.transaction tn JOIN tn.category tc 
where b.active = 1 and b.user = " . $_SESSION['user_id'] . " and b.amount > 0 
and tc.name = '" . $category->getName() . "' ORDER BY tn.name asc";

            //echo $dql;
            $query = $entityManager->createQuery($dql);
            $query->setMaxResults(100);
            $budgets = $query->getResult();

            if ($budgets != null) {
                // echo "test";
                foreach ($budgets as &$budget) {
                    if ($budget->getTransaction()->getCategory() == $category) {
                        echo '<option value="' . $budget->getTransaction()->getTransactionNameId() . '">' . $budget->getTransaction()->getName() . '</option>';
                    }
                }

                echo '<option value="new_custom">--Add Items to budget--</option>';
            }else{
                echo '<option value="new_custom">--Add Items to budget first--</option>';
            }
        } else {
            echo '<option value="">failed to get transaction categories</option>';
        }
    } catch (Exception $e) {
        echo '<option value="">' . $e->getMessage() . '</option>';
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
