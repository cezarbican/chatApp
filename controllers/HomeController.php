<?php

namespace chatapp\controllers;

use chatapp\core\ChatApp;

class HomeController{
    
    public $errors = [];

    /**
     * index
     *
     * @return string
     */
    public function index() : string
    {   
        if(isset($_SESSION['user'])){
            $users = ChatApp::$app->query->select("SELECT * FROM users");
            return ChatApp::$app->render->render('home', 'Home', ["users" => $users]);
        }
        $success = $_GET['success'] ?? null;
        return ChatApp::$app->render->render('index', 'Login', ['errors' => $this->errors, "success" => $success]);
    }

    /**
     * indexPost
     *
     * @return string
     */
    public function indexPost() : string
    {   
       $body = ChatApp::$app->request->getBody();

        if(isset($_POST['logout'])){
            $this->errors = [];
            unset($_SESSION['user']);
            unset($_SESSION['userName']);
            unset($_SESSION['userID']);
        }

        if(isset($_POST['login']) && !empty($body)){
            
            $username = $body['username'] ? filter_var($body['username'], FILTER_VALIDATE_EMAIL) : "";
            $username = trim(strtolower(filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS)));
                
            $password = $body['password'] ?? "";

            $query = ChatApp::$app->query->select("SELECT * FROM users WHERE userEmail = '$username'");

            if(!empty($query)){
                if($username === $query[0]['userEmail'] && password_verify($password, $query[0]['password'] )){
                    $_SESSION['user'] = $query[0]['userEmail'];
                    $_SESSION['userName'] = $query[0]['name'];
                    $_SESSION['userID'] = $query[0]['id'];
                }else{
                    $this->errors[] = "Username or Password are incorrect!";
                }
            }else{
                $this->errors[] = "Username or Password are incorrect!";
            }
        }
        
       return $this->index();
    }
}