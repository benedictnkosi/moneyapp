<?php
require_once (__DIR__ . '/../../../bootstrap.php');
require_once (__DIR__ . '/../../../app/application.php');

require_once (__DIR__ . "/../Logic/registration.php");
require_once (__DIR__ . "/../Logic/login.php");
require_once (__DIR__ . '/../Entity/User.php');
require_once (__DIR__ . '/../Entity/TransactionName.php');
require_once (__DIR__ . '/../Entity/UserTransactionName.php');

if (isset($_REQUEST['register'])) {
    if ($_REQUEST['register']) :
        registerEmail($entityManager);
	endif;

}


if (isset($_REQUEST['getuser'])) {
    if ($_REQUEST['getuser']) :
    getuser($entityManager);
    endif;
    
}


if (isset($_REQUEST['logout'])) {
    if ($_REQUEST['logout']) :
       
        logout($entityManager);
    endif;
}

if (isset($_REQUEST['login'])) {
    if ($_REQUEST['login']) :
   // echo "we here";
        login($entityManager);

	endif;

}

function startSession()
{
    try {
        session_start();
    } catch (Exception $e) {}
}

function my_session_start($timeout)
{
    ini_set('session.gc_maxlifetime', $timeout);
    session_start();

    if (isset($_SESSION['timeout_idle']) && $_SESSION['timeout_idle'] < time()) {
        session_destroy();
        session_start();
        session_regenerate_id();
        $_SESSION = array();
    }
    $_SESSION['timeout_idle'] = time() + $timeout;
}

// user registration using email
function registerEmail($entityManager)
{
    try {

        try {
            startSession();
        } catch (Exception $e) {}
        //echo "watup";
        $registration = new Registration($entityManager);
        $errors = array();
        $messages = array();
        
        $errors = $registration->errors;
        $messages = $registration->messages;
        $user = $registration->user;
        
        //print_r($messages);
        //print_r($errors);
        
        if (sizeof($registration->errors) > 0) {
            $response['status'] = 2;
            $response['message'] = $errors[0];
            
            echo json_encode($response);
        } else {
          
            $response['status'] = 1;
            $response['message'] = $messages[0];
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}

// login user using email address
function login($entityManager)
{
    try {
        $login = new login($entityManager);
        $errors = array();
        $messages = array();

        $errors = $login->errors;
        $messages = $login->messages;

        $username = $login->username;

        $user_id = $login->user_id;

        if (sizeof($login->errors) > 0) {
            $response['status'] = 2;
            $response['message'] = $errors[0];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response['status'] = 1;
            $response['message'] = $messages[0];
            $response['username'] = $username;

            $response['user_id'] = $user_id;
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}


function getuser($entityManager)
{
    try {
        


        $login = new login($entityManager);
        $login->getuser($entityManager);
       
        $errors = $login->errors;
        
        if (sizeof($login->errors) > 0) {
            $response['status'] = 2;
            $response['message'] = $errors[0];
            
            echo json_encode($response);
        } else {
            $UserDetailsArray = $login->userDetailsArray;
            header('Content-Type: application/json');
            echo json_encode($UserDetailsArray);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}


// login user using email address
function logout($entityManager)
{
    try {
        startSession();
    } catch (Exception $e) {}

    try {
        $login = new login($entityManager);
        $login->doLogout();
        
        $errors = array();
        $messages = array();

        $errors = $login->errors;
        $messages = $login->messages;

        if (sizeof($login->errors) > 0) {
            $response['status'] = 2;
            $response['message'] = $errors[0];

            echo json_encode($response);
        } else {
            $response['status'] = 1;
            $response['message'] = $messages[0];

            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response['status'] = 2;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
}



?>
