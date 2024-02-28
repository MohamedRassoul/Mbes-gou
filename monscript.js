var compteurImage=1;
var totalImage=12;

function slider(X){
     var image=document.getElementById("img");
     compteurImage=compteurImage + X;
     image.src="images/image"+compteurImage+".jpg";

     if(compteur>=totalImage){
        compteurImage=1;
     }
     if(compteurImage<1){
        compteurImage=totalImage;
     }
}

function sliderAuto(){
    var image=document.getElementById("img");
    compteurImage=compteurImage + 1;
    image.src="images/image"+compteurImage+".jpg";

    if(compteurImage>=totalImage){
       compteurImage=1;
    }
    if(compteurImage<1){
       compteurImage=totalImage;
    }
}
window.setInterval(sliderAuto, 3000);
