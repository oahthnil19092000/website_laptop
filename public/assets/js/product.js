function starevaluated(a){
    var b = document.getElementsByClassName('product-feedback-evaluated');
    b[0].innerHTML="";
    for(var i = 0 ; i < a; i++){
        b[0].innerHTML+="<i class=\"fa fa-star\"></i>";
    }
    var c = Math.round(5-a-0.1);
    for(var i = 0 ; i < c; i++){
        b[0].innerHTML+="<i class=\"far fa-star\"></i>";
    }
}
function quantity1(s){
    var a = document.getElementById('quantity');
    var value = parseInt(a.value);
    var min = parseInt(a.min);
    var max = parseInt(a.max);
    if((s == -1 && value > min) || (s == 1 && value < max)){
       
        a.value = value + s;
    }
}
function  chooseimg(a){
    a.previousElementSibling.checked="true";
    a.parentElement.parentElement.previousElementSibling.src=a.src;
}
function checkquantity1(a){
    var value = parseInt(a.value);
    var min = parseInt(a.min);
    var max = parseInt(a.max);
    var max = parseInt(a.max);
    if(value < min){
        a.value = min;
    }
    if(value > max){
        a.value = max;
    }
}
function buttonhidden(a) {
    if(a.innerText=="Xem thêm nội dung"){
        a.previousElementSibling.style.display="none";
        a.previousElementSibling.previousElementSibling.style.height="auto";
        a.innerText="Ẩn bớt nội dung";
    } else {
        a.previousElementSibling.style.display="block";
        a.previousElementSibling.previousElementSibling.style.height="400px";
        a.innerText="Xem thêm nội dung";
    }

}
function addratingstar(a,b,n){
    var c= document.getElementById("rating");
    for(var i = 0 ; i < a ; i++){
        c.innerHTML+="<i class=\"fa fa-star\"></i> ";
    }
    var d = 5 - a;
    for(var i = 0 ; i < d ; i++){
        c.innerHTML+="<i class=\"far fa-star\"></i> ";
    }
    c.innerHTML+="<div class=\"rating-slider\"><div style=\"width:"+b/n*200+"px\"></div></div>";
    c.innerHTML+=" "+b+" Đánh giá";
    c.innerHTML+="<br>";
}