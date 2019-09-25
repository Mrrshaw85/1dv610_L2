<?php


class RegisterView {
  private static $messageId = "RegisterView::Message";
  private static $user = "RegisterView::UserName";
  private static $password = "RegisterView::Password";
  private static $passwordRepeat = "RegisterView::PasswordRepeat";
  private static $register = "RegisterView::Register";
  private $message;
  private $username = "";
  private $pass;

  public function registerResponse() {
    $response = $this->regSite($this->message);
    return $response;
  }


  public function registerUser () {
    if(isset($_POST[self::$register])) {
      $this->username = $_POST[self::$user];
      $this->pass = $_POST[self::$password];
      if($_POST[self::$register]) {
        if(strlen($_POST[self::$user]) < 3 || empty($_POST[self::$user])) {
          $this->message .= "Username has too few characters, at least 3 characters.";
        } 
        if (strlen($_POST[self::$password]) < 6) {
          $this->message .= "<br> Password has too few characters, at least 6 characters.";
        }
        if($_POST[self::$user] == "Admin") { // TODO: Check against usernames that exist in DB
          $this->message = "User exists, pick another username.";
        }
        if($_POST[self::$password] != $_POST[self::$passwordRepeat]) {
          $this->message = "Passwords do not match.";
        }
        if (!preg_match('/[^A-Za-z0-9]/', $this->username)) // '/[^a-z\d]/i' should also work.
        {
            // string contains only english letters & digits
        } else {
          $this->message = "Username contains invalid characters.";
        }
      }
    }
  }

  public function regSite($message) {
    return '
    <h2>Register new user</h2>
    <form action="?register" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Register a new user - Write username and password</legend>
        <p id="' . self::$messageId . '">' . $message . '</p>
        <label for="' . self::$user . '">Username :</label>
        <input type="text" size="20" name="' . self::$user . '" id="' . self::$user . '" value="' . $this->username . '" />
        <br>
        <label for="' . self::$password . '">Password :</label>
        <input type="text" size="20" name="' . self::$password . '" id="' . self::$password . '" value />
        <br>
        <label for="' . self::$passwordRepeat . '">Repeat password :</label>
        <input type="text" size="20" name="' . self::$passwordRepeat . '" id="' . self::$passwordRepeat . '" value="" />
        <br>
        <input id="submit" type="submit" name="' . self::$register . '" value="Register" />
        <br>
      </fieldset>
    </form>
  ';
  }
}
