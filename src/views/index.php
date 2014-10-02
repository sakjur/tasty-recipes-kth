<?php 
    require_once(dirname(__FILE__) . "/helpers/menu.php");
?>

<!doctype html>
<html>
<head>
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="fonts/fontsheet.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8" />
    <title>Tasty Recipes</title>

    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
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

