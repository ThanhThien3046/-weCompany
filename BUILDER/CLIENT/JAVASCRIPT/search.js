function liHover(x,y){
    document.getElementById(y).style.background = "rgb(27,170,209)";
    document.getElementById(x).style.color = "rgb(255, 255, 255)";
}
function liMouseout(x,y){
    document.getElementById(y).style.background =  "rgb(255, 255, 255)";
    document.getElementById(x).style.color = "rgb(27,170,209)";
}

/// collapse reset height when show container recruit ( why? because nextElementSibling = 0 when container display none)
function resetHeightCollapseByDomId( id ){
    if(document.getElementById(id)){

        var collapses = document.getElementsByClassName("collapsible");
        var icollapses;
        
        for (icollapses = 0; icollapses < collapses.length; icollapses++) {
            
            if( (collapses[icollapses]).classList.contains("active") ){
                
                var content = (collapses[icollapses]).nextElementSibling;
                content.style.maxHeight = (content.scrollHeight + 30) + "px";
            }
        }
    }
}
function initCollapseByDomId( id ){

    if(document.getElementById(id)){

        resetHeightCollapseByDomId(id)

        /// collapse page recruit init
        var coll = document.getElementsByClassName("collapsible")
        
        for (var i = 0; i < coll.length; i++) {
            
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
            }
        }

    }
}

function jqueryNavTabCustom(id){

    if(!document.getElementById(id)){
        return false
    }
    var jqueryId = `#${id}`
    $(jqueryId + ' div:eq(0)').show();
    $(jqueryId + ' .check li').click(function(){

        /// remove all class active of list branch
        $(jqueryId + ' .check li').removeClass('active')
        /// add class active for only dom clicking... 
        $(this).addClass('active')
        /// get id of class active
        var idBranch = $(this).attr('data-id')
        
        /// ẩn hết sạch mấy tất cả các container recruit tương ứng
        $(jqueryId + ' .js__toggle-item').hide()
        
        /// check 2 trường hợp: 1 - không có dom id tương ứng 2- có nhưng count = 0 nghãi là không có recruit => trang 404
        if(
            !$(jqueryId + " .js__toggle-item[data-id="+ idBranch +"]").get(0) || 
            $(jqueryId + " .js__toggle-item[data-id="+ idBranch +"]").attr('data-collapse') == '0'
        ){
            /// không có dom recruit
            window.location.href = PAGE_404
        }
        /// hiện đúng cái container recruit có id tương ứng với branch
        $(jqueryId + " .js__toggle-item[data-id="+ idBranch +"]").fadeToggle(900)

        /// collapse reset height when show container recruit ( why? because nextElementSibling = 0 when container display none)
        resetHeightCollapseByDomId(id)
	})
}

$(document).ready(function () {

    jqueryNavTabCustom("page__search")
    jqueryNavTabCustom("page__recruit")
    initCollapseByDomId("page__recruit")
})
