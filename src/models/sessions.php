<?php

    require_once(dirname(__FILE__) . "/database.php");

    function user_signup() {
       if (isset($_POST['username'], $_POST['password']))
       {
            $username_unsafe = $_POST['username'];
            $password = $_POST['password'];
     
			$username = htmlentities($username_unsafe, ENT_QUOTES);

            if (!$_POST['email'] == '')
            {
                $email = $_POST['email'];
            } else {
                $email = Null;
            }

            $db_conn = new Database();
            try 
            {
                $db_conn->add_user($username, $password, $email);
                $message = "New user successfully created";
            } catch (Exception $e) {
                $message  = "Failed creating a new user.";
            }

            unset($db_conn);

            return $message;
        }
    }

    function has_session() {
        if (isset($_COOKIE["session"], $_COOKIE["username"]))
        {
           $session = $_COOKIE["session"];
           $username_unsafe = $_COOKIE["username"];

		   $username = htmlentities($username_unsafe, ENT_QUOTES);
		   
		   $db_conn = new Database();
           try 
           {
                if ($db_conn->valid_session($username, $session))
                    return True;
                return False;
           } catch (Exception $e) {
                return False;
           }
           unset($db_conn);
        }
    }
    
    function user_login()
    {
        if (isset($_POST['username'], $_POST['password']))
        {
            $username_unsafe = $_POST['username'];
            $password = $_POST['password'];
         
			$username = htmlentities($username_unsafe, ENT_QUOTES);
            $db_conn = new Database();

            try 
            {
                setcookie("username", $username);
                setcookie("session", $db_conn->login($username, $password));
                $message = "Logged in successfully";
            } catch (Exception $e) {
                $message =  "Failed to login\n";
            }

            unset($db_conn);
            return $message;
        }
    }

    function user_logout()
    {
        if (isset($_COOKIE['username'], $_COOKIE['session']))
            $username_unsafe = $_COOKIE['username'];
            $session_key = $_COOKIE['session'];

            $dbconn = new Database();    
			$username = htmlentities($username_unsafe, ENT_QUOTES);
            
            try {
                $dbconn->logout($username, $session_key);
                $message = "Logged out successfully";
            } catch (Exception $e) {
                $message =  "Failed to logout\n";
            }

            unset($dbconn);
            unset($_COOKIE['username']);
            unset($_COOKIE['session']);
            setcookie('username', null, -1, '/');
            setcookie('session', null, -1, '/');
            return $message;
    }
?>
