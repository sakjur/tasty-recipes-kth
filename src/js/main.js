/*jslint browser: true, vars: true, white: true, indent: 4, maxlen: 80 */
"use strict";

function get_current_time()
{
    var isonow = new Date().toISOString();
    isonow = isonow.replace('T', ' ');
    isonow = isonow.substring(0, 16); // Removing s and µs
    return isonow;
}

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

function register_dropdown(shortid)
{
    var object = "#nav_" + shortid;
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

    unregister_link(object);
    $(object).append(" ↓");
    $(object).addClass("dropdown_head");
    $(object).click(toggle_menu);
}

function register_edit_comment_button(button_class) {
    $('.' + button_class).click(function (e){
        var comment = $(this).closest('.comment');
        comment = comment.children('.comment-text');
        var current_content = comment.html();
        comment.empty();

        var ef = '<form class="editform">';
        ef += '<textarea class="edittext"></textarea>';
        ef += '<br />';
        ef += '<button type="submit">Submit</button>';
        ef += '</form>';

        comment.append(ef);
        $('.edittext').val(current_content);

        $('.editform').submit(function (e) {
            content = $('.edittext').val();
            content = content.replace('\n', '<br />');
            comment = $(this).closest('.comment-text');
            comment.empty();
            comment.append(content);
            e.preventDefault();
        });
        e.preventDefault();
    });
}

function register_comment_area (obj) {
    var add_obj = '#add_' + obj;
    var obj_box = '#' + obj + '-box';

    $(add_obj).submit(
        function(e) {
            var name = $(add_obj + " .nick").val();
            var email = $(add_obj + " .email").val();
            var comment = $(add_obj + " .new-comment").val();
            $(add_obj + " .nick").val("");
            $(add_obj + " .email").val("");
            $(add_obj + " .new-comment").val("");

            if (!name || !email || !comment) {
                alert("Could not submit comment without sensible content");
                e.preventDefault();
                return;
            }

            var nc = '<div class="comment">';
            nc += '<div class="comment-meta">';
            nc += '<img src="http://www.gravatar.com/avatar/' +
                email + '?d=retro&amp;s=42"';
            nc += ' alt="" />';
            nc += '<b class="author">' + name + '</b>';
            nc += '<a class="edit" href="#">edit</a>';
            nc += '<i class="date">' + get_current_time() + '</i>';
            nc += '</div>';
            nc += '<div class="comment-text">';
            nc += comment;
            nc += '</div>';

            $(obj_box).prepend(nc);
            register_edit_comment_button('edit');

            e.preventDefault();
    });
}

$(document).ready(function() {
    register_dropdown('recipe');
    register_dropdown('contact');
    register_comment_area('comment');
});

