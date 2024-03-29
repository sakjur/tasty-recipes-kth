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
            <h2>Pancakes</h2>

            <img class="food-image" src="/img/pancake320.jpg" alt="Picture of pancake" />

            <div class="ingredients">
                <h3>Ingredients</h3>
                <ul>
                    <li>120 grams all-purpose flour</li>
                    <li>1½ teaspoon baking powder</li>
                    <li>1 cup (250 ml) milk (substitute buttermilk or 1:1 mix of milk and buttermilk)</li>
                    <li>1 egg, separated</li>
                    <li>1 Tbs white sugar</li>
                    <li>1 pinch salt</li>
                </ul>
            </div>

            <div class="procedure">
                <h3>How to make pancake</h3>

                <ol>
                    <li>In large bowl, mix dry ingredients together until well-blended.</li>
                    <li>Add milk and mix well until smooth.</li>
                    <li>Separate eggs, placing the whites in a medium bowl and the yolks in the batter. Mix well.</li>
                    <li>Beat whites until stiff and then fold into batter gently (skip this step for heavier pancakes or if 1 cup buttermilk is substituted for milk).</li>
                    <li>Pour ladles of the mixture into a non-stick pan, one at a time.</li>
                    <li>Cook until the edges are dry and bubbles appear on surface. Turn; cook until golden. Yields 12 to 14 pancakes.</li>
                </ol>

                Serve with butter, maple syrup, fruit, chocolate spread, melted chocolate, jam or cheese.
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
                    <b class="key">Servings:</b> <i class="value">3</i>
                </div>
                <div class="servings-row">
                    <b class="key">Time consumption:</b> <i class="value">15 minutes</i>
                </div>
            </div>
            
            <p class="reference">
                Recipe is borrowed from <a href="https://en.wikibooks.org/wiki/Cookbook:Pancake">Pancake on Wikibooks</a>.
            </p>
            <?php generate_comments(); ?>
       </section>

        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

