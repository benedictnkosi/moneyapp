<?php


require_once(__DIR__.'/../../../bootstrap.php');

require_once(__DIR__.'/../Entity/User.php');

/**
 * Class login
 * handles the user's login and logout process
 */

class Login {
	/**
	 *
	 * @var object The database connection
	 */
	private $db_connection = null;
	/**
	 *
	 * @var array Collection of error messages
	 */
	public $errors = array ();
	/**
	 *
	 * @var array Collection of success / neutral messages
	 */

	public $messages = array ();
	public $username;
	public $user_id;
	/**
	 * the function "__construct()" automatically starts whenever an object of this class is created,
	 * you know, when you do "$login = new Login();"
	 */
	public function __construct($entityManager) {
		// create/read session, absolutely necessary
	    $this->my_session_start (1800);


		// check the possible login actions:
		// if user tried to log out (happen when user clicks logout button)
		if (isset ( $_GET ["logout"] )) {
		  //  echo 'login out';
			$this->doLogout ();
		}		// login via post data (if user just submitted a login form)
		elseif (isset ( $_POST ["login"] )) {
			$this->dologinWithPostData ($entityManager);
		}
	}

	private function my_session_start($timeout) {
		
		
		if(!isset($_SESSION ['timeout_idle'] ))
		{
		    ini_set ( 'session.gc_maxlifetime', $timeout );
		    session_start ();
		}
		

		if (isset ( $_SESSION ['timeout_idle'] ) && $_SESSION ['timeout_idle'] < time ()) {
			//echo "session killed";
			session_destroy ();
			session_start ();
			session_regenerate_id ();
			$_SESSION = array ();
		}

		$_SESSION ['timeout_idle'] = time () + $timeout;
	}

	/**
	 * log in with post data
	 */
	private function dologinWithPostData($entityManager) {

		try {
			// check login form contents
			if (empty ( $_POST ['login'] )) {
				$this->errors [] = "username field was empty.";
			} elseif (empty ( $_POST ['password'] )) {
				$this->errors [] = "Password field was empty.";
			} elseif (! empty ( $_POST ['login'] ) && ! empty ( $_POST ['password'] )) {


				$user = $entityManager->getRepository('User')->findOneBy(array('username' => $_POST ['login']));
				
				$password = "pass";
				$hash = password_hash($password, PASSWORD_DEFAULT);
				
				if($user){
					if (password_verify ( $_POST ['password'], $user->getPassword() )) {
						//check if account status allows login
						
								$this->messages[] = "successfully authenticated";
					
								$_SESSION ['username'] = $user->getUsername();
								$_SESSION ['user_login_status'] = 1;
								$_SESSION ['user_id'] = $user->getUserId();
								


								$this->username = $_SESSION ['username'];
								
								$this->user_id = $_SESSION ['user_id'];

									
								$UserDetailsArray=array(
    							
    							'username'=>$_SESSION ['username'],
								'user_id'=>$_SESSION ['user_id'],
								);
								//$json = json_encode($UserDetailsArray);
								

								//setcookie ( "whyage65_moneyapp", $json, time () + (9000), "/" ); // here we are setting a cookie named username, with the Username on the database that will last 48 hours and will be set on the understandesign.com domain. This is an optional parameter.
								
								

						
					}else{
						
						$this->errors [] = "Login failed, incorrect password";

						$entityManager->persist($user);
						$entityManager->flush();
					}

				}else{
					$this->errors [] = "This user does not exist.";
				}
			}
		} catch (Exception $e) {
			$this->errors[] = $e->getMessage();
		}

	}


	/**
	 * perform the logout
	 */
	public function doLogout() {
		try {
			// delete the session of the user
			
		    if(!isset($_SESSION ['timeout_idle'] ))
		    {
		        session_start ();
		    }
		    
			$_SESSION = array ();
			session_destroy ();

			// unset cookies
			// setcookie("username", "", time()-7600, "/");
			//echo 'resetting cookie';
			//setcookie ( "whyage65_moneyapp", "", time () - (8400*21), "/" ); 


			// return a little feeedback message
			$this->messages [] = "You have been logged out.";
		} catch (Exception $e) {
			$this->errors[] = $e->getMessage();
		}
	}

	/**
	 * simply return the current state of the user's login
	 *
	 * @return boolean user's login status
	 */
	public function isUserLoggedIn($entityManager) {
		try {
			if ((isset ( $_SESSION ['user_login_status'] ) and $_SESSION ['user_login_status'] == 1) || isset ( $_COOKIE ['whyage65_moneyapp'] )) {
				if (strpos ( $_SERVER ["QUERY_STRING"], "logout" ) >-1) {
					return false;
				}
			}

			//if there is a user session set, udate session with user details
			if ((isset ( $_SESSION ['user_login_status'] ) and $_SESSION ['user_login_status'] == 1) || isset ( $_COOKIE ['whyage65_moneyapp'] )) {
				if (!isset ( $_SESSION ['username'] )) {

					$cookie = $_COOKIE['whyage65_moneyapp'];
					$cookie = stripslashes($cookie);
					$savedUserDetailsArray = json_decode($cookie, true);

					$user = $entityManager->getRepository('User')->findOneBy(array('username' => $savedUserDetailsArray['username']));
					if($user){
						$UserProfile = $user->getUserProfile();
						$_SESSION ['username'] = $user->getEmailAddress();
						$_SESSION ['user_login_status'] = 1;
						

						$UserDetailsArray=array(
    							
    							'username'=>$_SESSION ['username']
								
						);

						setcookie ( "whyage65_moneyapp", $_COOKIE ['whyage65_moneyapp'], time () + (1200), "/" ); // here we are setting a cookie named username, with the Username on the database that will last 48 hours and will be set on the understandesign.com domain. This is an optional parameter.
						return true;
					}
				}
				return true;
			}
		} catch (Exception $e) {
			$this->errors[] = $e->getMessage();
		}

	}
}