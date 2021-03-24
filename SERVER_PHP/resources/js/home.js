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

console.log("client home")
listenToggleNav()
listenBtnCloseNav()