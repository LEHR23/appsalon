<?php

namespace Controllers;

use MVC\Router;
use Models\User;
use Class\Email;

class LoginController {
  public static function login(Router $router) {
    $router->render('auth/Login', []);
  }

  public static function logout(){
    echo "Logout";
  }

  public static function forgotPassword(Router $router) {
    $router->render('auth/ForgotPassword');
  }

  public static function recoverPassword(){
    echo "Recover Password";
  }

  public static function signup(Router $router){

    $user = new User;
    $alerts = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $user->synchronize($_POST);
      $alerts = $user->validateNewAcount($_POST['passwordConfirm']);

      if(empty($alerts['errors'])){
        $result = $user->userExists();

        if($result->num_rows > 0){
          $alerts = $user->getAlerts();
        } else {
          $user->hashPassword();
          $user->createToken();

          $email = new Email($user->email, $user->name, $user->token);
          $email->sendEmailConfirmation();

          $result = $user->save();
          
          if($result){
            header('Location: /message');
          }
        }
      }
    }

    $router->render('auth/Signup', [
      'user' => $user,
      'alerts' => $alerts
    ]);
  }
  
  public static function message(Router $router){
    $router->render('auth/Message');
  }

  public static function verify(Router $router){
    $alerts = [];

    $token = s($_GET['token']);
    $user = User::where('token', $token);

    if(empty($user)){
      User::setAlert('errors', 'El token no es válido');
    } else {
      $user->token = null;
      $user->confirmed = 1;
      $user->save();
      User::setAlert('succes', 'La cuenta ha sido verificada');
    }
    $alerts = User::getAlerts();
    $router->render('auth/Verify', [
      'alerts' => $alerts
    ]);
  }
}