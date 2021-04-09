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
	});


    /// collapse
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            // $(this).closest('.wrapper__collapse').find('.content__collapsible').toggleClass('show')
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
            content.style.maxHeight = null;
            } else {
            content.style.maxHeight = content.scrollHeight + "px";
            } 
        });
    }
})