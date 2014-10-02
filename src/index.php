<?php

require_once("flight/flight/Flight.php");

Flight::route('/', function(){
    Flight::render('index.php');
});

Flight::route('/calendar', function(){
    Flight::render('calendar.php');
});

Flight::route('/recipes', function(){
    Flight::render('recipes.php');
});

Flight::route('/company', function(){
    Flight::render('contact.php');
});

Flight::route('/company/about', function(){
    Flight::render('about_us.php');
});

Flight::route('/company/contact', function(){
    Flight::render('contact_us.php');
});

Flight::start();

?>
