<?php


class RegisterView {
  private static $message = "RegisterView::Message";
  private static $user = "RegisterView::UserName";
  private static $password = "RegisterView::Password";
  private static $passwordRepeat = "RegisterView::PasswordRepeat";
  private static $registration = "DoRegistration";


  public function registerResponse() {
    return '
    <h2>Register new user</h2>
    <form action="?register" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Register a new user - Write username and password</legend>
        <p id="' . self::$message . '"></p>
        <label for="' . self::$user . '">Username :</label>
        <input type="text" size="20" name="' . self::$user . '" id="' . self::$user . '" value="" />
        <br>
        <label for="' . self::$password . '">Password :</label>
        <input type="text" size="20" name="' . self::$password . '" id="' . self::$password . '" value="" />
        <br>
        <label for="' . self::$passwordRepeat . '">Repeat password :</label>
        <input type="text" size="20" name="' . self::$passwordRepeat . '" id="' . self::$passwordRepeat . '" value="" />
        <br>
        <input id="submit" type="submit" name="' . self::$registration . '" value="Register" />
        <br>
      </fieldset>
    </form>
  ';
  }
}
