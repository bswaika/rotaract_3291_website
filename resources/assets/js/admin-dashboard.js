$(document).ready(function(){
    $("#adminMembersSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#adminMembersTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function(){
    $("#adminEventsSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#adminEventsTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function(){
    $("#adminClubsSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#adminClubsTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function(){
    $("#adminEventImagesSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#adminEventImagesTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function(){
    $("#adminEventBlogsSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#adminEventBlogsTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function(){
    $("#adminEventApprovalsSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#adminEventApprovalsTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function(){
    $("#adminLeaderBoardSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#adminLeaderBoardTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function(){
    $("#adminPujoSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#adminPujoTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

function bs_input_file() {
    $(".input-file").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                element.attr("name",$(this).attr("name"));
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                });
                $(this).find("button.btn-choose").click(function(){
                    element.click();
                });
                $(this).find('input').css("cursor","pointer");
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();
                    return false;
                });
                return element;
            }
        }
    );
}
$(function() {
    bs_input_file();
});