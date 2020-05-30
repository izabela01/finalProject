<?php

class PagesController {

    public function home() {
        //example data to use in the home page
        $first_name = 'Izzy';
        $last_name = 'Drabek';
        require_once('views/pages/home.php');
    }

    public function aboutus() {
        require_once('views/pages/aboutus.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }

    public function contactus() {
        require_once('views/pages/contactus.php');
    }

}
