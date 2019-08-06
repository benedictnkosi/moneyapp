<?php
require_once (__DIR__ . '/../../../bootstrap.php');
require_once (__DIR__ . '/../../../app/application.php');

require_once (__DIR__ . '/../Entity/User.php');
require_once (__DIR__ . '/../Entity/AccountType.php');
require_once (__DIR__ . '/../Entity/Account.php');
require_once (__DIR__ . '/../Entity/UserAccount.php');
require_once (__DIR__ . '/dataobject.php');

if (isset($_POST['addNewAccount'])) {
    if ($_POST['addNewAccount']) :
        addNewAccount($entityManager);
    endif;

}

if (isset($_GET['deleteTransaction'])) {
    if ($_GET['deleteTransaction']) :
        deleteTransaction($entityManager);
    
    endif;

}

if (isset($_GET['populateUserAccounts'])) {
    if ($_GET['populateUserAccounts']) :
        populateUserAccounts($entityManager);
    
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

if (isset($_GET['updateGoal'])) {
    if ($_GET['updateGoal']) :
        updateGoal($entityManager);
    endif;

}

if (isset($_GET['updateBalance'])) {
    if ($_GET['updateBalance']) :
        updateBalance($entityManager);
    endif;

}

if (isset($_GET['populateAccountTypeSelect'])) {
    if ($_GET['populateAccountTypeSelect']) :
        populateAccountTypeSelect($entityManager);
    endif;

}

if (isset($_GET['updateInterestRate'])) {
    if ($_GET['updateInterestRate']) :
    updateInterestRate($entityManager);
    endif;
    
}


function startSession()
{
    try {
        if(!isset($_SESSION ['timeout_idle'] ))
        {
            // echo "starting session";
            session_start();
        }
        
        //print_r ($_SESSION);
        
        $cur_time = time();
        
        if(isset ( $_SESSION ['timeout_idle'] )){
            if($cur_time > $_SESSION['timeout_idle']){
                //destroy the session (reset)
                session_destroy();
                return false;
            }else{
                //echo "session expired";
                //set new time
                $_SESSION['timeout_idle'] = time() + 1800;
                return true;
            }
        }else{
            // echo "timeout_idle not set";
            return false;
        }
        
        
    } catch (Exception $e) {}
}

function populateAccountTypeSelect($entityManager)
{
    try {
        if(startSession() == false){
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
    try {

        // ECHO "test";
        $accountTypes = $entityManager->getRepository('AccountType')->findBy(array(
            'active' => 1
        ), array(
            'name' => 'ASC'
        ));

        if ($accountTypes != null) {
            foreach ($accountTypes as &$accountType) {
                echo '<option value="' . $accountType->getName() . '">' . $accountType->getName() . '</option>';
            }
        }
    } catch (Exception $e) {
        echo '<option value="">failed to get account typess/option>';
    }
}

function addNewAccount($entityManager)
{
    try {
        if(startSession() == false){
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}
    try {

        if (isset($_GET['textbalanceAmount'])) {
            if (! is_numeric(urldecode($_POST['textbalanceAmount']))) {
                $response['status'] = 2;
                $response['message'] = "The amount must have numbers only";
                echo json_encode($response);
                return;
            }
        }

        $accountType = $entityManager->getRepository('AccountType')->findOneBy(array(
            'active' => 1,
            'name' => $_POST['accounttypes']
        ), array(
            'name' => 'ASC'
        ));

        if ($accountType != null) {
            $account = $entityManager->getRepository('Account')->findOneBy(array(
                'active' => 1,
                'name' => urldecode($_POST['account_name']),
                'type' => $accountType,
                'active'=> 1
            ));

            if ($account == null) {
                $account = new Account();
            } else {
                $dql = "SELECT distinct ua, a, at FROM UserAccount ua JOIN ua.account a JOIN  a.type at
     where at.name =  '" . $accountType->getName() . "' and
     ua.user =  " . $_SESSION['user_id'] . " and a.name = '" . urldecode($_POST['account_name']) . "' and ua.active = 1 ";

                $query = $entityManager->createQuery($dql);
                $query->setMaxResults(100);
                $userAccounts = $query->getResult();
                if ($userAccounts != null) {
                    $response['status'] = 2;
                    $response['message'] = "You already have this account";
                    echo json_encode($response);
                    return;
                }
            }

            $user = $entityManager->getRepository('User')->findOneBy(array(
                'userId' => $_SESSION['user_id']
            ));

            if ($user != null) {
                $date = new DateTime();

                $account->setActive(1);
                $account->setName($_POST['account_name']);
                $account->setType($accountType);

                $entityManager->persist($account);
                $entityManager->flush();

                // link new account to user

                $userAccount = new UserAccount();
                $userAccount->setBalance($_POST['textbalanceAmount']);
                $userAccount->setGoalAmount(0);
                $userAccount->setUser($user);
                $userAccount->setAccount($account);
                $userAccount->setTransactionDate($date);
                $userAccount->setActive(1);

                $entityManager->persist($userAccount);
                $entityManager->flush();

                $response['status'] = 1;
                $response['message'] = "successfully captured new account";
                echo json_encode($response);
            } else {
                $response['status'] = 2;
                $response['message'] = "Exception : failed to get user account type";
                echo json_encode($response);
            }
        } else {
            $response['status'] = 2;
            $response['message'] = "Exception : failed to get account type";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function updateBalance($entityManager)
{
    try {
        if(startSession() == false){
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
        
       

        $oldUserAccount = $entityManager->getRepository('UserAccount')->findOneBy(array(
            'active' => 1,
            'userAccountId' => $_GET['updateBalance'],
            'active'=> 1
        ));

        if ($oldUserAccount != null) {

            $date = new DateTime();
            
            $oldUserAccount->setActive(0);

            $entityManager->persist($oldUserAccount);
            $entityManager->flush();

            //create new UserAccount record
            
            $userAccount = new UserAccount();
            $userAccount->setBalance($_GET['newAmount']);
            $userAccount->setGoalAmount($oldUserAccount->getGoalAmount());
            $userAccount->setUser($oldUserAccount->getUser());
            $userAccount->setAccount($oldUserAccount->getAccount());
            $userAccount->setTransactionDate($date);
            $userAccount->setActive(1);
            
            $entityManager->persist($userAccount);
            $entityManager->flush();
            
            $response['status'] = 1;
            $response['message'] = "successfully updated balance";
            $response['accountTypeName'] = $userAccount->getAccount()
                ->getType()
                ->getName();
            $response['goalAmount'] = $userAccount->getGoalAmount();
            $response['userAccount_id'] = $userAccount->getUserAccountId();

            echo json_encode($response);
        } else {
            $response['status'] = 2;
            $response['message'] = "Failed update balance, please refresh and try again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}



function updateInterestRate($entityManager)
{
    try {
        if(startSession() == false){
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
        
        $userAccount = $entityManager->getRepository('UserAccount')->findOneBy(array(
            'active' => 1,
            'userAccountId' => $_GET['updateInterestRate'],
            'active'=> 1
        ));
        
        if ($userAccount != null) {
            
            $userAccount->setInterest($_GET['newAmount']);
            
            $entityManager->persist($userAccount);
            $entityManager->flush();
            
            $response['status'] = 1;
            $response['message'] = "successfully updated interest";
            $response['accountTypeName'] = $userAccount->getAccount()
            ->getType()
            ->getName();
            $response['balance'] = $userAccount->getBalance();
            
            echo json_encode($response);
        } else {
            $response['status'] = 2;
            $response['message'] = "Failed update interest, please refresh and try again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}


function updateGoal($entityManager)
{
    try {
        if(startSession() == false){
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

        $userAccount = $entityManager->getRepository('UserAccount')->findOneBy(array(
            'active' => 1,
            'userAccountId' => $_GET['updateGoal'],
            'active'=> 1
        ));

        if ($userAccount != null) {

            $userAccount->setGoalAmount($_GET['newAmount']);

            $entityManager->persist($userAccount);
            $entityManager->flush();

            $response['status'] = 1;
            $response['message'] = "successfully updated goal";
            $response['accountTypeName'] = $userAccount->getAccount()
                ->getType()
                ->getName();
            $response['balance'] = $userAccount->getBalance();

            echo json_encode($response);
        } else {
            $response['status'] = 2;
            $response['message'] = "Failed to update goal, please refresh and try again";
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

function populateUserAccounts($entityManager)
{
    try {
        if(startSession() == false){
            $response['status'] = 2;
            $response['message'] = "Exception : session time out";
            echo json_encode($response);
            return;
        }
    } catch (Exception $e) {}

    switch ($_GET['populateUserAccounts']) {

        case "Vehicles":

            echo '<div class="inbox-right">
                
								<div class="mailbox-content">
                <h2 class="monthDisplay">' . $_GET['populateUserAccounts'] . '</h2>
									<div class="mail-toolbar clearfix"></div>
									<table class="table">
										<tbody id="personal_expenses_table"><tr class="table-row transactions-header">
                
												<td class="table-text"><h6>Account</h6></td>
												<td class="table-text"><h6>Value</h6></td>
												
											</tr>';

            break;
        case "Properties":
            echo '<div class="inbox-right">
                
								<div class="mailbox-content">
                 <h2 class="monthDisplay">' . $_GET['populateUserAccounts'] . '</h2>
									<div class="mail-toolbar clearfix"></div>
									<table class="table">
										<tbody id="personal_expenses_table"><tr class="table-row transactions-header">
                
												<td class="table-text"><h6>Account</h6></td>
												<td class="table-text"><h6>Value</h6></td>
												
											</tr>';
            break;
        case "Credit":
            echo '<div class="inbox-right">
                
								<div class="mailbox-content">
                 <h2 class="monthDisplay">' . $_GET['populateUserAccounts'] . '</h2>
									<div class="mail-toolbar clearfix"></div>
									<table class="table">
										<tbody id="personal_expenses_table"><tr class="table-row transactions-header">
                
												<td class="table-text"><h6>Account</h6></td>
												<td class="table-text"><h6>Interest %</h6></td>
												<td class="table-text"><h6>Balance</h6></td>

											</tr>';
            break;
        case "Mortgage":
            echo '<div class="inbox-right">
                
								<div class="mailbox-content">
                 <h2 class="monthDisplay">' . $_GET['populateUserAccounts'] . '</h2>
									<div class="mail-toolbar clearfix"></div>
									<table class="table">
										<tbody id="personal_expenses_table"><tr class="table-row transactions-header">
                
												<td class="table-text"><h6>Account</h6></td>
												<td class="table-text"><h6>Interest %</h6></td>
												<td class="table-text"><h6>Balance</h6></td>
                
											</tr>';
            break;
        default:
            echo '<div class="inbox-right">
                
								<div class="mailbox-content">
                 <h2 class="monthDisplay">' . $_GET['populateUserAccounts'] . '</h2>
									<div class="mail-toolbar clearfix"></div>
									<table class="table">
										<tbody id="personal_expenses_table"><tr class="table-row transactions-header">
                
												<td class="table-text"><h6>Account</h6></td>
												<td class="table-text"><h6>Progress</h6></td>
												<td class="table-text"><h6>Balance</h6></td>
												<td class="table-text"><h6>Goal</h6></td>
											</tr>';
    }

    try {

        $user = $entityManager->getRepository('User')->findOneBy(array(
            'userId' => $_SESSION['user_id'],'active' => 1
        ));

        if ($user != null) {
            $accountType = $entityManager->getRepository('AccountType')->findOneBy(array(
                'active' => 1,
                'name' => $_GET['populateUserAccounts']
            ));

            if ($accountType != null) {

                $dql = "SELECT distinct ua, a, at FROM UserAccount ua JOIN ua.account a JOIN  a.type at
     where at.name =  '" . $accountType->getName() . "' and 
     ua.user =  " . $_SESSION['user_id'] . " and ua.active = 1";

                $query = $entityManager->createQuery($dql);
                $query->setMaxResults(100);
                $userAccounts = $query->getResult();

                if ($userAccounts == null) {
                   // echo "<h5>Oops, looks like you don't have any accounts</h5>";
                } else {
                    foreach ($userAccounts as &$userAccount) {
                        // echo 'found account';
                        // get budget

                        $progressBarValue = 100;

                        $progressBarClass = "badProgressBar";
                        $accountTypeName = $accountType->getName();

                        $goalAmount = $userAccount->getGoalAmount();
                        $balance = $userAccount->getBalance();

                        // for cheque accounts
                        switch ($accountTypeName) {

                            case "Credit":

                                if (intval($balance) > intval($goalAmount) || intval($balance) == intval($goalAmount)) {
                                    $progressBarValue = 100;
                                    $progressBarClass = "goodProgressBar";
                                } else {
                                    $progressBarValue = 0;
                                    $progressBarClass = "badProgressBar";
                                }

                                break;
                            case "Mortgages":
                                if (intval($balance) > intval($goalAmount) || intval($balance) == intval($goalAmount)) {
                                    $progressBarValue = 100;
                                    $progressBarClass = "goodProgressBar";
                                } else {
                                    $progressBarValue = 0;
                                    $progressBarClass = "badProgressBar";
                                }
                                break;
                            default:
                                if (intval($goalAmount) > 0) {
                                    if (intval($balance) > intval($goalAmount)) {
                                        $progressBarValue = 100;
                                        $progressBarClass = "goodProgressBar";
                                        // echo 'progress value ' . $progressBarValue;
                                    } else {
                                        $progressBarValue = (intval($balance) / intval($goalAmount)) * 100;

                                        // echo 'progress value ' . $progressBarValue;
                                        if ($progressBarValue < 33) {
                                            $progressBarClass = "badProgressBar";
                                        } elseif ($progressBarValue > 32 && $progressBarValue < 67) {
                                            $progressBarClass = "normalProgressBar";
                                        } else {
                                            $progressBarClass = "goodProgressBar";
                                        }
                                    }
                                } else {
                                    if (intval($balance) > intval($goalAmount) || intval($balance) == intval($goalAmount)) {
                                        $progressBarValue = 100;
                                        $progressBarClass = "goodProgressBar";
                                    } else {
                                        $progressBarValue = 0;
                                        $progressBarClass = "badProgressBar";
                                    }
                                }
                        }

                        switch ($_GET['populateUserAccounts']) {

                            case "Vehicles":

                                echo '<tr class="table-row">
                                    
												<td class="table-text">
													<h7>' . $userAccount->getAccount()->getName() . '</h7>
													    
												</td>

												<td class="march"><input type="text" class="budgetInputBox" value="' . $balance . '" id="balance_' . $userAccount->getUserAccountId() . '" onchange="updateBalance(this)" maxlength="8"></td>

											</tr>';

                                break;
                            case "Properties":
                                echo '<tr class="table-row">
                                    
												<td class="table-text">
													<h7>' . $userAccount->getAccount()->getName() . '</h7>
													    
												</td>
													    
												<td class="march"><input type="text" class="budgetInputBox" value="' . $balance . '" id="balance_' . $userAccount->getUserAccountId() . '" onchange="updateBalance(this)" maxlength="8"></td>
  
												    
											</tr>';
                                break;
                            case "Credit":
                                echo '<tr class="table-row">
                                    
												<td class="table-text">
													<h7>' . $userAccount->getAccount()->getName() . '</h7>
													    
												</td>
												    
<td class="march"><input type="text" class="budgetInputBox" value="' . $userAccount->getInterest() . '" id="interest_' . $userAccount->getUserAccountId() . '" onchange="updateInterestRate(this)" maxlength="8"></td>

<td class="march"><input type="text" class="budgetInputBox" value="' . $balance . '" id="balance_' . $userAccount->getUserAccountId() . '" onchange="updateBalance(this)" maxlength="8"></td>
    

												
											</tr>';
                                break;
                            case "Mortgages":
                                echo '<tr class="table-row">
                                    
												<td class="table-text">
													<h7>' . $userAccount->getAccount()->getName() . '</h7>
													    
												</td>
												    
<td class="march"><input type="text" class="budgetInputBox" value="' . $userAccount->getInterest() . '" id="interest_' . $userAccount->getUserAccountId() . '" onchange="updateInterestRate(this)" maxlength="8"></td>

<td class="march"><input type="text" class="budgetInputBox" value="' . $balance . '" id="balance_' . $userAccount->getUserAccountId() . '" onchange="updateBalance(this)" maxlength="8"></td>
    
    
											</tr>';
                                break;

                            default:
                                echo '<tr class="table-row">
                                    
												<td class="table-text">
													<h7>' . $userAccount->getAccount()->getName() . '</h7>
													    
												</td>
												<td id="progressbartd_' . $userAccount->getUserAccountId() . '"><li  class="' . $progressBarClass . '" data-width="' . intval($progressBarValue) . '" data-target="100"></li></td>
												
<td class="march"><input type="text" class="budgetInputBox" value="' . $balance . '" id="balance_' . $userAccount->getUserAccountId() . '" onchange="updateBalance(this)" maxlength="8"></td>
												    
												<td class="march"><input type="text" class="budgetInputBox" value="' . $goalAmount . '" id="goal_' . $userAccount->getUserAccountId() . '" onchange="updateGoal(this)" maxlength="8"></td>
											</tr>';
                        }
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

function getUser($entityManager, $userID)
{
    try {
        startSession();
    } catch (Exception $e) {}
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
