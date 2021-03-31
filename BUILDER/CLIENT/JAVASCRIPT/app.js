/*! loadJS: load a JS file asynchronously. [c]2014 @scottjehl, Filament Group, Inc. (Based on http://goo.gl/REQGQ by Paul Irish). Licensed MIT */
function loadJS(src, cb){

    var ref    = document.getElementsByTagName( "script" )[ 0 ]
    var script = document.createElement( "script" )

    script.src   = src
    script.async = true

    ref.parentNode.insertBefore( script, ref )

    if (cb && typeof(cb) === "function") {

        script.onload = cb
    }
    return script
}

$(document).ready(function () {
    console.log("client js")
    //// draw google map page contact 
    var mapContact = document.getElementById("map-contact-canvas")
    if(mapContact && typeof GOOGLE_PLACES_API != 'undefined'){
        
        loadJS('https://maps.googleapis.com/maps/api/js?key=' + GOOGLE_PLACES_API, drawMapContact )
    }else{
        console.log("GOOGLE_PLACES_API draw google map not working")
    }
    //// load google recapcha 
    var recapcha = document.getElementById("google__recaptcha")
    if(recapcha){
        recapcha.addEventListener('lazybeforeunveil', function(e){
            
            loadJS('https://www.google.com/recaptcha/api.js?hl=vi')
        })
    }
    //// home page review custommer
    var rating__custommer = document.getElementById("rating__custommer")
    if(rating__custommer){
        
        rating__custommer.addEventListener('lazybeforeunveil', function(e){
            console.log("rating__custommer")
            /// slider home page
            $("#rating__comment-owl").owlCarousel({
                items : 3,
                slideSpeed : 700,
                nav: true,
                autoplay: true,
                autoplayHoverPause: true,
                dots: true,
                loop: true,
                lazyLoad: true,
                responsiveRefreshRate : true,
                navText: false,/// ["<",">"],
                responsive:{
                    0:{
                        items: 1
                    },
                    320:{
                        items: 1
                    },
                    480:{
                        items: 2
                    },
                    768:{
                        items: 3
                    },
                    992:{
                        items: 3
                    }
                }
            
            })
        })
    }
    //// check modal homepage is exist? 
    //// if exist check have class show => show modal
    var modal__noti = document.getElementById("js__noti")
    if(modal__noti && modal__noti.classList.contains('show')){
        $(modal__noti).modal({
            escapeClose: true,
            clickClose: true,
            showClose: true
        });
    }
    /***
     * 
     * Jquery toggle menu mobile
     */
    $("#js_btn_header_toggle__menu").click(function(){
        
        $("#menu").toggleClass("show")
        $("body").toggleClass("neo-scroll")
    })
    var $menu = $("#menu");
    $menu.find(".navigate__link__icon_plus").click(function(){
        /// check is mobile have show class of toggle button is click
        if($menu.hasClass('show')){
            /// remove all class active link old 
            $(".navigate__link").removeClass('active')
            /// dont have class active so now active class click
            $(this).closest(".navigate__link").find('.dropdown-menu').slideToggle('fast', function(){

                if($(this).hasClass('active')){
                    $(this).closest(".navigate__link").removeClass('active')
                }else{
                    $(this).closest(".navigate__link").addClass('active')
                }
            })
        }
    })
    $menu.find("#js_menu__mobile_close").click(function(){
        $("#menu").toggleClass("show")
        $("body").toggleClass("neo-scroll")
    })


    
    //// list design homepage
    $(".js__click-design").click(function(){
        
        $(".js__click-design").removeClass("active")
        $(this).addClass("active")
        
        var rel = $(this).attr("data-rel")
        if( rel != 'all' ){
            $(".hidden-load-more").hide()
        }else{
            $(".hidden-load-more").show()
        }

        $(".js__tag-wrapper").fadeTo(100, .1)
        $(".js__tag-wrapper .item").not("." + rel).fadeOut().removeClass("js__stick-tag")
        setTimeout(function() {
            $("." + rel).fadeIn().addClass("js__stick-tag")
            $(".js__tag-wrapper").fadeTo(300, 1) 
        }, 300)
    })
})

//// setting event scroll fixxed top
$(window).on("scroll , load", function() {
    
    var windowScrollTop = $(window).scrollTop()
    // var $header         = $("#js__header")
    // if( windowScrollTop > 5 ){
    //     $header
    //     .addClass(["header__light", "fixed"])
    //     .removeClass("position-absolute") 
    // }else{
    //     $header
    //     .addClass("position-absolute")
    //     .removeClass(["header__light", "fixed"])
    // }
    if( windowScrollTop > 300 ){ 
        $("#back__top").fadeIn()
    }else{
        $("#back__top").fadeOut()
    }
})

function backToTop() {
    if (window.pageYOffset > 0) {
        window.scrollBy(0, -80);
        setTimeout(this.backToTop, 10);
    }
}




function drawMapContact() {
    if(!document.getElementById("map-contact-canvas")){
        return false
    }

    var styles = [
        {
            stylers: [{ saturation: 0 }],
        },
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [
                { lightness: 0 },
                { visibility: "simplified" },
            ],
        },
        {
            featureType: "road",
            elementType: "labels",
            stylers: [{ visibility: "off" }],
        },
    ];
    // Create a new StyledMapType object, passing it the array of styles,
    // as well as the name to be displayed on the map type control.
    var styledMap = new google.maps.StyledMapType(styles, {
        name: "Google Map",
    });
    if(typeof MAP_LAT == 'undefined' || typeof MAP_LONG == 'undefined'){
        MAP_LAT = 35.707616
        MAP_LONG = 139.669912
    }
    var myLatlng = new google.maps.LatLng(MAP_LAT, MAP_LONG)
    var mapOptions = {
        zoom: 17,
        scrollwheel: false,
        center: myLatlng,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"],
        },
    };

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: '/images/map-icon.png'
    });
    var map = new google.maps.Map(
        document.getElementById("map-contact-canvas"),
        mapOptions
    );

    //Associate the styled map with the MapTypeId and set it to display.
    map.mapTypes.set("map_style", styledMap);
    map.setMapTypeId("map_style");
    marker.setMap(map);

    var address_detail =
        '<div class="address_detail_map">' +
        '<h4 class="main_color">' +
        CONFIG_COMPANY_NAME +
        '</h4>' +
        CONFIG_COMPANY_ADDRESS +
        "</div>";

    address_detail = address_detail.split("\n").join("<br />");
    var infowindow = new google.maps.InfoWindow({
        content: address_detail,
    });

    marker.addListener("click", function () {
        infowindow.open(map, marker);
    });
    infowindow.open(map, marker);
}


