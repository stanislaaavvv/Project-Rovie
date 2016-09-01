/**
 * Created by user on 9/1/16.
 */

$(function() {
    $('#movielink').on('click', function () {
        window.location.replace('movie.html');
    });
    $('#ratinglink').on('click', function () {
        window.location.replace('ratings.html')
    });
    $('#logo').on('click', function () {
        window.location.replace('index.html')
    });
    $('.registration').on('click', function () {
        window.location.replace('registration.html')
    });
    $('#loginlink').on('click', function () {
        window.location.replace('signup.html')
    });
    $('#login').on('click', function (e) {
        e.preventDefault();
        window.location.replace('index.html');
    });
    $('#registerbutton').on('click', function (e) {
        e.preventDefault();
        window.location.replace('signup.html');
    });
    $('#logout').on('click', function (e) {
        e.preventDefault();
        window.location.replace('index.html');
    });
    $('#profile').on('click', function (e) {
        e.preventDefault();
        window.location.replace('profile.html')
    });
});


