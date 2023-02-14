function hideall() {
  var a = document.getElementsByClassName("grid__row1");
  for (var i = 0; i < a.length; i++) {
    a[i].style.display = "none";
  }
  var a = document.querySelectorAll("span[era='Linh']");
  for (var i = 0; i < a.length; i++) {
    a[i].className = "phantrang-item__link mx-2 bg-light border text-dark";
  }
}
function check(a, b) {
  hideall();
  document.getElementById(a.replaceAll("-check", "")).style.display = "flex";
  b.className = "phantrang-item__link mx-2 active";
}
//linear-gradient(90deg, #00c4cc, #7d2ae8);

function nextpage() {
  var a = document.querySelector(
    "span[era='Linh'].phantrang-item__link.mx-2.active"
  );
  if (a.nextElementSibling) a.nextElementSibling.click();
}
function prepage() {
  var a = document.querySelector(
    "span[era='Linh'].phantrang-item__link.mx-2.active"
  );
  if (a.previousElementSibling) a.previousElementSibling.click();
}
//Hàm này để xử lý cái link
//nếu mà chưa có chữ filter thì mình sẽ thêm chữ filter còn k thì khỏi khỏi thêm rồi chọn thêm 1 cái nữa thì nố thêm dô nữa
//trùng thì nó sẽ thay thế giá trị mới
//hỉu được tới đây chưa
//ok rồi tới code php
function filter(name, value) {
  var url = window.location.href;
  if (url.indexOf("filter") == -1) {
    url = "http://localhost:8080/NLNGANH/home/filter/" + name + "/" + value;
  } else {
    if (url.indexOf(name) == -1) {
      console.log(url);
      url = url + "/" + name + "/" + value;
    } else {
      let url_tmp_1 = url.substring(0, url.indexOf(name));
      let url_tmp = url.substring(url.indexOf(name) + name.length + 1);
      if (!url_tmp.indexOf("/")) {
        url =
          url_tmp_1 +
          name +
          "/" +
          value +
          "/" +
          url_tmp.substring(url_tmp.indexOf("/"));
      } else {
        url = url_tmp_1 + name + "/" + value;
      }
    }
  }
  window.location.href = url;
}
