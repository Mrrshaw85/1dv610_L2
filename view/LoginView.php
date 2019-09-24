<?php

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
  private static $messageId = 'LoginView::Message';
  private $holdUsername = '';
  private $message;
	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {

      
    if(isset($_POST[self::$logout])) 
    {
      $response = $this->generateLoginFormHTML($this->message); 
    } else if (isset($_SESSION['username'])){
      $response = $this->generateLogoutButtonHTML($this->message); 
    }
    else 
    {
      $response = $this->generateLoginFormHTML($this->message);
    }

    return $response;
}

public function getMessage() {
  return $this->message;
}


public function isUserLoggedIn() {
  $logged = false;

  if(isset($_POST[self::$logout])){
    $this->logoutUser();
    return $logged;
  }

  if(isset($_POST[self::$login])) {
    $this->holdUsername = $_POST[self::$name];

    if(empty($_POST[self::$name]) || $_POST[self::$name] == '') {
       $this->message = "Username is missing";
    }
    else if(empty($_POST[self::$password])) {
      $this->message = "Password is missing";
    }
    else if($_POST[self::$name] == 'Admin' && $_POST[self::$password] == 'Password') {
      $_SESSION['username'] = $_POST[self::$name];
      $logged = true;
      $this->message = "Welcome";
    }
      else if(!empty($_POST[self::$name]) && !empty($_POST[self::$password]))
    { 
      $this->message = "Wrong name or password";
    } 
  }

  if(isset($_SESSION['username'])) {
    $logged = true;
  }

  
  return $logged;
}

public function logoutUser() {
  if(isset($_POST[self::$logout])) {
    unset($_SESSION['username']);
    //unset($_SESSION);
    return false;
  }
  
}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this->holdUsername . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}

	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
    //RETURN REQUEST VARIABLE: USERNAME

  }
  


	
}