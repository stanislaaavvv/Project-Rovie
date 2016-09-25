/**
 * Created by user on 9/10/16.
 */
function ImgChanger(){

}

ImgChanger.prototype.Change = function (counter) {
    var imgcounter = counter;
    window.setInterval(function(){

        $('body').css('background','url("../img/imgbackground/'+imgcounter+'.jpg")');
        $('body').css('background-size','cover');

        imgcounter++;
        if(imgcounter == 30) {
            imgcounter = 1;
        }

    },4000)
};