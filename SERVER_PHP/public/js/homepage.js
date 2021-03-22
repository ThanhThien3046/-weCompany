
$(document).ready(function () {
    console.log("client js")
    $('#DIV_46').mouseover(function(){
        $(this).toggleClass('LI_48');
    })
    
    $('#DIV_46').mouseout(function(){
        $(this).toggleClass('LI_48');
    })
})




/*slideshow processing */
var slideIndex = 0;
function showSlides(){
    var wrapper__slider = document.getElementById('js__slider-homepage')
    if(!wrapper__slider){

        return false
    }

    var i;
    var slides = wrapper__slider.getElementsByClassName("slider__item")
    /// slide exist then run 
    if( slides.length ){

        for(i = 0; i < slides.length; i++){

            slides[i].style.display = "none"
        }
        
        slideIndex++
        /// reset slide index
        if(slideIndex > slides.length){

            slideIndex = 1
        }
        /// show slide
        slides[slideIndex - 1].style.display = "block"
        /// auto run loop slider
        setTimeout(showSlides,2000);
    }
}
showSlides();
/*end slideshow processing */
function zoomImg(x){
    if(document.getElementById(x))
        document.getElementById(x).style.background = "rgb(27,170,209)"
}
function hoverBoder(x){
    if(element.getElementsByClassName(x).length)
        element.getElementsByClassName(x)[1].style.background = "rgb(27,170,209)"
}
function normalImg(x){
    if(document.getElementById(x))
        document.getElementById(x).style.background = "rgba(255,255,255,0.2)"
}
function normalImg_(x){
    if(document.getElementById(x))
        document.getElementById(x).style.background = "rgb(141, 213, 232)"
}
function normalBorder(x){
    var dom = element.getElementsByClassName(x)
    if(dom.length){
        dom[1].style.border = "1px solid rgb(204, 204, 204)"
    }	
}