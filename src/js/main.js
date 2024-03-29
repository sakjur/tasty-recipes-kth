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

function register_comment_area (obj) {
    var add_obj = '#add_' + obj;
    var obj_box = '#' + obj + '-box';
	var name = $(add_obj + " .nick").val();
	var recipe_name = $(add_obj + " .recipe").val();

	get_comments_json(recipe_name, name, obj_box);

    $(add_obj).submit(
        function(e) {
            var comment = $(add_obj + " .new-comment").val();
			var name = $(add_obj + " .nick").val();
            $(add_obj + " .new-comment").val("");

            if (!name || !comment) {
                var emsg = "Cannot submit"; 
                console.log(emsg);
                e.preventDefault();
                return;
            }

            $.post('/new_comment', { r: recipe_name, c: comment})
				.done(function() {
					get_comments_json(recipe_name, name, obj_box);
				});

            e.preventDefault();
    });
}

function get_comments_json (recipe, name, obj_box) {
	$.get("/recipes/" + recipe + "/comments.json",
		function(msg) {
			var comment_array = $.parseJSON(msg);

			var nc = "";
			console.log(comment_array);

			$.each(
				comment_array,
				function (key, comment) {
					console.log(comment);
					nc += '<div class="comment">';
					nc += '<div class="comment-meta">';
					nc += '<b class="author">' + comment.username + '</b>';
					if (name == comment.username) {
						nc += "<a class=\"edit\""; 
						nc += "href=\"/edit/" + comment.id + "\">edit</a>";
					}
					nc += '<i class="date">' + comment.time_created + '</i>';
					nc += '</div>';
					nc += '<div class="comment-text">';
					nc += comment.comment;
					nc += '</div>';
				}
			);

            $(".comment").remove();
            $(obj_box).prepend(nc);
		}
	);
}

$(document).ready(function() {
    register_dropdown('recipe');
    register_dropdown('contact');
    register_comment_area('comment');
});

