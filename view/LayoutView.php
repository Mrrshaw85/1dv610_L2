<?php


class LayoutView {
  
  public function render($isLoggedIn, LoginView $v, DateTimeView $dtv, RegisterView $rv, $registerUser) {
    if($registerUser) {
      echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->backToLogin() . '
          <div class="container">
              ' . $rv->registerResponse() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
    } else {
      echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderRegistryView() . '
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $v->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
    }
    
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

  private function backToLogin() {
    return '<a href="?">Back to login</a>';
  }

  private function renderRegistryView() {
    return '<a href="?register">Register a new user</a>';
  }
}
