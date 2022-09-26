<?php

namespace chatapp\controllers;

use chatapp\core\ChatApp;

class RegisterController{

    public $errors = [];

    /**
     * index
     *
     * @return string
     */
    public function index() : string
    {   
        if(isset($_SESSION['user'])){
            return ChatApp::$app->render->render('register', 'Register');
        }
        
        return ChatApp::$app->render->render('register', 'Register', ['errors' => $this->errors]);
    }

    /**
     * indexPost
     *
     * @return string
     */
    public function indexPost() : string
    {   
       $body = ChatApp::$app->request->getBody();

        if(isset($_POST['register']) && !empty($body)){
            
            $email = $body['email'] ? filter_var($body['email'], FILTER_VALIDATE_EMAIL) : "";
            $email = trim(strtolower(filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS)));
            $name = $body['name'] ? strtolower(filter_var($body['name'], FILTER_SANITIZE_SPECIAL_CHARS)) : "";
            $password = $body['password'] ?? "";
            $passwordc = $body['passwordc'] ?? "";

            if($email === "" || $name === "" || $password === "" || $passwordc === ""){
                $this->errors[] = "Complete all the given fields!";
            }else 
            if(strtolower(strlen($name)) < 3 ){
                $this->errors[] = "Name must be at least 3 characters long!";
            }else
            if(strlen($password) < 4 ){
                $this->errors[] = "Password must be at least 4 characters long!";
            }else
            if($password !== $passwordc ){
                $this->errors[] = "Password confirm must be the same as password!";
            }else{
                $password = password_hash($password, PASSWORD_BCRYPT);
                ChatApp::$app->query->insert("INSERT INTO users (userEmail, password, name) VALUES ('$email', '$password', '$name')");
                $body = []; $email = null; $name = null; $password = null; $passwordc = null;
                header("Location: /?success=1");
            }
        }
        
       return $this->index();
    }
}