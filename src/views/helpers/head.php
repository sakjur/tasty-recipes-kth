<?php

    function add_css($sheet) {
        $rv = "<link href=\"$sheet\" rel=\"stylesheet\" type=\"text/css\" />";
        return $rv;
    }

    function add_js($script) {
        $rv = "<script src=\"$script\" type=\"text/javascript\"></script>";
        return $rv;
    }

    function generate_head() {
        $data  = "<meta charset=\"utf-8\" />";
        $data .= add_css("/css/main.css");
        $data .= add_css("/fonts/fontsheet.css");
        $data .= add_js("/js/jquery.js");
        $data .= add_js("/js/main.js");
        echo $data;
    }

?>