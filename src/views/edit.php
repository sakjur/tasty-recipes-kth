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
            <h2>Edit comment</h2>
            
            <?php
                
                if (Flight::has('message')) {
                    echo "<br />" . Flight::get('message');
                }

                $comment = Flight::get('comment');
            ?>

            <form action="/submit_edit" method="post">
                <input type="hidden" name="cid" value="<?php echo $comment[0] ?>" />
                <label for="comment">Comment:</label><br />
                    <textarea name="comment"><?php echo $comment[3] ?></textarea><br />
                <button type="submit">Edit</button>
            </form>
        </section>
        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

