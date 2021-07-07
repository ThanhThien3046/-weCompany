// window.$ = window.jQuery = require('jquery')

function toggleNav() {
    var btnToggle = document.getElementById("js__open-nav")
    if(!btnToggle){
        return;
    }
    /// add class neo scroll
    var bodies = document.getElementsByTagName('body')
    if(bodies.length){
        var body = bodies[0]
        body.classList.toggle('neo-scroll')
    }
    /// add class open to btn
    btnToggle.classList.toggle('open')
    /// add class open to nav
    var nav = document.getElementById('js__nav')
    if( nav ){
        nav.classList.toggle('open')
    }
    /// show sidebar
    var sidebar = document.getElementById('js__sidebar')
    if( sidebar ){
        sidebar.classList.toggle('open')
    }
}



function listenToggleNav() {
    
    var btnToggle = document.getElementById("js__open-nav")
    if( btnToggle ){
        btnToggle.onclick = function(e){
            
            toggleNav()
        }
    }
}

function listenBtnCloseNav() {

    var btnCloseNav = document.getElementById("js__close-nav")
    if( btnCloseNav ){

        btnCloseNav.onclick = function(e){
            toggleNav()
        }
    }
    var btnCloseNavi = document.getElementById("js__close-navi")
    if( btnCloseNavi ){

        btnCloseNavi.onclick = function(e){
            toggleNav()
        }
    }
}



/*slideshow processing */
var slideIndex = 0
function showSlides(){
    
    var wrapper__slider = document.getElementById('js__homeslider')
    if(!wrapper__slider){

        return false
    }
    /// check if dom mobile remove video
    // if(window.innerWidth < 991){

    //     var lstslide = wrapper__slider.getElementsByClassName("homeslider__item")
    //     /// is mobile
    //     for(var pos = 0; pos < lstslide.length; pos++){

    //         // if(lstslide[pos].classList.contains("homeslider__item-video")){
    //         //     /// remove
                
    //         //     lstslide[pos].remove()
    //         // }
    //     }
    // }
    
    var slides = wrapper__slider.getElementsByClassName("homeslider__item")
    /// slide exist then run 
    if( slides.length ){

        for(var i = 0; i < slides.length; i++){

            slides[i].classList.remove('show')
        }
        
        slideIndex++
        /// reset slide index
        if(slideIndex > slides.length){

            slideIndex = 1
        }
        /// show slide
        slides[slideIndex].classList.add('show')
        /// auto run loop slider
        setTimeout(showSlides,10000);
    }
}
showSlides()


function formatHeightBlockHome() {
    console.log("formatHeightBlockHome")
    var __format = document.getElementById("js__format-height-article")
    if(!__format){
        return false
    }
    /// format
    var articles = __format.getElementsByClassName('article__default')
    if( !articles.length ){
        return;
    }
    var first__article        = articles[0]
    var first__article_height = Math.ceil(first__article.offsetWidth)

    for (var index = 0; index < articles.length; index++) {
        (articles[index]).style.height = first__article_height + "px"

        if(window.innerWidth > 768){
            /// fix clear bold
            if( index % 3 == 2 ){
                /// check dom + 2 isset
                if( index + 2 > 0 && index + 2 < articles.length ){
                    /// check type == 2 
                    if( articles[index + 2].classList.contains('article__right') ){
                        /// add class 
                        articles[index].classList.add('article__default-clearbold')
                    }
                }
            }
            if( index - 5 > 0 && index - 5 < articles.length ){
                /// check type == 2 
                if( articles[index - 5].classList.contains('article__left') ){
                    /// add class 
                    articles[index].classList.add('article__default-clearbold')
                }
            }
            if( index - 1 > 0 && index - 1 < articles.length ){
                /// check type == 2 
                if( articles[index - 1].classList.contains('article__right') ){
                    /// add class 
                    articles[index].classList.add('article__default-clearbold')
                }
            }
        }
        
    }

    var article__rights = __format.getElementsByClassName('article__right')
    if(article__rights.length){
        
        for (var index = 0; index < article__rights.length; index++) {
            const article__right = article__rights[index];
            article__right.style.height = 2 * first__article_height + "px"
        }
    }
    var article__lefts = __format.getElementsByClassName('article__left')
    if(article__lefts.length){
        
        for (var index = 0; index < article__lefts.length; index++) {
            const article__left = article__lefts[index];
            article__left.style.height = 2 * first__article_height + "px"
        }
    }

}
formatHeightBlockHome()
window.addEventListener('resize', function(){
    
    formatHeightBlockHome()
});


console.log("client home")
listenToggleNav()
listenBtnCloseNav()

$(document).ready(function () {

    //// load slider
    var sliderwrapper = document.getElementById("js__homeslider")
    
    if(sliderwrapper && window.innerWidth < 991){
        var slideitems = sliderwrapper.getElementsByClassName("homeslider__item")
        for (var pos = 0; pos < slideitems.length; pos++) {
            
            var src = slideitems[pos].getAttribute('data-src-mobile')
            slideitems[pos].style.backgroundImage = "url('" + src + "')"
        }
    }
    $("#js__back-to-top").on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });
    
})

// window.backToTop = e => {
    
// }


$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 40){
                $(this).css('opacity','1');
                $(this).css('transform','translateX(0)');
            }
        });
    });	
    $(window).scroll(function (){
        $('.fadeinzoom').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 40){
                $(this).css('opacity','1');
                $(this).css('transform','translateX(0)');
            }
        });
    });	
});
