<?php

namespace Controllers;

use Core\Application;
use Core\Controller;
use Core\Request;

class ContactController extends Controller{

    public function contactPage(){

        $params = [
            "name" => "Birdman!",
        ];

        return $this->render("contact", $params);
    }

    public function handleContact(Request $request){
        $body = $request->getBody();
        return $this->render("contact", ["name" => $body["firstName"]]);
    }
}