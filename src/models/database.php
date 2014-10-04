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
    }

    function __destruct () {
        pg_close($this->conn);
    } 

    public function login($username, $password) {
        $rv = pg_execute($this->conn, "login", array($username, $password));
        $rv = pg_fetch_row($rv);
        return $rv[0];
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

}
     
?>
