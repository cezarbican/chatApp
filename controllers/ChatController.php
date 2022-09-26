<?php

namespace chatapp\controllers;

use chatapp\core\ChatApp;

class ChatController{


    public function index()
    {   $from = $_SESSION['userID'];
        $to = $_SESSION['to'];
        $messages = ChatApp::$app->query->select("SELECT * FROM messages WHERE fromUser='$from' AND toUser='$to' OR fromUser='$to' AND toUser='$from' ORDER BY created ASC");

        $fromDB = ChatApp::$app->query->select("SELECT name FROM users WHERE id='$from'");
        $toDB = ChatApp::$app->query->select("SELECT name FROM users WHERE id='$to'");

        return ChatApp::$app->render->render("connect", "Connected", ["messages" => $messages, "from" => $fromDB, "to" => $toDB]);
    }

    public function indexPost()
    {   
        if(isset($_POST['userConnect'])){     
            $to = ChatApp::$app->request->getBody()['userConnect'] ?? '';
            $_SESSION['to'] = $to;
        }

       
        if(isset($_POST['sendMessage'])){
            if(!empty(ChatApp::$app->request->getBody()['message'])){

                $message = strtolower(filter_var(ChatApp::$app->request->getBody()['message'], FILTER_SANITIZE_SPECIAL_CHARS));
                $from = $_SESSION['userID'];
                $to = $_SESSION['to'];
                ChatApp::$app->query->insert("INSERT INTO messages (fromUser, toUser, message) VALUES ('$from', '$to', '$message')");
                $message = null;
            }
        }
        return $this->index();
    }
}