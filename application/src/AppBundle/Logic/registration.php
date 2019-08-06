<?php

require_once(__DIR__.'/../../../bootstrap.php');

require_once(__DIR__.'/../Entity/User.php');
require_once (__DIR__ . '/../Entity/TransactionName.php');
require_once (__DIR__ . '/../Entity/UserTransactionName.php');
require_once (__DIR__ . '/../Entity/TransactionCategory.php');

/**
 * Class registration
 * handles the user registration
 */


class Registration
{
	/**
	 * @var object $db_connection The database connection
	 */
	private $db_connection = null;
	/**
	 * @var array $errors Collection of error messages
	 */
	public $errors = array();
	/**
	 * @var array $messages Collection of success / neutral messages
	 */
	public $messages = array();
	
	public $user = null;
	

	/**
	 * the function "__construct()" automatically starts whenever an object of this class is created,
	 * you know, when you do "$registration = new Registration();"
	 */
	public function __construct($entityManager)
	{
		if (isset($_POST["register"])) {
			$this->registerUser($entityManager);
		}
	}

	/**
	 * handles the entire registration process. checks all error possibilities
	 * and creates a new user in the database if everything is fine
	 */
	private function registerUser($entityManager)
	{

		try{
				
			// escaping, additionally removing everything that could be (html/javascript-) code
			
			$email = $_POST['register'];
			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
            
			
			if((strpos($email," ")) || (strpos($password," "))){
			    $this->errors[] = "Username and password can not have spaces";
			    return;
			}
			
			if (preg_match('/[\'^£%&*()}{~?><>,|=+¬-]/', $email))
			{
			    $this->errors[] = "Username can not have special characters";
			    return;
			}
			
			if (preg_match('/[\'^£%&*()}{~?><>,|=_+¬-]/', $password))
			{
			    $this->errors[] = "password can not have special characters";
			    return;
			}
			
			//echo $password;
			//echo $confirm;
			//return;
			if(strcmp($password, $confirm) != 0){
			    $this->errors[] = "Passwords do not match";
			    return;
			}
			
			// crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
			// hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
			// PHP 5.3/5.4, by the password hashing compatibility library
			$user_password_hash = password_hash($password, PASSWORD_DEFAULT);

			// check if user or email address already exists
			$user = $entityManager->getRepository('User')->findOneBy(array('username' => $email));
			if($user){
				$this->errors[] = "Sorry, a user with the same name is already registered";
			} else {

				//create an instance of User and assign properties
				$user = new User();
				$date = new DateTime();
					
				
				$user->setUsername($email);
				$user->setPassword($user_password_hash);


				// write new user's data into database

				$entityManager->persist($user);
				$entityManager->flush();

				// if user has been added successfully
				$user = $entityManager->getRepository('User')->findOneBy(array('username' => $email));
				if ($user) {
				    $this->setupTransactions($entityManager, $user);
					$this->messages[] = "Your account has been created successfully. Please login";
					
				} else {
					$this->errors[] = "Sorry, your registration failed. Please try again.";
				}
			}

		} catch (Exception $e) {
			$this->errors[] = $e->getMessage();
		}

	}

	private function setupTransactions($entityManager, $user)
	{
	    try {
	        
	        if ($user != null) {
	            $transactionNames = $entityManager->getRepository('TransactionName')->findBy(array(
	                'active' => 1, 'custom'=>0	            
	                
	            ));
	            
	            if ($transactionNames != null) {
	                
	                foreach ($transactionNames as &$transactionName) {
	                    $userTransactionName = new UserTransactionName();
	                    
	                    $userTransactionName->setActive(1);
	                    $userTransactionName->setUser($user);
	                    $userTransactionName->setTransaction($transactionName);
	                    
	                    $entityManager->persist($userTransactionName);
	                    $entityManager->flush();
	                    
	                    //$this->messages[] = 'trasnaction Names created';
	                }
	            } else {
	                $this->messages[] = 'trasnaction Names not found';
	            }
	        }else{
	            $this->messages[] = 'user is null';
	        }
	    } catch (Exception $e) {
	        $this->messages[] = $e->getMessage();
	    }
	}

}
