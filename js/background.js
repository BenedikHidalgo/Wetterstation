//Hintergrund ändern
window.onload=function() {
    var currentTime = new Date().getHours(), img="";
    if (5 <= currentTime && currentTime < 11) {
        img="img/dawn.png";
    } else if (11 <= currentTime && currentTime < 17) {
        img="img/mittag.jpg";
    } else if (17 <= currentTime && currentTime < 23){
        img="img/abend.jpg";
    } else {
        img="img/nacht.jpg";
    }
    document.body.style.backgroundImage='url('+img+')';
}