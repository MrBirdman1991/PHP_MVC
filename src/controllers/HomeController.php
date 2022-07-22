<?php

namespace Controllers;

use Core\Controller;
use Core\Request;

class HomeController extends Controller{

    public function homePage(){
        return $this->render("home");
    }


}