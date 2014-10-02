<?php

function generate_menu()
{
    $recipes = array(
        array("url" => "/recipes/meatballs", "name" => "Meatballs!"),
        array("url" => "/recipes/pancakes", "name" => "Pancakes")
    );

    $contact = array(
        array("url" => "/company/about", "name" => "About"),
        array("url" => "/company/contact", "name" => "Contact")
    );

    $pages = array(
        array("url" => "/", "name" => "Main"),
        array("url" => "/calendar", "name" => "Calendar"),
        array("url" => "/recipes", "name" => "Recipes",
            "dropdown" => $recipes, "dropdown_id" => "recipe"),
        array("url" => "/company", "name" => "About", 
            "dropdown" => $contact, "dropdown_id" => "contact")
    );

    foreach ($pages as $each) {
        if (!array_key_exists('dropdown', $each)) {
            $link = make_link($each['url'], $each['name']);
            echo($link); 
        } else {
            $link = make_link($each['url'], $each['name'], 
                "nav_" . $each['dropdown_id']);
            $link .= "<div id=\"dropdown_" . $each['dropdown_id'];
            $link .= "\" class=\"dropdown\">";
            foreach ($each['dropdown'] as $menu_item)
            {
                $link .= make_link($menu_item['url'], $menu_item['name']);
            }
            $link .= "</div>";
            echo($link);
        }
    };
};

function make_link($href, $name, $id = False, $classes = False)
{
    $link = "<a href=\"$href\"";
    if ($id)
        $link .= " id=\"$id\"";
    if ($classes)
        $link .= " class=\"$classes\"";
    $link .= ">$name</a>";
    return $link;
}

?>

