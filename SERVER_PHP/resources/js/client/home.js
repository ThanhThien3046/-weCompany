// window.$ = window.jQuery = require('jquery')

let toggleNav = () => {
    let btnToggle = document.getElementById("js__open-nav")
    if(!btnToggle){
        return;
    }
    /// add class neo scroll
    let bodies = document.getElementsByTagName('body')
    if(bodies.length){
        let body = bodies[0]
        body.classList.toggle('neo-scroll')
    }
    /// add class open to btn
    btnToggle.classList.toggle('open')
    /// add class open to nav
    let nav = document.getElementById('js__nav')
    if( nav ){
        nav.classList.toggle('open')
    }
    /// show sidebar
    let sidebar = document.getElementById('js__sidebar')
    if( sidebar ){
        sidebar.classList.toggle('open')
    }
}

let listenToggleNav = () => {
    let btnToggle = document.getElementById("js__open-nav")
    if( btnToggle ){
        btnToggle.onclick = function(e){
            toggleNav()
        }
    }
}

let listenBtnCloseNav = () => {

    let btnCloseNav = document.getElementById("js__close-nav")
    if( btnCloseNav ){

        btnCloseNav.onclick = function(e){
            toggleNav()
        }
    }
}



/*slideshow processing */
var slideIndex = 0
function showSlides(){
    
    let wrapper__slider = document.getElementById('js__homeslider')
    if(!wrapper__slider){

        return false
    }
    
    let slides = wrapper__slider.getElementsByClassName("homeslider__item")
    /// slide exist then run 
    if( slides.length ){

        for(let i = 0; i < slides.length; i++){

            slides[i].classList.remove('show')
        }
        
        slideIndex++
        /// reset slide index
        if(slideIndex > slides.length){

            slideIndex = 1
        }
        /// show slide
        slides[slideIndex - 1].classList.add('show')
        /// auto run loop slider
        setTimeout(showSlides,5000);
    }
}
showSlides()


let formatHeightBlockHome = () => {
    console.log("formatHeightBlockHome")
    let __format = document.getElementById("js__format-height-article")
    if(!__format){
        return false
    }
    /// format
    let articles = __format.getElementsByClassName('article__default')
    if( !articles.length ){
        return;
    }
    let first__article = articles[0]
    
    let article__rights = __format.getElementsByClassName('article__right')
    if(article__rights.length){
        
        for (let index = 0; index < article__rights.length; index++) {
            const article__right = article__rights[index];
            article__right.style.height = 2 * first__article.offsetHeight + "px"
        }
    }
    let article__lefts = __format.getElementsByClassName('article__left')
    if(article__lefts.length){
        
        for (let index = 0; index < article__lefts.length; index++) {
            const article__left = article__lefts[index];
            article__left.style.height = 2 * first__article.offsetHeight + "px"
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