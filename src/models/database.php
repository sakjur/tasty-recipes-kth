<?php
/*
 * If this fails, try to enable database connections in SELinux
 * $ setsebool -P httpd_can_network_connect_db 1
 */

class Database {
    private $conn_details = "host=localhost dbname=id1354 user=kth password=123";
    private $conn = Null;
   
    function __construct () {
        $this->conn = pg_connect($this->conn_details);
        pg_prepare($this->conn, "login", 'SELECT login($1, $2);');        
        pg_prepare($this->conn, "valid", 'SELECT * FROM sessions WHERE
            user_id = (SELECT id FROM users WHERE users.username = $1) AND
            session = $2');
        pg_prepare($this->conn, "add_user", 'SELECT add_user($1, $2, $3);');        
        pg_prepare($this->conn, "logout", 'DELETE FROM sessions WHERE
            user_id = (SELECT id FROM users WHERE users.username = $1) AND
            session = $2');
        pg_prepare($this->conn, "get_comments_by_recipe", 'SELECT * FROM
            comments_by_recipes WHERE slug = $1 ORDER BY time_created ASC');
        pg_prepare($this->conn, "post_comment", 'INSERT INTO comments 
            (recipe_id, user_id, comment) VALUES ((SELECT id FROM recipes WHERE
            recipes.slug = $1), (SELECT id FROM users WHERE users.username 
            = $2), $3)');
        pg_prepare($this->conn, "get_comment_by_id", 'SELECT * FROM
            comments_by_recipes WHERE id = $1');
        pg_prepare($this->conn, "set_comment_by_id", 'UPDATE comments
            SET comment = $2 WHERE id = $1');
    }

    function __destruct () {
        pg_close($this->conn);
    } 

    public function login($username, $password) {
        $rv = pg_execute($this->conn, "login", array($username, $password));
        $rv = pg_fetch_row($rv);
        return $rv[0];
    }

    public function get_comment_by_id($id) {
        $rv = pg_execute($this->conn, "get_comment_by_id", array($id));
        $rv = pg_fetch_row($rv);
        return $rv;
    }
    
    public function set_comment_by_id($id, $comment) {
        pg_execute($this->conn, "set_comment_by_id", array($id, $comment));
        return True;
    }

    public function valid_session($username, $session_key) {
        $rv = pg_execute($this->conn, "valid", array($username, $session_key));
        $rv = pg_fetch_row($rv);
        return $rv[1];
    }

    public function add_user($username, $password, $email = Null) {
        pg_execute($this->conn, "add_user", 
            array($username, $password, $email));
        return True;
    }

    public function logout($username, $session_key) {
        pg_execute($this->conn, "logout", 
            array($username, $session_key));
        return True;
    }

    public function get_comments_by_recipe($recipe) {
        $rv = pg_execute($this->conn, "get_comments_by_recipe", array($recipe));
        $rv = pg_fetch_all($rv);
        return $rv;
    }

    public function post_comment($recipe, $user, $comment) {
        pg_execute($this->conn, "post_comment", 
            array ($recipe, $user, $comment));
    }

}

?>
