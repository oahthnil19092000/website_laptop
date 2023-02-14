function page(page, a) {
  let x = document.querySelectorAll(".page.flex-wrap");
  let y = document.querySelector("div.d-flex.page.flex-wrap");
  let btn = document.querySelector(
    "button.btn-primary.px-3.py-1.mx-2.btn-page"
  );
  btn.className = "btn-light px-3 py-1 mx-2 btn-page";
  if (y != null) {
    y.className = "page flex-wrap";
  }
  x[page - 1].className = "d-flex page flex-wrap";
  a.className = "btn-primary px-3 py-1 mx-2 btn-page";
  hiddenBtnPage();
  showBtnPage();
}
function hiddenBtnPage() {
  let x = document.querySelectorAll("button.btn-light.px-3.py-1.mx-2.btn-page");
  for (let i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.querySelectorAll("button.btn-light.px-3.py-1.mx-2.btn-page");
}
function showBtnPage() {
  let x = document.querySelector("button.btn-primary.px-3.py-1.mx-2.btn-page");
  x.style.display = "block";

  if (!x.previousElementSibling.previousElementSibling) {
    x.nextElementSibling.style.display = "block";
    x.nextElementSibling.nextElementSibling.style.display = "block";
    x.nextElementSibling.nextElementSibling.nextElementSibling.style.display =
      "block";
  } else if (!x.nextElementSibling.nextElementSibling) {
    x.previousElementSibling.style.display = "block";
    x.previousElementSibling.previousElementSibling.style.display = "block";
    x.previousElementSibling.previousElementSibling.previousElementSibling.style.display =
      "block";
  } else if (!x.nextElementSibling.nextElementSibling.nextElementSibling) {
    x.previousElementSibling.style.display = "block";
    x.previousElementSibling.previousElementSibling.style.display = "block";
    x.nextElementSibling.style.display = "block";
  } else {
    x.previousElementSibling.style.display = "block";
    x.nextElementSibling.style.display = "block";
    x.nextElementSibling.nextElementSibling.style.display = "block";
  }
}
function nextPage(a) {
  let x = document.querySelector("button.btn-primary.px-3.py-1.mx-2.btn-page");
  if (x.nextElementSibling != a) {
    x.nextElementSibling.click();
  }
}
function previousPage(a) {
  let x = document.querySelector("button.btn-primary.px-3.py-1.mx-2.btn-page");
  if (x.previousElementSibling != a) {
    x.previousElementSibling.click();
  }
}
if (
  !window.location.href.includes("http://localhost:8080/NLNGANH/dashboard") &&
  !window.location.href.includes("http://localhost:8080/NLNGANH/form") &&
  !window.location.href.includes("http://localhost:8080/NLNGANH/user") &&
  !window.location.href.includes("http://localhost:8080/NLNGANH/home/product/")
)
  page(1, document.querySelector("button.btn-primary.px-3.py-1.mx-2.btn-page"));

function searchProductManegement(text, a) {
  $("input[type=search].form-control.form-control-sm")[0].value = text;
  let c = document.querySelector("div.dt-buttons.btn-group.flex-wrap").children;
  for (let i = 0; i < c.length; i++) {
    if (c[i] == a) {
      c[i].className = "btn-primary rounded px-2 py-1  mx-1";
    } else c[i].className = "btn-light rounded px-2 py-1  mx-1";
  }
}
//linear-gradient(90deg, #00c4cc, #7d2ae8);
