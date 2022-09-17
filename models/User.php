<?php

namespace Models;

class User extends ActiveRecord
{
    protected static $table = 'users';
    protected static $columns = ['id', 'name', 'lastName', 'email', 'password', 'phone', 'admin', 'confirmed', 'token'];

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
        $this->admin = $args['admin'] ?? null;
        $this->confirmed = $args['confirmed'] ?? null;
        $this->token = $args['token'] ?? '';
    }
}