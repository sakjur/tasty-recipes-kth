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
            <h2>Contact us</h2>

            <p>Hello, you can contact us at <a href="mailto:tasty@recipes.example">tasty@recipes.example</a> or <a href="tel:555-555-555">555-555-555</a>.</p>
            <p>We hope you enjoy our site!</p>
            
        </section>
        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

