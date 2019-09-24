<?php


class RegisterView {
  private static $messageId = "RegisterView::Message";
  private static $user = "RegisterView::UserName";
  private static $password = "RegisterView::Password";
  private static $passwordRepeat = "RegisterView::PasswordRepeat";
  private static $register = "RegisterView::DoRegistration";
  private $message;
  private $username;
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
          $this->message = "Username has too few characters, at least 3 characters.";
        } else if (strlen($_POST[self::$password] < 6)) {
          $this->message = "Password has too few characters, at least 6 characters.";
        }
      }
    }
  }

  public function regSite() {
    return '
    <h2>Register new user</h2>
    <form action="?register" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Register a new user - Write username and password</legend>
        <p id="' . self::$messageId . '">' . $this->message . '</p>
        <label for="' . self::$user . '">Username :</label>
        <input type="text" size="20" name="' . self::$user . '" id="' . self::$user . '" value="" />
        <br>
        <label for="' . self::$password . '">Password :</label>
        <input type="text" size="20" name="' . self::$password . '" id="' . self::$password . '" value="" />
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
