<?php

namespace Models;

class User extends ActiveRecord
{
    protected static $table = 'users';
    protected static $columnsDB = ['id', 'name', 'lastName', 'email', 'password', 'phone', 'admin', 'confirmed', 'token'];

    public $id;
    public $name;
    public $lastName;
    public $email;
    public $password;
    public $phone;
    public $admin;
    public $confirmed;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastName = $args['lastName'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmed = $args['confirmed'] ?? '0';
        $this->token = $args['token'] ?? '';
    }

    public function validateNewAcount($passwordConfirm){
        if(!$this->name){
            self::$alerts['errors'][] = "Debes ingresar un nombre";
        }
        if(!$this->lastName){
            self::$alerts['errors'][] = "Debes ingresar un apellido";
        }
        if(!$this->phone){
            self::$alerts['errors'][] = "Debes ingresar un teléfono";
        }
        if(!$this->email){
            self::$alerts['errors'][] = "Debes ingresar un correo";
        }
        if(!$this->password){
            self::$alerts['errors'][] = "Debes ingresar una contraseña";
        } elseif(strlen($this->password) < 6){
            self::$alerts['errors'][] = "La contraseña debe tener al menos 6 caracteres";
        }
        if(!$passwordConfirm){
            self::$alerts['errors'][] = "Debes confirmar la contraseña";
        } elseif($this->password !== $passwordConfirm){
            self::$alerts['errors'][] = "Las contraseñas no coinciden";
        }
        return self::$alerts;
    }

    public function validateLogin(){
        if(!$this->email){
            self::$alerts['errors'][] = "Debes ingresar un correo";
        }
        if(!$this->password){
            self::$alerts['errors'][] = "Debes ingresar una contraseña";
        }
        return self::$alerts;
    }

    public function validateEmail(){
        if(!$this->email){
            self::$alerts['errors'][] = "Debes ingresar un correo";
        }
        return self::$alerts;
    }

    public function validatePassword($passwordConfirm){
        if(!$this->password){
            self::$alerts['errors'][] = "Debes ingresar una contraseña";
        } elseif(strlen($this->password) < 6){
            self::$alerts['errors'][] = "La contraseña debe tener al menos 6 caracteres";
        }
        if(!$passwordConfirm){
            self::$alerts['errors'][] = "Debes confirmar la contraseña";
        } elseif($this->password !== $passwordConfirm){
            self::$alerts['errors'][] = "Las contraseñas no coinciden";
        }
        return self::$alerts;
    }

    public function userExists(){
        $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this->email . "' LIMIT 1";
        
        $result = self::$db->query($query);

        if($result->num_rows){
            self::$alerts['errors'][] = "El correo ya está registrado";
        }

        return $result;
    }

    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function createToken(){
        $this->token = uniqid();
    }

    public function validatePasswordAndAcount($password){
        $result = password_verify($password, $this->password);

        if($this->confirmed == 0){
            self::$alerts['errors'][] = "Debes verificar tu cuenta";
            return false;
        } elseif(!$result){
            self::$alerts['errors'][] = "La contraseña es incorrecta";
            return false;
        }

        return true;
    }
}