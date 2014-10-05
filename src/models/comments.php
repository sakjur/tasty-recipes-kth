<?php

    require_once(dirname(__FILE__) . "/database.php");

    function get_comments($recipe)
    {
        $dbconn = new Database();    
            
        $rv = $dbconn->get_comments_by_recipe($recipe);

        unset($dbconn);
        return $rv;
    }

    function post_comment()
    {
        if (isset($_POST['c'], $_POST['r'])) {
            $dbconn = new Database();

            $comment = $_POST['c'];
            $recipe = $_POST['r'];
            
            $user = $_COOKIE['username']; // Such secure
            
            $dbconn->post_comment($recipe, $user, $comment);
        }
    }
?>
