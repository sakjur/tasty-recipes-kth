<?php

    function generate_comments() {
        $comment_box = "<div id=\"comment-box\">";
        
        fetch_comments();

        if (Flight::has('has_session') && Flight::get('has_session')) {
            $comment_box .= create_comment_form();
        }
        $comment_box .= '</div>';

        echo $comment_box;
    }

    function fetch_comments() {
        $comments = Flight::get('comments');

        if ($comments != array())
            foreach ($comments as $c) 
            {
                echo '<div class="comment"><div class="comment-meta">';
                echo "<b class=\"author\">" . $c['username'] . "</b>";
                if(isset($_COOKIE['username']))
                    if ($c['username'] == $_COOKIE['username'])
                        echo '<a class="edit" href="/edit/' . $c['id'] .
                            '">edit</a>';
                echo "<i class=\"date\">" . $c['time_created'] . "</i>";
                echo "</div>";
                echo "<div class=\"comment-text\"> " . $c['comment'] .
                    "</div></div>";
            }
    }

    function create_comment_form() {
        $rv = '<div class="new-comment">';
        $rv .= '<form id="add_comment" method="post" action="' . 
            $_SERVER['REQUEST_URI'] . '">';
        $rv .= '<p>Write a new comment as <b>' .
            $_COOKIE['username'] . '</b></p>';
        $rv .= '<input type="hidden" name="nick" class="nick"';
        $rv .= 'value="' . $_COOKIE['username'] .
            '"></input>';
        $rv .= '<input type="hidden" name="recipe" class="recipe"';
        $rv .= 'value="' . Flight::get('recipe_name') .
            '"></input>';
        $rv .= 
                '<label for="comment">Comment:</label><br />
                    <textarea name="comment" class="new-comment"> </textarea>
                    <br />
                    <button type="submit">Submit</button>
                </form>';
        $rv .= "</div>";
        return $rv;
    }

?>
