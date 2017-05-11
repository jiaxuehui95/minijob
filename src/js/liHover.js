$(document).ready(function(){
    
    $("ul li").hover(function () {
        $(this).addClass("li_hover");
        $(this).removeClass("default");
    }, function () {
        $(this).addClass("default");
        $(this).removeClass("li_hover");
});
    
    $("ul li").click(function(){
       // alert("点击了"+ $(this).find("h5").find("a").attr("href"));
        window.location.href=$(this).find("h5").find("a").attr("href");
    });
});
  
  
 
  
 