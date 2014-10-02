<?php 
    require_once(dirname(__FILE__) . "/helpers/main.php");
?>

<!doctype html>
<html>
<head>
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="fonts/fontsheet.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8" />
    <title>Tasty Recipes</title>
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
            <h2>Contact</h2>
            
            <ul>
                <li><a href="/company/contact">Contact Us</a></li>
                <li><a href="/company/about">About Us</a></li>
            </ul>
        </section>
        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

