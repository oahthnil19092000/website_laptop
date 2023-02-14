function tothetop() {
  var id = null;
  var elem = document.getElementsByTagName("html");
  var pos = elem[0].scrollTop;
  clearInterval(id);
  id = setInterval(frame, 10);

  function frame() {
    if (pos <= 0) {
      clearInterval(id);
    } else {
      pos -= 30;
      elem[0].scrollTop = pos;
    }
  }
}

function checkbtn(a) {
  var elem = document.getElementsByClassName("swiper-wrapper");
  var pos = elem[0].scrollLeft + a;
  if (pos > 10) {
    document.getElementsByClassName("btn-toleft")[0].style.display = "block";
  } else {
    document.getElementsByClassName("btn-toleft")[0].style.display = "none";
  }
  if (pos < elem[0].scrollWidth - elem[0].offsetWidth - 1) {
    document.getElementsByClassName("btn-toright")[0].style.display = "block";
  } else {
    document.getElementsByClassName("btn-toright")[0].style.display = "none";
  }
}

function navtotheright() {
  var id = null;
  var elem = document.getElementsByClassName("swiper-wrapper");
  var posstart = elem[0].scrollLeft;
  var posend = elem[0].scrollLeft + 200;
  clearInterval(id);
  id = setInterval(frame, 10);

  function frame() {
    if (posstart >= posend) {
      clearInterval(id);
    } else {
      posstart += 20;
      elem[0].scrollLeft = posstart;
    }
  }
  checkbtn(200);
}

function navtotheleft() {
  var id = null;
  var elem = document.getElementsByClassName("swiper-wrapper");
  var posstart = elem[0].scrollLeft;
  var posend = elem[0].scrollLeft - 200;
  clearInterval(id);
  id = setInterval(frame, 10);

  function frame() {
    if (posstart <= posend) {
      clearInterval(id);
    } else {
      posstart -= 20;
      elem[0].scrollLeft = posstart;
    }
  }
  checkbtn(-200);
}
window.onload = function () {
  if (document.getElementsByClassName("swiper-wrapper").length) checkbtn(0);
};
function searchTo(text){
  if(text.indexOf("muc-gia") != -1){
    window.location.href="home/products_with_price/"+text;
  } else if(text.indexOf("thuong-hieu") != -1){
    window.location.href="home/products_with_brand/"+text;
  } else if(text.indexOf("bao-hanh") != -1){
    window.location.href="home/products_with_guarantee/"+text;
  }
}
function showAllTag(x){
  let b = document.querySelectorAll('div.d.d-none.'+x);
  b.forEach(elem => 
    elem.className="d "+x
  );
  let c = document.querySelector('a.'+x+'showAllTag');
  c.innerText = "Ẩn bớt"
  c.href = "javascript:hiddenTag('"+x+"')";
}
function hiddenTag(x){
  let b = document.querySelectorAll('div.d.'+x);
  for(let i = 7 ;i < b.length ;i++){
    b[i].className="d d-none "+x
  }
  let c = document.querySelector('a.'+x+'showAllTag');
  c.innerText = "Xem tất cả";
  c.href = "javascript:showAllTag('"+x+"')";
}
function backToHome(){
  window.location.href="./"
}
function quantily(cart_id , product, quantily){
  if(quantily > 0 && quantily <=5){
    window.location.href="user/update_cart/"+cart_id+"/"+product+"/"+quantily;
  }
}
function censorship(a,b){
  window.location.href="dashboard/censorship/"+a+"/"+b;
}