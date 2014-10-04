<?php 
    require_once(dirname(__FILE__) . "/helpers/main.php");

?>

<!doctype html>
<html>
<head>
    <title>Tasty Recipes</title>
    <?php
        generate_head();
    ?>
</head>

<body>
    <div id="container">
        <header>
            <h1>Tasty Recipes</h1>
        </header>
        <nav>
            <?php
                generate_menu();
            ?>
        </nav>

        <section>
            <h2>Log in</h2>
            
            Need a new user? <a href="/signup">Sign up</a>.
            
            <?php
                
                if (Flight::has('message')) {
                    echo "<br />" . Flight::get('message');
                }

            ?>

            <form action="/login" method="post">
                <label for="username">Username:</label>
                    <input type="text" name="username" /><br />
                <label for="password">Password:</label>
                    <input type="password" name="password" /><br />
                <button type="submit">Login</button>
            </form>
        </section>
        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

