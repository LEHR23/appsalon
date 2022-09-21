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
            $alerts['succes'][] = "Usuario creado correctamente";
          }
        }
      }
    }

    $router->render('auth/Signup', [
      'user' => $user,
      'alerts' => $alerts
    ]);
  }
}