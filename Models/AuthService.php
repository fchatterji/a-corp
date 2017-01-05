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

    public function __construct() {
        
        $dbh = new PDO("mysql:host=localhost;dbname=id463720_phpauth", "id463720_fchatterjiauth", "topsecre1");
        $config = new PHPAuth\Config($dbh);
        $this->auth = new PHPAuth\Auth($dbh, $config);
    }

    public function isLogged() {
        /* Check if user is logged

        Returns:

            (boolean)
        */
    	return $this->auth->isLogged();
    }

    public function login($email, $password, $remember) {
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

    public function register($email, $password, $repeatpassword) {
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
    	return $this->auth->register($email, $password, $repeatpassword);
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

