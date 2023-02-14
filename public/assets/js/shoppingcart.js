function checkforall(a) {
  var b = document.getElementsByName("sp[]");
  if (a.checked) {
    b.forEach((element) => {
      element.checked = true;
    });
  } else {
    b.forEach((element) => {
      element.checked = false;
    });
  }
  checkproduct();
}
function provincerender(a) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "public/json/tinh_tp.json");
  xhr.responseType = "json";
  xhr.onload = function (e) {
    if (this.status == 200) {
      var newContent = '<option value="">Tỉnh/Thành phố</option>';
      for (var i in this.response) {
        newContent += '<option class="event" value="';
        newContent += this.response[i].code;
        newContent += '">';
        newContent += this.response[i].name_with_type;
        newContent += "</option>";
      }
      a.innerHTML = newContent;
    }
  };
  xhr.send();
}
function districtrender(a, b) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "public/json/quan-huyen/" + b.value + ".json");
  xhr.responseType = "json";
  xhr.onload = function (e) {
    if (this.status == 200) {
      var newContent = '<option value="">Quận/Huyện</option>';
      for (var i in this.response) {
        newContent += '<option class="event" value="';
        newContent += this.response[i].code;
        newContent += '">';
        newContent += this.response[i].name_with_type;
        newContent += "</option>";
      }
      a.innerHTML = newContent;
    }
  };
  xhr.send();
}
function wardrender(a, b) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "public/json/xa-phuong/" + b.value + ".json");
  xhr.responseType = "json";
  xhr.onload = function (e) {
    if (this.status == 200) {
      var newContent = '<option value="">Xã/Phường/Thị Trấn</option>';
      for (var i in this.response) {
        newContent += '<option class="event" value="';
        newContent += this.response[i].path_with_type;
        newContent += '">';
        newContent += this.response[i].name_with_type;
        newContent += "</option>";
      }
      a.innerHTML = newContent;
    }
  };
  xhr.send();
}
function choosepayments(a) {
  a.previousElementSibling.checked = true;
}
function checkproduct() {
  var b = document.getElementsByName("sp[]");
  var c = document.getElementsByClassName("payment-table-container")[0]
    .childNodes[1].childNodes;
  var d = document.getElementsByName("ID_Products[]");
  for (var i = 0; i < b.length; i++) {
    if (b[i].checked) {
      c[(i + 1) * 2].style.display = "table-row";
      d[i].checked = true;
    } else {
      c[(i + 1) * 2].style.display = "none";
      d[i].checked = false;
    }
  }
}
function orders() {
  document.getElementsByClassName("payment-container")[0].style.display =
    "block";
}

function specification1(a, b) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "dashboard/json_specification");
  xhr.responseType = "json";
  xhr.onload = function (e) {
    if (this.status == 200) {
      var newContent = "";
      for (var i in this.response[b.value]) {
        var specification_name = "thong so";
        newContent += '<option value="';
        newContent += this.response[b.value][i][specification_name];
        newContent += '">';
        newContent += this.response[b.value][i][specification_name];
        newContent += "</option>";
      }
      a.innerHTML = newContent;
    }
  };
  xhr.send();
}
