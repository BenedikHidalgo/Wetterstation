window.onload=function() {
    var currentTime = new Date().getHours();
    if (5 <= currentTime && currentTime < 11) {
        img="img/wasser.png";
        imgLogo="img/logo_tag.jpg";
    } else if (11 <= currentTime && currentTime < 17) {
        img="img/mittag.jpg";
        bgColor="#00000094";
    } else if (17 <= currentTime && currentTime < 23){
        img="img/abend.jpg";
        imgLogo="img/logo_tag.jpg";
        bgColor="#00000094";
    } else {
        img="img/rentiere.jpg";
        bgColor="#00000094";
    }
    document.body.style.backgroundImage='url('+img +')';
    document.getElementById("logo").src=''+imgLogo+'';
    document.getElementsByClassName("btn").style.backgroundColor='#'+bgColor+'';
}




