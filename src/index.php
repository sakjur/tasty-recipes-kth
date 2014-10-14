<?php

require_once("flight/flight/Flight.php");
require_once(DIRNAME(__FILE__) . "/models/sessions.php");
require_once(DIRNAME(__FILE__) . "/models/comments.php");

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
    Flight::set('recipe_name', $recipe);
    Flight::set('comments', get_comments($recipe));
    Flight::render('recipes/' . $recipe . '.php');
});

Flight::route('/edit/@comment', function($comment) {
    Flight::set('comment', get_comment($comment)); 
    Flight::render('edit.php');
});

Flight::route('/submit_edit', function() {
    update_comment();
    Flight::redirect('/');
});

Flight::route('/new_comment', function()  {
    post_comment();
    echo "Lalalala...";
});

Flight::route('/recipes/@recipe/comments.json', function($recipe) {
	$json_comments = json_encode(get_comments($recipe));
	echo $json_comments;
});

Flight::route('/company', function(){
    Flight::render('contact.php');
});

Flight::route('/login', function(){
    Flight::set('message', user_login());
    Flight::render('login.php');
});

Flight::route('/logout', function(){
    user_logout();
    Flight::redirect('/');
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
