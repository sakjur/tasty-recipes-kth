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
            <h2>Tasty Recipes</h2>

            Welcome to the recipe site for a new generation of food lovers!
        </section>
        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

