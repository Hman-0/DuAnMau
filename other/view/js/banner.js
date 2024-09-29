let listimg = document.querySelector(".list-img");
let items = document.querySelectorAll(".item");
let prev = document.getElementById("prev");
let next = document.getElementById("next");
let count = 0;
let index = items.length - 1;

next.onclick = function () {
    if (count + 1 > index) {
        count = 0;
    } else {
        count += 1;
    }
    reloadslide();
    clearInterval(auto);
    auto = setInterval(() => { next.click() }, 5000);
}
prev.onclick = function () {
    if (count -1 < 0) {
        count = index;
    } else {
        count -= 1;
    }
    reloadslide();
    clearInterval(auto);
    auto = setInterval(() => { next.click() }, 5000);
}

function reloadslide() {
    let checkleft = items[count].offsetLeft;
    listimg.style.left = -checkleft + 'px';
}

let auto = setInterval(() => { next.click() }, 5000);