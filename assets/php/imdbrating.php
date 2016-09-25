<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/10/16
 * Time: 8:33 PM
 */

//$doc = new DOMDocument();
//$doc->loadHTMLFile('http://www.imdb.com/title/tt0848228/');
//
//$html = $doc->querySelector('.heroic-overview .title_block .title_bar_wrapper .ratings_wrapper .imdbRating .ratingValue strong ').value();
//print_r($html);

$imdb = 'http://www.imdb.com/title/tt0848228/';
$imdb = str_replace('http://www.imdb.com/title/', '', $imdb);
$imdb = str_replace('/','',$imdb);
echo $imdb;
?>
<script type="text/javascript" src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script>
    var imdbId = "tt0848228";
    $.get("http://www.omdbapi.com/?i=" + imdbId, null, function(text){
       // var a = $('.heroic-overview .title_block .title_bar_wrapper .ratings_wrapper .imdbRating .ratingValue strong ').text()
//        alert($(text).find('a'));
    console.log(text.imdbRating);
    });



//    // Send Request
//    var http = new ActiveXObject("Microsoft.XMLHTTP");
//    http.open("GET", "http://www.omdbapi.com/?i=" + imdbId, false);
//    http.send(null);
//
//    // Response to JSON
//    var omdbData = http.responseText;
//    var omdbJSON = eval("(" + omdbData + ")");
//
//    // Returns Movie Title
//    alert(omdbJSON.Title);

</script>
