function showpass(show) {
  let x = document.querySelectorAll("input.inputText");
  if (show.checked) {
    for (var i = 0; i < x.length; i++) {
      x[i].type = "text";
    }
  } else {
    for (var i = 0; i < x.length; i++) {
      x[i].type = "password";
    }
  }
}
function addparameter(a, b) {
  var parameters = document.getElementById("parameters");
  if (parameters.innerHTML.indexOf(b.value) == -1) {
    parameters.innerHTML += b.value + ":" + a.value + "\n";
  } else {
    var text = parameters.innerHTML;
    var searchText = parameters.value.substring(
      parameters.innerHTML.indexOf(b.value),
      parameters.innerHTML.indexOf(
        "\n",
        parameters.innerHTML.indexOf(b.value)
      ) + 1
    );
    if (a.value != "") {
      var replaceText = b.value + ":" + a.value + "\n";
    } else {
      var replaceText = "";
    }
    text = text.replace(searchText, replaceText);
    parameters.innerHTML = text;
  }
  a.value = "";
  parameterschange();
}
function parameterschange() {
  var parameters = document.getElementById("parameters");
  var table = document.getElementById("parameters-table");
  var HTML = "<tr><th>Bảng thông số</th><th></th></tr><tr><td>";
  var text = parameters.value;
  text =
    HTML +
    text.replaceAll("\n", "</td></tr><tr><td>").replaceAll(":", "</td><td>");
  text = text.substring(0, text.length - 4);
  table.innerHTML = text;
}
function imgschange() {
  var files = document.getElementsByName("addproduct-imgs[]");
  var n = files[0].files.length;
  if (n > 5) n = 5;
  var x;
  document.getElementsByClassName("product-added-img")[0].innerHTML = "";
  for (x = 0; x < n; x++) {
    create("img" + x);
    rend(x, "img" + x);
  }
}

function create(name) {
  if (!document.getElementById(name)) {
    var parent = document.getElementsByClassName("product-added-img");
    var node = document.createElement("img");
    node.setAttribute("id", name);
    parent[0].appendChild(node);
  } else document.getElementById(name).style.display = "inline";
}

function rend(x, name) {
  var files = document.getElementsByName("addproduct-imgs[]");
  const file = files[0].files[x];
  const render = new FileReader();
  render.onload = function () {
    const result = render.result;
    document.getElementById(name).src = result;
  };
  render.readAsDataURL(file);
}
function checkinput(a, error) {
  if (a.value == "") {
    a.nextElementSibling.innerText = error;
  } else {
    a.nextElementSibling.innerText = "";
  }
}
function checkinputemail(a) {
  filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (a.value == "") {
    a.nextElementSibling.innerText = "Vui lòng không để trống email!";
  } else if (!filter.test(a.value)) {
    a.nextElementSibling.innerText = "Email không hợp lệ!";
  } else {
    a.nextElementSibling.innerText = "";
  }
}
function checkinputpass(a) {
  filter = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

  if (!filter.test(a.value)) {
    a.nextElementSibling.nextElementSibling.innerText =
      "Password không hợp lệ!";
  } else {
    a.nextElementSibling.nextElementSibling.innerText = "";
  }
}
function checkinputtel(a) {
  filter = /^[0-9]{10}$/;

  if (!filter.test(a.value)) {
    a.nextElementSibling.innerText = "Số điện thoại không hợp lệ!";
  } else {
    a.nextElementSibling.innerText = "";
  }
}

function checkinputrepass(a) {
  filter = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

  if (!filter.test(a.value)) {
    a.nextElementSibling.nextElementSibling.innerText =
      "Password không hợp lệ!";
    document.getElementsByClassName("btn-submit")[0].disabled = true;
  } else if (
    a.parentElement.parentElement.previousElementSibling.lastElementChild
      .firstElementChild.value != a.value
  ) {
    a.nextElementSibling.nextElementSibling.innerText =
      "Password không trùng khớp!";
    document.getElementsByClassName("btn-submit")[0].disabled = true;
  } else {
    a.nextElementSibling.nextElementSibling.innerText = "";
    document.getElementsByClassName("btn-submit")[0].disabled = false;
  }
}
