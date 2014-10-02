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
            <a href="index.html">Main</a>
            <a href="calendar.html">Calendar</a>
            <a href="recipes.html" id="nav_recipe">Recipes</a>
            <div id="dropdown_recipe" class="dropdown">
                <a href="pancakes.html" class="current">
                    Pancakes
                </a>
                <a href="meatballs.html">
                    Meatballs!
                </a>
            </div>
            <a href="contact.html" id="nav_contact">Contact</a>
            <div id="dropdown_contact" class="dropdown">
                <a href="contact_us.html">Contact us</a>
                <a href="about_us.html">About us</a>
            </div>
        </nav>

        <section>
            <h2>Pancakes</h2>

            <img class="food-image" src="img/pancake320.jpg" alt="Picture of pancake" />

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
            <div id="comment-box">
               <div class="new-comment">
                    <form id="add_comment">
                        <label for="nick">Nickname</label><br />
                        <input type="text" name="nick" class="nick" placeholder="Nickname" /></input>
                        <br/>
                        <label for="email">E-mail</label><br />
                        <input type="email" name="email" class="email" placeholder="E-mail" /></input>
                        <br />
                        <label for="comment">Comment:</label><br />
                        <textarea name="comment" class="new-comment"> </textarea>
                        <br />
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </section>

        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

