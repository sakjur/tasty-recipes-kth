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
            <h2>About us</h2>

            <p>Hello, we are a website made to bring you the best recipes
            there possibly is out there. You should also try out our food
            calendar if you are annoyed of having to pick what food to eat
            every day.</p>
            <p>Have a nice stay!</p>
            
        </section>
        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

