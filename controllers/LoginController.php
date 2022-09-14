<?php

namespace Controllers;

use MVC\Router;

class LoginController {
  public static function login(Router $router) {
    $router->render('auth/Login');
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
    $router->render('auth/Signup');
  }
}