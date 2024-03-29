<?php

    function generate_comments() {
        $comment_box = "<div id=\"comment-box\">";
        
        if (Flight::has('has_session') && Flight::get('has_session')) {
            $comment_box .= create_comment_form();
		} else {
			$comment_box .= login_redirection();
		}
        $comment_box .= '</div>';

        echo $comment_box;
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
        $rv .= 'value="' . flight::get('recipe_name') .
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

	function login_redirection() {
        $rv = '<div class="new-comment">';
        $rv .= '<form id="add_comment">';
        $rv .= '<input type="hidden" name="nick" class="nick"';
        $rv .= 'value="N/A"></input>';
        $rv .= '<input type="hidden" name="recipe" class="recipe"';
        $rv .= 'value="' . flight::get('recipe_name') .
            '"></input>';
		$rv .= "</form>";
		$rv .= "<p><a href=\"/login\">Login</a> to comment.</p>";
        $rv .= "</div>";
        return $rv;
	}

?>
