<?php

class AuthService {
	/* Authentication service

    Note: the authentication service is just a wrapper around the php auth 
    class, which contains all the logic and code. It is used here to 
    provide a consistent interface and to facilitate eventual changes of
    auth system.

    The method comments are copied directly from the phpauth wiki.
	*/

    var $auth;
    var $connection;
    var $config;

    public function __construct() {
        
        $this->connection = Connexion::init();
        $this->config = new PHPAuth\Config($this->connection);
        $this->auth = new PHPAuth\Auth($this->connection, $this->config);
    }

    public function isLogged() {
        /* Check if user is logged

        Returns:

            (boolean)
        */
    	return $this->auth->isLogged();
    }

    public function isAdmin() {
        $userId = $this->getUserId();
        $stmt = $this->connection->prepare("SELECT isadmin FROM users WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetch();

        return $result;
    }

    public function login() {
        /* Authenticates a user with the system.

        Parameters:

            $email (string): User's email address
            $password (string): User's password
            $remember (boolean): Remember me checkbox value (temporary or permanent session)

        Returns:

            $return (array)
                error (boolean): Informs whether an error was encountered or not
                message (string): User-friendly error / success message
                hash (string): The session hash to be stored in the session cookie
                expire (int): Timestamp of session expiry time
        */
        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? true: false;
        
    	return $this->auth->login($email, $password, $remember);
    }

    public function logout($hash) {
        /* Terminates a given session

        Parameters:

            $hash (string): User's session hash

        Returns:

            (boolean)
        */
    	return $this->auth->logout($hash);
    }

    public function register() {
        /* Handles the registration of a new user.

        Parameters:

            $email (string): User's email address
            $password (string): User's password
            $repeatpassword (string): User's password confirmation

        Returns:

            $return (array)
                error (boolean): Informs whether an error was encountered or not
                message (string): User-friendly error / success message
        */
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];

    	return $this->auth->register($email, $password, $repeatPassword);
    }

    public function getUserId() {
        /* Retrieves the UID associated with a given session hash

        Parameters:

            $hash (string): The session hash

        Returns:

            $uid (int): User's ID
        */
        $hash = $_COOKIE[$this->config->cookie_name];
        return $this->auth->getSessionUID($hash);
    }
}

