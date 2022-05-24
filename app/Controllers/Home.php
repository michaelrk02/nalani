<?php

namespace App\Controllers;

class Home extends BaseController {

    public function index() {
        $this->render('Home', 'home/index');
    }

}
