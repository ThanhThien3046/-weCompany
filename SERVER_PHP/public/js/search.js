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
	$('main ul li').click(function(){
	
    $(this).addClass('active');
    var n = $('main ul li').index(this);
    $('main div').hide();
    $('main div:eq('+ n +')').fadeToggle(900);
	});
})