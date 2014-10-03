<?php
    require_once(DIRNAME(__FILE__) . "/helpers/main.php");
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
            <h2>Your friendly food calendar!</h2>

            <div class="week">
                <p class="weeknumber">Week 40</p>
                <div class="day empty">
                </div>
                <div class="day empty">
                </div>
                <div class="day">
                1 Oktober
                </div>
                <div class="day">
                2 Oktober
                </div>
                <div class="day">
                3 Oktober
                </div>
                <div class="day">
                4 Oktober
                </div>
                <div class="day">
                5 Oktober
                </div>
            </div>
            <div class="week">
                <p class="weeknumber">Week 41</p>
                <div class="day">
                6 Oktober
                </div>
                <div class="day">
                7 Oktober
                </div>
                <div class="day">
                8 Oktober
                </div>
                <div class="day">
                9 Oktober
                </div>
                <div class="day">
                10 Oktober
                </div>
                <div class="day">
                11 Oktober
                </div>
                <div class="day">
                12 Oktober
                </div>
            </div>
            <div class="week">
                <p class="weeknumber">Week 42</p>
                <div class="day">
                13 Oktober
                </div>
                <div class="day">
                14 Oktober
                </div>
                <div class="day">
                15 Oktober
                
                <a href="/recipes/pancakes"><img src="img/pancake128.jpg" alt="pancake" /></a>
                </div>
                <div class="day">
                16 Oktober
                </div>
                <div class="day">
                17 Oktober
                </div>
                <div class="day">
                18 Oktober
                </div>
                <div class="day">
                19 Oktober
            </div>
            <div class="week">
                <p class="weeknumber">Week 43</p>
                </div>
                <div class="day">
                20 Oktober
                </div>
                <div class="day">
                21 Oktober
                </div>
                <div class="day">
                22 Oktober
                </div>
                <div class="day">
                23 Oktober
                </div>
                <div class="day">
                24 Oktober
                </div>
                <div class="day">
                25 Oktober
                </div>
                <div class="day">
                26 Oktober
                </div>
            </div>
            <div class="week">
                <p class="weeknumber">Week 44</p>   
                <div class="day">
                27 Oktober

                <a href="/recipes/meatballs"><img src="img/meatballs128.jpg" alt="meatballs!" /></a>
                </div>
                <div class="day">
                28 Oktober
                </div>
                <div class="day">
                29 Oktober
                </div>
                <div class="day">
                30 Oktober
                </div>
                <div class="day">
                31 Oktober
                </div>
                <div class="day empty">
                </div>
                <div class="day empty">
                </div>
            </div> 
        </section>
        <footer>Developed by Emil Tullstedt for ID1354</footer>
    </div>
</body>
</html>

