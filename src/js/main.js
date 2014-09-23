"use strict";

function close_dropdowns()
{
    $('.dropdown.show').each(
        function() {
            $(this).fadeOut(400, function() {
                $(this).removeClass('show');
                $(this).css('left', '0px'); 
                $(this).css('top', '0px');
        });    
    });

    $(document).unbind('click');
}

function unregister_link(obj)
{
    $(obj).attr('href', '#');
}

function register_dropdown(shortid, links)
{
    var toggle_menu =
        function() {
            var menu = "#dropdown_" + shortid;

            if($(menu).hasClass('show')) 
            {
                $(menu).removeClass('show');
                $(menu).fadeOut();
                return;
            }
            
            if ($(document).width() > 480) {
                var button_offset  = $(object).offset();
                button_offset.top += $(object).height()+15;
                $(menu).css('left', button_offset.left); 
                $(menu).css('top', button_offset.top);
            }
            
            close_dropdowns();
            $(menu).addClass('show');
            $(menu).fadeIn(); 

            setTimeout(function() { $(document).click(close_dropdowns); }, 15);
        };

    var object = "#nav_" + shortid;
    unregister_link(object);
    $(object).append(" ↓");
    $(object).addClass("dropdown_head");
    $(object).click(toggle_menu);
}

$(document).ready(function() {
    register_dropdown('recipe');
    register_dropdown('contact');
});
