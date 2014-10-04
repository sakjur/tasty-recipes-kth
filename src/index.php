<?php

require_once("flight/flight/Flight.php");
require_once(DIRNAME(__FILE__) . "/models/database.php");
require_once(DIRNAME(__FILE__) . "/models/sessions.php");

Flight::set('has_session', has_session());

Flight::route('/', function(){
    Flight::render('index.php');
});

Flight::route('/calendar', function(){
    Flight::render('calendar.php');
});

Flight::route('/recipes', function(){
    Flight::render('recipes.php');
});

Flight::route('/recipes/@recipe', function($recipe) {
    Flight::render('recipes/' . $recipe . '.php');
});

Flight::route('/company', function(){
    Flight::render('contact.php');
});

Flight::route('/login', function(){
    Flight::set('message', user_login());
    Flight::render('login.php');
});

Flight::route('/signup', function(){
    Flight::set('message', user_signup());
    Flight::render('signup.php');
});

Flight::route('/company/about', function(){
    Flight::render('about_us.php');
});

Flight::route('/company/contact', function(){
    Flight::render('contact_us.php');
});

Flight::start();

?>
