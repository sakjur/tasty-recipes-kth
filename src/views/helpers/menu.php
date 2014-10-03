<?php

class NavLink {
    private $url = Null;
    private $name = Null;
    private $dropdown_id = Null;
    private $dropdown = array();

    function __construct($url, $name, $dropdown_id = Null, $dropdown = False)
    {
        $this->url  = $url;
        $this->name = $name;
        $this->dropdown = $dropdown;
        $this->dropdown_id = $dropdown_id;
    }

    public function has_dropdown()
    {
        if ($this->dropdown_id)
            return True;
        return False;
    }

    public function get_url()
    {
        return $this->url;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_dropdown()
    {
        return $this->dropdown;
    }

    public function get_dropdown_id()
    {
        return $this->dropdown_id;
    }

    public function make_link()
    {
        $link = "<a href=\"$this->url\"";
        if ($this->has_dropdown())
            $link .= " id=\"nav_$this->dropdown_id\"";
        $link .= ">$this->name</a> ";
        return $link;
    }

}

function generate_menu()
{
    $recipes = array(
        new NavLink("/recipes/meatballs", "Meatballs!"),
        new NavLink("/recipes/pancakes", "Pancakes")
    );

    $contact = array(
        new NavLink("/company/about", "About"),
        new NavLink("/company/contact", "Contact")
    );

    $pages = array(
        new NavLink("/", "Main"),
        new NavLink("/calendar", "Calendar"),
        new NavLink("/recipes", "Recipes", "recipe", $recipes),
        new NavLink("/company", "About", "contact", $contact)
    );

    foreach ($pages as $each) {
        if ($each->has_dropdown()) {
            $link = $each->make_link();
            $link .= "<div id=\"dropdown_" . $each->get_dropdown_id();
            $link .= "\" class=\"dropdown\">";

            $dropdown_menu = $each->get_dropdown();

            foreach ($dropdown_menu as $menu_item)
            {
                $link .= $menu_item->make_link();
            }
            $link .= "</div>";
            echo($link);
        } else { // No dropdown
            echo $each->make_link();
        }
    };
};

?>

