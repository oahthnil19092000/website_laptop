function hienmota(a) {
  if (a.innerText == "Hiện mô tả") {
    a.innerText = "Ẩn mô tả";
    document.querySelector("#hiensp").style.display = "none";
    document.querySelector("#ansp").style.display = "block";
    document.querySelector(".motasanpham").style.height = "fit-content";
  } else {
    a.innerText = "Hiện mô tả";
    document.querySelector("#hiensp").style.display = "block";
    document.querySelector("#ansp").style.display = "none";
    document.querySelector(".motasanpham").style.height = "300px";
  }
}

function upDate(previewPic) {
  var src = previewPic.src;
  var alt = previewPic.alt;
  document.getElementById("asp").style.backgroundImage = "url(" + src + ")";
}

function them() {
  a = document.querySelector("input[name='quantily']");
  if (parseInt(a.value) < parseInt(a.max)) {
    a.value = parseInt(a.value) + 1;
  }
}

function bot() {
  a = document.querySelector("input[name='quantily']");
  if (parseInt(a.value) > parseInt(a.min)) a.value = parseInt(a.value) - 1;
}
