/**
 * Created by user on 9/1/16.
 */

$(function() {

    $('#logo').on('click', function () {
        window.location.replace('../html/index.php')
    });
    $('.registration').on('click', function () {
        window.location.replace('../html/registration.php')
    });
    $('#logout').on('click', function () {
        window.location.replace('../php/logout.php')
    });
    $('#search').on('click', function () {
        var searchTerm = $('#header > nav > input[type="text"]').val();

        $.ajax({
            method: "POST",
            url: "http://localhost/Homeworks/PROJECT/assets/php/searchTextEdit.php",
            async: false,
            data: {search:searchTerm },
            success: function () {
                window.location.replace('../html/search.php');

            }
        });
    });

    $('#header > nav > input[type="text"]').on('keydown', function (e) {
        if (e.keyCode == 13) {
           var searchTerm = $('#header > nav > input[type="text"]').val();

            $.ajax({
                method: "POST",
                url: "http://localhost/Homeworks/PROJECT/assets/php/searchTextEdit.php",
                async: false,
                data: {search:searchTerm },
                success: function () {
                    window.location.replace('../html/search.php');

                }
            });

        }
    });


});


