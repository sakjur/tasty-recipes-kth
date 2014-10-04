<?php
    require_once(DIRNAME(__FILE__) . '/../helpers/main.php');
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
            <h2>Meatballs!</h2>

            <img class="food-image" src="/img/meatballs320.jpg" alt="Picture of Meatballs!" />

            <div class="ingredients">
                <h3>Ingredients</h3>
                <ul>
                    <li>250 g ground beef</li>
                    <li>250 g ground pork</li>
                    <li>1 egg</li>
                    <li>50 mL dried bread crumbs</li>
                    <li>200 - 300 mL milk or cream</li>
                    <li>1 small onion</li>
                    <li>salt, pepper</li>
                    <li>butter for frying</li>
                </ul>
            </div>

            <div class="procedure">
                <h3>How to make Meatballs!</h3>

                <ol>
                    <li>Combine the liquid ingredients and the bread crumbs in a bowl and let it sit for 7-8 minutes.</li>
                    <li>Finely chop or grate the onion.</li>
                    <li>Combine the ground beef, ground pork, egg, chopped onion, salt and pepper in the bowl.</li>
                    <li>Make round Meatballs!, approximately 2-3 centimeters in diameter.</li>
                    <li>Pan fry the Meatballs! on medium heat in a frying pan with butter for approximately 3-5 minutes. Fry them on all sides until they are brown and not pink in the middle. Shaking the pan occasionally will help the Meatballs! cook evenly.</li>
                </ol>

                Serve the Meatballs! with mashed potatoes with a veal based brown sauce made with cream and lingonberry preserve or cranberry preserve.
            </div>

            <div class="nutrition">
                <h3>Nutrition values</h3>

                <div class="nutrition-row">
                    <b class="key">Calories:</b> <i class="value">487 kcal (24% of RDI)</i>
                </div>
                <div class="nutrition-row">
                    <b class="key">Fat:</b> <i class="value">37.4 gram (57.5% of RDI)</i>
                </div>
                <div class="nutrition-row">
                    <b class="key">Cholesterol:</b> <i class="value">194 mg (64.8% of RDI)</i>
                </div>
                <div class="nutrition-row">
                    <b class="key">Sodium:</b> <i class="value">132 mg (5.5% of RDI)</i>
                </div>
                <div class="nutrition-row">
                    <b class="key">Iron:</b> <i class="value">2.61 mg (14.5% of RDI)</i>
                </div>
                <div class="nutrition-row">
                    <b class="key">Calcium:</b> <i class="value">75 mg (7.5% of RDI)</i>
                </div>
            </div>

            <div class="servings">
                <h3>Serving details</h3>

                <div class="servings-row">
                    <b class="key">Servings:</b> <i class="value">4</i>
                </div>
                <div class="servings-row">
                    <b class="key">Time consumption:</b> <i class="value">30 minutes</i>
                </div>
            </div>
            
            <p class="reference">
                Recipe is borrowed from <a href="https://en.wikibooks.org/w/index.php?title=Cookbook:Swedish_Meatballs&amp;oldid=2691161">Swedish Meatballs on Wikibooks</a>.
            </p>
            <div id="comment-box">
            <?php if (Flight::has('has_session') && Flight::get('has_session')) { ?>
               <div class="new-comment">
                    <form id="add_comment" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <p>Write a new comment as <b><?php echo $_COOKIE['username']; ?></b></p>
                        <input type="hidden" name="nick" class="nick" value="<?php echo $_COOKIE['username']; ?>"></input>
                        <label for="comment">Comment:</label><br />
                        <textarea name="comment" class="new-comment"> </textarea>
                        <br />
                        <button type="submit">Submit</button>
                    </form>
                </div>
             <?php } ?>
            </div>
        </section>

        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

