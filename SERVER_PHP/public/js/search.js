function liHover(x,y){
    document.getElementById(y).style.background = "rgb(27,170,209)";
    document.getElementById(x).style.color = "rgb(255, 255, 255)";
}
function liMouseout(x,y){
    document.getElementById(y).style.background =  "rgb(255, 255, 255)";
    document.getElementById(x).style.color = "rgb(27,170,209)";
}
// Historyの処理
$(function(){
    $('main div:eq(0)').show();
    $('main .check li').click(function(){
        $('main .check li').removeClass('active')
        $(this).addClass('active');
        var n = $('main ul li').index(this);
        $('main .js__toggle-item').hide();
        $('main .js__toggle-item:eq('+ n +')').fadeToggle(900);
        if($('main .js__toggle-item:eq('+ n +')').get(0)){
            console.log ("có")
        }else{
            //// không có data
            /// ra trang 404
            
            window.location.href = PAGE_404
        }


        /// collapse
        var collapses = document.getElementsByClassName("collapsible");
        var icollapses;
        
        for (icollapses = 0; icollapses < collapses.length; icollapses++) {
            
            if( (collapses[icollapses]).classList.contains("active") ){
                console.log("activeactiveactiveactiveactive")
                var content = (collapses[icollapses]).nextElementSibling;
                content.style.maxHeight = (content.scrollHeight + 30) + "px";
            }
        }

	});


    /// collapse
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
        
        if( (coll[i]).classList.contains("active") ){
            var content = (coll[i]).nextElementSibling;
            content.style.maxHeight = (content.scrollHeight + 30) + "px";
        }
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            // $(this).closest('.wrapper__collapse').find('.content__collapsible').toggleClass('show')
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = (content.scrollHeight + 30) + "px";
            } 
        });
    }
    
    var lstCol = document.getElementsByClassName('collapsible')
    for (var ilstCol = 0; ilstCol < lstCol.length; ilstCol++) {
        if( $(lstCol[ilstCol]).hasClass('show')){
            $(lstCol[ilstCol]).click()
            console.log("click rồi", $(lstCol[ilstCol]))
        }
    }



})

// read more 
$(function() {
    $('.more-btn').on('click', function() {
      if( $(this).children().is('.open') ) {
        $(this).html('<p class="close">閉じる</p>').addClass('close-btn');
        $(this).parent().removeClass('slide-up').addClass('slide-down');
      } else {
        $(this).html('<p class="open">もっと見る</p>').removeClass('close-btn');
        $(this).parent().removeClass('slide-down').addClass('slide-up');
      }
    });
  });