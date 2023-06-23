let btn =document.getElementById("bottom");
 window.onscroll =function(){
    if (scrollY >= 400){
        btn.style.display="block";
    }else{
        btn.style.display="none";
    }
 }
 btn.onclick=function(){
    scroll({
        top: 0,
        left :0,
        behavior:"smooth"
    });
 }