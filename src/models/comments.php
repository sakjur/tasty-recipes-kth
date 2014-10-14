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

            $comment = htmlentities($_POST['c'], ENT_QUOTES);
            $recipe = $_POST['r'];
            $user = $_COOKIE['username']; 

            if (!$dbconn->valid_session($user, $_COOKIE['session']))
                                return False;
            
            $dbconn->post_comment($recipe, $user, $comment);
        }
    }

    function get_comment($id)
    {
        $dbconn = new Database();    
            
        $rv = $dbconn->get_comment_by_id($id);

        unset($dbconn);
        return $rv;
    }

    function update_comment()
    {
         if (isset($_POST['cid'], $_POST['comment'])) {
            $dbconn = new Database();

            $id = $_POST['cid'];
            $comment = htmlentities($_POST['comment'], ENT_QUOTES);
            $user = $_COOKIE['username']; 
            if (!$dbconn->valid_session($user, $_COOKIE['session']))
                return False;
            
            $dbconn->set_comment_by_id($id, $comment);
        }
           
    }
?>
